<?php

namespace App\Controller\Admin;

use App\Entity\ProductCategorie;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductCategorie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('name'),
            ImageField::new('picture')
                ->setUploadDir('public/uploads/productCategorie')
                ->setBasePath('uploads/productCategorie')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/*'
                    ]
                ])
        ];
    }
}

