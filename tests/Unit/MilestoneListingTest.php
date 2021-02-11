<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Domain\Height;
use App\Domain\Milestone;
use App\Domain\MilestoneRepositoryInterface;
use App\Infrastructure\Persistence\MilestoneRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class MilestoneListingTest extends TestCase
{
    /**
     * @test
     */
    public function milestoneList_returnsAllMilestones()
    {
        $milestoneRepository = new MilestoneRepositoryInMemory([
            new Milestone(Height::create(51), new \DateTime('now')),
            new Milestone(Height::create(52), new \DateTime('now')),
        ]);

        $milestoneList = $milestoneRepository->findAll();

        $this->assertCount(2, $milestoneList);
    }
}
