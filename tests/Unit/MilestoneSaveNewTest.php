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
    public function milestoneSaveNew_shouldSaveIt()
    {
        $milestoneRepository = new MilestoneRepositoryInMemory([]);

        $newMilestone = new Milestone(Height::create(55));

        $milestoneRepository->persist($newMilestone);

        $this->assertCount(1, $milestoneRepository->findAll());
    }

    /**
     * @test
     * @todo move to value object - only Height
     */
    public function milestoneSaveNew_withWrongInput_shouldThrowAnException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->expectExceptionMessage('Enter a valid baby height');

        $milestoneRepository = new MilestoneRepositoryInMemory([]);

        $milestoneRepository->persist(new Milestone(Height::create(-1)));
    }
}
