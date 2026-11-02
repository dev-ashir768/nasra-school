<footer class="bg-gradient-night text-white/70">
    <div class="container grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-4">
        <div>
            <a href="<?= base_url() ?>" class="flex items-center gap-3">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="" width="48" height="48" loading="lazy" class="h-12 w-12">
                <span class="font-serif text-lg font-bold text-white">Nasra School</span>
            </a>
            <p class="mt-4 text-sm leading-relaxed">
                Education Trust Nasra School (ETNS) is a not-for-profit organization established in 1949 under the Trust Act of 1882.
            </p>
        </div>

        <div>
            <h3 class="font-serif text-lg font-bold text-white">Quick Links</h3>
            <ul class="mt-4 space-y-2 text-sm">
                <li><a href="<?= base_url('about') ?>" class="hover:text-gradient-lime">About Us</a></li>
                <li><a href="<?= base_url('academics') ?>" class="hover:text-gradient-lime">Academics</a></li>
                <li><a href="<?= base_url('admissions') ?>" class="hover:text-gradient-lime">Admissions</a></li>
                <li><a href="<?= base_url('campus-life') ?>" class="hover:text-gradient-lime">Campus Life</a></li>
                <li><a href="<?= base_url('alumni') ?>" class="hover:text-gradient-lime">Alumni</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-serif text-lg font-bold text-white">Head Office</h3>
            <p class="mt-4 flex gap-3 text-sm leading-relaxed">
                <i class="fa-solid fa-location-dot mt-1 text-gradient-lime"></i>
                13, Modern Cooperative Housing Society, Block 7/8, Tipu Sultan Road, Karachi
            </p>
        </div>

        <div>
            <h3 class="font-serif text-lg font-bold text-white">Contact Us</h3>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="tel:+922132361313" class="flex items-center gap-3 hover:text-gradient-lime"><i class="fa-solid fa-phone text-gradient-lime"></i> (92-21) 32361313-18</a></li>
                <li><a href="mailto:info@nasraschool.edu.pk" class="flex items-center gap-3 hover:text-gradient-lime"><i class="fa-solid fa-envelope text-gradient-lime"></i> info@nasraschool.edu.pk</a></li>
            </ul>
            <div class="mt-5 flex gap-3">
                <a href="https://www.facebook.com/people/ETNS-Education-Trust-Nasra-School/100063850159981/" target="_blank" rel="noopener" aria-label="Facebook" class="grid h-9 w-9 place-items-center rounded-full bg-white/10 hover:bg-primary"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/nasraschools/" target="_blank" rel="noopener" aria-label="Instagram" class="grid h-9 w-9 place-items-center rounded-full bg-white/10 hover:bg-primary"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCxLEtU78o1nbuMguIKi9pPg/featured" target="_blank" rel="noopener" aria-label="YouTube" class="grid h-9 w-9 place-items-center rounded-full bg-white/10 hover:bg-primary"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container py-5 text-center text-xs">
            &copy; <?= date('Y') ?> Education Trust Nasra School. All rights reserved.
        </div>
    </div>
</footer>
