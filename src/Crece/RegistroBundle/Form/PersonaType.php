<?php

namespace Crece\RegistroBundle\Form;

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
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'DNI',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('nombres', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Nombres',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('apellido_materno', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Apellido materno',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('apellido_paterno', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Apellido paterno',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('fecha_nacimiento', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Fecha de nacimiento',
                'required'      => true,
            ))
            ->add('email', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Email',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('telefono_fijo', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Teléfono fijo',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('telefono_celular', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Teléfono celular',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('direccion', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Dirección',
                'max_length'    => '8',
                'required'      => true,
            ))
            ->add('sexo')
            ->add('estado')
            ->add('condicion')
            ->add('image', 'file', array(
                'attr'          => array('class' => null),
                'label'         => 'Imagen',
                'required'      => true,
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Crece\RegistroBundle\Entity\Persona'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'crece_registrobundle_persona';
    }
}
