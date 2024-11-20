<?php

namespace App\Controller;

use App\Entity\Bougie;
use App\Repository\BougieRepository;
use App\Repository\ObjetDecorationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ObjetDecoController extends AbstractController
{
    #[Route('/objetdecoration', name: 'app_objetdecoration', methods: 'GET')]
    public function listeObjetDeco(ObjetDecorationRepository $repo): Response
    {
        $objetDeco=$repo->findAll();
        return $this->render('objetdecoration/listeObjetdecoration.html.twig', [
            'LesObjetsDeco' => $objetDeco
        ]);
    }
}
