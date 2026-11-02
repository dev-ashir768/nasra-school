<?php
// icon, label, chip colours (each value gets its own palette accent)
$values = [
    ['fa-handshake',     'Tolerance',     'bg-primary/10 text-primary'],
    ['fa-users',         'Teamwork',      'bg-gradient-cyan/10 text-gradient-cyan'],
    ['fa-star',          'Individuality', 'bg-gradient-purple/10 text-gradient-purple'],
    ['fa-shield-halved', 'Confidence',    'bg-accent-navy/10 text-accent-navy'],
];

// Real alumni testimonials from nasraschool.edu.pk/alumni
$testimonials = [
    ['Falak Naz', 'PhD Student, Mass Communications, Karachi University', 'My teachers were my mentors — they taught me how to be an ambassador of peace, light, and knowledge. They worked on me so I could become a symbol of change, a symbol of enlightenment.'],
    ['Mohammad Sameer Kayani', 'Senior Actuarial Consultant · National Position Holder, SSC & HSSC', 'ETNS provided me with a solid foundation which helped me in every phase of my life later on. The hard work that my teachers put into my development was unparalleled.'],
    ['Urooba Adil', 'Fashion Design Student, Asian Institute of Fashion Design', 'Nasra School gave me the confidence and trust that I have in myself today. Our amazing teachers loved their students like their own children, moulding them into better people.'],
    ['M. Hozefa Haider', 'Computer Science Student, Habib University', 'One of the best things that Nasra School instilled in me is selflessness and the realization that respecting others begets respect in turn. I feel immensely proud to represent this institution.'],
    ['Alina Rizwan', 'Journalism Student, SZABIST University', 'A school is expected to provide mere education, but I applaud my alma mater, Nasra School, for aiding me along a journey of becoming a better human being — an education which only ends with life.'],
];

// label, icon, slug, [accent bar, icon chip, arrow on hover] - one palette accent per stage
$stages = [
    ['Pre-Primary',      'fa-child-reaching', 'pre-primary',      ['bg-gradient-lime',   'bg-gradient-lime/25 text-gradient-leaf',    'group-hover:bg-gradient-lime group-hover:text-primary-dark']],
    ['Primary',          'fa-graduation-cap', 'primary',          ['bg-gradient-cyan',   'bg-gradient-cyan/10 text-gradient-cyan',    'group-hover:bg-gradient-cyan group-hover:text-white']],
    ['Secondary',        'fa-book-open',      'secondary',        ['bg-primary',         'bg-primary/10 text-primary',                'group-hover:bg-primary group-hover:text-white']],
    ['Higher Secondary', 'fa-user-graduate',  'higher-secondary', ['bg-gradient-purple', 'bg-gradient-purple/10 text-gradient-purple', 'group-hover:bg-gradient-purple group-hover:text-white']],
];
?>

<!-- ============ HERO ============ -->
<section class="relative overflow-hidden bg-gradient-to-br from-gradient-lime/20 via-white to-gradient-lime/10">
    <!-- Photo with curved left edge (desktop) -->
    <div class="hero-photo absolute inset-y-0 right-0 hidden w-[52%] lg:block xl:w-[62%]">
        <div class="hero-curve absolute inset-y-0 -left-4 right-4 bg-gradient-to-b from-gradient-lime/70 to-primary/50"></div>
        <div class="hero-curve absolute inset-0 overflow-hidden">
            <?= photo('home/hero.png', 'Nasra School students walking on campus', 'ken-burns h-full w-full', true) ?>
        </div>
        <span class="absolute bottom-16 right-10 -rotate-6 font-script text-4xl text-white drop-shadow-lg">Since 1949</span>
    </div>

    <div class="container relative pb-28 pt-14 lg:pb-36 lg:pt-20">
        <div class="max-w-xl xl:max-w-[40rem]">
            <span class="hero-in inline-block rounded-full bg-gradient-lime/30 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-primary-dark" style="--d:.1s">
                Education Trust Nasra School &bull; Est. 1949
            </span>
            <h1 class="hero-in display mt-6" style="--d:.25s">
                Quality Education for Every Child
            </h1>
            <p class="hero-in lead mt-6 max-w-md" style="--d:.4s">
                Empowering young minds through affordable, high-quality English-medium education, character building, and tolerance.
            </p>
            <div class="hero-in mt-8 flex flex-wrap gap-4" style="--d:.55s">
                <a href="<?= base_url('about') ?>" class="btn btn-primary">Explore Our School <i class="fa-solid fa-arrow-right"></i></a>
                <a href="<?= base_url('admissions') ?>" class="btn btn-outline">Admissions Information</a>
            </div>
        </div>

        <!-- Photo (mobile / tablet) -->
        <div class="hero-in relative mt-10 overflow-hidden rounded-3xl lg:hidden" style="--d:.7s">
            <?= photo('home/hero.png', 'Nasra School students walking on campus', 'aspect-[4/3] w-full', true) ?>
            <span class="absolute bottom-4 right-5 -rotate-6 font-script text-3xl text-white drop-shadow-lg">Since 1949</span>
        </div>
    </div>
