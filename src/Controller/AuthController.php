<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\Type\LoginType;
use App\Form\Type\SignupType;
use App\Service\UserRegistrationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $form_login = $this->createForm(LoginType::class, null, [
            'action' => $this->generateUrl('app_login_check'),
            'method' => 'POST',
        ]);
        $form_signup = $this->createForm(SignupType::class, new User(), [
            'action' => $this->generateUrl('app_register'),
            'method' => 'POST',
        ]);

        return $this->render('auth/login.html.twig', [
            'form_login' => $form_login->createView(),
            'form_signup' => $form_signup->createView(),
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/register', name: 'app_register', methods: ['GET', 'POST'])]
    public function register(Request $request, UserRegistrationService $registrationService): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $user = new User();
        $form_signup = $this->createForm(SignupType::class, $user, [
            'action' => $this->generateUrl('app_register'),
            'method' => 'POST',
        ]);
        $form_signup->handleRequest($request);

        if ($form_signup->isSubmitted() && $form_signup->isValid()) {
            $registrationService->register($user, $form_signup->get('plainPassword')->getData());
            $this->addFlash('success', 'Your account has been created. You can now login.');

            return $this->redirectToRoute('app_login');
        }

        $form_login = $this->createForm(LoginType::class, null, [
            'action' => $this->generateUrl('app_login_check'),
            'method' => 'POST',
        ]);

        return $this->render('auth/login.html.twig', [
            'form_login' => $form_login->createView(),
            'form_signup' => $form_signup->createView(),
            'last_username' => '',
            'error' => null,
        ]);
    }

    #[Route('/login_check', name: 'app_login_check', methods: ['POST'])]
    public function loginCheck(): void
    {
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
