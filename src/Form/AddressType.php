<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de votre adresse',
                'attr' => [
                    'placeholder' => 'Nom de votre adresse'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre Nom'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Nom de votre entreprise',
                'attr' => [
                    'placeholder' => '(facultatif) Veuillez entrer le nom de votre entreprise'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre adresse'
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre ville'
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre pays',
                    'class' => 'mx-4 my-4'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre numéro de téléphone'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-info my-4'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
