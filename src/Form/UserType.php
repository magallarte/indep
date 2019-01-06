<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('name')
            ->add('surname')
            ->add('tel')
            ->add('uptodate_membership_fee')
            ->add('picture')
            ->add('address')
            ->add('zip_code')
            ->add('city')
            ->add('school_list_position')
            ->add('schoolList')
            ->add('kid')
            ->add('membership')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
