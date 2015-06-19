<?php

namespace Crece\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoModelo
 *
 * @ORM\Table(name="tipo_modelo")
 * @ORM\Entity
 */
class TipoModelo
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
     * @ORM\Column(name="nombre", type="string", length=120)
     */
    private $nombre;

    /**
     * @var text
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="condicion", type="boolean")
     */
    private $condicion;

    /**
     * @ORM\OneToMany(targetEntity="Crece\RegistroBundle\Entity\ModeloPrenda", mappedBy="modelo_prenda")
     */
    private $tipo_modelo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tipo_modelo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return TipoModelo
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
     * @return TipoModelo
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
     * @return TipoModelo
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
     * @return TipoModelo
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
     * Add tipo_modelo
     *
     * @param \Crece\RegistroBundle\Entity\ModeloPrenda $tipoModelo
     * @return TipoModelo
     */
    public function addTipoModelo(\Crece\RegistroBundle\Entity\ModeloPrenda $tipoModelo)
    {
        $this->tipo_modelo[] = $tipoModelo;

        return $this;
    }

    /**
     * Remove tipo_modelo
     *
     * @param \Crece\RegistroBundle\Entity\ModeloPrenda $tipoModelo
     */
    public function removeTipoModelo(\Crece\RegistroBundle\Entity\ModeloPrenda $tipoModelo)
    {
        $this->tipo_modelo->removeElement($tipoModelo);
    }

    /**
     * Get tipo_modelo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTipoModelo()
    {
        return $this->tipo_modelo;
    }
}