</section>

<!-- ============ VALUES STRIP ============ -->
<section class="container relative z-10 -mt-14" aria-label="Our values">
    <div class="hero-in grid grid-cols-2 gap-x-3 gap-y-5 rounded-2xl border border-primary/10 bg-white px-5 py-6 shadow-xl shadow-primary/10 sm:px-8 lg:grid-cols-4 lg:gap-x-0 lg:divide-x lg:divide-primary/10 lg:px-4" style="--d:.8s">
        <?php foreach ($values as $i => [$icon, $label, $chip]): ?>
            <div class="group flex min-w-0 flex-col items-center gap-2 text-center sm:flex-row sm:justify-center sm:gap-3 sm:text-left lg:gap-4">
                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl text-base transition duration-300 group-hover:-translate-y-0.5 lg:h-12 lg:w-12 lg:text-xl <?= $chip ?>">
                    <i class="fa-solid <?= $icon ?>"></i>
                </span>
                <span class="card-title !text-[0.9375rem] sm:!text-[1.0625rem] xl:!text-[1.125rem]"><?= e($label) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============ ABOUT / LEGACY ============ -->
<section class="relative overflow-hidden pb-16 pt-20 lg:pt-24">
    <div class="container relative grid items-center gap-14 lg:grid-cols-2">
        <!-- Photo with offset frame -->
        <div class="relative mx-auto w-full max-w-md pl-5 pt-5" data-animate="fade-right">
            <div class="absolute left-0 top-0 h-[85%] w-[85%] rounded-3xl bg-gradient-to-br from-gradient-lime/50 to-gradient-cyan/30"></div>
            <div class="relative overflow-hidden rounded-3xl shadow-2xl shadow-primary-dark/20">
                <?= photo('home/legacy.jpg', 'Nasra School campus building', 'aspect-[4/3] w-full transition duration-700 hover:scale-105') ?>
            </div>
            <div class="absolute -bottom-5 right-6 rounded-2xl bg-white px-5 py-3 shadow-xl">
                <p class="stat-number !text-[1.5rem] text-primary">11,000+</p>
                <p class="text-xs font-medium uppercase tracking-wide text-complement-gray">Students today</p>
            </div>
        </div>

        <div data-animate="fade-left">
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

<!-- ============ STATS ============ -->
<section class="container" aria-label="Nasra School in numbers">
    <div class="relative grid grid-cols-2 gap-y-8 overflow-hidden rounded-2xl bg-gradient-to-r from-primary to-gradient-green px-6 py-9 text-center text-white shadow-xl shadow-primary/20 md:grid-cols-4 md:divide-x md:divide-white/20" data-animate="zoom">
        <div class="relative">
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-white/10 text-lg text-gradient-lime"><i class="fa-solid fa-school"></i></span>
            <p class="stat-number mt-4"><span data-count="5">5</span></p>
            <p class="mt-2 text-sm text-white/80">campuses across Karachi</p>
        </div>
        <div class="relative">
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-white/10 text-lg text-gradient-lime"><i class="fa-solid fa-book-open"></i></span>
            <p class="stat-number mt-4">PK–12</p>
            <p class="mt-2 text-sm text-white/80">learning journey</p>
        </div>
        <div class="relative">
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-white/10 text-lg text-gradient-lime"><i class="fa-solid fa-calendar-days"></i></span>
            <p class="stat-number mt-4"><span data-count="1949" data-plain>1949</span></p>
            <p class="mt-2 text-sm text-white/80">year founded</p>
        </div>
        <div class="relative">
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-white/10 text-lg text-gradient-lime"><i class="fa-solid fa-users"></i></span>
            <p class="stat-number mt-4"><span data-count="500000">500,000</span>+</p>
            <p class="mt-2 text-sm text-white/80">alumni</p>
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
            <?php foreach ($stages as $i => [$label, $icon, $slug, [$bar, $chip, $hover]]): ?>
                <a href="<?= base_url('academics/' . $slug) ?>" class="group overflow-hidden rounded-2xl border border-complement-gray/15 bg-white shadow-sm transition duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-complement-navy/10"
                   data-animate="fade-up" data-delay="<?= $i * 120 ?>">
                    <div class="overflow-hidden">
                        <?= photo("home/{$slug}.jpg", "{$label} students at Nasra School", 'aspect-[16/10] w-full transition duration-700 group-hover:scale-105') ?>
                    </div>
                    <div class="h-1 w-full <?= $bar ?>"></div>
                    <div class="flex items-center gap-3 px-5 py-4">
                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl <?= $chip ?>"><i class="fa-solid <?= $icon ?>"></i></span>
                        <span class="card-title flex-1"><?= e($label) ?></span>
                        <span class="grid h-8 w-8 place-items-center rounded-full bg-complement-gray/10 text-xs text-complement-slate transition <?= $hover ?>"><i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ MOTTO ============ -->
