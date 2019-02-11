<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Membership;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionResolver\OptionResolver;
use App\Form\KidType;
// use App\Form\MembershipType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('label'  => 'Email :'))
            // ->add('roles')
            ->add('password', PasswordType::Class, array('label'  => 'Mot de passe :'))
            ->add('name', TextType::class, array('label'  => 'Nom :'))
            ->add('surname', TextType::class, array('label'  => 'Prénom :'))
            ->add('tel', TelType::class, array('label'  => 'Téléphone :'))
            // ->add('uptodate_membership_fee', HiddenType::class, array('data'  => 'NON'))
            
            // UPLOAD PICTURE NE FONCTIONNE PAS A CAUSE DU POIDS DES IMAGES TROP LOURD (Bug symfony 4.2)
            ->add('picture', FileType::class, array(
                'label' => 'Photo :',
                'required'=>null,
                'attr' => ['placeholder' => 'Choisir une photo'],
                'data_class' => null))
            // ->add('picture', FileType::class, array(
            //     'label' => 'Photo :',
            //     'attr' => ['placeholder' => 'Choisir une photo']
            //     ))
            ->add('address', TextType::class, array('label'  => 'Adresse :'))
            ->add('zip_code',IntegerType::class, array('label'  => 'Code Postal :'))
            ->add('city', TextType::class, array('label'  => 'Ville :'))
            // ->add('school_list_position')
            // ->add('schoolList')
            ->add('membership', EntityType::class, array(
                    'label'  => 'Type Adhésion :',
                    'class' => 'App\Entity\Membership',
                    'choice_label' => 'type',
                    'required' => false))
            ->add('kid', CollectionType::class, array(
                    'label'  => 'Enfant :',
                    'entry_type' => KidType::class,
                    'allow_add'=> true,
                    'allow_delete' => true
            ))
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
