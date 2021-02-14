<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Height;
use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;
use App\Infrastructure\Persistence\MilestoneRepositoryMySql;


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
