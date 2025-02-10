<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FondantController extends AbstractController
{
    #[Route('/fondant', name: 'app_fondant')]
    public function index(): Response
    {
        return $this->render('fondant/index.html.twig', [
            'controller_name' => 'FondantController',
        ]);
    }
}
