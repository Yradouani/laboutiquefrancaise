<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/panier', name: 'app_cart')]
    public function index(Cart $cart): Response
    {
        $cartComplete = [];

        foreach ($cart->get() as $id => $quantity) {
            $cartComplete[] = [
                'product' => $this->entityManager->getRepository(Product::class)->findOneById($id),
                'quantity' => $quantity
            ];
        }


        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete
        ]);
    }


    #[Route('/cart/add/{id}', name: 'app_add_cart')]

    public function add(Cart $cart, $id): Response
    {
        $cart->add($id);
        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/remove', name: 'remove_cart')]

    public function remove(Cart $cart): Response
    {
        $cart->remove();
        return $this->redirectToRoute('home');
    }

    #[Route('/cart/delete/{id}', name: 'delete_cart')]

    public function delete(Cart $cart, $id): Response
    {
        $cart->delete($id);
        return $this->redirectToRoute('app_cart');
    }
}
