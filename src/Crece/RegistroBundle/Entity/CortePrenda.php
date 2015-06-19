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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date")
     */
    private $fecha_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificación", type="date")
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
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\Persona", inversedBy="corte_prenda")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    protected $persona;

    /**
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\ModeloPrenda", inversedBy="corte_prenda")
     * @ORM\JoinColumn(name="modelo_prenda_id", referencedColumnName="id")
     */
    protected $modelo_prenda;

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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return CortePrenda
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
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
     * Set condicion
     *
     * @param boolean $condicion
     * @return CortePrenda
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
     * Set modelo_prenda
     *
     * @param \Crece\RegistroBundle\Entity\ModeloPrenda $modeloPrenda
     * @return CortePrenda
     */
    public function setModeloPrenda(\Crece\RegistroBundle\Entity\ModeloPrenda $modeloPrenda = null)
    {
        $this->modelo_prenda = $modeloPrenda;

        return $this;
    }

    /**
     * Get modelo_prenda
     *
     * @return \Crece\RegistroBundle\Entity\ModeloPrenda
     */
    public function getModeloPrenda()
    {
        return $this->modelo_prenda;
    }
}
