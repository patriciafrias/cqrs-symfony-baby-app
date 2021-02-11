<?php
declare(strict_types=1);

namespace App\Controller;

use App\Application\SaveNewMilestone;
use App\Form\MilestoneType;
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
    public function __invoke(Request $request): array
    {
        $saveNewMilestoneService = new SaveNewMilestone();

        $saveNewMilestoneService->saveMilestone([
            'height' => $request->get('height')
        ]);

        return [
            'message' => 'New Milestone Added!'
        ];
    }
}
