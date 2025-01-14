<?php

namespace App\Controller\Admin;

use App\Entity\Bougie;
use App\Form\BougieType;
use App\Repository\BougieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BougieController extends AbstractController
{
    #[Route('/admin/bougie', name: 'admin_Bougie')]
    public function listeBougie(BougieRepository $repo): Response
    {
        $bougies=$repo->ListeBougies();
        return $this->render('admin/bougie/listeBougies.html.twig', [
            'lesBougies' => $bougies
        ]);
    }

    #[Route('/admin/bougie/ajout', name: 'admin_bougie_ajout', methods:["GET","POST"])]
    public function ajoutBougie( Request $request, EntityManagerInterface $manager): Response
    {
        $Bougie=new Bougie();   
        $form=$this->createForm(BougieType::class, $Bougie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($Bougie);
            $manager->flush();
             $this->addFlash("success",'La bougie a été ajoutée');
            return$this->redirectToRoute('admin_Bougie');
        }
        return $this->render('admin/Bougie/formAjoutBougie.html.twig', [
            'formBougie' => $form->createView()
        ]);
    }

    #[Route('/admin/bougie/modif/{id}', name: 'admin_bougie_modif', methods:["GET","POST"])]
    public function modifBougie(Bougie $bougie, Request $request, EntityManagerInterface $manager): Response
    {
           
        $form=$this->createForm(BougieType::class, $bougie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($bougie);
            $manager->flush();
             $this->addFlash("success",'La bougie a été modifiée');
            return$this->redirectToRoute('admin_Bougie');
        }
        return $this->render('admin/Bougie/formModifBougie.html.twig', [
            'formBougie' => $form->createView()
        ]);
    }
}
