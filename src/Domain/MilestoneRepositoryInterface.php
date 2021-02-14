<?php
declare(strict_types=1);

namespace App\Domain;

interface MilestoneRepositoryInterface
{
    public function persist(Milestone $milestone): void;

    public function remove(Milestone $milestone): void;

    public function findAll(): array;
}
