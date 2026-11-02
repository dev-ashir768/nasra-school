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

    // ---------- Scroll-driven UI (progress bar, header, back-to-top) ----------
    const $header = $('#site-header');
    const $backToTop = $('#back-to-top');
    const progress = document.getElementById('scroll-progress');
    let ticking = false;

    function onScroll() {
        const y = window.scrollY;
        const max = document.documentElement.scrollHeight - window.innerHeight;

        progress.style.transform = 'scaleX(' + (max > 0 ? y / max : 0) + ')';
        $header.toggleClass('is-scrolled', y > 20);
        $backToTop.toggleClass('is-shown', y > 600);
        ticking = false;
    }

    $(window).on('scroll resize', function () {
        if (!ticking) {
            requestAnimationFrame(onScroll);
            ticking = true;
        }
    });
    onScroll();

    $backToTop.on('click', function () {
        lenis ? lenis.scrollTo(0) : $('html, body').animate({ scrollTop: 0 }, 600);
    });

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

    // ---------- Hero photo slider (crossfade; heading and buttons stay put) ----------
    $('[data-hero-slider]').each(function () {
        const $root = $(this);
        const $slides = $root.find('.hero-slide');
        const $dots = $root.find('.hero-dots button');
        const slideTime = 6000;
        let index = 0;
        let timer = null;

        if ($slides.length < 2) return;

        // The lime progress bar in the current dot fills over the same time as the autoplay
        $root.find('.hero-dots')[0].style.setProperty('--slide-time', slideTime + 'ms');

        function show(n) {
            $slides.eq(index).removeClass('is-active opacity-100').addClass('opacity-0').attr('aria-hidden', true);
            index = (n + $slides.length) % $slides.length;
            $slides.eq(index).removeClass('opacity-0').addClass('is-active opacity-100').attr('aria-hidden', false);

            $dots.removeClass('is-current').removeAttr('aria-current');
            const dot = $dots.eq(index).addClass('is-current').attr('aria-current', 'true')[0];
            // restart the fill animation even if the same dot is chosen again
            const fill = dot.querySelector('.dot-fill');
            fill.style.animation = 'none';
            fill.offsetWidth;
            fill.style.animation = '';
        }

        function play() {
            if (reduceMotion) return;
            clearInterval(timer);
            timer = setInterval(function () { show(index + 1); }, slideTime);
        }

        $dots.each(function (n) { $(this).on('click', function () { show(n); play(); }); });

        // Start the other photos downloading once the page has loaded, so each fade is instant
        $(window).on('load', function () {
            $slides.find('img[loading="lazy"]').attr('loading', 'eager');
        });

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
            $dots.removeClass('w-8 !bg-gradient-lime').addClass('w-2.5')
                .eq(index).removeClass('w-2.5').addClass('w-8 !bg-gradient-lime');
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

    // ---------- Mobile menu ----------
    $('#menu-toggle').on('click', function () {
        const $menu = $('#mobile-menu').toggleClass('hidden');
        const open = !$menu.hasClass('hidden');
        $(this).attr('aria-expanded', open)
            .find('i').toggleClass('fa-bars', !open).toggleClass('fa-xmark', open);
    });

    // Mobile dropdowns (Academics, Admissions)
    $('.mobile-dropdown > button').on('click', function () {
        $(this).next().toggleClass('hidden');
        $(this).find('i').toggleClass('rotate-180');
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
