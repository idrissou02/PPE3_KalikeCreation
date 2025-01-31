<?php

namespace App\Controller;

use App\Entity\Bougie;
use App\Model\FiltreBougie;
use App\Form\FiltreBougieType;
use App\Repository\BougieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BougieController extends AbstractController
{
    #[Route('/bougies', name: 'Bougies')]
    public function listeBougies(Request $request, BougieRepository $bougieRepository): Response
    {
        $formFiltreBougie = $this->createForm(FiltreBougieType::class);
        $formFiltreBougie->handleRequest($request);

      

        if ($formFiltreBougie->isSubmitted() && $formFiltreBougie->isValid()) {
            $searchTerm = $formFiltreBougie->get('nom')->getData();

            if (strlen($searchTerm) >= 2) {
                $bougies = $bougieRepository->findByNom($searchTerm);
            } else {
                $this->addFlash('info', 'Please enter at least 2 characters for the search.');
                $bougies = $bougieRepository->findAll();
            }
        } else {
            $bougies = $bougieRepository->findAll();
        }

        return $this->render('bougie/listeBougies.html.twig', [
            'FiltreBougie' => $formFiltreBougie->createView(),
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
