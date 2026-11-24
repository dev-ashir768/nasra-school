<?php
// Full-bleed hero carousel backgrounds
$heroSlides = [
    ['home/hero-banner.jpg', 'Nasra School students on campus'],
    ['home/hero.jpg',        'Nasra School students walking to class'],
    ['home/hero-2.jpg',      'Students in Nasra School uniforms'],
    ['home/campus-1.jpg',    'Student batting in a school cricket match'],
    ['home/legacy-1.jpg',    'A Nasra School campus building'],
];

// Real alumni testimonials from nasraschool.edu.pk/alumni
$testimonials = [
    ['Falak Naz', 'PhD Student, Mass Communications, Karachi University', 'My teachers were my mentors — they taught me how to be an ambassador of peace, light, and knowledge. They worked on me so I could become a symbol of change, a symbol of enlightenment.'],
    ['Mohammad Sameer Kayani', 'Senior Actuarial Consultant · National Position Holder, SSC & HSSC', 'ETNS provided me with a solid foundation which helped me in every phase of my life later on. The hard work that my teachers put into my development was unparalleled.'],
    ['Urooba Adil', 'Fashion Design Student, Asian Institute of Fashion Design', 'Nasra School gave me the confidence and trust that I have in myself today. Our amazing teachers loved their students like their own children, moulding them into better people.'],
    ['M. Hozefa Haider', 'Computer Science Student, Habib University', 'One of the best things that Nasra School instilled in me is selflessness and the realization that respecting others begets respect in turn. I feel immensely proud to represent this institution.'],
    ['Alina Rizwan', 'Journalism Student, SZABIST University', 'A school is expected to provide mere education, but I applaud my alma mater, Nasra School, for aiding me along a journey of becoming a better human being — an education which only ends with life.'],
];

// label, icon, slug — yellow accent bars (not solid green walls)
$stages = [
    ['Pre-Primary',      'fa-child-reaching', 'pre-primary'],
    ['Primary',          'fa-graduation-cap', 'primary'],
    ['Secondary',        'fa-book-open',      'secondary'],
    ['Higher Secondary', 'fa-user-graduate',  'higher-secondary'],
];
?>

<!-- ============ HERO ============ -->
<!-- Height = one viewport minus sticky header (see .hero-banner in app.css) -->
<section class="hero-banner relative flex items-center overflow-hidden bg-ink text-white" data-hero-slider aria-roledescription="carousel" aria-label="Life at Nasra School">
    <div class="absolute inset-0" aria-hidden="true">
        <?php foreach ($heroSlides as $i => [$img, $alt]): ?>
            <div class="hero-slide absolute inset-0 transition-opacity duration-[1400ms] ease-in-out <?= $i === 0 ? 'is-active opacity-100' : 'opacity-0' ?>">
                <?= photo($img, $alt, 'ken-burns h-full w-full', $i === 0) ?>
            </div>
        <?php endforeach; ?>
        <div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/55 to-ink/25"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-ink/70 via-transparent to-ink/30"></div>
    </div>

    <div class="container relative z-10 flex h-full w-full flex-col justify-center py-8 sm:py-10">
        <div class="max-w-2xl xl:max-w-[38rem]">
            <p class="hero-in flex items-center gap-3 text-sm text-white/75" style="--d:.05s">
                <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
                Since 1949 in Karachi
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
                Affordable English-medium education rooted in character, tolerance, and opportunity — shaping Karachi for over seven decades.
            </p>

            <p class="hero-in mt-3 font-script text-xl text-accent sm:text-2xl" style="--d:.4s">
                Rooted in Values, Ready for the Future
            </p>

            <div class="hero-in mt-6 flex flex-wrap gap-3 sm:mt-7" style="--d:.55s">
                <a href="<?= base_url('admissions') ?>" class="btn btn-accent">Explore Admissions <i class="fa-solid fa-arrow-right"></i></a>
                <a href="<?= base_url('about') ?>" class="btn border-2 border-white/70 bg-transparent text-white hover:border-accent hover:bg-accent hover:text-primary-dark">Our Story</a>
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

