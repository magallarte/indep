<?php

namespace App\Form;

use App\Entity\Document;
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

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label'  => 'Titre :'))
            ->add('content', TextType::class, array('label'  => 'Contenu :'))
            ->add('author',  EntityType::class, array(
                    'label'  => 'Auteur :',
                    'class' => 'App\Entity\User',
                    'choice_label' => function ($author){
                        return $author->getName().' '.$author->getSurname();
                    },
                    'required' => false))
            ->add('school',  EntityType::class, array(
                    'label'  => 'Ecole :',
                    'class' => 'App\Entity\School',
                    'choice_label' => 'name',
                    'required' => false))
            ->add('school_level',  EntityType::class, array(
                    'label'  => 'Niveau :',
                    'class' => 'App\Entity\SchoolLevel',
                    'choice_label' => 'name',
                    'required' => false))
            ->add('school_class',  EntityType::class, array(
                    'label'  => 'Classe :',
                    'class' => 'App\Entity\SchoolClass',
                    'choice_label' => 'name',
                    'required' => false))
            // ->add('page')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
