<?php
namespace App\Controller;

use App\Dto\AddToCartDto;
use App\Form\Type\AddToCartType;
use App\Mapper\CartItemMapper;
use App\Service\CartHandlerInterface;
use App\Service\ProductServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{
    private const CART_IDENTIFIER = 'main';

    public function __construct(
        private CartHandlerInterface $cartHandler,
        private ProductServiceInterface $productService
        ) {}

    #[Route('', name: 'index', methods: ['GET'])]
    public function cart(): Response
    {
        $cart = $this->cartHandler->getCart(self::CART_IDENTIFIER);
        return $this->render(
            'cart/index.html.twig',
            [
                'cart' => $cart
            ]
            ); 
    }

    #[Route('/add', name: 'add', methods: ['POST'])]
    public function add(Request $request): Response
    {
        $dto = new AddToCartDto();
        $form = $this->createForm(AddToCartType::class, $dto);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $this->productService->getProductById($dto->productId);
            $item = CartItemMapper::ProductToCartItem($product, $dto->quantity);
            
            $this->cartHandler->addItem($item, self::CART_IDENTIFIER);
            $this->addFlash('success', 'Product added to cart.');
        }

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/remove/{id}', name: 'remove', methods: ['POST'])]
    public function remove(int $id): Response
    {
        $product = $this->productService->getProductById($id);
        $item = CartItemMapper::ProductToCartItem($product, 1);

        $this->cartHandler->removeItem($item, self::CART_IDENTIFIER);
        $this->addFlash('success', 'Product removed from cart.');

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/clear', name: 'clear', methods: ['POST'])]
    public function clear(): Response
    {
        $this->cartHandler->clearCart(self::CART_IDENTIFIER);
        $this->addFlash('success', 'Cart cleared.');

        return $this->redirectToRoute('cart_index');
    }
}
