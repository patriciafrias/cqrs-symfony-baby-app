<?php
declare(strict_types=1);

namespace App\Tests\App\Milestone;

use App\Domain\Height;
use App\Domain\Milestone;
use PHPUnit\Framework\TestCase;

final class MilestoneCreationTest extends TestCase
{


    /**
     * @test
     */
    public function testCreateMilestone(): void
    {
        $milestone = new Milestone(
            Height::create(-1),
            new \DateTime('now')
        );

        $this->assertTrue($milestone->getHeight()->height() === 62);
    }
}
