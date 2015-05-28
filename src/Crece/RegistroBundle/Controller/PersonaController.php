<?php

namespace Crece\RegistroBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Crece\RegistroBundle\Entity\Persona;
use Crece\RegistroBundle\Form\PersonaType;

/**
 * Persona controller.
 *
 */
class PersonaController extends Controller
{

    /**
     * Lists all Persona entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CreceRegistroBundle:Persona')->findAll();

        $data['titulo']   = "Listado de Personas";
        $data['entities'] = $entities;

        return $this->render('CreceRegistroBundle:Persona:index.html.twig',$data);
    }
    /**
     * Creates a new Persona entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Persona();
        $form = $this->createForm(new PersonaType(), $entity);

        $detalle = $request->get("crece_registrobundle_persona");
        $form->bind($request);
        //->['Crece_registrobundle_persona']
        //$form->handleRequest($request);

        if ($entity) {

            $em = $this->getDoctrine()->getManager();
            //$entity->setNombreImagen();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('persona'));
        }

        $data['titulo']   = "Persona";
        $data['entity']   = $entity;
        $data['form']     = $form->createView();

        return $this->render('CreceRegistroBundle:Persona:new.html.twig', $data);
    }

    /**
     * Creates a form to create a Persona entity.
     *
     * @param Persona $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Persona $entity)
    {
        $form = $this->createForm(new PersonaType(), $entity, array(
            'action' => $this->generateUrl('persona_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Persona entity.
     *
     */
    public function newAction()
    {
        $entity = new Persona();
        $form   = $this->createCreateForm($entity);

        $data['titulo']   = "Persona - Nuego Registro";
        $data['entity']   = $entity;
        $data['form']     = $form->createView();

        return $this->render('CreceRegistroBundle:Persona:new.html.twig', $data);
    }

    /**
     * Finds and displays a Persona entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CreceRegistroBundle:Persona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persona entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $data['titulo']   = "Persona";
        $data['entity']   = $entity;
        $data['delete_form']   = $deleteForm->createView();

        return $this->render('CreceRegistroBundle:Persona:show.html.twig', $data);
    }

    /**
     * Displays a form to edit an existing Persona entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CreceRegistroBundle:Persona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persona entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $data['titulo']      = "Persona - Editar registro";
        $data['entity']      = $entity;
        $data['edit_form']   = $editForm->createView();
        $data['delete_form'] = $deleteForm->createView();

        return $this->render('CreceRegistroBundle:Persona:edit.html.twig', $data);
    }

    /**
    * Creates a form to edit a Persona entity.
    *
    * @param Persona $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Persona $entity)
    {
        $form = $this->createForm(new PersonaType(), $entity, array(
            'action' => $this->generateUrl('persona_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Persona entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CreceRegistroBundle:Persona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persona entity.');
        }

        $editForm = $this->createForm(new PersonaType(), $entity);
        //$editForm->bind($request);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('persona'));
        }

        $data['titulo']    = "Persona - Editar registro";
        $data['entity']    = $entity;
        $data['edit_form'] = $editForm->createView();


        return $this->render('CreceRegistroBundle:Persona:edit.html.twig', $data);
    }
    /**
     * Deletes a Persona entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CreceRegistroBundle:Persona')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Persona entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('persona'));
    }

    /**
     * Creates a form to delete a Persona entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('persona_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
