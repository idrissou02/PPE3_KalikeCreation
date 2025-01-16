<?php

namespace App\Controller\Admin;

use App\Entity\Poudre;
use App\Form\PoudreType;

use App\Repository\PoudreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PoudreController extends AbstractController
{
    #[Route('/admin/poudre', name: 'admin_poudre', methods:"GET")]
    public function listePoudres(PoudreRepository $repo): Response
    {
        $poudres=$repo->listePoudres();
        return $this->render('admin/poudre/listePoudre.html.twig', [
            'lesPoudres' => $poudres
        ]);
    }
    
    #[Route('/admin/poudre/ajout', name: 'admin_poudre_ajout', methods:["GET","POST"])]
    #[Route('/admin/poudre/ajout/modif{id}', name: 'admin_poudre_modif', methods:["GET","POST"])]
    public function ajoutPoudre( Poudre $poudre=null, Request $request, EntityManagerInterface $manager): Response
    {
        if($poudre == null)
        {
            $poudre=new Poudre();
            $mode="ajouté";
        }else{
            $mode="modifié";
        }
        $form=$this->createForm(PoudreType::class, $poudre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($poudre);
            $manager->flush();
            $this->addFlash("success", "La poudre a bien été $mode");
            return$this->redirectToRoute('admin_poudre');
        }
        return $this->render('admin/poudre/formAjoutModifPoudre.html.twig', [
            'formPoudre' => $form->createView()
        ]);
    }

    #[Route('/admin/poudre/ajout/suppression{id}', name: 'admin_poudre_suppression', methods:"GET")]
    public function suppressionPoudre( Poudre $poudre=null, EntityManagerInterface $manager): Response
    {
            $manager->remove($poudre);
            $manager->flush();
            $this->addFlash("success", "La poudre a bien été suppression");
            return$this->redirectToRoute('admin_poudre');
    }
}
