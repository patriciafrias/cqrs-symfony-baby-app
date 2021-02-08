<?php
declare(strict_types=1);

namespace App\Domain;

interface MilestoneRepository
{
    public function save(Milestone $milestone);

    public function delete(Milestone $milestone);
}