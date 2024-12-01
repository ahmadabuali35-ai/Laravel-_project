<?php

namespace Illuminate\Http\Resources\Json;

use Illuminate\Http\Request;

/**
 * Minimal stub for IDE static analysis only (before composer install).
 *
 * @template TModel of object
 */
abstract class JsonResource
{
    public mixed $resource;

    public function __construct(mixed $resource = null)
    {
        $this->resource = $resource;
    }

    /**
     * @return array<string, mixed>
     */
    abstract public function toArray(Request $request): array;

    public static function collection(mixed $resource): mixed
    {
        return null;
    }

    public function whenLoaded(string $relationship, mixed $value = null, mixed $default = null): mixed
    {
        return null;
    }

    public function whenCounted(string $relationship, mixed $value = null, mixed $default = null): mixed
    {
        return null;
    }

    public function response($request = null): mixed
    {
        return null;
    }
}
