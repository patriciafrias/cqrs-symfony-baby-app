<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Controller;

use App\Milestone\Application\SaveNewMilestone;
use App\Milestone\Infrastructure\Persistence\MilestoneRepositoryMySql;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewMilestoneController extends AbstractController
{
    /**
     * @Route("/new-milestone", methods={"GET", "POST"}, name="new-milestone")
     * @Template("home.html.twig")
     */
    public function __invoke(MilestoneRepositoryMySql $milestoneRepositoryMySql, Request $request): array
    {
        $saveNewMilestoneService = new SaveNewMilestone($milestoneRepositoryMySql);

        $saveNewMilestoneService->saveMilestone([
            'height' => $request->get('height')
        ]);

        return [
            'message' => 'New Milestone Added!'
        ];
    }
}
