<?php
declare(strict_types=1);

namespace App\Domain;

use DateTime;

class Milestone
{
    /**
     * @var Height
     */
    private $height;

    /**
     * @var DateTime
     */
    private $date;

    public function __construct(Height $height, DateTime $date)
    {
        $this->height = $height;
        $this->date = $date;
    }

    /**
     * @return Height
     */
    public function getHeight(): Height
    {
        return $this->height;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function __toString()
    {
        return $this->height . ': ' . $this->date->format('mdY');
    }
}
