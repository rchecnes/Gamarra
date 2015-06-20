<?php

namespace Crece\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CreceUsuarioBundle:Default:index.html.twig', array('name' => $name));
    }
}
