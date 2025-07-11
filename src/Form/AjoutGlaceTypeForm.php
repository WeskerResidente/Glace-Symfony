<?php

namespace App\Form;

use App\Entity\Glace;
use App\Entity\Cornet;
use App\Entity\Topping;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\File as FileConstraint;

class AjoutGlaceTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
$builder
    ->add('nom')
    ->add('cornet', EntityType::class, [
        'class' => Cornet::class,
        'choice_label' => 'type',
        'placeholder' => 'Choisissez un type de cône',
        'required' => true,
    ])
    ->add('ingredientSpecial', TextType::class, [
        'label' => 'Ingrédient spécial',
        'required' => true,
    ])
    ->add('imageFile', FileType::class, [
        'required' => false,
        'mapped' => true,
        'constraints' => [
            new FileConstraint([
                'maxSize' => '2M',
                'mimeTypes' => [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                ],
                'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG, GIF).',
            ])
        ],
    ])
    ->add('toppings', EntityType::class, [
        'class' => Topping::class,
        'choice_label' => 'nom',
        'multiple' => true,
        'expanded' => true,
        'label' => 'Toppings',
        'required' => false,
    ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glace::class,
        ]);
    }
}
