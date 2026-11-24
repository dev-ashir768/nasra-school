<footer class="relative bg-primary text-white/75">
    <!-- Wave from page into footer -->
    <svg class="absolute left-0 top-0 h-10 w-full -translate-y-[99%] text-primary" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
        <path fill="currentColor" d="M0,48 C360,0 1080,0 1440,48 L1440,48 L0,48 Z"/>
    </svg>

    <div class="container grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-4">
        <div>
            <a href="<?= base_url() ?>" class="flex items-center gap-3">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="" width="48" height="48" loading="lazy" class="h-12 w-12">
                <span class="font-display text-lg font-extrabold text-white">Nasra School</span>
            </a>
            <p class="mt-4 text-sm leading-relaxed">
                Education Trust Nasra School (ETNS) is a not-for-profit organization established in 1949 under the Trust Act of 1882.
            </p>
            <p class="mt-5 font-script text-2xl text-accent">Rooted in Values, Ready for the Future</p>
        </div>

        <div>
            <h3 class="font-display text-base font-bold text-white">Quick Links</h3>
            <ul class="mt-4 space-y-2 text-sm">
                <li><a href="<?= base_url('about') ?>" class="hover:text-accent">About Us</a></li>
                <li><a href="<?= base_url('academics') ?>" class="hover:text-accent">Academics</a></li>
                <li><a href="<?= base_url('admissions') ?>" class="hover:text-accent">Admissions</a></li>
                <li><a href="<?= base_url('campus-life') ?>" class="hover:text-accent">Campus Life</a></li>
                <li><a href="<?= base_url('alumni') ?>" class="hover:text-accent">Alumni</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-display text-base font-bold text-white">Head Office</h3>
            <p class="mt-4 flex gap-3 text-sm leading-relaxed">
                <i class="fa-solid fa-location-dot mt-1 text-accent"></i>
                13, Modern Cooperative Housing Society, Block 7/8, Tipu Sultan Road, Karachi
            </p>
        </div>

        <div>
            <h3 class="font-display text-base font-bold text-white">Contact Us</h3>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="tel:+922132361313" class="flex items-center gap-3 hover:text-accent"><i class="fa-solid fa-phone text-accent"></i> (92-21) 32361313-18</a></li>
                <li><a href="mailto:info@nasraschool.edu.pk" class="flex items-center gap-3 hover:text-accent"><i class="fa-solid fa-envelope text-accent"></i> info@nasraschool.edu.pk</a></li>
            </ul>
            <div class="mt-5 flex gap-3">
                <a href="<?= e(config('social.facebook')) ?>" target="_blank" rel="noopener" aria-label="Facebook" class="grid h-9 w-9 place-items-center rounded-full bg-white/10 hover:bg-accent hover:text-primary"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="<?= e(config('social.instagram')) ?>" target="_blank" rel="noopener" aria-label="Instagram" class="grid h-9 w-9 place-items-center rounded-full bg-white/10 hover:bg-accent hover:text-primary"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?= e(config('social.youtube')) ?>" target="_blank" rel="noopener" aria-label="YouTube" class="grid h-9 w-9 place-items-center rounded-full bg-white/10 hover:bg-accent hover:text-primary"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container flex flex-col items-center justify-between gap-2 py-5 text-center text-xs sm:flex-row sm:text-left">
            <span>&copy; <?= date('Y') ?> Education Trust Nasra School. All rights reserved.</span>
            <a href="https://nasraschool.edu.pk" class="font-semibold text-white hover:text-accent">nasraschool.edu.pk</a>
        </div>
    </div>
</footer>
