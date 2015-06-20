<?php

namespace Crece\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CortePrenda
 *
 * @ORM\Table(name="corte_prenda")
 * @ORM\Entity
 */
class CortePrenda
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
     * @var text
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_total", type="integer")
     */
    private $cantidad_total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_corte", type="date", nullable=true)
     */
    private $fecha_corte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=true)
     */
    private $fecha_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificación", type="date", nullable=true)
     */
    private $fecha_modificación;

    /**
     * @var string
     *
     * @ORM\Column(name="ano", type="string", length=4)
     */
    private $ano;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", options={"default":1})
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\Persona", inversedBy="corte_prenda")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    protected $persona;

    /**
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\TipoModelo", inversedBy="corte_prenda")
     * @ORM\JoinColumn(name="tipo_modelo_id", referencedColumnName="id")
     */
    protected $tipo_modelo;

    /**
     * @ORM\OneToMany(targetEntity="Crece\RegistroBundle\Entity\CortePrendaDetalle", mappedBy="corte_prenda")
     */
     private $corte_prenda_detalle;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corte_prenda_detalle = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return CortePrenda
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
     * @return CortePrenda
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
     * Set cantidad_total
     *
     * @param integer $cantidadTotal
     * @return CortePrenda
     */
    public function setCantidadTotal($cantidadTotal)
    {
        $this->cantidad_total = $cantidadTotal;

        return $this;
    }

    /**
     * Get cantidad_total
     *
     * @return integer 
     */
    public function getCantidadTotal()
    {
        return $this->cantidad_total;
    }

    /**
     * Set fecha_corte
     *
     * @param \DateTime $fechaCorte
     * @return CortePrenda
     */
    public function setFechaCorte($fechaCorte)
    {
        $this->fecha_corte = $fechaCorte;

        return $this;
    }

    /**
     * Get fecha_corte
     *
     * @return \DateTime 
     */
    public function getFechaCorte()
    {
        return $this->fecha_corte;
    }

    /**
     * Set fecha_creacion
     *
     * @param \DateTime $fechaCreacion
     * @return CortePrenda
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fecha_creacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fecha_creacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set fecha_modificación
     *
     * @param \DateTime $fechaModificación
     * @return CortePrenda
     */
    public function setFechaModificación($fechaModificación)
    {
        $this->fecha_modificación = $fechaModificación;

        return $this;
    }

    /**
     * Get fecha_modificación
     *
     * @return \DateTime 
     */
    public function getFechaModificación()
    {
        return $this->fecha_modificación;
    }

    /**
     * Set ano
     *
     * @param string $ano
     * @return CortePrenda
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return string 
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return CortePrenda
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
     * Set persona
     *
     * @param \Crece\RegistroBundle\Entity\Persona $persona
     * @return CortePrenda
     */
    public function setPersona(\Crece\RegistroBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \Crece\RegistroBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set tipo_modelo
     *
     * @param \Crece\RegistroBundle\Entity\TipoModelo $tipoModelo
     * @return CortePrenda
     */
    public function setTipoModelo(\Crece\RegistroBundle\Entity\TipoModelo $tipoModelo = null)
    {
        $this->tipo_modelo = $tipoModelo;

        return $this;
    }

    /**
     * Get tipo_modelo
     *
     * @return \Crece\RegistroBundle\Entity\TipoModelo 
     */
    public function getTipoModelo()
    {
        return $this->tipo_modelo;
    }

    /**
     * Add corte_prenda_detalle
     *
     * @param \Crece\RegistroBundle\Entity\CortePrendaDetalle $cortePrendaDetalle
     * @return CortePrenda
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
