<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Garage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', TextType::class, options: [
                'attr' => ['class' => 'form-control mb3'],
                'label' => 'Sujet',
                'required' => false,
                'mapped' => true
            ])

            ->add('last_name', TextType::class,options: [
                'attr' => ['class' => 'form-control mb-3'],
                'label' => 'Nom',
                'required' => true,
                'mapped' => true])
            ->add('first_name', TextType::class,options: [
                'attr' => ['class' => 'form-control mb-3'],
                'label' => 'Prénom',
                'required' => true,
                'mapped' => true])
            ->add('email', EmailType::class,[
                'attr' => ['class' => 'form-control mb-3'],
                'label' => 'Courriel',
                'required' => true,
                'mapped' => true])
            ->add('phone_number', TextType::class,[
                'attr' => ['class' => 'form-control mb-3'],
                'label' => 'Téléphone',
                'required' => true,
                'mapped' => true])
            ->add('message', TextareaType::class,[
                'attr' => ['class' => 'form-control mb-3'],
                'label' => 'Message',
                'required' => true,
                'mapped' => true])
            ->add('garage', EntityType::class,options:[
                'class' => Garage::class,
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => 'Garage',
                'required' => true,
                'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
