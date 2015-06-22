<?php

namespace Crece\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 *
 * @ORM\Table(name="color")
 * @ORM\Entity
 */
class Color
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", options={"default":1})
     */
    private $estado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="condicion", type="boolean", options={"default":1})
     */
    private $condicion;

    /**
     * @ORM\OneToMany(targetEntity="Crece\RegistroBundle\Entity\CortePrendaDetalle", mappedBy="color")
     */
     private $corte_prenda_detalle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corte_prenda_detalle = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Color
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Color
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Color
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set condicion
     *
     * @param boolean $condicion
     * @return Color
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;

        return $this;
    }

    /**
     * Get condicion
     *
     * @return boolean 
     */
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Add corte_prenda_detalle
     *
     * @param \Crece\RegistroBundle\Entity\CortePrendaDetalle $cortePrendaDetalle
     * @return Color
     */
    public function addCortePrendaDetalle(\Crece\RegistroBundle\Entity\CortePrendaDetalle $cortePrendaDetalle)
    {
        $this->corte_prenda_detalle[] = $cortePrendaDetalle;

        return $this;
    }

    /**
     * Remove corte_prenda_detalle
     *
     * @param \Crece\RegistroBundle\Entity\CortePrendaDetalle $cortePrendaDetalle
     */
    public function removeCortePrendaDetalle(\Crece\RegistroBundle\Entity\CortePrendaDetalle $cortePrendaDetalle)
    {
        $this->corte_prenda_detalle->removeElement($cortePrendaDetalle);
    }

    /**
     * Get corte_prenda_detalle
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCortePrendaDetalle()
    {
        return $this->corte_prenda_detalle;
    }
}
