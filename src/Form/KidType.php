<?php

namespace App\Form;

use App\Entity\Kid;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class KidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('label'  => 'Nom :'))
            ->add('surname', TextType::class, array('label'  => 'Prénom :'))
            ->add('school',  EntityType::class, array(
                    'label'  => 'Ecole :',
                    'class' => 'App\Entity\School',
                    'choice_label' => 'type',
                    'required' => false))
            ->add('school_class',  EntityType::class, array(
                    'label'  => 'Classe :',
                    'class' => 'App\Entity\SchoolClass',
                    'choice_label' => 'type',
                    'required' => false))
            ->add('school_level', EntityType::class, array(
                    'label'  => 'Niveau :',
                    'class' => 'App\Entity\SchoolLevel',
                    'choice_label' => 'type',
                    'required' => false))
            // ->add('parent',  EntityType::class, array(
            //         'label'  => 'Parent :',
            //         'class' => 'App\Entity\User',
            //         'choice_label' => 'type',
            //         'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kid::class,
        ]);
    }
}
