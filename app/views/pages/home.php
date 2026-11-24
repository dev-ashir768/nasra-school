<?php
// Real alumni testimonials from nasraschool.edu.pk/alumni
$testimonials = [
    ['Falak Naz', 'PhD Student, Mass Communications, Karachi University', 'My teachers were my mentors — they taught me how to be an ambassador of peace, light, and knowledge. They worked on me so I could become a symbol of change, a symbol of enlightenment.'],
    ['Mohammad Sameer Kayani', 'Senior Actuarial Consultant · National Position Holder, SSC & HSSC', 'ETNS provided me with a solid foundation which helped me in every phase of my life later on. The hard work that my teachers put into my development was unparalleled.'],
    ['Urooba Adil', 'Fashion Design Student, Asian Institute of Fashion Design', 'Nasra School gave me the confidence and trust that I have in myself today. Our amazing teachers loved their students like their own children, moulding them into better people.'],
    ['M. Hozefa Haider', 'Computer Science Student, Habib University', 'One of the best things that Nasra School instilled in me is selflessness and the realization that respecting others begets respect in turn. I feel immensely proud to represent this institution.'],
    ['Alina Rizwan', 'Journalism Student, SZABIST University', 'A school is expected to provide mere education, but I applaud my alma mater, Nasra School, for aiding me along a journey of becoming a better human being — an education which only ends with life.'],
];

// label, icon, slug, [accent bar, icon chip, arrow on hover]
$stages = [
    ['Pre-Primary',      'fa-child-reaching', 'pre-primary',      ['bg-primary', 'bg-primary/10 text-primary', 'group-hover:bg-primary group-hover:text-white']],
    ['Primary',          'fa-graduation-cap', 'primary',          ['bg-primary', 'bg-primary/10 text-primary', 'group-hover:bg-primary group-hover:text-white']],
    ['Secondary',        'fa-book-open',      'secondary',        ['bg-primary', 'bg-primary/10 text-primary', 'group-hover:bg-primary group-hover:text-white']],
    ['Higher Secondary', 'fa-user-graduate',  'higher-secondary', ['bg-primary', 'bg-primary/10 text-primary', 'group-hover:bg-primary group-hover:text-white']],
];
?>

<!-- ============ HERO ============ -->
<section class="relative overflow-hidden bg-surface">
    <!-- Photo: soft left fade (desktop) -->
    <div class="pointer-events-none absolute inset-y-0 right-0 hidden w-[48%] lg:block xl:w-[52%]">
        <?= photo('home/hero-2.jpg', 'Nasra School student', 'h-full w-full object-cover object-[center_20%]', true) ?>
        <div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/80 to-transparent"></div>
    </div>

    <div class="container relative pb-16 pt-12 lg:min-h-[78vh] lg:pb-24 lg:pt-20">
        <div class="max-w-xl xl:max-w-[36rem]">
            <h1 class="font-display text-[2.35rem] font-black uppercase leading-[1.02] tracking-tight sm:text-[3rem] xl:text-[3.6rem]">
                <span class="hero-in block text-primary" style="--d:.1s">Real Education</span>
                <span class="hero-in block text-ink" style="--d:.22s">Begins With</span>
                <span class="hero-in relative mt-1 inline-block text-ink" style="--d:.34s">
                    <span class="absolute -top-3 left-0 flex gap-1" aria-hidden="true">
                        <span class="h-3 w-0.5 rotate-[-25deg] bg-accent"></span>
                        <span class="h-4 w-0.5 bg-accent"></span>
                        <span class="h-3 w-0.5 rotate-[25deg] bg-accent"></span>
                    </span>
                    A Child's
                </span>
                <span class="hero-in mt-1 block" style="--d:.46s">
                    <span class="brush-word text-ink">Thinking</span>
                </span>
            </h1>
            <p class="hero-in lead mt-6 max-w-md" style="--d:.58s">
                Affordable, high-quality English-medium education rooted in character, tolerance, and opportunity — since 1949.
            </p>
            <div class="hero-in mt-8 flex flex-wrap gap-4" style="--d:.7s">
                <a href="<?= base_url('admissions') ?>" class="btn btn-primary">Explore Admissions <i class="fa-solid fa-arrow-right"></i></a>
                <a href="<?= base_url('about') ?>" class="btn btn-outline">Our Story</a>
            </div>
        </div>

        <!-- Mobile photo -->
        <div class="hero-in relative mt-10 aspect-[4/3] overflow-hidden lg:hidden" style="--d:.8s">
            <?= photo('home/hero-2.jpg', 'Nasra School student', 'h-full w-full object-cover', true) ?>
            <div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent"></div>
        </div>
    </div>
