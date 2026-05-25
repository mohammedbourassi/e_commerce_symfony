<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Electronics')
        ->setDescription('Headphones, speakers, gadgets and more');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Fashion')
        ->setDescription('Clothing, accessories and footwear');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Home & Garden')
        ->setDescription('Furniture, decor and gardening tools');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Toys & Games')
        ->setDescription('Fun for kids and family entertainment');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Automotive')
        ->setDescription('Car accessories and maintenance tools');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Health & Beauty')
        ->setDescription('Skincare, cosmetics and wellness');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Sport & Fitness')
        ->setDescription('Workout gear, yoga mats and equipment');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Books')
        ->setDescription('Fiction, non-fiction and educational');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Pet Supplies')
        ->setDescription('Food, toys and accessories for your pets');
        $manager->persist($category);

        $manager->flush();
    }
}