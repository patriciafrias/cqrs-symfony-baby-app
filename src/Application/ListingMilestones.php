<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;
use App\Infrastructure\Persistence\MilestoneRepositoryMySql;

class ListingMilestones
{
    private MilestoneRepositoryInterface $milestoneRepository;

    public function __construct(MilestoneRepositoryInterface $milestoneRepository)
    {
        $this->milestoneRepository = $milestoneRepository;
    }

    /**
     * @return Milestone[]|null
     */
    public function getAllMilestones(): ?array
    {
        return $this->milestoneRepository->findAll();
    }
}
