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
        $builder
        ->add('username', TextType::class, array('label' => 'Nombre de usuario: '))
        ->add('name', TextType::class, array('label' => 'Nombre y apellidos: '))
        ->add('plainPassword', RepeatedType::class, array(
              'type' => PasswordType::class,
              'first_options'  => array('label' => 'Contraseña: '),
              'second_options' => array('label' => 'Repite la contraseña: '),
              'invalid_message' => 'Las contraseñas no coinciden.'
          ))
        ->add('email', EmailType::class, array('label' => 'Correo electrónico: '))
        ->add('roles', ChoiceType::class, array(
            'choices'  => array(
              'Usuario' => 'ROLE_USER',
              'Administrador' => 'ROLE_ADMIN'
            ),
            'label' => 'Permisos del usuario:',
            'multiple'  =>  true,
            'expanded' => false
        ))
        ->add('borrar', ResetType::class, array('label' => 'Resetear valores'))
        ->add('guardar', SubmitType::class, array('label' => 'Registrarse'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_user';
    }


}