<!-- ============ ABOUT / LEGACY ============ -->
<section id="about" class="relative overflow-hidden pb-16 pt-20 lg:pt-24">
    <div class="container relative grid items-center gap-14 lg:grid-cols-2">
        <div class="mx-auto w-full max-w-md overflow-hidden rounded-2xl" data-animate="fade-right">
            <?= photo('home/legacy.jpg', 'Nasra School campus building', 'aspect-[4/3] w-full') ?>
        </div>

        <div class="border-l-4 border-accent pl-6 md:pl-8" data-animate="fade-left">
            <p class="eyebrow">About Nasra School</p>
            <h2 class="section-title mt-4">A Legacy of Pride</h2>
            <p class="lead mt-6 max-w-lg">
                Education Trust Nasra School (ETNS) delivers high-quality, English-medium PK–12 education rooted in holistic development and inclusive values, serving over 11,000 students from diverse backgrounds across five purpose-built campuses in Karachi.
            </p>
            <p class="body-text mt-4 max-w-lg">
                Our mission: to provide affordable, high-quality education to the children of underserved communities, bridging the education and gender gaps prevalent in the nation.
            </p>
            <a href="<?= base_url('about') ?>" class="btn btn-primary mt-8">Discover Our Story <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ============ STATS (light — not another green wall) ============ -->
<section class="container" aria-label="Nasra School in numbers">
    <div class="grid grid-cols-2 gap-y-8 rounded-xl border border-muted/15 bg-surface-soft px-6 py-9 text-center md:grid-cols-4 md:divide-x md:divide-muted/15" data-animate="zoom">
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/25 text-lg text-primary"><i class="fa-solid fa-school"></i></span>
            <p class="stat-number mt-4 text-ink"><span data-count="5">5</span></p>
            <p class="mt-2 text-sm text-muted">campuses across Karachi</p>
        </div>
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/25 text-lg text-primary"><i class="fa-solid fa-book-open"></i></span>
            <p class="stat-number mt-4 text-ink">PK–12</p>
            <p class="mt-2 text-sm text-muted">learning journey</p>
        </div>
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/25 text-lg text-primary"><i class="fa-solid fa-calendar-days"></i></span>
            <p class="stat-number mt-4 text-ink"><span data-count="1949" data-plain>1949</span></p>
            <p class="mt-2 text-sm text-muted">year founded</p>
        </div>
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/25 text-lg text-primary"><i class="fa-solid fa-users"></i></span>
            <p class="stat-number mt-4 text-ink"><span data-count="500000">500,000</span>+</p>
            <p class="mt-2 text-sm text-muted">alumni</p>
        </div>
    </div>
</section>

<!-- ============ ACADEMIC PATHWAYS ============ -->
<section class="py-20 lg:py-24">
    <div class="container">
        <div class="text-center" data-animate="fade-up">
            <p class="eyebrow">Our Academic Pathways</p>
            <h2 class="section-title mt-4">Learning for Every Stage</h2>
            <p class="lead mx-auto mt-4 max-w-2xl">Balanced learning, concept-based education, physical development, and character building.</p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($stages as $i => [$label, $icon, $slug]): ?>
                <a href="<?= base_url('academics/' . $slug) ?>" class="group overflow-hidden rounded-2xl border border-muted/20 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-lg"
                   data-animate="fade-up" data-delay="<?= $i * 120 ?>">
                    <div class="overflow-hidden">
                        <?= photo("home/{$slug}.jpg", "{$label} students at Nasra School", 'aspect-[16/10] w-full transition duration-700 group-hover:scale-105') ?>
                    </div>
                    <div class="h-1 w-full bg-accent"></div>
                    <div class="flex items-center gap-3 px-5 py-4">
                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-accent/20 text-primary"><i class="fa-solid <?= $icon ?>"></i></span>
                        <span class="card-title flex-1"><?= e($label) ?></span>
                        <span class="grid h-8 w-8 place-items-center rounded-full bg-ink/5 text-xs text-ink transition group-hover:bg-accent group-hover:text-primary-dark"><i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ MOTTO ============ -->
