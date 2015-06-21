<?php

namespace Crece\RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CortePrendaDetalleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('color', 'entity', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'class'         => 'CreceRegistroBundle:Color',
                'empty_value'   => 'Seleccionar',
                'label'         => 'Color',
                'query_builder' => function (EntityRepository $er)
                {
                    $qb = $er->createQueryBuilder('c');
                    $qb->Where('c.estado = 1');
                    $qb->orderBy('c.nombre', 'ASC');
                    return $qb;
                },
                'required' => true,
            ))
            ->add('cantidad', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'Cantidad',
                'required'      => true,
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Crece\RegistroBundle\Entity\CortePrendaDetalle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'crece_registrobundle_corteprendadetalle';
    }
}
