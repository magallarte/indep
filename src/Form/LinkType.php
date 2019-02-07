<?php

namespace App\Form;

use App\Entity\Link;
use App\Entity\Page;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, array('label'  => 'Titre :'))
            ->add('picture', FileType::class, array(
                'label' => 'Photo:',
                'attr' => ['placeholder' => 'Choisir une photo']
                ))
            ->add('title', TextType::class, array('label'  => 'Titre :'))
            ->add('target', TextType::class, array(
                'label'  => 'Mot clés :',
                'multiple' => true))
            ->add('date', DateType::class, [
                'widget' => 'choice',
                ])
            ->add('description', TextType::class, array('label'  => 'Description :'))
            ->add('pages', EntityType::class, array(
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
            'data_class' => Link::class,
        ]);
    }
}
