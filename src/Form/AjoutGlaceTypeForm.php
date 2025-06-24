<?php

namespace App\Form;

use App\Entity\Glace;
use App\Entity\Cornet;
use Vich\UploaderBundle\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('imageFile', FileType::class, [
            'required' => false,
            'mapped' => true,
            'constraints' => [
                new File([
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


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glace::class,
        ]);
    }
}
