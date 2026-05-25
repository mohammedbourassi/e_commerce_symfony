<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignupType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('full_name', type: TextType::class,options: [
                    'label' => 'Full Name',
                    'required' => true,
                    'help' => 'Please enter your full name',
                    'attr' => [
                        'placeholder' => 'Enter your name'
                        
                    ]
                ])
                ->add('email', type: EmailType::class, options: [
                    'label' => 'Email',
                    'required' => true,
                    'help' => 'Please enter your email',
                    'attr' => [
                        'placeholder' => 'Enter your email'
                    ]
                ])
                ->add('password', type: PasswordType::class, options: [
                    'label' => 'Password',
                    'required' => true,
                    'help' => 'Please enter your password',
                    'attr' => [
                        'placeholder' => 'Enter your name'
                    ]
                ])
                ->add('confirm_password', type: PasswordType::class, options: [
                    'label' => 'Confirm Password',
                    'required' => true,
                    'help' => 'Please confirm your password',
                    'attr' => [
                        'placeholder' => 'Enter your name'
                    ]
                ])
                ->add('terms', type: CheckboxType::class, options: [
                    'label' => 'I agree to the terms and conditions',
                    'required' => true,
                ])
                ->add('submit', type: SubmitType::class, options: [
                    'label' => 'Email address',
                    'attr' => [
                        'placeholder' => 'Enter your email'
                    ]
                ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // nothing required for simple signup form
    }
}