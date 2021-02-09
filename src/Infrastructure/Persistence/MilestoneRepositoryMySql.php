<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Milestone;
use App\Domain\MilestoneRepository;
use Doctrine\ORM\EntityManager;

final class MilestoneRepositoryMySql implements MilestoneRepository
{
    /**
     * @var EntityManager
     */
    private $entityManager;

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
}
