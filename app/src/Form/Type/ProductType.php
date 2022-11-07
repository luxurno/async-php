<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, [
            'required' => true,
            'constraints' => [new Length(['min' => 3, 'max' => 255])],
        ]);
        $builder->add('producer', ChoiceType::class, [
            'required' => true,
            'choices' => [
                'one' => 'company_one',
                'two' => 'company_two',
                'three' => 'company_three',
            ],
        ]);
        $builder->add('color', ChoiceType::class, [
            'required' => true,
            'choices' => [
                'white' => 'white',
                'black' => 'black',
                'red' => 'red',
            ],
        ]);
        $builder->add('height', NumberType::class, [
            'required' => true,
            'constraints' => [new GreaterThanOrEqual(30), new LessThanOrEqual(140)],
        ]);
        $builder->add('width', NumberType::class, [
            'required' => true,
            'constraints' => [new GreaterThanOrEqual(30), new LessThanOrEqual(150)],
        ]);
        $builder->add('type', ChoiceType::class, [
            'required' => true,
            'choices' => [
                'Bags' => 'App\\Entity\\Mysql\\Bags',
                'Jacket' => 'App\\Entity\\Mssql\\Jacket',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

    }
}
