<?php

namespace App\Form;

use App\Entity\Glace;
use App\Entity\Cornet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AjoutGlaceTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('cornet', EntityType::class, [
                'class' => Cornet::class,
                'choice_label' => 'type', // correspond à la propriété 'type' de l'entité Cornet
                'placeholder' => 'Choisissez un type de cône',
                'required' => true,
            ])
            ->add('ingredientSpecial', TextType::class, [
            'label' => 'Ingrédient spécial',
            'required' => true,
    ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glace::class,
        ]);
    }
}
