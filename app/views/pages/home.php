<?php
// Full-bleed hero carousel backgrounds
$heroSlides = [
    ['home/hero-banner.jpg', 'Nasra School students on campus'],
    ['home/hero.jpg',        'Nasra School students walking to class'],
    ['home/hero-2.jpg',      'Students in Nasra School uniforms'],
    ['home/campus-1.jpg',    'Student batting in a school cricket match'],
    ['home/legacy-1.jpg',    'A Nasra School campus building'],
];

// From nasraschool.edu.pk — The Nasra Difference
$differences = [
    ['fa-star',          'Individuality', 'We celebrate individuality amongst our diversity and actively promote inclusion of every individual by empowering our students to be the best, most authentic version of themselves.'],
    ['fa-book-open',     'Learning',      'The dedication of our faculty serves to galvanize our students to learn, grow and develop into positive, productive and pro-active assets of society. Extraordinary faculty create extraordinary students!'],
    ['fa-shield-halved', 'Confidence',    'By giving ample exposure to challenging leadership programs, Nasra School empowers its pupils to forge ahead confidently, in their school years and beyond.'],
    ['fa-handshake',     'Tolerance',     'Our school motto is tolerance. We believe that tolerance, which stands in stark opposition to ignorance, is the hallmark of an enlightened and elevated mindset.'],
    ['fa-users',         'Team Work',     'As our players are taught, sportsmanship, strategy and cooperation form the basis of all team work, and along with honed skill lead to victory.'],
];

// Real alumni testimonials from nasraschool.edu.pk/alumni
$testimonials = [
    ['Falak Naz', 'PhD Student, Mass Communications, Karachi University', 'My teachers were my mentors they taught me how to be an ambassador of peace, light, and knowledge. They worked on me so I could become a symbol of change, a symbol of enlightenment.'],
    ['Mohammad Sameer Kayani', 'Senior Actuarial Consultant · National Position Holder, SSC & HSSC', 'ETNS provided me with a solid foundation which helped me in every phase of my life later on. The hard work that my teachers put into my development was unparalleled.'],
    ['Urooba Adil', 'Fashion Design Student, Asian Institute of Fashion Design', 'Nasra School gave me the confidence and trust that I have in myself today. Our amazing teachers loved their students like their own children, moulding them into better people.'],
    ['M. Hozefa Haider', 'Computer Science Student, Habib University', 'One of the best things that Nasra School instilled in me is selflessness and the realization that respecting others begets respect in turn. I feel immensely proud to represent this institution.'],
    ['Alina Rizwan', 'Journalism Student, SZABIST University', 'A school is expected to provide mere education, but I applaud my alma mater, Nasra School, for aiding me along a journey of becoming a better human being — an education which only ends with life.'],
];

$stages = [
    ['01', 'Pre-Primary',      'fa-child-reaching', 'pre-primary',      'Play-based beginnings that build curiosity, confidence and care.'],
    ['02', 'Primary',          'fa-graduation-cap', 'primary',          'Strong foundations in literacy, numeracy and character.'],
    ['03', 'Secondary',        'fa-book-open',      'secondary',        'Concept-driven learning with leadership and expression.'],
    ['04', 'Higher Secondary', 'fa-user-graduate',  'higher-secondary', 'College-ready pathways with purpose and ambition.'],
];
?>

