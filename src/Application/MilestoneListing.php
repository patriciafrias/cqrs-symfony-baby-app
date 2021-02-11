<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Height;
use App\Domain\Milestone;
use App\Infrastructure\Persistence\MilestoneRepositoryInMemory;

class MilestoneListing
{
    /**
     * @return Milestone[]|null
     */
    public function getAllMilestones(): ?array
    {
        $milestoneRepository = new MilestoneRepositoryInMemory([
            new Milestone(
                Height::create(51),
                new \DateTime('now')
            ),
            new Milestone(
                Height::create(53),
                new \DateTime('now')
            )
        ]);

        return $milestoneRepository->findAll();
    }
}
