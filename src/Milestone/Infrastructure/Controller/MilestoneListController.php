<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Controller;

use App\Milestone\Application\ListingMilestonesService;
use App\Milestone\Infrastructure\Persistence\MilestoneRepositoryMySql;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MilestoneListController extends AbstractController
{
    /**
     * @Route("/milestone-list", name="milestone_list")
     *
     * @Template("milestone/list.html.twig")
     */
    public function __invoke(MilestoneRepositoryMySql $milestoneRepositoryMySql): array
    {
        $milestoneListService = new ListingMilestonesService($milestoneRepositoryMySql);

        return [
            'milestones' => $milestoneListService->getAllMilestones(),
        ];
    }
}
