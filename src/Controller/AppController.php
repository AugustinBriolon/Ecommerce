<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\ProductCategorieRepository;
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
        ProductCategorieRepository $ProductCategorieRepository
    )
    {
        $productCategories = $ProductCategorieRepository->findAll();
        $products = $productRepository->findBy([], [], 8);

        return $this->render('partial/nav.html.twig', [
            'productCategories' => $productCategories,
            'products' => $products
        ]);
    }

}