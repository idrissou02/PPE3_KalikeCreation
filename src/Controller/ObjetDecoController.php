<?php

namespace App\Controller;

use App\Repository\ObjetDecorationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ObjetDecoController extends AbstractController
{
  
    #[Route('/objetdecoration', name: 'app_objetdecoration', methods: 'GET')]
    public function listeObjetDeco(ObjetDecorationRepository $repo): Response
    {
        $objetDeco = $repo->findAll();
        return $this->render('objetdecoration/listeObjetdecoration.html.twig', [
            'LesObjetsDeco' => $objetDeco
        ]);
    }

    #[Route('/objetdecoration/{id}', name: 'app_fiche_objetdecoration', methods: 'GET')]
    public function ficheObjetDeco(int $id, ObjetDecorationRepository $repo): Response
    {
     
        $objetDeco = $repo->find($id);
        if (!$objetDeco) {
            throw $this->createNotFoundException('Objet décoratif non trouvé');
        }
        return $this->render('objetdecoration/ficheObjetdecoration.html.twig', [
            'objet' => $objetDeco
        ]);
    }
}
