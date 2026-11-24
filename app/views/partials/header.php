<?php
// label => path, or label => [path, [child label => child path]]
$navLinks = [
    'Home'        => '/',
    'About Us'    => ['/about', [
        'History'             => '/about/history',
        'Board of Trustees'   => '/about/board-of-trustees',
        'Leadership'          => '/about/leadership',
        'Faculty'             => '/about/faculty',
        'Facilities'          => '/about/facilities',
        'Guiding Principles'  => '/about/guiding-principles',
    ]],
    'Academics'   => ['/academics', [
        'Pre-Primary'      => '/academics/pre-primary',
        'Primary'          => '/academics/primary',
        'Secondary'        => '/academics/secondary',
        'Higher Secondary' => '/academics/higher-secondary',
    ]],
    'Campus Life' => ['/campus-life', [
        'Sports'                => '/campus-life/sports',
        'Community Service'     => '/campus-life/community-service',
        'Creative Arts'         => '/campus-life/creative-arts',
        'Leadership Programs'   => '/campus-life/leadership-programs',
        'Activities Calendar'   => '/campus-life/activities-calendar',
    ]],
    'Admissions'  => ['/admissions', [
        'Admission Process' => '/admissions/admission-process',
        'Schedule'          => '/admissions/schedule',
        'Fee Structure'     => '/admissions/fee-structure',
        'Age Criteria'      => '/admissions/age-criteria',
    ]],
    'Community'   => ['/community', [
        'Partners'            => '/community/partners',
        'Alumni'              => '/community/alumni',
        'Giving to Education' => '/community/giving',
    ]],
    'Careers'     => '/careers',
    'Contact Us'  => '/contact',
];

$navIcons = [
    'Home'        => 'fa-house',
    'About Us'    => 'fa-circle-info',
    'Academics'   => 'fa-book-open',
    'Campus Life' => 'fa-futbol',
    'Admissions'  => 'fa-file-signature',
    'Community'   => 'fa-handshake',
    'Careers'     => 'fa-briefcase',
    'Contact Us'  => 'fa-envelope',
];

$isSection = fn(string $path) => $path === '/' ? is_active('/') : strpos(Router::currentPath(), $path) === 0;
?>
<header id="site-header" class="sticky top-0 z-50 bg-white transition-shadow duration-300">
    <!-- Top bar -->
    <div class="site-topbar hidden border-b border-white/10 bg-ink text-white/80 md:block">
        <div class="container flex h-10 items-center justify-between gap-4 text-xs">
            <div class="flex flex-wrap items-center gap-x-5 gap-y-1">
                <a href="tel:<?= e(config('contact.tel')) ?>" class="inline-flex items-center gap-2 transition hover:text-accent">
                    <i class="fa-solid fa-phone text-accent"></i>
                    <?= e(config('contact.phone')) ?>
                </a>
                <a href="mailto:<?= e(config('contact.email')) ?>" class="inline-flex items-center gap-2 transition hover:text-accent">
                    <i class="fa-solid fa-envelope text-accent"></i>
                    <?= e(config('contact.email')) ?>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <span class="hidden text-white/50 lg:inline">Since 1949 · Karachi</span>
                <div class="flex items-center gap-1">
                    <a href="<?= e(config('social.facebook')) ?>" target="_blank" rel="noopener" aria-label="Facebook" class="grid h-7 w-7 place-items-center rounded-full text-white/70 transition hover:bg-white/10 hover:text-accent"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="<?= e(config('social.instagram')) ?>" target="_blank" rel="noopener" aria-label="Instagram" class="grid h-7 w-7 place-items-center rounded-full text-white/70 transition hover:bg-white/10 hover:text-accent"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?= e(config('social.youtube')) ?>" target="_blank" rel="noopener" aria-label="YouTube" class="grid h-7 w-7 place-items-center rounded-full text-white/70 transition hover:bg-white/10 hover:text-accent"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main navbar -->
    <div class="border-b border-primary/15 bg-white/95 backdrop-blur">
        <div class="container flex h-[4.25rem] items-center gap-3 xl:h-[4.5rem] xl:gap-4">
            <a href="<?= base_url() ?>" class="shrink-0" aria-label="Nasra School home">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="Nasra School" width="52" height="52" class="h-12 w-12 transition-all duration-300 xl:h-[3.25rem] xl:w-[3.25rem]" id="site-logo">
            </a>

            <nav class="ml-auto hidden items-center gap-0.5 whitespace-nowrap xl:flex 2xl:gap-1" aria-label="Primary">
                <?php foreach ($navLinks as $label => $item): ?>
                    <?php [$path, $children] = is_array($item) ? $item : [$item, []]; ?>
                    <?php if ($children): ?>
                        <div class="group relative">
                            <a href="<?= base_url($path) ?>" class="nav-link inline-flex items-center gap-1 !px-2.5 !text-[0.8125rem] 2xl:!px-3 2xl:!text-sm <?= $isSection($path) ? 'nav-link-active' : '' ?>">
                                <?= e($label) ?> <i class="fa-solid fa-chevron-down text-[9px] opacity-70"></i>
                            </a>
                            <div class="invisible absolute left-0 top-full z-20 min-w-[14rem] pt-2 opacity-0 transition group-hover:visible group-hover:opacity-100">
                                <div class="rounded-lg border border-muted/15 bg-white p-1.5 shadow-xl">
                                    <?php foreach ($children as $childLabel => $childPath): ?>
                                        <a href="<?= base_url($childPath) ?>" class="block rounded-md px-3 py-2 text-sm text-ink/80 hover:bg-accent/20 hover:text-primary"><?= e($childLabel) ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= base_url($path) ?>" class="nav-link !px-2.5 !text-[0.8125rem] 2xl:!px-3 2xl:!text-sm <?= $isSection($path) ? 'nav-link-active' : '' ?>"><?= e($label) ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <a href="<?= base_url('admissions') ?>" class="btn btn-primary ml-auto hidden shrink-0 !px-4 !py-2.5 !text-xs sm:inline-flex xl:ml-2 2xl:!px-5 2xl:!text-sm">
                Admissions <i class="fa-solid fa-arrow-right"></i>
            </a>

            <button type="button" id="menu-toggle" class="burger ml-auto sm:ml-0 xl:hidden" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-drawer">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile drawer (outside header so position:fixed isn't trapped by backdrop-blur) -->