<!-- ============ HERO ============ -->
<section class="hero-banner relative flex items-center overflow-hidden bg-ink text-white" data-hero-slider aria-roledescription="carousel" aria-label="Life at Nasra School">
    <div class="hero-slides absolute inset-0" aria-hidden="true">
        <?php foreach ($heroSlides as $i => [$img, $alt]): ?>
            <div class="hero-slide<?= $i === 0 ? ' is-active' : '' ?>"<?= $i === 0 ? '' : ' aria-hidden="true"' ?>>
                <?= photo($img, $alt, 'ken-burns h-full w-full', true) ?>
            </div>
        <?php endforeach; ?>
        <div class="hero-scrim absolute inset-0"></div>
    </div>

    <div class="container relative z-10 flex h-full w-full flex-col justify-center py-8 sm:py-10">
        <div class="max-w-2xl xl:max-w-[38rem]">
            <p class="hero-in flex items-center gap-3 text-sm text-white/75" style="--d:.05s">
                <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
                The Nasra School System · Est. 1949
            </p>

            <h1 class="hero-in mt-4 font-display text-[clamp(1.85rem,5vw,3.5rem)] font-black uppercase leading-[1.05] tracking-tight sm:mt-5" style="--d:.15s">
                <span class="block text-white">Real Education</span>
                <span class="mt-0.5 block text-white/90">Begins With</span>
                <span class="relative mt-0.5 inline-block text-white">
                    <span class="absolute -top-3 left-1 flex gap-1.5" aria-hidden="true">
                        <span class="h-3 w-0.5 rotate-[-28deg] bg-accent"></span>
                        <span class="h-4 w-0.5 bg-accent"></span>
                        <span class="h-3 w-0.5 rotate-[28deg] bg-accent"></span>
                    </span>
                    A Child's
                </span>
                <span class="mt-1 block">
                    <span class="brush-word brush-word-light">Thinking</span>
                </span>
            </h1>

            <p class="hero-in mt-4 max-w-md text-sm leading-relaxed text-white/80 sm:mt-5 sm:text-base" style="--d:.3s">
                High-quality English-medium education at affordable costs — making opportunity accessible to thousands of deserving children across Karachi.
            </p>

            <p class="hero-in mt-3 font-script text-xl text-accent sm:text-2xl" style="--d:.4s">
                Rooted in Values, Ready for the Future
            </p>

            <div class="hero-in mt-6 sm:mt-7" style="--d:.55s">
                <a href="<?= base_url('admissions') ?>" class="btn btn-accent">Explore Admissions <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="hero-dots is-vertical absolute right-3 top-1/2 z-20 -translate-y-1/2 sm:right-5 lg:right-7">
        <?php foreach ($heroSlides as $i => $_): ?>
            <button type="button" class="<?= $i === 0 ? 'is-current' : '' ?>" aria-label="Show photo <?= $i + 1 ?> of <?= count($heroSlides) ?>"<?= $i === 0 ? ' aria-current="true"' : '' ?>><span class="dot-fill"></span></button>
        <?php endforeach; ?>
    </div>

    <a href="#about" class="hero-in absolute bottom-4 left-1/2 z-10 hidden -translate-x-1/2 flex-col items-center gap-1.5 text-[10px] uppercase tracking-[0.2em] text-white/55 transition hover:text-accent lg:flex" style="--d:.8s" aria-label="Scroll to about">
        <span>Scroll</span>
        <span class="hero-scroll-line" aria-hidden="true"></span>
    </a>
</section>

<!-- ============ A LEGACY OF PRIDE ============ -->
<?php
$legacyPillars = [
    ['fa-book-open',       'Academic Excellence'],
    ['fa-trophy',          'Holistic Development'],
    ['fa-people-group',    'Caring Community'],
    ['fa-star',            'A Bright Future'],
];
?>
<section id="about" class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
    <div class="container">
        <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-8 xl:gap-12">

            <!-- Photo + yellow corner frame -->
            <div class="lg:col-span-4" data-animate="fade-right">
                <div class="legacy-frame relative mx-auto max-w-md lg:mx-0 lg:max-w-none">
                    <div class="legacy-frame__media overflow-hidden rounded-2xl">
                        <?= photo('home/legacy.jpg', 'Nasra School campus building', 'aspect-[4/5] w-full sm:aspect-[5/6]') ?>
                    </div>
                </div>
            </div>

            <!-- Story -->
            <div class="lg:col-span-5" data-animate="fade-up">
                <div class="flex gap-4 sm:gap-5">
                    <span class="mt-1 hidden w-1 shrink-0 self-stretch rounded-full bg-accent sm:block" aria-hidden="true"></span>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-primary">About Our School</p>
                        <h2 class="mt-3 font-display text-[1.85rem] font-extrabold leading-[1.15] tracking-[-0.02em] text-primary sm:text-[2.15rem] lg:text-[2.35rem]">
                            A Legacy of Pride
                        </h2>
                        <p class="mt-5 max-w-md text-[0.98rem] leading-[1.75] text-muted">
                            For over 75 years, Education Trust Nasra School has been a beacon of knowledge, character and excellence. Our commitment is to provide quality English-medium education that inspires, empowers and prepares students for a successful future — at a cost families can afford.
                        </p>
                        <a href="<?= base_url('about/history') ?>" class="btn btn-primary mt-8 !rounded-md">
                            Learn More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pillars -->
            <div class="lg:col-span-3" data-animate="fade-left">
                <ul class="flex flex-col gap-5 sm:grid sm:grid-cols-2 sm:gap-6 lg:flex lg:flex-col lg:gap-6">
                    <?php foreach ($legacyPillars as $i => [$icon, $label]): ?>
                        <li class="flex items-center gap-4" style="--d: <?= 0.1 + $i * 0.08 ?>s">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-primary/10 text-primary">
                                <i class="fa-solid <?= $icon ?>"></i>
                            </span>
                            <span class="font-display text-[0.95rem] font-bold leading-snug text-primary"><?= e($label) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ============ THE NASRA DIFFERENCE ============ -->
