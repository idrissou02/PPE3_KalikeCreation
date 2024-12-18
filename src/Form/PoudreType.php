<?php

namespace App\Form;

use App\Entity\Poudre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PoudreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image')
            ->add('nom')
            ->add('prix')
            ->add('materiaux')
            ->add('couleur')
            ->add('dureeDeVie')
            ->add('taille')
            ->add('description');
            // ->add('valdier', SubmitType::class);
 
            
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Poudre::class,
        ]);
    }
}
