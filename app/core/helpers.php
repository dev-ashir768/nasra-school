<?php
/**
 * Global helper functions
 */

/** Read a config value using dot notation, e.g. config('app.name') */
function config(string $key, $default = null)
{
    global $config;
    $value = $config;
    foreach (explode('.', $key) as $part) {
        if (!is_array($value) || !array_key_exists($part, $value)) {
            return $default;
        }
        $value = $value[$part];
    }
    return $value;
}

/** Escape output for HTML */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Base URL of the site (no trailing slash) */
function base_url(string $path = ''): string
{
    $base = rtrim((string) config('app.url'), '/');
    if ($base === '') {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $base   = $scheme . '://' . $host . Router::basePath();
    }
    return $base . '/' . ltrim($path, '/');
}

/** URL to a file in public/assets */
function asset(string $path): string
{
    $url  = base_url('assets/' . ltrim($path, '/'));
    $file = PUBLIC_PATH . '/assets/' . ltrim($path, '/');
    // Cache-busting by file modification time
    return is_file($file) ? $url . '?v=' . filemtime($file) : $url;
}

/**
 * <img> for a file in public/assets/images. If the file doesn't exist yet,
 * outputs a branded placeholder box (showing the expected filename) instead.
 */
function photo(string $path, string $alt, string $class = '', bool $eager = false): string
{
    if (is_file(PUBLIC_PATH . '/assets/images/' . ltrim($path, '/'))) {
        // Above-the-fold images load immediately at high priority; everything else lazy-loads
        $loading = $eager ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"';
        return '<img src="' . e(asset('images/' . $path)) . '" alt="' . e($alt) . '" class="object-cover ' . e($class) . '" ' . $loading . ' decoding="async">';
    }
    return '<div class="flex flex-col items-center justify-center gap-2 bg-gradient-to-br from-primary-light/40 to-gradient-lime/30 text-center text-xs text-primary-dark/60 ' . e($class) . '">'
        . '<i class="fa-regular fa-image text-2xl"></i><span class="px-2">images/' . e($path) . '</span></div>';
}

/** Is the given path the current page? (for active nav links) */
function is_active(string $path): bool
{
    return Router::currentPath() === '/' . trim($path, '/');
}

/** Render a view inside a layout */
function view(string $view, array $data = [], string $layout = 'main'): void
{
    $viewFile = VIEW_PATH . '/pages/' . $view . '.php';
    if (!is_file($viewFile)) {
        throw new RuntimeException("View not found: {$view}");
    }

    extract($data, EXTR_SKIP);

    ob_start();
    require $viewFile;
    $content = ob_get_clean();

    require VIEW_PATH . '/layouts/' . $layout . '.php';
}

/** Include a partial view */
function partial(string $name, array $data = []): void
{
    extract($data, EXTR_SKIP);
    require VIEW_PATH . '/partials/' . $name . '.php';
}

/** Redirect to a path */
function redirect(string $path): void
{
    header('Location: ' . base_url($path));
    exit;
}

/** CSRF token for forms */
function csrf_token(): string
{
    if (empty($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['_csrf'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_csrf" value="' . e(csrf_token()) . '">';
}

function csrf_verify(): bool
{
    return isset($_POST['_csrf']) && hash_equals(csrf_token(), (string) $_POST['_csrf']);
}

/** Send a JSON response (for jQuery AJAX calls) */
function json_response(array $data, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}
