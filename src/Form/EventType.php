<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('date')
            ->add('startime')
            ->add('endtime')
            ->add('place')
            ->add('picture1')
            ->add('picture2')
            ->add('picture3')
            ->add('picture4')
            ->add('description')
            ->add('contact')
            ->add('school_level')
            ->add('school')
            ->add('school_class')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