<section class="container" aria-label="Our motto">
    <div class="rounded-xl border border-muted/15 bg-white px-8 py-10 md:px-12" data-animate="fade-up">
        <h2 class="title-sm text-ink">Our Motto: <span class="relative text-primary after:absolute after:inset-x-0 after:-bottom-1 after:h-1 after:bg-accent">Tolerance</span></h2>
        <p class="mt-4 max-w-xl text-muted">At Nasra School, we respect different beliefs, backgrounds and perspectives.</p>
    </div>
</section>

<!-- ============ CAMPUS LIFE ============ -->
<section class="overflow-hidden bg-surface-soft py-20 lg:py-24">
    <div class="container grid items-center gap-14 lg:grid-cols-[2fr_3fr]">
        <div data-animate="fade-right">
            <p class="eyebrow">Campus Life</p>
            <h2 class="section-title mt-4">A Vibrant Learning Community</h2>
            <p class="lead mt-6 max-w-md">
                From academics to co-curricular activities, Nasra School offers a nurturing environment for holistic development.
            </p>
            <a href="<?= base_url('campus-life') ?>" class="btn btn-primary mt-8">Explore Campus Life <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="grid grid-cols-3 gap-3">
            <?php foreach ([['campus-1', 'Student batting in a school cricket match'], ['campus-2', 'Students at cricket practice'], ['legacy-1', 'Students on a Nasra School campus']] as $i => [$img, $alt]): ?>
                <div class="overflow-hidden rounded-lg" data-animate="fade-up" data-delay="<?= $i * 150 ?>">
                    <?= photo("home/{$img}.jpg", $alt, 'aspect-[3/4] w-full') ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ TESTIMONIALS (light panel — not green wall) ============ -->
<section class="container py-20 lg:py-24" aria-labelledby="testimonials-title">
    <div class="testimonials relative overflow-hidden rounded-3xl border border-muted/15 bg-white px-6 pb-8 pt-10 text-ink shadow-sm md:px-24 md:pb-10" data-animate="fade-up" aria-roledescription="carousel">

        <button type="button" class="t-prev absolute left-5 top-1/2 hidden h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-ink/5 text-ink ring-1 ring-ink/10 transition hover:bg-accent md:grid" aria-label="Previous testimonial">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button type="button" class="t-next absolute right-5 top-1/2 hidden h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-ink/5 text-ink ring-1 ring-ink/10 transition hover:bg-accent md:grid" aria-label="Next testimonial">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <p class="eyebrow">What Our Alumni Say</p>
        <h2 id="testimonials-title" class="section-title mt-4">Trusted by Generations</h2>

        <div class="t-viewport mt-6 overflow-hidden" aria-live="polite">
            <div class="t-track flex transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)]">
                <?php foreach ($testimonials as $i => [$name, $role, $quote]): ?>
                    <?php $initials = implode('', array_map(fn($w) => $w[0], array_slice(array_filter(explode(' ', str_replace('.', '', $name))), 0, 2))); ?>
                    <figure class="t-slide grid w-full shrink-0 items-center gap-6 md:grid-cols-[1fr_auto] md:gap-10" role="group" aria-roledescription="slide" aria-label="<?= $i + 1 ?> of <?= count($testimonials) ?>">
                        <blockquote class="font-sans text-lg font-light italic leading-[1.65] text-ink/80 md:text-xl">“<?= e($quote) ?>”</blockquote>
                        <figcaption class="flex items-center gap-4 border-muted/20 md:w-72 md:border-l md:pl-10">
                            <span class="grid h-16 w-16 shrink-0 place-items-center rounded-full bg-accent font-sans text-xl font-bold text-primary-dark"><?= e($initials) ?></span>
                            <span>
                                <span class="block font-semibold text-ink"><?= e($name) ?></span>
                                <span class="block text-sm text-muted"><?= e($role) ?></span>
                            </span>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-8 flex items-center justify-center gap-4">
            <button type="button" class="t-prev grid h-10 w-10 place-items-center rounded-full bg-ink/5 text-ink md:hidden" aria-label="Previous testimonial"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="t-dots flex items-center gap-2">
                <?php foreach ($testimonials as $i => $_): ?>
                    <button type="button" class="h-2.5 rounded-full bg-ink/15 transition-all duration-300 <?= $i === 0 ? 'w-8 !bg-accent' : 'w-2.5' ?>" aria-label="Show testimonial <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <button type="button" class="t-next grid h-10 w-10 place-items-center rounded-full bg-ink/5 text-ink md:hidden" aria-label="Next testimonial"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<!-- ============ OUR LEGACY SINCE 1949 ============ -->
