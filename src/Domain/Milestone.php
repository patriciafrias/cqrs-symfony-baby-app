<?php
declare(strict_types=1);

namespace App\Domain;

use DateTime;

class Milestone
{
    /**
     * @var Id
     */
    private $id;

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
        $this->id = Id::create();
        $this->height = $height;
        $this->date = $date;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getHeight(): Height
    {
        return $this->height;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }
}
