<?php

/**
 * Global helper stubs for Intelephense when `vendor/` is not installed.
 * Mirrors Laravel 11 helpers (Foundation, Support, Collections). Not loaded at runtime by Composer.
 *
 * @see https://laravel.com/docs/helpers
 */

namespace {
    // --- Illuminate\Foundation\helpers.php ---

    /**
     * @param  \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Support\Responsable|int  $code
     */
    function abort($code, $message = '', array $headers = []): never
    {
        throw new \RuntimeException('IDE stub');
    }

    /**
     * @param  bool  $boolean
     * @param  \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Support\Responsable|int  $code
     */
    function abort_if($boolean, $code, $message = '', array $headers = []): void {}

    /**
     * @param  bool  $boolean
     * @param  \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Support\Responsable|int  $code
     */
    function abort_unless($boolean, $code, $message = '', array $headers = []): void {}

    /**
     * @param  string|array  $name
     */
    function action($name, $parameters = [], $absolute = true): string
    {
        return '';
    }

    /**
     * @template TClass of object
     *
     * @param  string|class-string|null  $abstract
     * @return ($abstract is class-string ? TClass : ($abstract is null ? \Illuminate\Foundation\Application : mixed))
     */
    function app($abstract = null, array $parameters = []): mixed
    {
        return null;
    }

    function app_path($path = ''): string
    {
        return '';
    }

    function asset($path, $secure = null): string
    {
        return '';
    }

