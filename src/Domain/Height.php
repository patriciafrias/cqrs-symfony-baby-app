<?php
declare(strict_types=1);

namespace App\Domain;

class Height
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 50 || $value > 100) {
            return new \InvalidArgumentException('Enter a valid baby height in cm');
        }

        $this->value = $value;
    }

    public function height(): float
    {
        return $this->value;
    }

    public static function create(float $value): self
    {
        return new static($value);
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
