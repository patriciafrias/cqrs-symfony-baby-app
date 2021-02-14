<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Milestone;
use App\Infrastructure\Persistence\MilestoneRepositoryMySql;

class ListingMilestones
{
    private MilestoneRepositoryMySql $milestoneRepository;

    public function __construct(MilestoneRepositoryMySql $milestoneRepository)
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
