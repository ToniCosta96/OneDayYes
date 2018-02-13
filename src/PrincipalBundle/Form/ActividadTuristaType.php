<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class ActividadTuristaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titulo', TextType::class, array('label' => 'Título: '))
        ->add('descripcion', TextType::class, array('label' => 'Descripción: '))
        ->add('imagen', TextType::class, array('label' => 'Ruta de imagen: '))
        ->add('precio', NumberType::class, array('label' => 'Precio: '))
        ->add('guardar', SubmitType::class, array(
          'label' => 'Crear actividad',
          'attr' => ['class' => 'btn btn-default']
        ))
        ->add('borrar', ResetType::class, array('label' => 'Resetear valores'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\ActividadTurista'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_actividadturista';
    }


}
