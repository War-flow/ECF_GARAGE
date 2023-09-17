<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Subject', options: ['label' => 'Sujet',])
            ->add('Lastname', options: ['label' => 'Nom',])
            ->add('Firstname', options: ['label' => 'Prénom',])
            ->add('Address', options: ['label' => 'Adresse',])
            ->add('ZipCode',NumberType::class, options: ['label' => 'Code Postal',])
            ->add('City', options: ['label' => 'Ville',])
            ->add('Mail',EmailType::class,options: ['label' => 'Email', ])
            ->add('Phone',TelType::class,options: ['label' => 'Téléphone',])
            ->add('Message',TextareaType::class, options: ['label' => 'Message',]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