    /**
     * @return ($guard is null ? \Illuminate\Contracts\Auth\Factory : \Illuminate\Contracts\Auth\StatefulGuard)
     */
    function auth($guard = null): mixed
    {
        return null;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    function back($status = 302, $headers = [], $fallback = false): mixed
    {
        return null;
    }

    function base_path($path = ''): string
    {
        return '';
    }

    function bcrypt($value, $options = []): string
    {
        return '';
    }

    /** @return \Illuminate\Broadcasting\PendingBroadcast */
    function broadcast($event = null): mixed
    {
        return null;
    }

    /**
     * @param  string|array|null  $key
     * @return ($key is null ? \Illuminate\Cache\CacheManager : ($key is string ? mixed : bool))
     */
    function cache($key = null, $default = null): mixed
    {
        return null;
    }

    /**
     * @param  array|string|null  $key
     * @return ($key is null ? \Illuminate\Config\Repository : ($key is string ? mixed : null))
     */
    function config($key = null, $default = null): mixed
    {
        return null;
    }

    function config_path($path = ''): string
    {
        return '';
    }

    /**
     * @param  array|string|null  $key
     * @return ($key is string ? mixed : \Illuminate\Log\Context\Repository)
     */
    function context($key = null, $default = null): mixed
    {
        return null;
    }

    /**
     * @return ($name is null ? \Illuminate\Cookie\CookieJar : \Symfony\Component\HttpFoundation\Cookie)
     */
    function cookie($name = null, $value = null, $minutes = 0, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null): mixed
    {
        return null;
    }

    /** @return \Illuminate\Support\HtmlString */
    function csrf_field(): mixed
    {
        return null;
    }

    function csrf_token(): string
    {
        return '';
    }

    function database_path($path = ''): string
    {
        return '';
    }

    function decrypt($value, $unserialize = true): mixed
    {
        return null;
    }

    /** @return \Illuminate\Support\Defer\DeferredCallback */
    function defer(?callable $callback = null, ?string $name = null, bool $always = false): mixed
    {
        return null;
    }

    /**
     * @return ($job is \Closure ? \Illuminate\Foundation\Bus\PendingClosureDispatch : \Illuminate\Foundation\Bus\PendingDispatch)
     */
    function dispatch($job): mixed
    {
        return null;
    }

    function dispatch_sync($job, $handler = null): mixed
    {
        return null;
    }

    function encrypt($value, $serialize = true): string
    {
        return '';
    }

    function event(...$args): ?array
    {
        return null;
    }

    /**
     * @param  string|null  $locale
     */
    function fake(?string $locale = null): \Faker\Generator
    {
        return new \Faker\Generator;
    }

    function info($message, $context = []): void {}

    /**
     * @return ($message is null ? \Illuminate\Log\LogManager : null)
     */
    function logger($message = null, array $context = []): mixed
    {
        return null;
    }

    function lang_path($path = ''): string
    {
        return '';
    }

    /**
     * @return ($driver is null ? \Illuminate\Log\LogManager : \Psr\Log\LoggerInterface)
     */
    function logs($driver = null): mixed
    {
        return null;
    }

    /** @return \Illuminate\Support\HtmlString */
    function method_field($method): mixed
    {
        return null;
    }

    /** @return \Illuminate\Support\HtmlString|string */
    function mix($path, $manifestDirectory = ''): mixed
    {
        return '';
    }

    /** @return \Illuminate\Support\Carbon */
    function now($tz = null): mixed
    {
        return null;
    }

    /**
     * @param  string|null  $key
     * @param  \Illuminate\Database\Eloquent\Model|string|array|null  $default
     * @return string|array|null
     */
    function old($key = null, $default = null): mixed
    {
        return null;
    }

    function policy($class): mixed
    {
        return null;
    }

    function precognitive($callable = null): mixed
    {
        return null;
    }

    function public_path($path = ''): string
    {
        return '';
    }

    /**
     * @return ($to is null ? \Illuminate\Routing\Redirector : \Illuminate\Http\RedirectResponse)
     */
    function redirect($to = null, $status = 302, $headers = [], $secure = null): mixed
    {
        return null;
    }

    function report($exception): void {}

    function report_if($boolean, $exception): void {}

    function report_unless($boolean, $exception): void {}

    /**
     * @param  list|string|null  $key
     * @return ($key is null ? \Illuminate\Http\Request : ($key is string ? mixed : array))
     */
    function request($key = null, $default = null): mixed
    {
        return null;
    }

    function rescue(callable $callback, $rescue = null, $report = true): mixed
    {
        return null;
    }

    /**
     * @template TClass of object
     *
     * @param  string|class-string  $name
     * @return ($name is class-string ? TClass : mixed)
     */
    function resolve($name, array $parameters = []): mixed
    {
        return null;
    }

    function resource_path($path = ''): string
    {
        return '';
    }

    /**
     * @param  \Illuminate\Contracts\View\View|string|array|null  $content
     * @return ($content is null ? \Illuminate\Contracts\Routing\ResponseFactory : \Illuminate\Http\Response)
     */
    function response($content = null, $status = 200, array $headers = []): mixed
    {
        return null;
    }

    /**
     * @param  \BackedEnum|string  $name
     */
    function route($name, $parameters = [], $absolute = true): string
    {
        return '';
    }

    function secure_asset($path): string
    {
        return '';
    }

    function secure_url($path, $parameters = []): string
    {
        return '';
    }

    /**
     * @param  array|string|null  $key
     * @return ($key is null ? \Illuminate\Session\SessionManager : ($key is string ? mixed : null))
     */
    function session($key = null, $default = null): mixed
    {
        return null;
    }

    function storage_path($path = ''): string
    {
        return '';
    }

    /** @return \Illuminate\Http\RedirectResponse */
    function to_route($route, $parameters = [], $status = 302, $headers = []): mixed
    {
        return null;
    }

    /** @return \Illuminate\Support\Carbon */
    function today($tz = null): mixed
    {
        return null;
    }

    /**
     * @param  string|null  $key
     * @return ($key is null ? \Illuminate\Contracts\Translation\Translator : array|string)
     */
    function trans($key = null, $replace = [], $locale = null): mixed
    {
        return null;
    }

    function trans_choice($key, $number, array $replace = [], $locale = null): string
    {
        return '';
    }

    /**
     * @param  string|null  $key
     * @return string|array|null
     */
    function __($key = null, $replace = [], $locale = null): mixed
    {
        return null;
    }

    /**
     * @return ($path is null ? \Illuminate\Contracts\Routing\UrlGenerator : string)
     */
    function url($path = null, $parameters = [], $secure = null): mixed
    {
        return null;
    }

    /**
     * @return ($data is null ? \Illuminate\Contracts\Validation\Factory : \Illuminate\Contracts\Validation\Validator)
     */
    function validator(?array $data = null, array $rules = [], array $messages = [], array $attributes = []): mixed
    {
        return null;
    }

    /**
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @return ($view is null ? \Illuminate\Contracts\View\Factory : \Illuminate\Contracts\View\View)
     */
    function view($view = null, $data = [], $mergeData = []): mixed
    {
        return null;
    }

    // --- Illuminate\Support\helpers.php ---

    /**
     * @param  array  $array
     * @return array
     */
    function append_config(array $array): array
    {
        return [];
    }

    function blank($value): bool
    {
        return false;
    }

    /**
     * @param  string|object  $class
     */
    function class_basename($class): string
    {
        return '';
    }

    /**
     * @param  object|string  $class
     * @return array<string, string>
     */
    function class_uses_recursive($class): array
    {
        return [];
    }

    function e($value, $doubleEncode = true): string
    {
        return '';
    }

    function env($key, $default = null): mixed
    {
        return $default;
    }

    function filled($value): bool
    {
        return false;
    }

    /** @return \Illuminate\Support\Fluent */
    function fluent($value): mixed
    {
        return null;
    }

    function literal(...$arguments): \stdClass
    {
        return new \stdClass;
    }

    /**
     * @template TValue of object
     *
     * @param  TValue  $object
     * @return ($key is empty ? TValue : mixed)
     */
    function object_get($object, $key, $default = null): mixed
    {
        return null;
    }

    function laravel_cloud(): bool
    {
        return false;
    }

    /**
     * @template TReturnType
     *
     * @param  callable(): TReturnType  $callback
     * @return TReturnType
     */
    function once(callable $callback): mixed
    {
        return null;
    }

    function optional($value = null, ?callable $callback = null): mixed
    {
        return null;
    }

    function preg_replace_array($pattern, array $replacements, $subject): string
    {
        return '';
    }

    function retry($times, callable $callback, $sleepMilliseconds = 0, $when = null): mixed
    {
        return null;
    }

    /**
     * @return ($string is null ? object : \Illuminate\Support\Stringable)
     */
    function str($string = null): mixed
    {
        return null;
    }

    function tap($value, $callback = null): mixed
    {
        return null;
    }

    function throw_if($condition, $exception = 'RuntimeException', ...$parameters): mixed
    {
        return null;
    }

    function throw_unless($condition, $exception = 'RuntimeException', ...$parameters): mixed
    {
        return null;
    }

    /**
     * @param  object|string  $trait
     * @return array<string, string>
     */
    function trait_uses_recursive($trait): array
    {
        return [];
    }

    function transform($value, callable $callback, $default = null): mixed
    {
        return null;
    }

    function windows_os(): bool
    {
        return false;
    }

    function with($value, ?callable $callback = null): mixed
    {
        return null;
    }

    // --- Illuminate\Collections\helpers.php ---

    /** @return \Illuminate\Support\Collection<int, mixed> */
    function collect($value = []): mixed
    {
        return null;
    }

    function data_fill(&$target, $key, $value): mixed
    {
        return null;
    }

    function data_get($target, $key, $default = null): mixed
    {
        return null;
    }

    function data_set(&$target, $key, $value, $overwrite = true): mixed
    {
        return null;
    }

    function data_forget(&$target, $key): mixed
    {
        return null;
    }

    function head($array): mixed
    {
        return null;
    }

    function last($array): mixed
    {
        return null;
    }

    /**
     * @template TValue
     * @template TArgs
     *
     * @param  TValue|\Closure(TArgs): TValue  $value
     * @return TValue
     */
    function value($value, ...$args): mixed
    {
        return null;
    }

    function when($condition, $value, $default = null): mixed
    {
        return null;
    }

    // --- Debug (typically from symfony/var-dumper via Laravel) ---

    function dd(...$vars): never
    {
        throw new \RuntimeException('IDE stub');
    }

    function dump(...$vars): mixed
    {
        return null;
    }
}