<section class="container" aria-label="Our motto">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-gradient-plum via-gradient-purple to-gradient-purple px-8 py-10 text-white shadow-xl shadow-gradient-purple/20 md:px-12" data-animate="fade-up">
        <div class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="title-sm md:!text-[2.25rem]">Our Motto: <span class="text-gradient-lime">Tolerance</span></h2>
                <p class="mt-2 max-w-xl text-white/80">At Nasra School, we respect different beliefs, backgrounds and perspectives.</p>
            </div>
            <div class="flex items-center gap-5">
                <span class="-rotate-3 font-script text-3xl text-gradient-lime">Together in Harmony</span>
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="" width="80" height="80" loading="lazy" class="hidden h-20 w-20 rounded-full ring-4 ring-white/15 md:block">
            </div>
        </div>
    </div>
</section>

<!-- ============ CAMPUS LIFE ============ -->
<section class="overflow-hidden py-20 lg:py-24">
    <div class="container grid items-center gap-14 lg:grid-cols-[2fr_3fr]">
        <div data-animate="fade-right">
            <p class="eyebrow">Campus Life</p>
            <h2 class="section-title mt-4">A Vibrant Learning Community</h2>
            <p class="lead mt-6 max-w-md">
                From academics to co-curricular activities, Nasra School offers a nurturing environment for holistic development.
            </p>
            <a href="<?= base_url('campus-life') ?>" class="btn btn-primary mt-8">Explore Campus Life <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="grid grid-cols-3 gap-3 sm:gap-5">
            <?php foreach ([['campus-1', 'Student batting in a school cricket match', '-rotate-3'], ['campus-2', 'Students at cricket practice', 'rotate-2 translate-y-4'], ['campus-3', 'Student playing the violin', '-rotate-2']] as $i => [$img, $alt, $tilt]): ?>
                <div data-animate="fade-up" data-delay="<?= $i * 150 ?>">
                    <div class="<?= $tilt ?> bg-white p-2 shadow-xl transition duration-500 hover:z-10 hover:rotate-0 hover:scale-105">
                        <?= photo("home/{$img}.jpg", $alt, 'aspect-[3/4] w-full') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
<section class="container pb-20 lg:pb-24" aria-labelledby="testimonials-title">
    <div class="testimonials relative overflow-hidden rounded-3xl bg-gradient-to-br from-complement-navy via-complement-navy to-accent-navy px-6 pb-8 pt-10 text-white shadow-2xl shadow-complement-navy/30 md:px-24 md:pb-10" data-animate="fade-up" aria-roledescription="carousel">

        <!-- Side arrows (tablet / desktop) -->
        <button type="button" class="t-prev absolute left-5 top-1/2 hidden h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-white/10 text-white ring-1 ring-white/15 transition hover:bg-gradient-lime hover:text-primary-dark md:grid" aria-label="Previous testimonial">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button type="button" class="t-next absolute right-5 top-1/2 hidden h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-white/10 text-white ring-1 ring-white/15 transition hover:bg-gradient-lime hover:text-primary-dark md:grid" aria-label="Next testimonial">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <p class="eyebrow !text-gradient-lime">What Our Alumni Say</p>
        <h2 id="testimonials-title" class="section-title mt-4 !text-white">Trusted by Generations</h2>

        <div class="t-viewport mt-6 overflow-hidden" aria-live="polite">
            <div class="t-track flex transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)]">
                <?php foreach ($testimonials as $i => [$name, $role, $quote]): ?>
                    <?php $initials = implode('', array_map(fn($w) => $w[0], array_slice(array_filter(explode(' ', str_replace('.', '', $name))), 0, 2))); ?>
                    <figure class="t-slide grid w-full shrink-0 items-center gap-6 md:grid-cols-[1fr_auto] md:gap-10" role="group" aria-roledescription="slide" aria-label="<?= $i + 1 ?> of <?= count($testimonials) ?>">
                        <blockquote class="font-serif text-lg italic leading-[1.65] text-white/90 md:text-xl">“<?= e($quote) ?>”</blockquote>
                        <figcaption class="flex items-center gap-4 border-white/15 md:w-72 md:border-l md:pl-10">
                            <span class="grid h-16 w-16 shrink-0 place-items-center rounded-full bg-gradient-to-br from-gradient-cyan to-primary font-serif text-xl font-bold text-white ring-4 ring-white/10"><?= e($initials) ?></span>
                            <span>
                                <span class="block font-semibold text-white"><?= e($name) ?></span>
                                <span class="block text-sm text-white/60"><?= e($role) ?></span>
                            </span>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Dots (+ arrows on mobile) -->
        <div class="mt-8 flex items-center justify-center gap-4">
            <button type="button" class="t-prev grid h-10 w-10 place-items-center rounded-full bg-white/10 text-white md:hidden" aria-label="Previous testimonial"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="t-dots flex items-center gap-2">
                <?php foreach ($testimonials as $i => $_): ?>
                    <button type="button" class="h-2.5 rounded-full bg-white/25 transition-all duration-300 <?= $i === 0 ? 'w-8 !bg-gradient-lime' : 'w-2.5' ?>" aria-label="Show testimonial <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <button type="button" class="t-next grid h-10 w-10 place-items-center rounded-full bg-white/10 text-white md:hidden" aria-label="Next testimonial"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<!-- ============ OUR LEGACY SINCE 1949 ============ -->