<section class="difference-section relative overflow-hidden py-20 lg:py-24" aria-labelledby="difference-title">
    <div class="pointer-events-none absolute inset-0 opacity-40" aria-hidden="true">
        <div class="absolute -left-24 top-10 h-72 w-72 rounded-full bg-primary/15 blur-3xl"></div>
        <div class="absolute -right-16 bottom-0 h-80 w-80 rounded-full bg-accent/25 blur-3xl"></div>
    </div>

    <div class="container relative">
        <div class="mx-auto max-w-2xl text-center" data-animate="fade-up">
            <p class="eyebrow justify-center">The Nasra School System</p>
            <h2 id="difference-title" class="section-title mt-4">The Nasra Difference</h2>
            <p class="lead mt-4">What sets Education Trust Nasra School apart values lived every day across our campuses.</p>
        </div>

        <!-- 5 cards: wrap + center so the last row never looks incomplete -->
        <div class="difference-grid mt-12 flex flex-wrap justify-center gap-5 lg:gap-6">
            <?php foreach ($differences as $i => [$icon, $label, $copy]): ?>
                <article class="difference-card group" data-animate="fade-up" data-delay="<?= $i * 80 ?>">
                    <span class="difference-card__icon"><i class="fa-solid <?= $icon ?>"></i></span>
                    <h3 class="mt-5 font-display text-lg font-bold text-primary"><?= e($label) ?></h3>
                    <p class="mt-3 text-sm leading-relaxed text-muted"><?= e($copy) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ VIDEO / EXPERIENCE ============ -->
<?php
$videoCfg    = config('video') ?: [];
$videoLocal  = $videoCfg['local'] ?? 'videos/campus.mp4';
$videoPoster = $videoCfg['poster'] ?? 'home/hero-banner.jpg';
$youtubeId   = $videoCfg['youtube_id'] ?? '';
$hasLocalVideo = is_file(PUBLIC_PATH . '/assets/' . ltrim($videoLocal, '/'));
?>
<section class="video-section relative overflow-hidden py-20 lg:py-28" aria-labelledby="video-title">
    <div class="container relative">
        <div class="mx-auto max-w-2xl text-center" data-animate="fade-up">
            <p class="eyebrow justify-center">Experience Nasra</p>
            <h2 id="video-title" class="section-title mt-4">Life at Nasra School</h2>
            <p class="lead mt-4">A glimpse of our campuses, classrooms and community — where values and ambition grow together.</p>
        </div>

        <div
            class="video-player relative mx-auto mt-12 max-w-5xl overflow-hidden rounded-2xl bg-ink"
            data-video-player
            <?php if ($hasLocalVideo): ?>
                data-video-src="<?= e(asset($videoLocal)) ?>"
            <?php elseif ($youtubeId): ?>
                data-youtube="<?= e($youtubeId) ?>"
            <?php endif; ?>
            data-animate="fade-up"
            data-delay="100"
        >
            <div class="video-player__media aspect-video">
                <?= photo($videoPoster, 'Students and campus life at Nasra School', 'video-player__poster h-full w-full') ?>
                <div class="video-player__scrim" aria-hidden="true"></div>
            </div>

            <button type="button" class="video-player__play" aria-label="Play video">
                <span class="video-player__play-ring" aria-hidden="true"></span>
                <i class="fa-solid fa-play" aria-hidden="true"></i>
            </button>

            <p class="video-player__caption font-script">Rooted in Values, Ready for the Future</p>
        </div>
    </div>
