<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category;
        $category->setName("Biscuits");
        $category->setDescription("All types of biscuits");
        $category->getImageUrl("");
        
        $manager->persist($category);

        $category = new Category;
        $category->setName("Oils");
        $category->setDescription("Edible oil");
        $category->getImageUrl("");

        $manager->persist($category);

        $manager->flush();
    }
}
