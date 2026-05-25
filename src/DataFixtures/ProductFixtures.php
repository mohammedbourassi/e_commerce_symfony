<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CategoryRepository;

class ProductFixtures extends Fixture
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }

    public static function getGroups(): array
    {
        return ['product'];
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $product = new Product()
        ->setName('Airbods Pro')
        ->setDescription('Description of Product 1')
        ->setPrice(19.99)
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
        ->setImage('images/airbods.jpg')
        ->setCategory($this->categoryRepository->findOneBy(['name' => 'Electronics']));
        $manager->persist($product);

        $product = new Product()
        ->setName('Wireless Mouse')
        ->setDescription('Description of Product 2')
        ->setPrice(29.99)
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
        ->setImage('images/wireless-mouse.jpg')
        ->setCategory($this->categoryRepository->findOneBy(['name' => 'Electronics']));
        $manager->persist($product);

        $product = new Product()
        ->setName('Mechanical Keyboard')
        ->setDescription('Description of Product 3')
        ->setPrice(49.99)
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
        ->setImage('images/mechanical-keyboard.jpg')
        ->setCategory($this->categoryRepository->findOneBy(['name' => 'Electronics']));
        $manager->persist($product);

        $product = new Product()
        ->setName('Gaming Headset')
        ->setDescription('Description of Product 4')
        ->setPrice(39.99)
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
        ->setImage('images/gaming-headset.jpg')
        ->setCategory($this->categoryRepository->findOneBy(['name' => 'Electronics']));
        $manager->persist($product);

        $product = new Product()
        ->setName('Wireless Headphones')
        ->setDescription('Description of Product 5')
        ->setPrice(19.99)
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
        ->setImage('images/wireless-headphones.jpg')
        ->setCategory($this->categoryRepository->findOneBy(['name' => 'Electronics']));
        $manager->persist($product);

        $product = new Product()
        ->setName('Bluetooth Speakers')
        ->setDescription('Description of Product 6')
        ->setPrice(29.99)
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
        ->setImage('images/bluetooth-speakers.jpg')
        ->setCategory($this->categoryRepository->findOneBy(['name' => 'Electronics']));
        $manager->persist($product);

        $manager->flush();
    }
    
}
