<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez remplir ce champs']),
                    new Length(['min' => 3, 'minMessage' => 'Vous devez entrer au moins 3 caractères'])
                ]
            ])
            ->add('surname', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez remplir ce champs']),
                    new Length(['min' => 3, 'minMessage' => 'Vous devez entrer au moins 3 caractères'])
                ]
            ])
            ->add('mail', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez remplir ce champs' ]),
                    new Regex(['pattern' => '/^[a-z0-9-_.]+@[a-z0-9-_.]+\.[a-z]{2,3}$/i', 'message' =>'Entrez une adresse mail valide']),
                ],
            ])
            ->add('subject', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez remplir ce champs']),
                    new Length(['min' => 10, 'minMessage' => 'La taille du sujet est trop courte'])
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez remplir ce champs']),
                    new Length(['min' => 10, 'minMessage' => 'Votre message est trop court'])
                ]
            ])
        ;
    }





    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
