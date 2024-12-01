<?php

namespace Illuminate\Foundation\Configuration;

use Illuminate\Foundation\Application;

/**
 * Minimal stub for IDE static analysis only (before composer install).
 */
class ApplicationBuilder
{
    /**
     * @param  array{web?: string, api?: string, commands?: string, health?: string, ...}  $attributes
     */
    public function withRouting(
        ?string $web = null,
        ?string $api = null,
        ?string $commands = null,
        ?string $health = null,
    ): static {
        return $this;
    }

    public function withMiddleware(callable $middleware): static
    {
        return $this;
    }

    public function withExceptions(callable $exceptions): static
    {
        return $this;
    }

    public function create(): Application
    {
        return new Application;
    }
}
