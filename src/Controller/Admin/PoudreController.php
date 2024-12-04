<?php

namespace App\Controller\Admin;

use App\Repository\PoudreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PoudreController extends AbstractController
{
    #[Route('/admin/poudre', name: 'admin_poudre', methods:"GET")]
    public function listePoudres(PoudreRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $poudres = $paginator->paginate(
            $repo->listePoudreCompletePaginee(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            9 /*limit per page*/
        );
        return $this->render('admin/poudre/listePoudre.html.twig', [
            'lesPoudres' => $poudres
        ]);
    }
}
