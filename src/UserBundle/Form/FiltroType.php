<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class FiltroType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre', TextType::class, array(
          'required' => false,
          'label' => 'Nombre',
          'label_attr' => array('class' => ''),
          'attr' => array(
            'class' => 'form-control form-control-sm',
            'placeholder' => 'Nombre')
          )
        )
        ->add('email', EmailType::class, array(
          'required' => false,
          'label' => 'Email',
          'label_attr' => array('class' => ''),
          'attr' => array(
            'class' => 'form-control form-control-sm',
            'placeholder' => 'Email')
          )
        )
        ->add('fechaInicial', DateType::class, array(
          'required' => false,
          'widget' => 'single_text',
          'html5' => false,
          'format' => 'MM/dd/yyyy',
          'label' => 'Desde',
          'label_attr' => array('class' => ''),
          'attr' => array(
            'class' => 'form-control form-control-sm js-datepicker'))
        )
        ->add('fechaFinal', DateType::class, array(
          'required' => false,
          'widget' => 'single_text',
          'html5' => false,
          'format' => 'MM/dd/yyyy',
          'label' => 'hasta',
          'label_attr' => array('class' => ''),
          'attr' => array(
            'class' => 'form-control form-control-sm js-datepicker'))
        )
        ->add('borrar', ResetType::class, array(
          'label' => 'Resetear filtros',
          'attr' => array(
            'class' => 'btn btn-secondary')
          ))
        ->add('guardar', SubmitType::class, array('label' => 'Filtrar',
        'attr' => array(
          'class' => 'btn btn-primary')
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Filtro'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_filtro';
    }


}
