<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\MilestoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/")
     */
    public function new(Request $request): Response
    {
        $form = $this->createForm(MilestoneType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $milestone = $form->getData();

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($milestone);
             $entityManager->flush();

//            return $this->redirectToRoute('success');
        }

        return $this->render('milestone/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
