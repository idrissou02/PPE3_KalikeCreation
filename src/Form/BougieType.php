<?php

namespace App\Form;

use App\Entity\Bougie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BougieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image',UrlType::class,[
                'attr'=>[
                    "placeholder"=>"saisier l'URL d'une image"
                ]
            ])
            ->add('nomB', TextType::class,[
                'attr'=>[
                    "placeholder"=>"saisier le nom de la poudre parfumée"
                ]
            ])
            ->add('prix', IntegerType::class,[
                'attr'=>[
                    "placeholder"=>"saisier le prix"
                ]
            ])
            ->add('poid', IntegerType::class,[
                'attr'=>[
                    "placeholder"=>"saisier le poid"
                ]
            ])
            ->add('materiaux', TextType::class,[
                'attr'=>[
                    "placeholder"=>"saisier le materiaux"
                ]
            ])
            ->add('couleur', TextType::class,[
                'attr'=>[
                    "placeholder"=>"saisier la couleur"
                ]
            ])
            ->add('ddv', IntegerType::class,[
                'attr'=>[
                    "placeholder"=>"saisier la durée de vie"
                ]
            ])
            ->add('taille', IntegerType::class,[
                'attr'=>[
                    "placeholder"=>"saisier la taille"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bougie::class,
        ]);
    }
}
