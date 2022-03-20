<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\ProductCategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductCategorieIDController extends AbstractController
{
    #[Route('/productCategories/{id}', name: 'app_productCategoriesID')]
    public function index(
        ProductRepository $productRepository,
        ProductCategorieRepository $productCategorieRepository
    ): Response
    {
        $product = $productRepository->findBy(['productCategorie' => $id]);
        $productCategories = $productCategorieRepository->findAll();
        

        return $this->render('product_categorie_id/index.html.twig', [
            'product' => $product,
            'productCategories' => $productCategories
        ]);
    }
}
