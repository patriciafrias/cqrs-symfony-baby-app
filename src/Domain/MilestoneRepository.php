<?php
declare(strict_types=1);

namespace App\Domain;

interface MilestoneRepository
{
    public function persist(Milestone $milestone);

    public function remove(Milestone $milestone);
}
