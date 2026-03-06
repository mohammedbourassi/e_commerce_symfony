<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'browse_categories')]
    public function categories(): Response
    {
        return $this->render('categories/index.html.twig');
    }

    #[Route('/category/{id}', name: 'products_by_category')]
    public function productsByCategory(int $id): Response
    {
        return $this->render('categories/product_by_category.html.twig');
    }
}