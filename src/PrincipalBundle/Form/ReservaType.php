<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
        ->add('fechaReserva')
        ->add('numeroNoches')
        ->add('numeroHabitaciones')
        ->add('comida')
        ->add('cena')
        ->add('numeroVuelo')
        ->add('horaLlegada')
        ->add('barca')
        ->add('visitaEscuela')
        ->add('actividades')
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
