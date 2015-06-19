<?php

namespace Crece\RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CortePrendaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('fecha_creacion')
            ->add('fecha_modificación')
            ->add('ano')
            ->add('estado')
            ->add('condicion')
            ->add('persona')
            ->add('modelo_prenda')
        ;
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