</section>

<!-- ============ ACADEMIC PATHWAYS ============ -->
<section class="academics-section relative overflow-hidden py-20 lg:py-24">
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute left-1/2 top-0 h-px w-40 -translate-x-1/2 bg-gradient-to-r from-transparent via-accent to-transparent"></div>
    </div>

    <div class="container relative">
        <div class="mx-auto max-w-2xl text-center" data-animate="fade-up">
            <p class="eyebrow justify-center">Academics</p>
            <h2 class="section-title mt-4">Learning for Every Stage</h2>
            <p class="lead mx-auto mt-4 max-w-2xl">From pre-primary through higher secondary — balanced learning, character building, and pathways that prepare students for life beyond Nasra.</p>
        </div>

        <div class="mt-14 grid gap-5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-6">
            <?php foreach ($stages as $i => [$num, $label, $icon, $slug, $blurb]): ?>
                <a href="<?= base_url('academics/' . $slug) ?>" class="stage-card group" data-animate="fade-up" data-delay="<?= $i * 100 ?>">
                    <div class="stage-card__media">
                        <?= photo("home/{$slug}.jpg", "{$label} students at Nasra School", 'h-full w-full') ?>
                        <div class="stage-card__veil" aria-hidden="true"></div>
                        <span class="stage-card__num"><?= e($num) ?></span>
                    </div>
                    <div class="stage-card__body">
                        <span class="stage-card__icon"><i class="fa-solid <?= $icon ?>"></i></span>
                        <div class="min-w-0 flex-1">
                            <h3 class="font-display text-base font-bold text-primary"><?= e($label) ?></h3>
                            <p class="mt-1 text-xs leading-relaxed text-muted"><?= e($blurb) ?></p>
                        </div>
                        <span class="stage-card__go" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ MOTTO ============ -->
<section class="motto-section relative overflow-hidden bg-primary text-white" aria-labelledby="motto-title">
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="motto-section__glow"></div>
        <p class="motto-section__watermark">TOLERANCE</p>
    </div>

    <div class="container relative py-20 lg:py-28">
        <div class="grid items-end gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:gap-16 xl:gap-24">
            <div data-animate="fade-up">
                <p class="eyebrow !text-accent">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                    Our Motto
                </p>
                <h2 id="motto-title" class="motto-section__word mt-6">
                    <span class="brush-word brush-word-light">Tolerance</span>
                </h2>
                <p class="mt-6 max-w-xl font-script text-3xl leading-none text-accent md:text-4xl">
                    The hallmark of an enlightened mindset
                </p>
            </div>

            <div data-animate="fade-up" data-delay="120">
                <p class="text-base leading-relaxed text-white/80 md:text-lg">
                    We believe that tolerance, which stands in stark opposition to ignorance, is the hallmark of an educated, elevated and enlightened mindset. It is fair-mindedness beyond discrimination understanding and respect for others’ beliefs, backgrounds, and perspectives without harsh judgment.
                </p>
                <a href="<?= base_url('about/guiding-principles') ?>" class="btn btn-accent mt-10">
                    Mission, Vision &amp; Values <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============ CAMPUS LIFE / TEAM WORK ============ -->
