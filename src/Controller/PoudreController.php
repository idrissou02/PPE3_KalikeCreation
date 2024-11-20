<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BougieController extends AbstractController
{
    #[Route('/bougie', name: 'bougie', methods: 'GET')]
    public function listeBougie(PoudreRepository $repo): Response
    {
        $poudres=$repo->ListePoudres();
        return $this->render('bougie/listeBougies.html.twig', [
            'LesPoudres' => $poudres
        ]);
    }
    #[Route('/bougie/{id}', name: 'ficheBougie', methods: 'GET')]
    public function FicheBougie(Poudre $bougie)
    {
        return $this->render('bougie/FicheBougie.html.twig', [
            'LaBougies' => $bougie
        ]);
    }

}