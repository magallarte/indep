<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\User;
use App\Entity\School;
use App\Entity\SchoolLevel;
use App\Entity\SchoolClass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label'  => 'Titre :'))
            ->add('date', DateType::class, [
                    'widget' => 'single_text',
                    // this is actually the default format for single_text
                    'format' => 'dd-MM-yyyy',
                ])
            ->add('startime', DateTimeType::class, [
                    'placeholder' => [
                        'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                        'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                    ]
                ])
            ->add('endtime', DateTimeType::class, [
                    'placeholder' => [
                        'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                        'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                    ]
                ])
            ->add('place', TextType::class, array('label'  => 'Lieu :'))
            ->add('picture1', FileType::class, array(
                'label' => 'Photo 1 :',
                'attr' => ['placeholder' => 'Choisir une photo']
                ))
            ->add('picture2',  FileType::class, array(
                'label' => 'Photo 2 :',
                'attr' => ['placeholder' => 'Choisir une photo']
                ))
            ->add('picture3',  FileType::class, array(
                'label' => 'Photo 3 :',
                'attr' => ['placeholder' => 'Choisir une photo']
                ))
            ->add('picture4',  FileType::class, array(
                'label' => 'Photo 4 :',
                'attr' => ['placeholder' => 'Choisir une photo']
                ))
            ->add('description', TextType::class, array('label'  => 'Description :'))
            ->add('contact', EntityType::class, array(
                    'label'  => 'Contact :',
                    'class' => 'App\Entity\User',
                    'choice_label' => 'name',
                    'required' => false))
            ->add('school_level', EntityType::class, array(
                    'label'  => 'Niveau :',
                    'class' => 'App\Entity\SchoolLevel',
                    'choice_label' => 'name',
                    'required' => false))
            ->add('school', EntityType::class, array(
                    'label'  => 'Ecole :',
                    'class' => 'App\Entity\School',
                    'choice_label' => 'name',
                    'required' => false))
            ->add('school_class', EntityType::class, array(
                    'label'  => 'Classe :',
                    'class' => 'App\Entity\SchoolClass',
                    'choice_label' => 'name',
                    'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
