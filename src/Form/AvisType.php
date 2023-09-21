<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', options: ['attr' => ['class' => 'form-control','placeholder' => 'Nom'] ,'label' => 'Votre nom'])
            ->add('Message',TextareaType::class, options: ['attr' => ['class' => 'form-control','placeholder' => 'Ecrivez ici'],'label'=> 'Commentaire'])
            ->add('Note', ChoiceType::class, ['attr' => ['class' => 'form-control', ],
            'label'=> 'Note',
            'choices' => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
