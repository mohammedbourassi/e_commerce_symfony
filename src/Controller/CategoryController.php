<?php

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryServiceInterface $categoryService
    ) {}
    #[Route('/categories', name: 'browse_categories')]
    public function categories(): Response
    {
        $categories = $this->categoryService->getAllCategories();
        return $this->render('categories/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/categories/{id}', name: 'products_by_category')]
    public function productsByCategory(int $id): Response
    {
        $categoryWithProducts = $this->categoryService->getCategoryWithProducts($id);
        
        return $this->render('categories/product_by_category.html.twig',
            [
                "categoryWithProducts" => $categoryWithProducts
            ]
        );
    }
}