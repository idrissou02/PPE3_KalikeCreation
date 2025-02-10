<?php

namespace App\Controller;

use App\Entity\Fondant;
use App\Model\FiltreFondant;
use App\Form\FiltreFondantType;
use App\Repository\FondantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class FondantController extends AbstractController
{
    #[Route('/Fondants', name: 'Fondants')]
    public function listeFondants(Request $request, FondantRepository $FondantRepository): Response
    {
        $formFiltreFondant = $this->createForm(FiltreFondantType::class);
        $formFiltreFondant->handleRequest($request);

      

        if ($formFiltreFondant->isSubmitted() && $formFiltreFondant->isValid()) {
            $searchTerm = $formFiltreFondant->get('nom')->getData();

            if (strlen($searchTerm) >= 2) {
                $Fondants = $FondantRepository->findByNom($searchTerm);
            } else {
                $this->addFlash('info', 'Please enter at least 2 characters for the search.');
                $Fondants = $FondantRepository->findAll();
            }
        } else {
            $Fondants = $FondantRepository->findAll();
        }

        return $this->render('Fondant/listeFondants.html.twig', [
            'FiltreFondant' => $formFiltreFondant->createView(),
            'LesFondants' => $Fondants,
        ]);
    }
    
    #[Route('/Fondant/{id}', name: 'ficheFondant', methods: 'GET')]
    public function FicheFondant(Fondant $Fondant): Response    
    {
        return $this->render('Fondant/FicheFondant.html.twig', [
            'LaFondant' => $Fondant
            
        ]);
    }

    #[Route('/Fondant/{id}/add-to-cart', name: 'add_to_cart', methods: ['POST'])]
    public function addToCart(Fondant $Fondant, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Logic to add the Fondant to the cart
        // For example, you can use a session to store the cart items
        $cart = $request->getSession()->get('cart', []);
        $cart[] = $Fondant->getId();
        $request->getSession()->set('cart', $cart);

        $this->addFlash('success', 'la Fondant a bien été ajouté au panier!');

        return $this->redirectToRoute('ficheFondant', ['id' => $Fondant->getId()]);
    }
}
