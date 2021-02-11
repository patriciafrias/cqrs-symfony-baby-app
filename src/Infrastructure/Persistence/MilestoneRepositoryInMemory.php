<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Id;
use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;

class MilestoneRepositoryInMemory implements MilestoneRepositoryInterface
{

    public function persist(Milestone $milestone): void
    {

    }

    public function remove(Milestone $milestone): void
    {
        // TODO: Implement remove() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function find(Id $milestoneId): Milestone
    {
        // TODO: Implement findById() method.
    }
}
