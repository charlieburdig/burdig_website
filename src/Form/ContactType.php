<?php

// src/Form/ContactType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => ['placeholder' => 'Prénom*'],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'attr' => ['placeholder' => 'Nom*'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'attr' => ['placeholder' => 'Courriel*'],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre Téléphone',
                'attr' => ['placeholder' => 'Télépone*'],
            ])
            ->add('budget', TextType::class, [
                'label' => 'Votre budget',
                'attr' => ['placeholder' => 'Budget*'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => ['placeholder' => 'Message*'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
            ]);
    }
}
