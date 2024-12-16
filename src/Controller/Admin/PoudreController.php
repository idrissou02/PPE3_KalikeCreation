<?php

namespace App\Controller\Admin;

use App\Entity\Poudre;
use App\Form\PoudreType;
use App\Repository\PoudreRepository;
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

    #[Route('/admin/poudre/ajout', name: 'admin_poudre_ajout', methods:"GET")]
    public function ajoutPoudres(): Response
    {
        $poudre=new Poudre();
        $form=$this->createForm(PoudreType::class,);
        return $this->render('admin/poudre/formAjoutPoudre.html.twig', [
            'formPoudre' => $form->createView()
        ]);
    }
}
