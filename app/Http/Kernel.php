protected $routeMiddleware = [
    // Middleware lainnya
    'role' => \App\Http\Middleware\CheckRole::class,
];
