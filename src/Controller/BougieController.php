<?php

namespace App\Controller;

use App\Entity\Bougie;
use App\Form\FiltreBougieType;
use App\Repository\BougieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BougieController extends AbstractController
{
    #[Route('/bougie', name: 'bougie', methods: 'GET')]
    public function listeBougie(BougieRepository $repo): Response
    {
         
        $bougies=$repo->ListeBougies();
        return $this->render('bougie/listeBougies.html.twig', [
            'LesBougies' => $bougies,
        ]);
    }
    
    #[Route('/bougie/{id}', name: 'ficheBougie', methods: 'GET')]
    public function FicheBougie(Bougie $bougie): Response    
    {
        return $this->render('bougie/FicheBougie.html.twig', [
            'LaBougie' => $bougie
            
        ]);
    }

}
