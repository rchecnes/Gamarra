<?php
namespace Crece\UsuarioBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class TwigExtension extends \Twig_Extension
{
    private $conn;
    private $em;

    
    public function __construct()
    {
        $this->conn = $GLOBALS['kernel']->getContainer()->get('database_connection');
        $this->em   = $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();  
    }

    public function getFilters()
    {
        return array(
            
        );
    }

    public function getFunctions()
    {
        return array(
            'getMenu' => new \Twig_Function_Method($this, 'getMenu')
        );
    }
    
    public function getName()
    {
        return 'usuario_extension';
    }

    public function getMenu(){

        $menu = $this->em->getRepository('CreceRegistroBundle:Menu')->findAll();

        $lista = "<ul class='sidebar-menu'>";

        foreach ($menu as $entity) {
            $lista .= "<li class='treeview active' id='".$entity->getNombreCorto()."'>";
                $lista .= "<a href='".$entity->getRuta()."'>";
                    $lista .= "<i class='".$entity->getIcono()."'></i>&nbsp;&nbsp;".$entity->getNombre();
                    $lista .= "<i class='fa fa-angle-left pull-right'></i>";
                $lista .= "</a>";
            $lista .= "</li>";
        }

        $lista .= "</ul>";

        return $lista;
    }
}