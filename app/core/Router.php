<?php
/**
 * Minimal router. Supports GET/POST and {param} placeholders.
 *
 *   $router->get('/about', fn() => view('about'));
 *   $router->get('/news/{slug}', fn($slug) => view('news', compact('slug')));
 */
class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    private function add(string $method, string $path, callable $handler): void
    {
        $pattern = '#^' . preg_replace('#\{([a-zA-Z_]+)\}#', '([^/]+)', '/' . trim($path, '/')) . '$#';
        $this->routes[$method][$pattern] = $handler;
    }

    /**
     * URL path the app is served from, e.g. "" or "/nasraschool".
     * "/public" is stripped because the root .htaccess hides it.
     */
    public static function basePath(): string
    {
        $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        return preg_replace('#/public$#', '', $base);
    }

    /** Current request path relative to the app base, e.g. "/about" */
    public static function currentPath(): string
    {
        $uri  = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $base = self::basePath();
        if ($base !== '' && strpos($uri, $base) === 0) {
            $uri = substr($uri, strlen($base));
        }
        return '/' . trim($uri, '/');
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $path   = self::currentPath();

        foreach ($this->routes[$method] ?? [] as $pattern => $handler) {
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                call_user_func_array($handler, $matches);
                return;
            }
        }

        http_response_code(404);
        view('404', ['title' => 'Page Not Found']);
    }
}
