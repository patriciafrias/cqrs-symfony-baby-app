<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Height;
use App\Domain\Milestone;
use App\Infrastructure\Persistence\MilestoneRepositoryMySql;


class SaveNewMilestone
{
    private MilestoneRepositoryMySql $milestoneRepository;

    public function __construct(MilestoneRepositoryMySql $milestoneRepository)
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
