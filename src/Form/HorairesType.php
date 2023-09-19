<?php

namespace App\Form;

use App\Entity\Horaires;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HorairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('AMHO',options: ['attr' => ['min' => '0','max' => '23' ],'label' => 'Ouverture matin'])
            ->add('AMHC', options: ['attr' => ['min' => '0','max' => '23' ],'label' => 'Fermeture matin'])
            ->add('PMHO', options: ['attr' => ['min' => '0','max' => '23' ],'label' => 'Ouverture soir'])
            ->add('PMHC', options: ['attr' => ['min' => '0','max' => '23' ],'label' => 'Fermeture soir']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Horaires::class,
        ]);
    }
}
