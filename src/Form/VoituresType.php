<?php

namespace App\Form;

use App\Entity\Voitures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoituresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options: ['label' => 'Nom du véhicule',])
            ->add('price', MoneyType::class, options: ['label' => 'Prix',])
            ->add('year', NumberType::class, options:['label' => 'Année de mise en circulation'])
            ->add('miles', NumberType::class, options: ['label' => 'Kilométre','grouping'=> true])
            ->add('Fuel', ChoiceType::class, options: [
                'label' => 'Type de Carburant',
                'choices' => [
                    'Essence' => 'Essence',
                    'Diesel' => 'Diesel',
                    'Hybride' => 'Hybride',
                    'Electrique' => 'Electrique',
                ]
            ])
            ->add('Op1', options: ['label' => 'Option N°1',])
            ->add('Op2', options: ['label' => 'Option N°2',])
            ->add('Op3', options: ['label' => 'Option N°3',])
            ->add('Feat1', options: ['label' => 'Caratéristique N°1',])
            ->add('Feat2', options: ['label' => 'Caratéristique N°2',])
            ->add('Feat3', options: ['label' => 'Caratéristique N°3',]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voitures::class,
        ]);
    }
}
