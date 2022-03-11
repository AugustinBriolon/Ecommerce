<?php

namespace App\Controller\Admin;

use App\Entity\ProductCategorie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductCategorie::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
