<?php

namespace Faker;

/**
 * Minimal stub for IDE static analysis only (before composer install).
 *
 * @see https://github.com/FakerPHP/Faker/blob/main/src/Faker/Generator.php
 */
class Generator
{
    public function sentence(int $nbWords = 6, bool $variableNbWords = true): string
    {
        return '';
    }

    public function paragraph(int $nbSentences = 3, bool $variableNbSentences = true): string
    {
        return '';
    }

    /**
     * @param  \DateTime|string  $startDate
     * @param  \DateTime|string  $endDate
     */
    public function dateTimeBetween($startDate = '-30 years', $endDate = 'now', ?string $timezone = null): \DateTimeInterface
    {
        return new \DateTimeImmutable;
    }

    public function dateTime(?string $timezone = null): \DateTimeInterface
    {
        return new \DateTimeImmutable;
    }

    public function city(): string
    {
        return '';
    }
}
