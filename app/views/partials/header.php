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
        'Sports'              => '/campus-life/sports',
        'Community Service'   => '/campus-life/community-service',
        'Creative Arts'       => '/campus-life/creative-arts',
        'Leadership Programs' => '/campus-life/leadership-programs',
        'Activities Calendar' => '/campus-life/activities-calendar',
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

/** Render one primary nav item (with optional dropdown). */
$renderNavItem = static function (string $label, $item, callable $isSection): void {
    [$path, $children] = is_array($item) ? $item : [$item, []];
    if ($children) {
        echo '<div class="group relative">';
        echo '<a href="' . e(base_url($path)) . '" class="nav-link inline-flex items-center gap-1.5 ' . ($isSection($path) ? 'nav-link-active' : '') . '">';
        echo e($label) . '<i class="fa-solid fa-chevron-down text-[9px] opacity-50"></i></a>';
        echo '<div class="invisible absolute left-1/2 top-full z-20 w-56 -translate-x-1/2 pt-2 opacity-0 transition group-hover:visible group-hover:opacity-100">';
        echo '<div class="rounded-md border border-black/5 bg-white py-2 shadow-lg">';
        foreach ($children as $childLabel => $childPath) {
            echo '<a href="' . e(base_url($childPath)) . '" class="block px-4 py-2 text-sm text-ink/75 hover:bg-black/[0.03] hover:text-primary">' . e($childLabel) . '</a>';
        }
        echo '</div></div></div>';
        return;
    }
    echo '<a href="' . e(base_url($path)) . '" class="nav-link ' . ($isSection($path) ? 'nav-link-active' : '') . '">' . e($label) . '</a>';
};

$navKeys = array_keys($navLinks);
$navMid = (int) ceil(count($navKeys) / 2);
$navLeft = array_slice($navLinks, 0, $navMid, true);
$navRight = array_slice($navLinks, $navMid, null, true);
?>
<header id="site-header" class="sticky top-0 z-50 bg-white transition-shadow duration-300">
    <!-- Top bar -->
    <div class="site-topbar hidden bg-ink text-[13px] text-white/75 md:block">
        <div class="container flex h-9 items-center justify-between gap-4">
            <div class="flex items-center gap-6">
                <a href="tel:<?= e(config('contact.tel')) ?>" class="inline-flex items-center gap-2 hover:text-white">
                    <i class="fa-solid fa-phone text-[11px] text-accent"></i>
                    <?= e(config('contact.phone')) ?>
                </a>
                <a href="mailto:<?= e(config('contact.email')) ?>" class="hidden items-center gap-2 hover:text-white sm:inline-flex">
                    <i class="fa-solid fa-envelope text-[11px] text-accent"></i>
                    <?= e(config('contact.email')) ?>
                </a>
            </div>
            <div class="flex items-center gap-5">
                <a href="<?= base_url('community/giving') ?>" class="hidden font-medium text-accent hover:text-white lg:inline">
                    Giving to Education
                </a>
                <span class="hidden h-3 w-px bg-white/20 lg:block" aria-hidden="true"></span>
                <span class="hidden text-white/45 xl:inline">Karachi · Since 1949</span>
                <div class="flex items-center gap-3">
                    <a href="<?= e(config('social.facebook')) ?>" target="_blank" rel="noopener" aria-label="Facebook" class="hover:text-accent"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="<?= e(config('social.instagram')) ?>" target="_blank" rel="noopener" aria-label="Instagram" class="hover:text-accent"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?= e(config('social.youtube')) ?>" target="_blank" rel="noopener" aria-label="YouTube" class="hover:text-accent"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main navbar: mobile = logo left; desktop xl = logo centered with split nav -->
    <div class="border-b border-black/5 bg-white">
        <!-- Mobile / tablet -->
        <div class="container flex h-[4.5rem] items-center gap-4 xl:hidden">
            <a href="<?= base_url() ?>" class="flex shrink-0 items-center" aria-label="Nasra School home">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="Nasra School" width="64" height="64" class="site-logo h-14 w-14 rounded-full object-cover">
            </a>
            <div class="ml-auto flex items-center gap-3">
                <a href="<?= base_url('admissions') ?>" class="btn btn-primary hidden !rounded-md !px-4 !py-2.5 !text-xs font-semibold sm:inline-flex">Admissions</a>
                <button type="button" id="menu-toggle" class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-drawer">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <!-- Desktop: centered logo, nav split left / right -->
        <div class="container relative hidden h-[5.25rem] items-center xl:flex">
            <nav class="flex flex-1 items-center justify-end gap-0.5 pr-[4.75rem] 2xl:gap-1 2xl:pr-[5.5rem]" aria-label="Primary left">
                <?php foreach ($navLeft as $label => $item): ?>
                    <?php $renderNavItem($label, $item, $isSection); ?>
                <?php endforeach; ?>
            </nav>

            <a href="<?= base_url() ?>" class="site-logo-link absolute left-1/2 top-1/2 z-10 -translate-x-1/2 -translate-y-1/2" aria-label="Nasra School home">
                <img
                    src="<?= asset('images/branding/logo.webp') ?>"
                    alt="Nasra School"
                    width="72"
                    height="72"
                    id="site-logo"
                    class="site-logo h-[4.25rem] w-[4.25rem] rounded-full object-cover ring-2 ring-white"
                >
            </a>

            <nav class="flex flex-1 items-center justify-start gap-0.5 pl-[4.75rem] 2xl:gap-1 2xl:pl-[5.5rem]" aria-label="Primary right">
                <?php foreach ($navRight as $label => $item): ?>
                    <?php $renderNavItem($label, $item, $isSection); ?>
                <?php endforeach; ?>
                <a href="<?= base_url('admissions') ?>" class="btn btn-primary ml-3 !rounded-md !px-4 !py-2.5 !text-xs font-semibold">Admissions</a>
            </nav>
        </div>
    </div>
</header>

<!-- Mobile drawer -->
<div id="mobile-drawer" class="xl:hidden" aria-hidden="true">
    <div class="drawer-backdrop" data-drawer-close></div>

    <aside class="drawer-panel" role="dialog" aria-modal="true" aria-label="Site menu">
        <div class="flex items-center justify-between border-b border-black/5 px-5 py-4">
            <a href="<?= base_url() ?>" aria-label="Nasra School home">
                <img src="<?= asset('images/branding/logo.webp') ?>" alt="" width="44" height="44" class="h-11 w-11 rounded-full object-cover">
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
                                    <ul class="ml-[3.25rem] space-y-0.5 border-l border-black/10 py-1 pl-4">
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

        <div class="drawer-item border-t border-black/5 px-5 pb-6 pt-5" style="--i: <?= $n ?>">
            <a href="<?= base_url('admissions') ?>" class="btn btn-primary w-full !py-3.5">Admissions</a>
            <div class="mt-5 space-y-2 text-sm text-muted">
                <a href="tel:<?= e(config('contact.tel')) ?>" class="flex items-center gap-3 hover:text-primary"><i class="fa-solid fa-phone w-4 text-primary"></i> <?= e(config('contact.phone')) ?></a>
                <a href="mailto:<?= e(config('contact.email')) ?>" class="flex items-center gap-3 hover:text-primary"><i class="fa-solid fa-envelope w-4 text-primary"></i> <?= e(config('contact.email')) ?></a>
            </div>
        </div>
    </aside>
</div>
