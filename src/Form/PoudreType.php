<?php

namespace App\Form;

use App\Entity\Poudre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PoudreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image')
            ->add('nom', TextType::class,[
                'label'=> "Nom de la poudre parfumée",
                'attr'=>[
                    "placeholder"=>"saisier le nom de la poudre parfumée"
                ]
            ])
            ->add('prix', integerType::class)
            ->add('materiaux', TextType::class)
            ->add('couleur', TextType::class)
            ->add('dureeDeVie', integerType::class)
            ->add('taille', integerType::class)
            ->add('description', TextareaType::class);
            // ->add('valdier', SubmitType::class);
 
            
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Poudre::class,
        ]);
    }
}
