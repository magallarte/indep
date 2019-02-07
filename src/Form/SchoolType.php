<?php

namespace App\Form;

use App\Entity\School;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionResolver\OptionResolver;

class SchoolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('label'  => 'Nom :'))
            ->add('address', TextType::class, array('label'  => 'Adresse :'))
            ->add('zip_code', IntegerType::class, array('label'  => 'Code Postal :'))
            ->add('city', TextType::class, array('label'  => 'Ville :'))
            ->add('director_gender', ChoiceType::class, array(
                    'choices'  => [
                        'M.' => 'Monsieur',
                        'Mme' => 'Madame',
                    ],
                'label'  => 'Civilité :'))
            ->add('director_name', TextType::class, array('label'  => 'Nom du chef d\'établissement :'))
            ->add('director_email', EmailType::class, array('label'  => 'Email :'))
            ->add('director_tel', TelType::class, array('label'  => 'Téléphone :'))
            // ->add('schoolList')
            // ->add('file')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => School::class,
        ]);
    }
}
