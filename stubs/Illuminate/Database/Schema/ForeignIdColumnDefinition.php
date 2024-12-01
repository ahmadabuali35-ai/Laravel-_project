<?php

namespace Illuminate\Database\Schema;

/**
 * Minimal stub for IDE static analysis only (before composer install).
 */
class ForeignIdColumnDefinition extends ColumnDefinition
{
    /**
     * @param  string|null  $table
     * @param  string  $column
     * @param  string|null  $indexName
     */
    public function constrained(?string $table = null, string $column = 'id', ?string $indexName = null): ForeignKeyDefinition
    {
        return new ForeignKeyDefinition;
    }
}