</section>

<!-- ============ ABOUT / LEGACY ============ -->
<section class="relative overflow-hidden pb-16 pt-20 lg:pt-24">
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

<!-- ============ STATS ============ -->
<section class="container" aria-label="Nasra School in numbers">
    <div class="grid grid-cols-2 gap-y-8 rounded-xl bg-primary px-6 py-9 text-center text-white md:grid-cols-4 md:divide-x md:divide-white/15" data-animate="zoom">
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/20 text-lg text-accent"><i class="fa-solid fa-school"></i></span>
            <p class="stat-number mt-4"><span data-count="5">5</span></p>
            <p class="mt-2 text-sm text-white/80">campuses across Karachi</p>
        </div>
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/20 text-lg text-accent"><i class="fa-solid fa-book-open"></i></span>
            <p class="stat-number mt-4">PK–12</p>
            <p class="mt-2 text-sm text-white/80">learning journey</p>
        </div>
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/20 text-lg text-accent"><i class="fa-solid fa-calendar-days"></i></span>
            <p class="stat-number mt-4"><span data-count="1949" data-plain>1949</span></p>
            <p class="mt-2 text-sm text-white/80">year founded</p>
        </div>
        <div>
            <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-accent/20 text-lg text-accent"><i class="fa-solid fa-users"></i></span>
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
                <a href="<?= base_url('academics/' . $slug) ?>" class="group overflow-hidden rounded-2xl border border-muted/20 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
                   data-animate="fade-up" data-delay="<?= $i * 120 ?>">
                    <div class="overflow-hidden">
                        <?= photo("home/{$slug}.jpg", "{$label} students at Nasra School", 'aspect-[16/10] w-full transition duration-700 group-hover:scale-105') ?>
                    </div>
                    <div class="h-1 w-full <?= $bar ?>"></div>
                    <div class="flex items-center gap-3 px-5 py-4">
                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl <?= $chip ?>"><i class="fa-solid <?= $icon ?>"></i></span>
                        <span class="card-title flex-1"><?= e($label) ?></span>
                        <span class="grid h-8 w-8 place-items-center rounded-full bg-primary/10 text-xs text-primary transition <?= $hover ?>"><i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ MOTTO ============ -->
<section class="container" aria-label="Our motto">
    <div class="rounded-xl border border-primary/10 bg-surface-soft px-8 py-10 md:px-12" data-animate="fade-up">
        <h2 class="title-sm">Our Motto: <span class="relative text-primary after:absolute after:inset-x-0 after:-bottom-1 after:h-1 after:bg-accent">Tolerance</span></h2>
        <p class="mt-4 max-w-xl text-muted">At Nasra School, we respect different beliefs, backgrounds and perspectives.</p>
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

        <div class="grid grid-cols-3 gap-3">
            <?php foreach ([['campus-1', 'Student batting in a school cricket match'], ['campus-2', 'Students at cricket practice'], ['campus-3', 'Student playing the violin']] as $i => [$img, $alt]): ?>
                <div class="overflow-hidden" data-animate="fade-up" data-delay="<?= $i * 150 ?>">
                    <?= photo("home/{$img}.jpg", $alt, 'aspect-[3/4] w-full') ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
