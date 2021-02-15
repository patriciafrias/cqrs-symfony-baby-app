<?php
declare(strict_types=1);

namespace App\Controller;

use App\Application\SaveNewMilestone;
use App\Form\MilestoneType;
use App\Infrastructure\Persistence\MilestoneRepositoryMySql;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", methods={"GET", "POST"}, name="home")
     * @Template("home.html.twig")
     */
    public function __invoke(MilestoneRepositoryMySql $milestoneRepositoryMySql, Request $request): array
    {
        $milestoneForm = $this->createForm(MilestoneType::class);

        $milestoneForm->handleRequest($request);

        if ($milestoneForm->isSubmitted() && $milestoneForm->isValid()) {
            $data = $milestoneForm->getData();

            $saveMilestoneService = new SaveNewMilestone($milestoneRepositoryMySql);

            $saveMilestoneService->saveMilestone($data);

            $this->addFlash('notice', 'New Milestone Added!');
        }

        return [
            'message' => '',
            'milestoneForm' => $milestoneForm->createView()
        ];
    }
}
