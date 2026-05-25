<?php

namespace App\Form\Type;

use App\Dto\AddToCartDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class AddToCartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productId', HiddenType::class,[
            'data' => $options['product_id']
        ])
        ->add('quantity', NumberType::class,[
            'data' => $options['quantity'],
            'label' => 'Quantity',
            'constraints' => [
                new GreaterThanOrEqual(1)
            ],
            'attr' => [
                'class' => 'form-control'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddToCartDto::class,
            'product_id' => null,
            'quantity' => 1
        ]);
    }
}