<section class="container pb-20 lg:pb-24" aria-labelledby="testimonials-title">
    <div class="testimonials relative overflow-hidden rounded-3xl bg-primary px-6 pb-8 pt-10 text-white md:px-24 md:pb-10" data-animate="fade-up" aria-roledescription="carousel">

        <!-- Side arrows (tablet / desktop) -->
        <button type="button" class="t-prev absolute left-5 top-1/2 hidden h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-white/10 text-white ring-1 ring-white/15 transition hover:bg-accent hover:text-primary-dark md:grid" aria-label="Previous testimonial">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button type="button" class="t-next absolute right-5 top-1/2 hidden h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-white/10 text-white ring-1 ring-white/15 transition hover:bg-accent hover:text-primary-dark md:grid" aria-label="Next testimonial">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <p class="eyebrow !text-accent">What Our Alumni Say</p>
        <h2 id="testimonials-title" class="section-title mt-4 !text-white">Trusted by Generations</h2>

        <div class="t-viewport mt-6 overflow-hidden" aria-live="polite">
            <div class="t-track flex transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)]">
                <?php foreach ($testimonials as $i => [$name, $role, $quote]): ?>
                    <?php $initials = implode('', array_map(fn($w) => $w[0], array_slice(array_filter(explode(' ', str_replace('.', '', $name))), 0, 2))); ?>
                    <figure class="t-slide grid w-full shrink-0 items-center gap-6 md:grid-cols-[1fr_auto] md:gap-10" role="group" aria-roledescription="slide" aria-label="<?= $i + 1 ?> of <?= count($testimonials) ?>">
                        <blockquote class="font-sans text-lg font-light italic leading-[1.65] text-white/90 md:text-xl">“<?= e($quote) ?>”</blockquote>
                        <figcaption class="flex items-center gap-4 border-white/15 md:w-72 md:border-l md:pl-10">
                            <span class="grid h-16 w-16 shrink-0 place-items-center rounded-full bg-accent font-sans text-xl font-bold text-primary-dark ring-4 ring-white/10"><?= e($initials) ?></span>
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
                    <button type="button" class="h-2.5 rounded-full bg-white/25 transition-all duration-300 <?= $i === 0 ? 'w-8 !bg-accent' : 'w-2.5' ?>" aria-label="Show testimonial <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <button type="button" class="t-next grid h-10 w-10 place-items-center rounded-full bg-white/10 text-white md:hidden" aria-label="Next testimonial"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<!-- ============ OUR LEGACY SINCE 1949 ============ -->
<section class="overflow-hidden bg-surface" aria-labelledby="legacy-title">
    <div class="grid items-stretch lg:grid-cols-[38%_1fr]">
        <!-- Founder photo, curved right edge (bleeds to the left edge of the screen) -->
        <div class="relative min-h-[320px]" data-animate="fade-right">
            <div class="absolute inset-0 rounded-tr-[45%_100%] bg-primary/40 lg:-right-4"></div>
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

            <figure class="max-w-xs border-primary/20 lg:border-l lg:pl-10" data-animate="fade-left" data-delay="150">
                <i class="fa-solid fa-quote-left text-4xl text-primary"></i>
                <blockquote class="mt-4 font-sans text-[1.375rem] font-light italic leading-[1.4] tracking-[-0.01em] text-primary-dark md:text-2xl">
                    Tolerance is the hallmark of an educated, elevated and enlightened mindset.
                </blockquote>
                <figcaption class="mt-5 text-sm text-muted">— Nasra School Guiding Principles</figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="relative overflow-hidden bg-primary text-white">
    <svg class="absolute left-0 top-0 h-12 w-full text-surface" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
        <path fill="currentColor" d="M0 0h1440v10C1200 40 960 0 720 14S240 44 0 10z"/>
    </svg>
    <div class="container relative flex flex-col items-start gap-6 pb-14 pt-24 md:flex-row md:items-center md:justify-between" data-animate="fade-up">
        <div>
            <h2 class="section-title !text-white">Be Part of the Nasra Story</h2>
            <p class="mt-3 font-script text-3xl text-accent">Rooted in Values, Ready for the Future</p>
        </div>
        <a href="<?= base_url('admissions') ?>" class="btn btn-white !px-8 !py-4 text-base">View Admissions <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>
