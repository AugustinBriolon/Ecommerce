<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\ProductCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $productCategories = ['Iphone', 'IPad', 'Ipod', 'Mac', 'IMac',
        'Watch', 'AirPods', 'TV', 'Home', 'Accessoires'];

        foreach ($productCategories as $productCategorie) {
            $productCategorieEntity = new ProductCategorie();
            $productCategorieEntity->setName($productCategorie);

            $manager->persist($productCategorieEntity);

        for ($i = 1; $i <= 20; $i++) {
            $products = new Product();
            $products->setProductCategorie($productCategorieEntity);
            $products->setName($productCategorie);
            $products->setPrice(rand(100, 1000) / 1);
            $products->setStock(rand(100, 1000) / 2);
            $products->setDescription('This is the best you can find !');

            $manager->persist($products);
        }

    }

    for ($i = 1; $i <= 50; $i++) {
        $user = new User;
        $user->setEmail('user' . $i . '@apple.com');
        $password = $this->hasher->hashPassword($user, 'password');
        $user->setPassword($password);
        $user->setRoles([
            'ROLE_ADMIN',
            'ROLE_USER'
        ]);

        $manager->persist($user);
    }

    $manager->flush();
}
}
