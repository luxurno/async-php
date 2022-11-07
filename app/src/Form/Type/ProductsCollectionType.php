<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsCollectionType extends AbstractType
{
    public function __construct(
    ) { }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('products', CollectionType::class, [
            'entry_type' => ProductType::class,
            'entry_options' => ['label' => false],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

    }
}
