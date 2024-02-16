<?php

namespace App\Form;

use App\Entity\Garage;
use App\Entity\Testimonial;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_name',TextType::class ,options: [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => 'Nom',
                'required' => true])

            ->add('content',TextareaType::class ,options: [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => 'Contenu',
                'required' => true])

            ->add('score',ChoiceType::class, options:[
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => 'Donnez une note',
                'required' => true,
                'mapped' => true,
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ]])

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
            'data_class' => Testimonial::class,
        ]);
    }
}
