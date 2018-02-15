<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class ContactoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre', TextType::class, array(
          'label' => '%nombre%',
          'attr' => array(
          'placeholder' => '%nombre%'
          )
        ))
        ->add('email', EmailType::class, array(
          'label' => 'Email',
          'attr' => array(
          'placeholder' => 'Email'
          )
        ))
        ->add('asunto', TextType::class, array(
          'label' => '%asunto%',
          'attr' => array(
          'placeholder' => '%asunto%'
          )
        ))
        ->add('comentario', TextareaType::class, array(
          'label' => '%comentario%',
          'attr' => array('cols' => 50,
            'rows' => 5,
            'placeholder' => '%mensaje%')
        ))
        ->add('guardar', SubmitType::class, array('label' => 'Enviar'))
        ->add('borrar', ResetType::class, array('label' => 'Resetear valores'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\contacto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_contacto';
    }


}
