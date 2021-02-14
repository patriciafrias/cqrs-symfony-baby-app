<?php
declare(strict_types=1);

namespace App\Controller;

use App\Application\ListingMilestones;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MilestoneListController extends AbstractController
{
    /**
     * @Route("/milestone-list", name="milestone_list")
     *
     * @Template("milestone/list.html.twig")
     */
    public function __invoke(): array
    {
        $milestoneListService = new ListingMilestones();

        return [
            'milestones' => $milestoneListService->getAllMilestones(),
        ];
    }
}
