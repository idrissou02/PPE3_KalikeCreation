<?php

namespace App\Controller;

use App\Form\CartType;
use App\Entity\Produit;
use App\Manager\CartManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class CartController
 * @package App\Controller
 */
class CartController extends AbstractController
{
    #[Route('/cart', name: 'view_cart', methods: ['GET'])]
    public function index(CartManager $cartManager, Request $request): Response
    {
        $cart = $cartManager->getCurrentCart();

        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
        ]);
    }

    #[Route('/add-to-cart/{id}', name: 'add_to_cart', methods: ['POST'])]
    public function addToCart(Produit $produit, Request $request, EntityManagerInterface $cartManager): Response
    {
        $cart = $cartManager->getCurrentCart();
        $cartManager->addProductToCart($cart, $produit);

        $this->addFlash('success', 'Le produit a bien été ajouté au panier!');

        return $this->redirectToRoute('view_cart');
    }
}