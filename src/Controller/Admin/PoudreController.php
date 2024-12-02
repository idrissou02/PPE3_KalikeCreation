<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoudreController extends AbstractController
{
    #[Route('Admin/poudre', name: 'Admin_poudres', methods: 'GET')]
    public function listePoudre(PoudreRepository $repo): Response
    {
        $poudres=$paginator->paginate(
            $repos->listePoudresCompletePaginee(),
            $request->query->getInt('page',1),/*page number*/
            9/*limite per page*/
        );
        return $this->render('poudre/listePoudres.html.twig', [
            'LesPoudres' => $poudres
        ]);
    }
}
