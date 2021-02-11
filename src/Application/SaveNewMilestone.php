<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Height;
use App\Domain\Milestone;
use App\Infrastructure\Persistence\MilestoneRepositoryInMemory;

class SaveNewMilestone
{
    /**
     * @todo replace InMemoryRepo with MySqlRepo
     */
    public function saveMilestone(array $data): void
    {
        if (!array_key_exists('height', $data)) {
            throw new \InvalidArgumentException('Unable to save milestone without a height.');
        }

        $milestoneRepository = new MilestoneRepositoryInMemory([]);

        $milestone = new Milestone(
            Height::create((float)$data['height']),
            new \DateTime('now')
        );

        $milestoneRepository->persist($milestone);
    }
}
