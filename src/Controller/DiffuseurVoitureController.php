<?php

namespace App\Controller;

use App\Entity\DiffuseurVoiture;
use App\Repository\DiffuseurVoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiffuseurVoitureController extends AbstractController
{
    #[Route('/diffuseurvoiture/liste', name: 'app_liste_diffuseurvoiture', methods: ['GET'])]
    public function liste(DiffuseurVoitureRepository $repo): Response
    {
        $lesDiffuseursVoiture = $repo->findAll();
        return $this->render('diffuseurvoiture/listeDiffuseurvoiture.html.twig', [
            'LesDiffuseursVoiture' => $lesDiffuseursVoiture,
        ]);
    }
    #[Route('/diffuseurvoiture/{id}', name: 'app_fiche_diffuseurvoiture', methods: ['GET'])]
    public function fiche(int $id, DiffuseurVoitureRepository $repo): Response
    {
        $diffuseurVoiture = $repo->find($id);
        if (!$diffuseurVoiture) {
            throw $this->createNotFoundException('Le diffuseur voiture n\'a pas été trouvé.');
        }
        return $this->render('diffuseurvoiture/ficheDiffuseurvoiture.html.twig', [
            'diffuseurVoiture' => $diffuseurVoiture,
        ]);
    }
}
