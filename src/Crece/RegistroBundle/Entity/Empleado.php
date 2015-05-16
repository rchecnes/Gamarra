<?php

namespace Crece\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity
 */
class Empleado
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
     * @var string
     *
     * @ORM\Column(name="ano", type="string", length=4)
     */
    private $ano;

    /**
     * @ORM\OneToMany(targetEntity="Crece\RegistroBundle\Entity\CortePrenda", mappedBy="empleado")
     */
    protected $corte_prenda;

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
     * Set estado
     *
     * @param boolean $estado
     * @return Empleado
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
     * @return Empleado
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
     * Set ano
     *
     * @param string $ano
     * @return Empleado
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
     * Constructor
     */
    public function __construct()
    {
        $this->corte_prenda = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add corte_prenda
     *
     * @param \Crece\RegistroBundle\Entity\CortePrenda $cortePrenda
     * @return Empleado
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
