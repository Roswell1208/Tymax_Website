<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use App\Entity\Prestations;

class MainController extends AbstractController
{
    #[Route('', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }


    #[Route('/prestations', name: 'prestations')]
    public function listPresta(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Prestations::class);
        $prestas = $repository->findAll();

        return $this->render('main/prestations.html.twig', [
            'controller_name' => 'MainController',
            'prestas' => $prestas
        ]);
    }
}
