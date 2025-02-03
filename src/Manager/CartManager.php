<?php

namespace App\Manager;

use App\Entity\Cart;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartManager
{
    private $session;
    private $entityManager;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    public function getCurrentCart(): Cart
    {
        $cart = $this->session->get('cart', new Cart());
        if (!$cart->getId()) {
            $this->entityManager->persist($cart);
            $this->entityManager->flush();
            $this->session->set('cart', $cart);
        }
        return $cart;
    }

    public function addProductToCart(Cart $cart, Produit $produit): void
    {
        $cart->addItem($produit);
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
    }

    public function save(Cart $cart): void
    {
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
    }
}