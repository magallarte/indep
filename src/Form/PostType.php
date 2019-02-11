<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Page;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionResolver\OptionResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, array('label'  => 'Url :'))
            ->add('picture', FileType::class, array(
                'label' => 'Photo:',
                'attr' => ['placeholder' => 'Choisir une photo']
                ))
            ->add('title', TextType::class, array('label'  => 'Titre :'))
            ->add('hashtag1', TextType::class, array('label'  => '#1 :'))
            ->add('hashtag2', TextType::class, array('label'  => '#2 :'))
            ->add('hashtag3', TextType::class, array('label'  => '#3 :'))
            ->add('hashtag4', TextType::class, array('label'  => '#4 :'))
            ->add('date', DateType::class, array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'placeholder' => array(
                        'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',)
                ))
            ->add('description', TextType::class, array('label'  => 'Description :'))
            ->add('page', EntityType::class, array(
                    'label'  => 'Page :',
                    'class' => 'App\Entity\Page',
                    'choice_label' => 'title',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
