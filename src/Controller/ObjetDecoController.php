<?php
namespace App\Controller;

use App\Entity\ObjetDeco;
use App\Form\ObjetDecoType;
use App\Repository\ObjetDecorationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ObjetDecoController extends AbstractController
{

    #[Route('/objetdecoration/liste', name: 'app_liste_objetdecoration', methods: ['GET'])]
    public function liste(ObjetDecorationRepository $repo): Response
    {
        $lesObjetsDeco = $repo->findAll();
        return $this->render('objetdecoration/listeObjetdecoration.html.twig', [
            'LesObjetsDeco' => $lesObjetsDeco,
        ]);
    }

    #[Route('/objetdecoration/{id}', name: 'app_fiche_objetdecoration', methods: ['GET'])]
    public function fiche(int $id, ObjetDecorationRepository $repo): Response
    {
        $objetDeco = $repo->find($id);
        if (!$objetDeco) {
            throw $this->createNotFoundException('L\'objet décoratif n\'a pas été trouvé.');
        }
        return $this->render('objetdecoration/ficheObjetdecoration.html.twig', [
            'objetDeco' => $objetDeco,
        ]);
    }

    #[Route('/admin/objetdecoration/ajouter', name: 'admin_objetdecoration_ajouter', methods: ['GET', 'POST'])]
    public function ajouter(Request $request): Response
    {
        $objetDeco = new ObjetDeco();
        $form = $this->createForm(ObjetDecoType::class, $objetDeco);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objetDeco);
            $entityManager->flush();

            $this->addFlash('success', 'Objet décoratif ajouté avec succès.');
            return $this->redirectToRoute('app_liste_objetdecoration');
        }

        return $this->render('objetdecoration/ajouterObjetdecoration.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/objetdecoration/modifier/{id}', name: 'admin_objetdecoration_modifier', methods: ['GET', 'POST'])]
    public function modifier(int $id, Request $request, ObjetDecorationRepository $repo): Response
    {
        $objetDeco = $repo->find($id);
        if (!$objetDeco) {
            throw $this->createNotFoundException('L\'objet décoratif n\'a pas été trouvé.');
        }

        $form = $this->createForm(ObjetDecoType::class, $objetDeco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Objet décoratif modifié avec succès.');
            return $this->redirectToRoute('app_liste_objetdecoration');
        }

        return $this->render('objetdecoration/modifierObjetdecoration.html.twig', [
            'form' => $form->createView(),
            'objetDeco' => $objetDeco
        ]);
    }

    // 5. Supprimer un objet décoratif
    #[Route('/admin/objetdecoration/supprimer/{id}', name: 'admin_objetdecoration_supprimer', methods: ['POST'])]
    public function supprimer(int $id, ObjetDecorationRepository $repo): Response
    {
        $objetDeco = $repo->find($id);
        if ($objetDeco) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objetDeco);
            $entityManager->flush();

            $this->addFlash('success', 'Objet décoratif supprimé avec succès.');
        } else {
            $this->addFlash('error', 'Objet décoratif introuvable.');
        }

        return $this->redirectToRoute('app_liste_objetdecoration');
    }
}
