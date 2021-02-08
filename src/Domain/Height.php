<?php
declare(strict_types=1);

namespace App\Domain;


class Height
{
    /** @var float */
    private $value;

    public function __construct(float $value)
    {
        if ($value < 50 || $value > 100) {
            return new \InvalidArgumentException('Enter a valid baby height in cm');
        }

        $this->value = $value;
    }

    /** @todo add create static method - continue with the infrastructure doctrine type */
//    public static function create(int $order): self
//    {
//        return new static($order);
//    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}