<section class="overflow-hidden bg-white" aria-labelledby="legacy-title">
    <div class="grid items-stretch lg:grid-cols-[38%_1fr]">
        <div class="relative min-h-[320px]" data-animate="fade-right">
            <div class="absolute inset-0 overflow-hidden rounded-tr-[45%_100%]">
                <?= photo('home/founder.jpg', 'Nasra Wazir Ali (S.I.), founder of Nasra School', 'h-full w-full object-[50%_30%] grayscale') ?>
            </div>
        </div>

        <div class="container grid items-center gap-10 py-14 lg:mx-0 lg:max-w-none lg:grid-cols-[1fr_auto] lg:py-20 lg:pl-14">
            <div data-animate="fade-up">
                <p class="eyebrow">Our Founder</p>
                <h2 id="legacy-title" class="section-title mt-4 font-display">Our Legacy Since 1949</h2>
                <p class="lead mt-6 max-w-xl">
                    In February 1949, Nasra Wazir Ali (S.I.) began teaching neighbourhood children in two rooms of her own home in Karachi. That humble class grew into five campuses and more than 500,000 graduates, nurturing generations with knowledge, character and compassion for over seven decades.
                </p>
                <a href="<?= base_url('about/history') ?>" class="btn btn-primary mt-8">Learn More About Our History <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <figure class="max-w-xs border-accent/40 lg:border-l-4 lg:border-l-accent lg:pl-10" data-animate="fade-left" data-delay="150">
                <i class="fa-solid fa-quote-left text-4xl text-accent"></i>
                <blockquote class="mt-4 font-sans text-[1.375rem] font-light italic leading-[1.4] tracking-[-0.01em] text-ink md:text-2xl">
                    Tolerance is the hallmark of an educated, elevated and enlightened mindset.
                </blockquote>
                <figcaption class="mt-5 text-sm text-muted">— Nasra School Guiding Principles</figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- ============ CTA (single deep brand moment) ============ -->
<section class="relative overflow-hidden bg-ink text-white">
    <svg class="absolute left-0 top-0 h-12 w-full text-white" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
        <path fill="currentColor" d="M0 0h1440v10C1200 40 960 0 720 14S240 44 0 10z"/>
    </svg>
    <div class="container relative flex flex-col items-start gap-6 pb-14 pt-24 md:flex-row md:items-center md:justify-between" data-animate="fade-up">
        <div>
            <h2 class="section-title !text-white">Be Part of the Nasra Story</h2>
            <p class="mt-3 font-script text-3xl text-accent">Rooted in Values, Ready for the Future</p>
        </div>
        <a href="<?= base_url('admissions') ?>" class="btn btn-accent !px-8 !py-4 text-base">View Admissions <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>
