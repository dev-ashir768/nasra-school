# Nasra School

PHP + HTML + jQuery + Tailwind CSS (CDN) website. No Node / build step needed.

## Structure

```
nasraschool/
├── .htaccess              # Routes all requests into /public
├── app/                   # Not web-accessible (deny-all .htaccess)
│   ├── bootstrap.php      # Constants, config, errors, autoload, session
│   ├── routes.php         # URL → page mapping
│   ├── config/config.php  # App settings
│   ├── core/              # Router, helpers
│   └── views/
│       ├── layouts/       # Page shell (main.php) - loads Tailwind CDN + jQuery
│       ├── partials/      # header, footer, styles (Tailwind @apply components)
│       └── pages/         # One file per page
├── public/                # Web root
│   ├── .htaccess          # Front controller, security headers, caching
│   ├── index.php          # Front controller
│   └── assets/
│       ├── css/app.css            # Plain custom CSS
│       ├── js/tailwind-config.js  # Tailwind theme (colours, fonts)
│       ├── js/app.js              # jQuery code
│       └── images/, fonts/
└── storage/logs/          # PHP error log (not web-accessible)
```

## Setup

1. Put the folder in your web server (XAMPP `htdocs`, Laragon `www`, etc.) with `mod_rewrite` enabled and `AllowOverride All`.
2. Edit `app/config/config.php` (site URL, set `debug` to `false` in production).

Without Apache you can use PHP's built-in server: `php -S localhost:8000 -t public`.

## Deploying to cPanel

No Node.js is needed on the server - the site is plain PHP; Tailwind, jQuery and fonts load from CDNs.

1. **PHP version:** cPanel → *MultiPHP Manager* → set the domain to PHP 8.1 or newer.
2. **Upload:** zip `app/`, `public/`, `storage/` and the root `.htaccess` (not the design `.png` files), upload the zip to `public_html` with *File Manager* and extract it there. The root `.htaccess` sends every request into `public/`, and `app/` and `storage/` are blocked from the web.
3. **Config:** in `app/config/config.php` set `'env' => 'production'`, `'debug' => false` and `'url' => 'https://nasraschool.edu.pk'`.
4. **HTTPS:** enable SSL (cPanel → *SSL/TLS Status* → AutoSSL), then uncomment the "Force HTTPS" lines in `public/.htaccess`.
5. **Permissions:** `storage/logs` must be writable (755 is normally enough on cPanel).
6. Submit `https://nasraschool.edu.pk/sitemap.xml` in Google Search Console.

## Styling

- Use Tailwind classes directly in the PHP views.
- Brand colours / fonts: `public/assets/js/tailwind-config.js`
- Reusable classes (`.btn`, `.form-input`, ...): `app/views/partials/styles.php`

## Adding a page

1. Create `app/views/pages/gallery.php`
2. Add a route in `app/routes.php`: `$router->get('/gallery', fn() => view('gallery', ['title' => 'Gallery']));`
3. Add it to `$navLinks` in `app/views/partials/header.php`
