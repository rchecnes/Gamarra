<?php

namespace Crece\RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'attr'          => array('class' => 'form-control input-sm'),
                'label'         => 'DNI',
                'max_length'    => 8,
                'required'      => true,
            ))
            ->add('file', 'file', array(
                'attr'          => array('class' => 'form-control input-sm'),
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
            'data_class' => 'Crece\RegistroBundle\Entity\Document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'crece_registrobundle_document';
    }
}
