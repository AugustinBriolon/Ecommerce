<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\ProductCategorieRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(
        ProductCategorieRepository $ProductCategorieRepository
    ): Response
    {
        $productCategories = $ProductCategorieRepository->findAll();

        return $this->render('app/index.html.twig', [
            'productCategories' => $productCategories,
        ]);
    }

    public function nav(
        ProductRepository  $productRepository,
        ProductCategorieRepository $ProductCategorieRepository,
        UserRepository $userRepository
    )
    {
        $productCategories = $ProductCategorieRepository->findAll();
        $products = $productRepository->findBy([], [], 8);
        $user = $userRepository->findAll();

        return $this->render('partial/nav.html.twig', [
            'productCategories' => $productCategories,
            'products' => $products,
            'user' => $user
        ]);
    }

}