<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class ReservaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('tipo', HiddenType::class, array(
            'data' => 'turista'
        ))
        ->add('fechaReserva', DateType::class, array(
        'widget' => 'single_text',
        'html5' => false,
        'format' => 'dd/MM/yyyy',
        'attr' => array(
          'class' => 'js-datepicker'))
          )
        ->add('numeroNoches')
        ->add('tipoHabitacion', HiddenType::class, array(
            'data' => 'predeterminada'
        ))
        ->add('numeroHabitaciones')
        ->add('comida',CheckboxType::class, array('required' => false))
        ->add('cena',CheckboxType::class, array('required' => false))
        ->add('numeroVuelo', TextType::class)
        ->add('horaLlegada',TimeType::class)
        ->add('barca',CheckboxType::class, array('required' => false))
        ->add('visitaEscuela',CheckboxType::class, array('required' => false))
        ->add('guardar', SubmitType::class, array('label' => '%enviar%'))
        ->add('borrar', ResetType::class, array('label' => '%resetear_valores%'));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\Reserva'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_reserva';
    }


}
