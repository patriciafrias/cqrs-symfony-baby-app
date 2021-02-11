<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Id;
use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;
use Doctrine\ORM\EntityManager;

final class MilestoneRepositoryMySql implements MilestoneRepositoryInterface
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    public function persist(Milestone $milestone): void
    {
        $this->entityManager->persist($milestone);
        $this->entityManager->flush($milestone);
    }

    public function remove(Milestone $milestone): void
    {
        $this->entityManager->remove($milestone);
        $this->entityManager->flush($milestone);
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function find(Id $milestoneId): ?Milestone
    {
        // TODO: Implement findById() method.
    }
}
