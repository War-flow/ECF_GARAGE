<?php

namespace App\Form;

use App\Entity\FilterSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maxPrice', IntegerType::class, [
                'required' => false,
                'label'=> false,
                'attr' => [
                    'placeholder' => 'Prix max'
                ]
            ])

            ->add('maxYear',IntegerType::class, [
                'required' => false,
                'label'=> false,
                'attr' => [
                    'placeholder' => 'Année'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilterSearch::class,
            'methode' => 'get',
            'csrf_protection'=> false,
        ]);
    }
}
