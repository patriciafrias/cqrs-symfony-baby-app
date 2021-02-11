<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Domain\Height;
use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;
use App\Infrastructure\Persistence\MilestoneRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class MilestoneSaveNewTest extends TestCase
{
    /**
     * @test
     */
    public function milestoneList_returnsAllMilestones()
    {
        $milestoneRepository = new MilestoneRepositoryInMemory([]);

        $newMilestone = new Milestone(Height::create(55), new \DateTime('now'));

        $milestoneRepository->persist($newMilestone);

        $this->assertCount(1, $milestoneRepository->findAll());
    }
}
