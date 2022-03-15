<?php

namespace App\Controller;

use App\Repository\ProductCategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductCategorieController extends AbstractController
{
    #[Route('/productCategories', name: 'app_productCategories')]
    public function index(ProductCategorieRepository $productCategorieRepository): Response
    {
        $productCategories = $productCategorieRepository->findAll();

        return $this->render('productCategorie/index.html.twig', [
            'productCategories' => $productCategories
        ]);
    }
}
