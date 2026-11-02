<?php
$pageTitle   = isset($title) && $title !== 'Home' ? $title . ' | Nasra School' : config('seo.title_suffix');
$pageDesc    = $description ?? config('seo.description');
$canonical   = base_url(ltrim(Router::currentPath(), '/'));
$ogImage     = base_url('assets/' . ($image ?? config('seo.image')));
$isHome      = Router::currentPath() === '/';

// Structured data (schema.org) - helps Google show rich results
$schema = [
    '@context'      => 'https://schema.org',
    '@type'         => 'School',
    'name'          => 'Education Trust Nasra School',
    'alternateName' => ['Nasra School', 'ETNS'],
    'url'           => base_url(),
    'logo'          => base_url('assets/images/branding/logo-512.png'),
    'image'         => $ogImage,
    'description'   => config('seo.description'),
    'foundingDate'  => '1949',
    'founder'       => ['@type' => 'Person', 'name' => 'Nasra Wazir Ali'],
    'telephone'     => config('contact.tel'),
    'email'         => config('contact.email'),
    'address'       => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => config('contact.street'),
        'addressLocality' => config('contact.city'),
        'addressCountry'  => config('contact.country'),
    ],
    'sameAs'        => array_values(config('social')),
];
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>

    <!-- Primary SEO -->
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDesc) ?>">
    <meta name="robots" content="<?= http_response_code() === 404 ? 'noindex, follow' : 'index, follow, max-image-preview:large' ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">
    <meta name="theme-color" content="#0D6616">
    <meta name="csrf-token" content="<?= e(csrf_token()) ?>">

    <!-- Open Graph / social sharing -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Nasra School">
    <meta property="og:locale" content="<?= e(config('seo.locale')) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDesc) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDesc) ?>">
    <meta name="twitter:image" content="<?= e($ogImage) ?>">

    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('images/branding/favicon-32.png') ?>">
    <link rel="apple-touch-icon" href="<?= asset('images/branding/apple-touch-icon.png') ?>">

    <!-- Connect early to third-party hosts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://code.jquery.com">

    <!-- Above-the-fold assets first -->
    <link rel="preload" as="image" href="<?= asset('images/branding/logo.webp') ?>" type="image/webp">
    <?php if ($isHome && is_file(PUBLIC_PATH . '/assets/images/home/hero.png')): ?>
        <link rel="preload" as="image" href="<?= asset('images/home/hero.png') ?>" fetchpriority="high">
    <?php endif; ?>

    <!-- Fonts (non-blocking) -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Kaushan+Script&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <!-- Icons - Font Awesome (non-blocking) -->
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Kaushan+Script&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </noscript>

    <!-- Site CSS (scrollbar, animations, etc.) -->
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="<?= asset('js/tailwind-config.js') ?>"></script>
    <?php partial('styles') ?>

    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
</head>
<body class="flex min-h-screen flex-col overflow-x-clip bg-white font-sans text-complement-slate antialiased">

    <a href="#main" class="sr-only z-[100] rounded bg-primary px-4 py-2 text-white focus:not-sr-only focus:fixed focus:left-4 focus:top-4">Skip to content</a>

    <!-- Scroll progress bar -->
    <div id="scroll-progress" aria-hidden="true"></div>

    <?php partial('header') ?>

    <main id="main" class="flex-1">
        <?= $content ?>
    </main>

    <?php partial('footer') ?>

    <!-- Back to top -->
    <button type="button" id="back-to-top" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Scripts (deferred so they never block rendering) -->
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js"></script>
    <script defer src="<?= asset('js/app.js') ?>"></script>
</body>
</html>
