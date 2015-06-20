<?php

namespace Crece\RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CortePrendaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Nombre',
                'required'      => true,
            ))
            ->add('descripcion', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Descripción',
                'required'      => true,
            ))
            ->add('persona', 'entity', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'class'         => 'CreceRegistroBundle:Persona',
                'empty_value'   => 'Seleccionar',
                'label'         => 'Persona',
                'query_builder' => function (EntityRepository $er)
                {
                    $qb = $er->createQueryBuilder('p');
                    $qb->Where('p.estado = 1');
                    $qb->orderBy('p.nombres', 'ASC');
                    return $qb;
                },
                'required' => true,
            ))
            ->add('tipo_modelo', 'entity', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'class'         => 'CreceRegistroBundle:TipoModelo',
                'empty_value'   => 'Seleccionar',
                'label'         => 'Tipo de modelo',
                'query_builder' => function (EntityRepository $er)
                {
                    $qb = $er->createQueryBuilder('tm');
                    $qb->Where('tm.estado = 1');
                    $qb->orderBy('tm.nombre', 'ASC');
                    return $qb;
                },
                'required' => true,
            ))
            ->add('cantidad_total', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Total corte',
                'required'      => true,
            ))
            ->add('fecha_corte', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Fecha de corte',
                'read_only'     => true,
                'required'      => true,
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Crece\RegistroBundle\Entity\CortePrenda'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'crece_registrobundle_corteprenda';
    }
}
