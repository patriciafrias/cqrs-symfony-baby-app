<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Id;
use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;

class MilestoneRepositoryInMemory implements MilestoneRepositoryInterface
{
    private array $milestones = [];

    public function __construct(array $milestones)
    {
        $this->milestones = $milestones;
    }

    public function persist(Milestone $milestone): void
    {
        $this->milestones[$milestone->getId()->id()] = clone $milestone;
    }

    public function remove(Milestone $milestone): void
    {
        unset($milestone[$milestone->getId()->id()], $this->milestones);
    }

    public function findAll(): array
    {
        return array_map(function (Milestone $milestone) {
            return clone $milestone;
        }, $this->milestones);
    }

    public function find(Id $milestoneId): ?Milestone
    {
        if (!array_key_exists($milestoneId->id(), $this->milestones)) {
            return null;
        }

        return clone $this->milestones[$milestoneId->id()];
    }
}