<section class="overflow-hidden bg-gradient-lime/15" aria-labelledby="legacy-title">
    <div class="grid items-stretch lg:grid-cols-[38%_1fr]">
        <!-- Founder photo, curved right edge (bleeds to the left edge of the screen) -->
        <div class="relative min-h-[320px]" data-animate="fade-right">
            <div class="absolute inset-0 rounded-tr-[45%_100%] bg-gradient-to-b from-gradient-lime/70 to-primary/50 lg:-right-4"></div>
            <div class="absolute inset-0 overflow-hidden rounded-tr-[45%_100%]">
                <?= photo('home/founder.jpg', 'Nasra Wazir Ali (S.I.), founder of Nasra School', 'h-full w-full object-[50%_30%] grayscale') ?>
            </div>
        </div>

        <div class="container grid items-center gap-10 py-14 lg:mx-0 lg:max-w-none lg:grid-cols-[1fr_auto] lg:py-20 lg:pl-14">
            <div data-animate="fade-up">
                <p class="eyebrow">Our Founder</p>
                <h2 id="legacy-title" class="section-title mt-4">Our Legacy Since 1949</h2>
                <p class="lead mt-6 max-w-xl">
                    In February 1949, Nasra Wazir Ali (S.I.) began teaching neighbourhood children in two rooms of her own home in Karachi. That humble class grew into five campuses and more than 500,000 graduates, nurturing generations with knowledge, character and compassion for over seven decades.
                </p>
                <a href="<?= base_url('about/history') ?>" class="btn btn-primary mt-8">Learn More About Our History <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <figure class="max-w-xs border-primary/20 lg:border-l lg:pl-10" data-animate="fade-left" data-delay="150">
                <i class="fa-solid fa-quote-left text-4xl text-primary"></i>
                <blockquote class="mt-4 font-serif text-[1.375rem] italic leading-[1.4] tracking-[-0.01em] text-primary-dark md:text-2xl">
                    Tolerance is the hallmark of an educated, elevated and enlightened mindset.
                </blockquote>
                <figcaption class="mt-5 text-sm text-complement-slate">— Nasra School Guiding Principles</figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="relative overflow-hidden bg-gradient-to-r from-primary-dark via-primary to-gradient-leaf text-white">
    <!-- Wave in the founder section's colour (white + lime/15 = same tint), so the two flow together -->
    <svg class="absolute left-0 top-0 h-12 w-full" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
        <path class="fill-white" d="M0 0h1440v10C1200 40 960 0 720 14S240 44 0 10z"/>
        <path class="fill-gradient-lime/15" d="M0 0h1440v10C1200 40 960 0 720 14S240 44 0 10z"/>
    </svg>

    <div class="container relative flex flex-col items-start gap-6 pb-14 pt-24 md:flex-row md:items-center md:justify-between" data-animate="fade-up">
        <div>
            <h2 class="section-title !text-white">Be Part of the <span class="text-gradient-lime">Nasra Story</span></h2>
            <p class="lead mt-3 !text-white/85">Join our legacy of quality education and tolerance.</p>
        </div>
        <a href="<?= base_url('admissions') ?>" class="btn btn-white !px-8 !py-4 text-base">View Admissions <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>