<?php
$campusMosaic = [
    ['campus-1',  'Student batting in a school cricket match'],
    ['campus-2',  'Students at cricket practice'],
    ['hero-2',    'Students in Nasra School uniforms'],
    ['legacy-1',  'Students on a Nasra School campus'],
];
$campusPillars = [
    ['fa-trophy',     'Sportsmanship'],
    ['fa-palette',    'Creative Arts'],
    ['fa-people-group', 'Leadership'],
];
?>
<section class="campus-section relative overflow-hidden py-20 lg:py-28" aria-labelledby="campus-title">
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -left-20 top-1/4 h-72 w-72 rounded-full bg-primary/10 blur-3xl"></div>
        <div class="absolute -right-16 bottom-0 h-80 w-80 rounded-full bg-accent/20 blur-3xl"></div>
    </div>

    <div class="container relative grid items-center gap-10 sm:gap-14 lg:grid-cols-[0.95fr_1.05fr] lg:gap-16 xl:gap-20">
        <!-- Images first on mobile; text left on desktop -->
        <div class="order-1 campus-mosaic-wrap relative mx-auto w-full max-w-lg lg:order-2 lg:max-w-none" data-animate="fade-left">
            <div class="ss-mosaic" aria-label="Life at Nasra School">
                <?php foreach ($campusMosaic as $i => [$img, $alt]): ?>
                    <div class="ss-mosaic__item ss-mosaic__item--<?= $i + 1 ?>">
                        <?= photo("home/{$img}.jpg", $alt, 'h-full w-full') ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="mt-5 text-center font-script text-xl text-primary/60 lg:text-left">Life beyond the classroom</p>
        </div>

        <div class="order-2 lg:order-1" data-animate="fade-right">
            <p class="eyebrow">Campus Life</p>
            <h2 id="campus-title" class="section-title mt-4">Sportsmanship &amp; Community</h2>
            <p class="mt-3 font-script text-2xl text-primary/70 md:text-3xl">Where skill meets character</p>
            <p class="lead mt-5 max-w-md">
                Sportsmanship, strategy and cooperation form the basis of all team work — and along with honed skill lead to victory. From the field to creative arts and leadership programmes, campus life shapes confident Nasrarians.
            </p>

            <ul class="mt-8 flex flex-wrap gap-x-6 gap-y-3" aria-label="Campus life pillars">
                <?php foreach ($campusPillars as [$icon, $label]): ?>
                    <li class="inline-flex items-center gap-2.5 text-sm font-semibold text-primary">
                        <span class="grid h-9 w-9 place-items-center rounded-full bg-primary/10 text-primary">
                            <i class="fa-solid <?= $icon ?>"></i>
                        </span>
                        <?= e($label) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="<?= base_url('campus-life') ?>" class="btn btn-primary mt-10">Explore Campus Life <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
<section class="testimonials overflow-hidden bg-white pb-20 pt-4 lg:pb-24 lg:pt-6" aria-labelledby="testimonials-title" aria-roledescription="carousel" data-animate="fade-up">
    <div class="container">
        <div class="mx-auto max-w-3xl text-center">
            <p class="eyebrow justify-center">Alumni</p>
            <h2 id="testimonials-title" class="section-title mt-4">Voices of Nasra</h2>
        </div>

        <div class="relative mx-auto mt-10 max-w-3xl text-center">
            <i class="fa-solid fa-quote-left mb-5 inline-block text-4xl text-accent md:mb-6 md:text-5xl" aria-hidden="true"></i>

            <div class="t-viewport overflow-hidden" aria-live="polite">
                <div class="t-track flex transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)]">
                    <?php foreach ($testimonials as $i => [$name, $role, $quote]): ?>
                        <figure class="t-slide w-full shrink-0 px-2 md:px-6" role="group" aria-roledescription="slide" aria-label="<?= $i + 1 ?> of <?= count($testimonials) ?>">
                            <blockquote class="font-sans text-xl font-light leading-[1.55] tracking-[-0.01em] text-ink md:text-[1.375rem] lg:text-[1.5rem]">
                                <?= e($quote) ?>
                            </blockquote>
                            <figcaption class="mt-10">
                                <span class="block font-display text-base font-bold tracking-wide text-primary"><?= e($name) ?></span>
                                <span class="mt-1 block text-sm text-muted"><?= e($role) ?></span>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="mt-10 flex items-center justify-center gap-5">
            <button type="button" class="t-prev grid h-11 w-11 place-items-center text-primary transition hover:text-accent" aria-label="Previous testimonial">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <div class="t-dots flex items-center gap-2.5">
                <?php foreach ($testimonials as $i => $_): ?>
                    <button type="button" class="h-2 rounded-full bg-ink/15 transition-all duration-300 <?= $i === 0 ? 'w-7 !bg-accent' : 'w-2' ?>" aria-label="Show testimonial <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <button type="button" class="t-next grid h-11 w-11 place-items-center text-primary transition hover:text-accent" aria-label="Next testimonial">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- ============ FOUNDER ============ -->
