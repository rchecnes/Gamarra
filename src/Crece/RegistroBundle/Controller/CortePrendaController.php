<?php

namespace Crece\RegistroBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Crece\RegistroBundle\Entity\CortePrenda;
use Crece\RegistroBundle\Form\CortePrendaType;

/**
 * CortePrenda controller.
 *
 */
class CortePrendaController extends Controller
{

    /**
     * Lists all CortePrenda entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dql  = "SELECT cp FROM CreceRegistroBundle:CortePrenda cp";
        $dql .= " WHERE cp.estado=1";

        $respuesta = $em->createQuery($dql)->getResult();

        $data['titulo_cabecera']   = "Cortes";
        $data['titulo_principal']  = "Listado de cortes";
        $data['entities'] = $respuesta;

        return $this->render('CreceRegistroBundle:CortePrenda:index.html.twig', $data);
    }
    /**
     * Creates a new CortePrenda entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity = new CortePrenda();
        $form = $this->createForm(new CortePrendaType(), $entity, array());
        $form->handleRequest($request);

        $campos = $request->get("crece_registrobundle_corteprenda");

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $entity->setFechaCorte(new \DateTime($campos['fecha_corte']));
            $entity->setFechaCreacion(new \DateTime());
            $entity->setCantidadTotal(200);
            $entity->setAno(2015);
            $entity->setEstado(true);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('corteprenda', array()));
        }

        $data['titulo_cabecera']   = "Cortes";
        $data['titulo_principal']  = "Corte - Nuevo registro";
        $data['entity']            = $entity;
        $data['form']              = $form->createView();

        return $this->render('CreceRegistroBundle:CortePrenda:new.html.twig', $data);
    }


    /**
     * Displays a form to create a new CortePrenda entity.
     *
     */
    public function newAction()
    {
        $entity = new CortePrenda();
        $form   = $this->createForm(new CortePrendaType(), $entity, array());

        $data['titulo_cabecera']   = "Cortes";
        $data['titulo_principal']  = "Corte - Nuevo registro";
        $data['entity']            = $entity;
        $data['form']              = $form->createView();

        return $this->render('CreceRegistroBundle:CortePrenda:new.html.twig', $data);
    }

    /**
     * Finds and displays a CortePrenda entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CreceRegistroBundle:CortePrenda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CortePrenda entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CreceRegistroBundle:CortePrenda:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CortePrenda entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CreceRegistroBundle:CortePrenda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CortePrenda entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CreceRegistroBundle:CortePrenda:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CortePrenda entity.
    *
    * @param CortePrenda $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CortePrenda $entity)
    {
        $form = $this->createForm(new CortePrendaType(), $entity, array(
            'action' => $this->generateUrl('corteprenda_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CortePrenda entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CreceRegistroBundle:CortePrenda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CortePrenda entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('corteprenda_edit', array('id' => $id)));
        }

        return $this->render('CreceRegistroBundle:CortePrenda:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CortePrenda entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CreceRegistroBundle:CortePrenda')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CortePrenda entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('corteprenda'));
    }

    /**
     * Creates a form to delete a CortePrenda entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('corteprenda_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
