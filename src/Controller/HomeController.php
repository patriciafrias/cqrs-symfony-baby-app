<?php
declare(strict_types=1);

namespace App\Controller;

use App\Application\MilestoneListing;
use App\Form\MilestoneType;
use App\Infrastructure\Persistence\MilestoneRepositoryInMemory;
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
    public function __invoke(Request $request): array
    {
        $milestoneListService = new MilestoneListing();

        return [
            'message' => '',
            'milestones' => $milestoneListService->getAllMilestones(),
        ];
    }
}