<section class="founder-section relative overflow-hidden bg-white" aria-labelledby="legacy-title">
    <div class="founder-section__inner grid items-stretch lg:grid-cols-[minmax(0,38%)_minmax(0,62%)]">
        <div class="founder-section__photo relative min-h-[280px] sm:min-h-[340px]" data-animate="fade-right">
            <?= photo('home/founder.jpg', 'Nasra Wazir Ali (S.I.), founder of Nasra School', 'absolute inset-0 h-full w-full object-[50%_28%] grayscale') ?>
        </div>

        <div class="founder-section__copy grid items-center gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_auto] lg:gap-12 lg:py-20 lg:pl-14 lg:pr-10 xl:pr-16">
            <div data-animate="fade-up">
                <p class="eyebrow">Late Founder of ETNS</p>
                <h2 id="legacy-title" class="section-title mt-4 font-display">Nasra Wazir Ali (S.I.)</h2>
                <p class="mt-2 text-sm font-medium text-muted">Pioneer educationalist · Humanitarian · Sitara-e-Imtiaz · 1922–2015</p>
                <p class="lead mt-6 max-w-xl">
                    In February 1949, from the living room of a bungalow on Bunder Road, Nasra Wazir Ali began teaching neighbourhood children alongside her own daughter. That humble beginning became Education Trust Nasra School — registered the following year as a not-for-profit to serve children of lower-income households.
                </p>
                <a href="<?= base_url('about/history') ?>" class="btn btn-primary mt-8">Full History <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <figure class="max-w-xs border-accent/40 lg:border-l-4 lg:border-l-accent lg:pl-10" data-animate="fade-left" data-delay="150">
                <i class="fa-solid fa-quote-left text-4xl text-accent"></i>
                <blockquote class="mt-4 font-sans text-[1.375rem] font-light italic leading-[1.4] tracking-[-0.01em] text-ink md:text-2xl">
                    Tolerance is the hallmark of an educated, elevated and enlightened mindset.
                </blockquote>
                <figcaption class="mt-5 text-sm text-muted">— Nasra School Motto</figcaption>
            </figure>
        </div>
    </div>

    <!-- Ink wave overlays photo + copy so the image is cut organically — no white gap -->
    <svg class="founder-section__wave text-ink" viewBox="0 0 1440 64" preserveAspectRatio="none" aria-hidden="true">
        <path fill="currentColor" d="M0 64V30c200 26 400-26 620-6 220 20 420 40 620 2 100-18 160-28 200-34V64H0z"/>
    </svg>
</section>

<!-- ============ CTA ============ -->
<section class="relative bg-ink text-white">
    <div class="container flex flex-col items-start gap-6 pb-14 pt-10 md:flex-row md:items-center md:justify-between md:pt-8" data-animate="fade-up">
        <div>
            <h2 class="section-title !text-white">Join the Nasra Family</h2>
            <p class="mt-3 max-w-lg text-white/75">Affordable, high-quality education for underserved communities bridging education and gender gaps since 1949.</p>
            <p class="mt-3 font-script text-3xl text-accent">Rooted in Values, Ready for the Future</p>
        </div>
        <a href="<?= base_url('admissions') ?>" class="btn btn-accent !px-8 !py-4 text-base">View Admissions <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>
