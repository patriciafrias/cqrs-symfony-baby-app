<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Height;
use App\Milestone\Domain\Milestone;
use App\Milestone\Domain\MilestoneRepositoryInterface;

class SaveNewMilestoneService
{
    private MilestoneRepositoryInterface $milestoneRepository;

    public function __construct(MilestoneRepositoryInterface $milestoneRepository)
    {
        $this->milestoneRepository = $milestoneRepository;
    }

    public function saveMilestone(Height $height): void
    {
        $milestone = new Milestone($height);

        $this->milestoneRepository->persist($milestone);
    }
}
