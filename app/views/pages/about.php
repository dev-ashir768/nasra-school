<section class="border-b border-muted/10 bg-surface-soft">
    <div class="container py-14 lg:py-16">
        <p class="eyebrow">About Us</p>
        <h1 class="section-title mt-4">Education Trust Nasra School</h1>
        <p class="lead mt-4 max-w-3xl">
            Established in 1949 by the visionary Nasra Wazir Ali (S.I.), Nasra School believes in education as a fundamental right and necessity — relentlessly working to bridge the education gap for seven decades.
        </p>
    </div>
</section>

<section class="container py-16 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
        <div>
            <h2 class="title-sm">Our Story</h2>
            <p class="body-text mt-4">
                Established in 1949 and registered in 1950 under the Trust Act of 1882, Education Trust Nasra School (ETNS) started from a mere two rooms in Nasra Wazir Ali’s own home. Born in the post-partition era out of the sheer necessity to accommodate the lack of educational facilities in the neighbourhood, ETNS has grown to five large purpose-built campuses.
            </p>
            <p class="body-text mt-4">
                Each campus carries out our late founder’s humanitarian mission: to provide low-cost, high-quality education to the children of underserved communities, in an effort to bridge the education and gender gaps prevalent in Pakistan.
            </p>
            <a href="<?= base_url('about/history') ?>" class="btn btn-primary mt-8">Read Our History <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="space-y-8">
            <div class="border-l-4 border-accent pl-5">
                <h3 class="card-title">Mission</h3>
                <p class="mt-2 text-muted leading-relaxed">
                    To provide affordable, high-quality education to the children of underserved communities, bridging the education and gender gaps prevalent in the nation.
                </p>
            </div>
            <div class="border-l-4 border-accent pl-5">
                <h3 class="card-title">Vision</h3>
                <p class="mt-2 text-muted leading-relaxed">
                    By effectuating a high-quality and low-cost educational system, we desire to attain an enlightened and empowered Pakistan.
                </p>
            </div>
            <div class="border-l-4 border-accent pl-5">
                <h3 class="card-title">Motto</h3>
                <p class="mt-2 text-muted leading-relaxed">
                    Tolerance — the hallmark of an educated, elevated and enlightened mindset.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-surface-soft py-16 lg:py-20">
    <div class="container">
        <h2 class="section-title text-center">Our Values</h2>
        <p class="lead mx-auto mt-4 max-w-2xl text-center">Principles that guide teaching and life across every Nasra campus.</p>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $values = [
                ['Diligence', 'Hard work and perseverance lead to success at Nasra.'],
                ['Fairness', 'Honesty and total transparency in our thoughts, words & actions. Student recognitions are solely merit-based.'],
                ['Ambition', 'Thirst for knowledge and drive for progress create aspiring students and even better citizens of the nation.'],
                ['Diversity & Individuality', 'We comprise a multilingual, multiethnic and religiously diverse group of uniquely talented individuals.'],
                ['Respect', 'Utmost respect for ourselves, our peers, our school including its facilities, as well as for the culture, tradition and history which have helped us become who we are today.'],
            ];
            foreach ($values as $i => [$title, $text]):
            ?>
                <article class="border border-muted/15 bg-white p-6" data-animate="fade-up" data-delay="<?= $i * 60 ?>">
                    <h3 class="card-title"><?= e($title) ?></h3>
                    <p class="mt-3 text-sm leading-relaxed text-muted"><?= e($text) ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 text-center">
            <a href="<?= base_url('about/guiding-principles') ?>" class="btn btn-outline">Guiding Principles <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
