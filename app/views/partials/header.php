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

        <!-- Mobile toggle -->
        <button type="button" id="menu-toggle" class="text-2xl text-primary-dark lg:hidden" aria-label="Toggle menu" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- Mobile nav -->
    <nav id="mobile-menu" class="hidden max-h-[calc(100vh-5rem)] overflow-y-auto border-t border-primary/10 bg-white lg:hidden">
        <div class="container flex flex-col py-3">
            <?php foreach ($navLinks as $label => $item): ?>
                <?php [$path, $children] = is_array($item) ? $item : [$item, []]; ?>
                <?php if ($children): ?>
                    <div class="mobile-dropdown">
                        <button type="button" class="nav-link flex w-full items-center justify-between <?= $isSection($path) ? 'text-primary' : '' ?>">
                            <?= e($label) ?> <i class="fa-solid fa-chevron-down text-xs transition"></i>
                        </button>
                        <div class="hidden border-l-2 border-primary/20 pb-2 pl-4">
                            <a href="<?= base_url($path) ?>" class="block py-1.5 text-sm text-complement-slate">Overview</a>
                            <?php foreach ($children as $childLabel => $childPath): ?>
                                <a href="<?= base_url($childPath) ?>" class="block py-1.5 text-sm text-complement-slate"><?= e($childLabel) ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?= base_url($path) ?>" class="nav-link <?= $isSection($path) ? 'text-primary' : '' ?>"><?= e($label) ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
            <a href="<?= base_url('admissions') ?>" class="btn btn-primary mt-3 sm:hidden">Explore Admissions <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </nav>
</header>
