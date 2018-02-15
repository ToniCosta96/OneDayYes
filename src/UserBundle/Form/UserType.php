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
        ->add('username', TextType::class, array('label' => '%nombre_usuario%'))
        ->add('name', TextType::class, array('label' => '%nombre_apellidos%'))
        ->add('plainPassword', RepeatedType::class, array(
              'type' => PasswordType::class,
              'first_options'  => array('label' => '%contraseña%'),
              'second_options' => array('label' => '%repite_contraseña%'),
              'invalid_message' => '%contraseñas_no_coinciden%'
          ))
        ->add('email', EmailType::class, array('label' => '%correo%'))
        ->add('roles', ChoiceType::class, array(
            'choices'  => array(
              'Usuario' => 'ROLE_USER',
              'Administrador' => 'ROLE_ADMIN'
            ),
            'label' => 'Permisos del usuario:',
            'multiple'  =>  true,
            'expanded' => false
        ))
        ->add('borrar', ResetType::class, array('label' => '%resetear_valores%'))
        ->add('guardar', SubmitType::class, array('label' => '%registrarse%'));
    }

    /**
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
