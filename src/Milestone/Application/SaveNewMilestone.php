<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Height;
use App\Milestone\Domain\Milestone;
use App\Milestone\Domain\MilestoneRepositoryInterface;

class SaveNewMilestone
{
    private MilestoneRepositoryInterface $milestoneRepository;

    public function __construct(MilestoneRepositoryInterface $milestoneRepository)
    {
        $this->milestoneRepository = $milestoneRepository;
    }

    public function saveMilestone(array $data): void
    {
        if (!array_key_exists('height', $data)) {
            throw new \InvalidArgumentException('Unable to save milestone without a height.');
        }

        $milestone = new Milestone(
            Height::create((float)$data['height'])
        );

        $this->milestoneRepository->persist($milestone);
    }
}
