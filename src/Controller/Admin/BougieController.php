<?php

namespace App\Controller\Admin;

use App\Entity\Bougie;
use App\Form\BougieType;
use App\Form\FiltreBougieType;
use App\Repository\BougieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BougieController extends AbstractController
{
    #[Route('/admin/bougie', name: 'admin_Bougie',methods:["GET","POST"])]
    public function listeBougie(BougieRepository $repo, Request $request): Response
    {
        $formFiltreBougie = $this->createForm(FiltreBougieType::class);
        $formFiltreBougie->handleRequest($request);
        if ($formFiltreBougie->isSubmitted() && $formFiltreBougie->isValid()) {
            $nom = $formFiltreBougie->get('nom')->getData();
            $bougies = $repo->ListeBougies($nom);
        } else {
            $bougies = $repo->ListeBougies(); 
        }   

        return $this->render('admin/bougie/listeBougies.html.twig', [
            'lesBougies' => $bougies,
            'FiltreBougie' => $formFiltreBougie->createView()
        ]);
    }

    #[Route('/admin/bougie/ajout', name: 'admin_bougie_ajout', methods:["GET","POST"])]
    #[Route('/admin/bougie/modif/{id}', name: 'admin_bougie_modif', methods:["GET","POST"])]
    public function ajoutModifBougie(Bougie $bougie=null ,Request $request, EntityManagerInterface $manager): Response
    {
        if($bougie == null)
        {
            $bougie=new Bougie();
            $mode = 'ajoutée';
        }else {
            $mode = "modifiée";
        }
               
        $form=$this->createForm(BougieType::class, $bougie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($bougie);
            $manager->flush();
             $this->addFlash("success","La bougie a été $mode");
            return$this->redirectToRoute('admin_Bougie');
        }
        return $this->render('admin/Bougie/formAjoutModifBougie.html.twig', [
            'formBougie' => $form->createView()
        ]);
    }

    #[Route('/admin/bougie/suppr/{id}', name: 'admin_bougie_suppr', methods: ["GET"])]
    public function supprBougie(Bougie $bougie, EntityManagerInterface $manager)
    {
            $manager->remove($bougie);
            $manager->flush(); 
            $this->addFlash("success","La bougie a été supprimée");
            return$this->redirectToRoute('admin_Bougie');

    }

}
