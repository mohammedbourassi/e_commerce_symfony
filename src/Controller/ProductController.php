<?php
namespace App\Controller;

use App\Form\Type\AddToCartType;
use App\Service\ProductServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function __construct(private readonly ProductServiceInterface $productService)
    {
    }
    #[Route('/product/{id}', name: 'product_details')]
    public function details(int $id): Response
    {
        $product = $this->productService->getProductById($id);
        $form = $this->createForm(AddToCartType::class, null, [
            'product_id' => $product->getId(),
            'quantity' => 1,
            'action' => $this->generateUrl('cart_add'), 
            'method' => 'POST'
        ]);
        return $this->render('product/index.html.twig',
            [
                'product' => $product,
                'form' => $form->createView()

            ]
        );
    }
}