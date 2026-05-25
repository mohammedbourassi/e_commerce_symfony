<?php
namespace App\Controller;

use App\Form\Type\LoginType;
use App\Form\Type\SignupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        $form_login = $this->createForm(LoginType::class);
        $form_signup = $this->createForm(SignupType::class);
        return $this->render('auth/login.html.twig', [
            'form_login' => $form_login->createView(),
            'form_signup' => $form_signup->createView(),
        ]);
    }

}