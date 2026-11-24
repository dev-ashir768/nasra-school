/**
 * Main site script (jQuery)
 */
$(function () {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Send CSRF token with every jQuery AJAX request
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // ---------- Smooth scroll (Lenis) ----------
    let lenis = null;
    if (window.Lenis && !reduceMotion) {
        lenis = new Lenis({ duration: 1.15, easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)) });
        (function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        })(0);
    }

    function scrollToTarget(target) {
        lenis ? lenis.scrollTo(target, { offset: -90 }) : $('html, body').animate({ scrollTop: $(target).offset().top - 90 }, 600);
    }

    // In-page anchor links scroll smoothly
    $(document).on('click', 'a[href^="#"]', function (e) {
        const id = $(this).attr('href');
        if (id.length > 1 && $(id).length) {
            e.preventDefault();
            scrollToTarget(id);
        }
    });

    // ---------- Scroll-driven UI (progress bar, header) ----------
    const $header = $('#site-header');
    const progress = document.getElementById('scroll-progress');
    let ticking = false;

    function onScroll() {
        const y = window.scrollY;
        const max = document.documentElement.scrollHeight - window.innerHeight;

        progress.style.transform = 'scaleX(' + (max > 0 ? y / max : 0) + ')';
        $header.toggleClass('is-scrolled', y > 20);
        ticking = false;
    }

    $(window).on('scroll resize', function () {
        if (!ticking) {
            requestAnimationFrame(onScroll);
            ticking = true;
        }
    });
    onScroll();

    // ---------- Reveal on scroll ----------
    const $animated = $('[data-animate]');
    $animated.each(function () {
        this.style.setProperty('--delay', ($(this).data('delay') || 0) + 'ms');
    });

    if ('IntersectionObserver' in window && !reduceMotion) {
        const revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
        $animated.each(function () { revealObserver.observe(this); });
    } else {
        $animated.addClass('is-visible');
    }

    // ---------- Number counters ----------
    function runCounter(el) {
        const target = Number(el.dataset.count);
        const plain = el.hasAttribute('data-plain');            // years: no thousands separator
        const start = plain ? Math.max(0, target - 75) : 0;      // 1949 counts up from 1874
        const duration = 1800;
        const t0 = performance.now();

        (function tick(now) {
            const p = Math.min(1, (now - t0) / duration);
            const eased = 1 - Math.pow(1 - p, 4);
            const value = Math.round(start + (target - start) * eased);
            el.textContent = plain ? value : value.toLocaleString('en-US');
            if (p < 1) requestAnimationFrame(tick);
        })(t0);
    }

    if ('IntersectionObserver' in window && !reduceMotion) {
        const counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    runCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.6 });
        $('[data-count]').each(function () { counterObserver.observe(this); });
    }

    // ---------- Hero full-bleed carousel (CSS opacity crossfade) ----------
    $('[data-hero-slider]').each(function () {
        const $root = $(this);
        const $slides = $root.find('.hero-slide');
        const $dots = $root.find('.hero-dots button');
        const count = $slides.length;
        if (count < 2) return;

        const slideTime = 6000;
        let index = 0;
        let timer = null;

        $root.css('--slide-ms', slideTime + 'ms');

        function show(next) {
            index = ((next % count) + count) % count;
            $slides.removeClass('is-active').attr('aria-hidden', 'true');
            // Force a frame without is-active so ken-burns animation restarts every slide
            void $root[0].offsetWidth;
            $slides.eq(index).addClass('is-active').removeAttr('aria-hidden');

            const img = $slides.eq(index).find('.ken-burns')[0];
            if (img) {
                img.style.animation = 'none';
                void img.offsetWidth;
                img.style.animation = '';
            }

            $dots.removeClass('is-current').removeAttr('aria-current');
            $dots.eq(index).addClass('is-current').attr('aria-current', 'true');

            const fill = $dots.eq(index).find('.dot-fill')[0];
            if (fill) {
                fill.style.animation = 'none';
                void fill.offsetWidth;
                fill.style.animation = '';
            }
        }

        function play() {
            stop();
            if (reduceMotion) return;
            timer = setInterval(function () { show(index + 1); }, slideTime);
        }
        function stop() {
            if (timer) clearInterval(timer);
            timer = null;
        }

        $dots.on('click', function () {
            show($dots.index(this));
            play();
        });

        // Pause only while interacting with the progress pills — not the whole hero
        $root.find('.hero-dots')
            .on('mouseenter focusin', stop)
            .on('mouseleave focusout', play);

        show(0);
        play();
    });

    // ---------- Testimonials slider ----------
    $('.testimonials').each(function () {
        const $root = $(this);
        const $track = $root.find('.t-track');
        const $dots = $root.find('.t-dots button');
        const $slides = $root.find('.t-slide');
        const count = $slides.length;
        let pos = 1;          // position in the track (0 = clone of last, count + 1 = clone of first)
        let timer = null;

        // Infinite loop: a copy of the last slide goes in front and a copy of the first at the end.
        // When we slide onto a copy, we jump (without animation) to the real slide it mirrors.
        $track.prepend($slides.last().clone().attr('aria-hidden', true));
        $track.append($slides.first().clone().attr('aria-hidden', true));

        function move(animate) {
            $track.css('transition', animate ? '' : 'none')
                  .css('transform', 'translateX(-' + (pos * 100) + '%)');
            if (!animate) $track[0].offsetWidth;   // force reflow so the next move animates again
        }

        // If we're sitting on a copy (e.g. transitionend didn't fire in a background tab), snap to the real slide
        function normalize() {
            if (pos >= count + 1) { pos = 1; move(false); }
            if (pos <= 0) { pos = count; move(false); }
        }

        function update() {
            const index = (pos - 1 + count) % count;
            $slides.each(function (n) { $(this).attr('aria-hidden', n !== index); });
            $dots.removeClass('w-7 !bg-accent').addClass('w-2')
                .eq(index).removeClass('w-2').addClass('w-7 !bg-accent');
        }

        function step(delta) {
            normalize();
            pos += delta;
            move(true);
            update();
        }

        function goTo(index) {
            normalize();
            pos = index + 1;
            move(true);
            update();
        }

        $track.on('transitionend', function (e) {
            if (e.target === this) normalize();
        });

        function play() {
            if (reduceMotion) return;
            stop();
            timer = setInterval(function () { step(1); }, 5000);
        }
        function stop() { clearInterval(timer); }

        $root.find('.t-prev').on('click', function () { step(-1); play(); });
        $root.find('.t-next').on('click', function () { step(1); play(); });
        $dots.each(function (n) { $(this).on('click', function () { goTo(n); play(); }); });

        // Pause while the visitor is reading / interacting
        $root.on('mouseenter focusin', stop).on('mouseleave focusout', play);

        // Keyboard arrows when focused inside
        $root.on('keydown', function (e) {
            if (e.key === 'ArrowLeft')  { step(-1); }
            if (e.key === 'ArrowRight') { step(1); }
        });

        // Touch swipe
        let startX = null;
        $root.find('.t-viewport')
            .on('touchstart', function (e) { startX = e.originalEvent.touches[0].clientX; stop(); })
            .on('touchend', function (e) {
                if (startX === null) return;
                const dx = e.originalEvent.changedTouches[0].clientX - startX;
                if (Math.abs(dx) > 40) step(dx < 0 ? 1 : -1);
                startX = null;
                play();
            });

        move(false);
        update();
        play();
    });

    // ---------- Mobile drawer menu ----------
    const $drawer = $('#mobile-drawer');
    const $burger = $('#menu-toggle');

    function openDrawer() {
        $drawer.addClass('is-open').attr('aria-hidden', false);
        $burger.addClass('is-active').attr({ 'aria-expanded': true, 'aria-label': 'Close menu' });
        $('html').addClass('drawer-open');
        if (lenis) lenis.stop();
        setTimeout(function () { $drawer.find('.drawer-close').trigger('focus'); }, 350);
    }

    function closeDrawer() {
        if (!$drawer.hasClass('is-open')) return;
        $drawer.removeClass('is-open').attr('aria-hidden', true);
        $burger.removeClass('is-active').attr({ 'aria-expanded': false, 'aria-label': 'Open menu' });
        $('html').removeClass('drawer-open');
        if (lenis) lenis.start();
        $burger.trigger('focus');
    }

    $burger.on('click', function () {
        $drawer.hasClass('is-open') ? closeDrawer() : openDrawer();
    });
    $drawer.on('click', '[data-drawer-close]', closeDrawer);
    $drawer.on('click', 'a[href]', closeDrawer);

    $(document).on('keydown', function (e) {
        if (!$drawer.hasClass('is-open')) return;
        if (e.key === 'Escape') closeDrawer();

        // Keep keyboard focus inside the open drawer
        if (e.key === 'Tab') {
            const $focusable = $drawer.find('a[href], button').filter(':visible');
            const first = $focusable.first()[0];
            const last = $focusable.last()[0];
            if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
            else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
        }
    });

    // Close if the screen grows to desktop nav width while open
    window.matchMedia('(min-width: 1280px)').addEventListener('change', function (e) {
        if (e.matches) closeDrawer();
    });

    // Accordion submenus (Academics, Admissions) - only one open at a time
    $drawer.on('click', '.drawer-toggle', function () {
        const $btn = $(this);
        const willOpen = $btn.attr('aria-expanded') !== 'true';
        $drawer.find('.drawer-toggle').not($btn).attr('aria-expanded', false).next('.drawer-sub').removeClass('is-open');
        $btn.attr('aria-expanded', willOpen).next('.drawer-sub').toggleClass('is-open', willOpen);
    });

    // ---------- Instagram embeds (lazy — only when section nears viewport) ----------
    (function lazyInstagram() {
        const section = document.querySelector('[data-ig-lazy]');
        if (!section) return;

        function processEmbeds() {
            if (window.instgrm && window.instgrm.Embeds && typeof window.instgrm.Embeds.process === 'function') {
                window.instgrm.Embeds.process();
                return true;
            }
            return false;
        }

        function injectAndLoad() {
            section.querySelectorAll('[data-ig-permalink]').forEach(function (item) {
                if (item.querySelector('.instagram-media')) return;
                const permalink = item.getAttribute('data-ig-permalink');
                if (!permalink) return;
                const skeleton = item.querySelector('.instagram-embeds__skeleton');
                if (skeleton) skeleton.remove();
                const bq = document.createElement('blockquote');
                bq.className = 'instagram-media';
                bq.setAttribute('data-instgrm-permalink', permalink);
                bq.setAttribute('data-instgrm-version', '14');
                const a = document.createElement('a');
                a.href = permalink;
                a.target = '_blank';
                a.rel = 'noopener noreferrer';
                a.textContent = 'View this post on Instagram';
                bq.appendChild(a);
                item.appendChild(bq);
            });

            if (processEmbeds()) return;

            const s = document.createElement('script');
            s.src = 'https://www.instagram.com/embed.js';
            s.async = true;
            s.onload = function () {
                let tries = 0;
                const t = setInterval(function () {
                    if (processEmbeds() || ++tries > 25) clearInterval(t);
                }, 200);
            };
            document.body.appendChild(s);
        }

        if (!('IntersectionObserver' in window)) {
            injectAndLoad();
            return;
        }

        const io = new IntersectionObserver(function (entries) {
            if (!entries.some(function (e) { return e.isIntersecting; })) return;
            io.disconnect();
            injectAndLoad();
        }, { rootMargin: '280px 0px' });
        io.observe(section);
    })();

    // ---------- Homepage video player ----------
    $('[data-video-player]').each(function () {
        const $root = $(this);
        const $btn = $root.find('.video-player__play');
        const youtube = $root.data('youtube');
        const src = $root.data('video-src');
        let started = false;

        function start() {
            if (started) return;
            started = true;
            const $media = $root.find('.video-player__media');

            if (src) {
                const $video = $('<video class="video-player__video" controls playsinline autoplay></video>');
                $video.append($('<source>').attr({ src: src, type: 'video/mp4' }));
                $media.append($video);
                $video[0].play().catch(function () {});
            } else if (youtube) {
                const embed = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(youtube)
                    + '?autoplay=1&rel=0&modestbranding=1&playsinline=1';
                $media.append(
                    $('<iframe class="video-player__embed" title="Nasra School video" allowfullscreen allow="autoplay; encrypted-media; picture-in-picture">')
                        .attr('src', embed)
                );
            } else {
                started = false;
                return;
            }

            $root.addClass('is-playing');
        }

        $btn.on('click', start);
        $root.on('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                start();
            }
        });
    });

    // ---------- Contact form via AJAX ----------
    $('#contact-form').on('submit', function (e) {
        e.preventDefault();
        const $form = $(this);
        const $status = $('#form-status');
        const $btn = $form.find('[type="submit"]').prop('disabled', true);

        $.post($form.attr('action'), $form.serialize())
            .done(function (res) {
                $status.removeClass('hidden text-red-600').addClass('text-green-600').text(res.message);
                $form[0].reset();
            })
            .fail(function (xhr) {
                const msg = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                $status.removeClass('hidden text-green-600').addClass('text-red-600').text(msg);
            })
            .always(function () {
                $btn.prop('disabled', false);
            });
    });
});
