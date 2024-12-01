<?php

namespace Illuminate\Database\Schema;

/**
 * Minimal stub for IDE static analysis only (before composer install).
 */
class ColumnDefinition
{
    /**
     * @return $this
     */
    public function unique(bool $value = true): static
    {
        return $this;
    }

    /**
     * @return $this
     */
    public function nullable(bool $value = true): static
    {
        return $this;
    }

    /**
     * @return $this
     */
    public function index(?string $name = null): static
    {
        return $this;
    }
}
