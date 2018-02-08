<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $test[] = array("a"=>2);
        $builder
        ->add('username', TextType::class, array('label' => 'Nombre de usuario: '))
        ->add('name', TextType::class, array('label' => 'Nombre y apellidos: '))
        ->add('plainPassword', RepeatedType::class, array(
              'type' => PasswordType::class,
              'first_options'  => array('label' => 'Contraseña: '),
              'second_options' => array('label' => 'Repite la contraseña: ')
          ))
        ->add('email', EmailType::class, array('label' => 'Correo electrónico: '))
        ->add('roles', ChoiceType::class, array(
            'choices'  => $options['roles'],
            'multiple'  =>  true,
            'expanded' => false,
            'attr' => array('class'=>'form-control', 'multiple'=>null)
        ))
        ->add('guardar', SubmitType::class, array('label' => 'Registrarse'))
        ->add('borrar', ResetType::class, array('label' => 'Resetear valores'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ))->setDefault('roles', null)
        ->setRequired('roles')
        ->setAllowedTypes('roles', array('array'));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_user';
    }


}
