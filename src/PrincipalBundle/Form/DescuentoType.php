<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class DescuentoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('descripcion', TextType::class, array(
          'label' => 'Descripción',
          'attr' => array(
          'placeholder' => 'Descripción'
          )
        ))
        ->add('descuento', TextType::class, array(
          'label' => 'Descuento (%)'
        ))
        ->add('fechaInicial')
        ->add('fechaFinal')
        ->add('guardar', SubmitType::class, array(
          'label' => 'Guardar',
          'attr' => ['class' => 'btn btn-default']
        ))
        ->add('borrar', ResetType::class, array('label' => 'Descartar cambios'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\Descuento'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_descuento';
    }


}
