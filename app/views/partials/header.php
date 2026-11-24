<?php
// label => path, or label => [path, [child label => child path]]
$navLinks = [
    'Home'        => '/',
    'About'       => '/about',
    'Academics'   => ['/academics', [
        'Pre-Primary'      => '/academics/pre-primary',
        'Primary'          => '/academics/primary',
        'Secondary'        => '/academics/secondary',
        'Higher Secondary' => '/academics/higher-secondary',
    ]],
    'Admissions'  => ['/admissions', [
        'Admission Process'             => '/admissions/admission-process',
        'Admission Schedule'            => '/admissions/admission-schedule',
        'Fee Schedule & Age Criteria'   => '/admissions/fee-schedule',
    ]],
    'Campus Life' => '/campus-life',
    'Alumni'      => '/alumni',
    'Contact'     => '/contact',
];

// Icons shown next to each item in the mobile drawer
$navIcons = [
    'Home'        => 'fa-house',
    'About'       => 'fa-circle-info',
    'Academics'   => 'fa-book-open',
    'Admissions'  => 'fa-file-signature',
    'Campus Life' => 'fa-futbol',
    'Alumni'      => 'fa-user-graduate',
    'Contact'     => 'fa-envelope',
];

$isSection = fn(string $path) => $path === '/' ? is_active('/') : strpos(Router::currentPath(), $path) === 0;
?>
<header id="site-header" class="sticky top-0 z-50 border-b border-primary/10 bg-white/95 backdrop-blur transition-shadow duration-300">
    <div class="container flex h-20 items-center justify-between gap-6">
        <!-- Logo -->
        <a href="<?= base_url() ?>" class="flex shrink-0 items-center gap-3">
            <img src="<?= asset('images/branding/logo.webp') ?>" alt="Nasra School logo" width="56" height="56" class="h-14 w-14 transition-all duration-300" id="site-logo">
            <span class="leading-tight">
                <span class="block font-serif text-xl font-bold text-primary-dark">Nasra School</span>
                <span class="block text-sm text-complement-slate">Education Trust</span>
            </span>
        </a>

        <!-- Desktop nav -->
        <nav class="hidden items-center gap-5 whitespace-nowrap border-l border-primary/15 pl-6 lg:flex xl:gap-6 xl:pl-8">
            <?php foreach ($navLinks as $label => $item): ?>
                <?php [$path, $children] = is_array($item) ? $item : [$item, []]; ?>
                <?php if ($children): ?>
                    <div class="group relative">
                        <a href="<?= base_url($path) ?>" class="nav-link inline-flex items-center gap-1 <?= $isSection($path) ? 'nav-link-active' : '' ?>">
                            <?= e($label) ?> <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </a>
                        <div class="invisible absolute left-0 top-full z-10 w-60 pt-3 opacity-0 transition group-hover:visible group-hover:opacity-100">
                            <div class="rounded-xl border border-primary/10 bg-white p-2 shadow-xl">
                                <?php foreach ($children as $childLabel => $childPath): ?>
                                    <a href="<?= base_url($childPath) ?>" class="block rounded-lg px-4 py-2 text-sm text-complement-slate hover:bg-gradient-lime/15 hover:text-primary"><?= e($childLabel) ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?= base_url($path) ?>" class="nav-link <?= $isSection($path) ? 'nav-link-active' : '' ?>"><?= e($label) ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <a href="<?= base_url('admissions') ?>" class="btn btn-primary ml-auto hidden whitespace-nowrap !py-2.5 sm:inline-flex lg:hidden xl:inline-flex">
            Explore Admissions <i class="fa-solid fa-arrow-right"></i>
        </a>

        <!-- Mobile toggle (animated hamburger) -->
        <button type="button" id="menu-toggle" class="burger lg:hidden" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-drawer">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<!-- ============ Mobile drawer ============
     Lives outside <header>: the header's backdrop-blur would otherwise trap position:fixed inside it. -->
<div id="mobile-drawer" class="lg:hidden" aria-hidden="true">
    <div class="drawer-backdrop" data-drawer-close></div>

    <aside class="drawer-panel" role="dialog" aria-modal="true" aria-label="Site menu">
        <div class="flex items-center justify-between border-b border-primary/10 px-5 py-4">
            <a href="<?= base_url() ?>" class="flex items-center gap-3">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="" width="44" height="44" class="h-11 w-11">
                <span class="leading-tight">
                    <span class="block font-serif text-lg font-bold text-primary-dark">Nasra School</span>
                    <span class="block text-xs text-complement-gray">Education Trust &bull; Since 1949</span>
                </span>
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
                                    <ul class="ml-[3.25rem] space-y-0.5 border-l-2 border-gradient-lime/50 py-1 pl-4">
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

        <div class="drawer-item border-t border-primary/10 px-5 pb-6 pt-5" style="--i: <?= $n ?>">
            <a href="<?= base_url('admissions') ?>" class="btn btn-primary w-full !py-3.5">Explore Admissions <i class="fa-solid fa-arrow-right"></i></a>
            <div class="mt-5 space-y-2 text-sm text-complement-slate">
                <a href="tel:<?= e(config('contact.tel')) ?>" class="flex items-center gap-3 hover:text-primary"><i class="fa-solid fa-phone w-4 text-primary"></i> <?= e(config('contact.phone')) ?></a>
                <a href="mailto:<?= e(config('contact.email')) ?>" class="flex items-center gap-3 hover:text-primary"><i class="fa-solid fa-envelope w-4 text-primary"></i> <?= e(config('contact.email')) ?></a>
            </div>
            <div class="mt-4 flex gap-2">
                <a href="<?= e(config('social.facebook')) ?>" target="_blank" rel="noopener" aria-label="Facebook" class="drawer-social"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="<?= e(config('social.instagram')) ?>" target="_blank" rel="noopener" aria-label="Instagram" class="drawer-social"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?= e(config('social.youtube')) ?>" target="_blank" rel="noopener" aria-label="YouTube" class="drawer-social"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </aside>
</div>
