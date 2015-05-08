<?php

namespace Checnes\RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni', 'text', array(
                'attr'          => array('class' => 'input-small'),
                'label'         => 'DNI',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('nombres')
            ->add('apellido_materno')
            ->add('apellido_paterno')
            ->add('fecha_nacimiento')
            ->add('email')
            ->add('telefono_fijo')
            ->add('telefono_celular')
            ->add('direccion')
            ->add('sexo')
            ->add('estado')
            ->add('condicion')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Checnes\RegistroBundle\Entity\Persona'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checnes_registrobundle_persona';
    }
}
