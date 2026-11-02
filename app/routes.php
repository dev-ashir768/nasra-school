<?php
/**
 * Application routes
 *
 * @var Router $router
 */

// Public pages: path => [view, title, meta description]. Also used to build sitemap.xml.
$pages = [
    '/'        => ['home', 'Home', null],
    '/about'   => ['about', 'About Us', 'Since 1949, Education Trust Nasra School has grown from two rooms into five purpose-built campuses serving over 11,000 students in Karachi.'],
    '/contact' => ['contact', 'Contact Us', 'Contact Education Trust Nasra School, Karachi: phone (92-21) 32361313-18, email info@nasraschool.edu.pk.'],
];

foreach ($pages as $path => [$view, $title, $description]) {
    $router->get($path, fn() => view($view, ['title' => $title, 'description' => $description]));
}

// SEO: sitemap.xml and robots.txt
$router->get('/sitemap.xml', function () use ($pages) {
    header('Content-Type: application/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($pages as $path => [$view]) {
        $lastmod = date('Y-m-d', filemtime(VIEW_PATH . "/pages/{$view}.php"));
        echo '  <url><loc>' . e(base_url(ltrim($path, '/'))) . "</loc><lastmod>{$lastmod}</lastmod><priority>" . ($path === '/' ? '1.0' : '0.8') . "</priority></url>\n";
    }
    echo '</urlset>';
});

$router->get('/robots.txt', function () {
    header('Content-Type: text/plain; charset=utf-8');
    echo "User-agent: *\nAllow: /\n\nSitemap: " . base_url('sitemap.xml') . "\n";
});

// Example AJAX endpoint (used by assets/js/app.js)
$router->post('/contact', function () {
    if (!csrf_verify()) {
        json_response(['ok' => false, 'message' => 'Invalid session, please reload the page.'], 419);
    }

    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '') {
        json_response(['ok' => false, 'message' => 'Please fill in all fields with a valid email.'], 422);
    }

    // TODO: send email
    json_response(['ok' => true, 'message' => 'Thank you! We will get back to you soon.']);
});
