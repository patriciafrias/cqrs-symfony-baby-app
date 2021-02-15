<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Milestone;
use App\Milestone\Domain\MilestoneRepositoryInterface;

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
