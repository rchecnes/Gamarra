<?php

namespace Crece\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelo
 *
 * @ORM\Table(name="modelo_prenda")
 * @ORM\Entity
 */
class ModeloPrenda
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
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\TipoModelo", inversedBy="tipo_modelo")
     * @ORM\JoinColumn(name="tipo_modelo_id", referencedColumnName="id")
     */
    protected $modelo_prenda;

    /**
     * @ORM\OneToMany(targetEntity="Crece\RegistroBundle\Entity\CortePrenda", mappedBy="modelo_prenda")
     */
    private $corte_prenda;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corte_prenda = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return ModeloPrenda
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
     * @return ModeloPrenda
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
     * @return ModeloPrenda
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
     * @return ModeloPrenda
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
     * Set modelo_prenda
     *
     * @param \Crece\RegistroBundle\Entity\TipoModelo $modeloPrenda
     * @return ModeloPrenda
     */
    public function setModeloPrenda(\Crece\RegistroBundle\Entity\TipoModelo $modeloPrenda = null)
    {
        $this->modelo_prenda = $modeloPrenda;

        return $this;
    }

    /**
     * Get modelo_prenda
     *
     * @return \Crece\RegistroBundle\Entity\TipoModelo 
     */
    public function getModeloPrenda()
    {
        return $this->modelo_prenda;
    }

    /**
     * Add corte_prenda
     *
     * @param \Crece\RegistroBundle\Entity\CortePrenda $cortePrenda
     * @return ModeloPrenda
     */
    public function addCortePrenda(\Crece\RegistroBundle\Entity\CortePrenda $cortePrenda)
    {
        $this->corte_prenda[] = $cortePrenda;

        return $this;
    }

    /**
     * Remove corte_prenda
     *
     * @param \Crece\RegistroBundle\Entity\CortePrenda $cortePrenda
     */
    public function removeCortePrenda(\Crece\RegistroBundle\Entity\CortePrenda $cortePrenda)
    {
        $this->corte_prenda->removeElement($cortePrenda);
    }

    /**
     * Get corte_prenda
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCortePrenda()
    {
        return $this->corte_prenda;
    }
}