<div id="mobile-drawer" class="xl:hidden" aria-hidden="true">
    <div class="drawer-backdrop" data-drawer-close></div>

    <aside class="drawer-panel" role="dialog" aria-modal="true" aria-label="Site menu">
        <div class="flex items-center justify-between border-b border-muted/15 px-5 py-4">
            <a href="<?= base_url() ?>" aria-label="Nasra School home">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="" width="44" height="44" class="h-11 w-11">
            </a>
            <button type="button" class="drawer-close" data-drawer-close aria-label="Close menu">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4" aria-label="Mobile">
            <ul class="space-y-1">
                <?php $n = 0; foreach ($navLinks as $label => $item): ?>
                    <?php [$path, $children] = is_array($item) ? $item : [$item, []]; $active = $isSection($path); ?>
                    <li class="drawer-item" style="--i: <?= $n++ ?>">
                        <?php if ($children): ?>
                            <button type="button" class="drawer-link drawer-toggle <?= $active ? 'is-current' : '' ?>" aria-expanded="false">
                                <span class="drawer-icon"><i class="fa-solid <?= $navIcons[$label] ?? 'fa-circle' ?>"></i></span>
                                <span class="flex-1 text-left"><?= e($label) ?></span>
                                <i class="fa-solid fa-chevron-down drawer-chevron"></i>
                            </button>
                            <div class="drawer-sub">
                                <div>
                                    <ul class="ml-[3.25rem] space-y-0.5 border-l-2 border-accent/60 py-1 pl-4">
                                        <li><a href="<?= base_url($path) ?>" class="drawer-sublink">Overview</a></li>
                                        <?php foreach ($children as $childLabel => $childPath): ?>
                                            <li><a href="<?= base_url($childPath) ?>" class="drawer-sublink <?= is_active($childPath) ? 'is-current' : '' ?>"><?= e($childLabel) ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="<?= base_url($path) ?>" class="drawer-link <?= $active ? 'is-current' : '' ?>"<?= $active ? ' aria-current="page"' : '' ?>>
                                <span class="drawer-icon"><i class="fa-solid <?= $navIcons[$label] ?? 'fa-circle' ?>"></i></span>
                                <span class="flex-1"><?= e($label) ?></span>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="drawer-item border-t border-muted/15 px-5 pb-6 pt-5" style="--i: <?= $n ?>">
            <a href="<?= base_url('admissions') ?>" class="btn btn-primary w-full !py-3.5">Explore Admissions <i class="fa-solid fa-arrow-right"></i></a>
            <div class="mt-5 space-y-2 text-sm text-muted">
                <a href="tel:<?= e(config('contact.tel')) ?>" class="flex items-center gap-3 hover:text-primary"><i class="fa-solid fa-phone w-4 text-accent"></i> <?= e(config('contact.phone')) ?></a>
                <a href="mailto:<?= e(config('contact.email')) ?>" class="flex items-center gap-3 hover:text-primary"><i class="fa-solid fa-envelope w-4 text-accent"></i> <?= e(config('contact.email')) ?></a>
            </div>
            <div class="mt-4 flex gap-2">
                <a href="<?= e(config('social.facebook')) ?>" target="_blank" rel="noopener" aria-label="Facebook" class="drawer-social"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="<?= e(config('social.instagram')) ?>" target="_blank" rel="noopener" aria-label="Instagram" class="drawer-social"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?= e(config('social.youtube')) ?>" target="_blank" rel="noopener" aria-label="YouTube" class="drawer-social"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </aside>
</div>
