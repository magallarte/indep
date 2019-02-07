<?php

namespace App\Form;

use App\Entity\SchoolList;
use App\Entity\User;
use App\Entity\SchoolLevel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SchoolListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('available_seats', IntegerType::class, array('label'  => 'Nombre de sièges disponibles :'))
            ->add('elected_seats', IntegerType::class, array('label'  => 'Nombre de sièges Les Indépendants :'))
            ->add('school', EntityType::class, array(
                    'label'  => 'Ecole :',
                    'class' => 'App\Entity\School',
                    'choice_label' => 'name'
            ))
            ->add('school_level', EntityType::class, array(
                    'label'  => 'Niveau :',
                    'class' => 'App\Entity\SchoolLevel',
                    'choice_label' => 'name'
            ))
            ->add('user',  EntityType::class, array(
                    'label'  => 'Adhérents :',
                    'class' => 'App\Entity\User',
                    'choice_label' => 'surname' . 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SchoolList::class,
        ]);
    }
}
