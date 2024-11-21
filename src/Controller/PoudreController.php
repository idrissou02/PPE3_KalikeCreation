<?php

namespace App\Controller;

use App\Entity\Poudre;
use App\Repository\PoudreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PoudreController extends AbstractController
{
    #[Route('/bougie', name: 'bougie', methods: 'GET')]
    public function listePoudre(PoudreRepository $repo): Response
    {
        $poudres=$repo->ListePoudres();
        return $this->render('poudre/listePoudres.html.twig', [
            'LesPoudres' => $poudres
        ]);
    }
    #[Route('/poudre/{id}', name: 'fichePoudre', methods: 'GET')]
    public function FichePoudre(Poudre $poudre)
    {
        return $this->render('poudre/FichePoudre.html.twig', [
            'LaPoudre' => $poudre
        ]);
    }
}
