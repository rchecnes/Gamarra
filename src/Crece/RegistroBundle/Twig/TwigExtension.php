<?php
namespace Crece\RegistroBundle\Twig;

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
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
        );
    }

    public function getFunctions()
    {
        return array(
            'saludos' => new \Twig_Function_Method($this, 'saludos')
        );
    }
    
    public function getName()
    {
        return 'registro_extension';
    }

    public function saludos($mensaje){

        return $mensaje;
    }

    public function priceFilter(){
        return "000";
    }
}