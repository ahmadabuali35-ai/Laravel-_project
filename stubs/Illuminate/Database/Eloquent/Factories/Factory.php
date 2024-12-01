<?php

namespace Illuminate\Database\Eloquent\Factories;

/**
 * Minimal stub for IDE static analysis only (before composer install).
 */
abstract class Factory
{
    /**
     * @return array<string, mixed>
     */
    abstract public function definition(): array;

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function create(array $attributes = [], $parent = null): mixed
    {
        return null;
    }
}
