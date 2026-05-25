<?php
namespace App\Form\Type;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SignupType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fullName', type: TextType::class,options: [
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
                ->add('plainPassword', type: RepeatedType::class, options: [
                    'type' => PasswordType::class,
                    'label' => 'Password',
                    'mapped' => false,
                    'invalid_message' => 'The password fields must match.',
                    'first_options' => [
                        'label' => 'Password',
                        'help' => 'Please enter your password',
                        'attr' => [
                            'placeholder' => 'Enter your password'
                        ],
                    ],
                    'second_options' => [
                        'label' => 'Confirm Password',
                        'help' => 'Please confirm your password',
                        'attr' => [
                            'placeholder' => 'Confirm your password'
                        ],
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password.',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters.',
                            'max' => 4096,
                        ]),
                    ],
                ])
                ->add('terms', type: CheckboxType::class, options: [
                    'label' => 'I agree to the terms and conditions',
                    'required' => true,
                    'mapped' => false,
                    'constraints' => [
                        new IsTrue([
                            'message' => 'You should agree to the terms.',
                        ]),
                    ],
                ])
                ->add('submit', type: SubmitType::class, options: [
                    'label' => 'Create account',
                    'attr' => [
                        'class' => 'btn btn-success'
                    ]
                ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
