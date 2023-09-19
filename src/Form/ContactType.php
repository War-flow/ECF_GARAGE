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
            ->add('Subject', options: ['attr'=> ['class' => 'w-50',"hidden"=> true]])
            ->add('Lastname', options: ['attr'=> ['class' => 'w-50'],'label' => 'Nom',])
            ->add('Firstname', options: ['attr'=> ['class' => 'w-50'],'label' => 'Prénom',])
            ->add('Address', options: ['attr'=> ['class' => 'w-50'],'label' => 'Adresse',])
            ->add('ZipCode',NumberType::class, options: ['attr'=> ['class' => 'w-50'],'label' => 'Code Postal',])
            ->add('City', options: ['attr'=> ['class' => 'w-50'],'label' => 'Ville',])
            ->add('Mail',EmailType::class,options: ['attr'=> ['class' => 'w-50'],'label' => 'Email', ])
            ->add('Phone',TelType::class,options: ['attr'=> ['class' => 'w-50'],'label' => 'Téléphone',])
            ->add('Message',TextareaType::class, options: ['attr'=> ['class' => 'w-50'],'label' => 'Message',]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
