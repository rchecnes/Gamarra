<?php

namespace Crece\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CortePrendaDetalle
 *
 * @ORM\Table(name="corte_prenda_detalle")
 * @ORM\Entity
 */
class CortePrendaDetalle
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
     * @ORM\Column(name="cantidad", type="decimal")
     */
    private $cantidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", options={"default":1})
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\CortePrenda", inversedBy="corte_prenda_detalle")
     * @ORM\JoinColumn(name="corte_prenda_id", referencedColumnName="id")
     */
    protected $corte_prenda;

    /**
     * @ORM\ManyToOne(targetEntity="Crece\RegistroBundle\Entity\Color", inversedBy="corte_prenda_detalle")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    protected $color;


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
     * @param string $cantidad
     * @return CortePrendaDetalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return CortePrendaDetalle
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
     * Set corte_prenda
     *
     * @param \Crece\RegistroBundle\Entity\CortePrenda $cortePrenda
     * @return CortePrendaDetalle
     */
    public function setCortePrenda(\Crece\RegistroBundle\Entity\CortePrenda $cortePrenda = null)
    {
        $this->corte_prenda = $cortePrenda;

        return $this;
    }

    /**
     * Get corte_prenda
     *
     * @return \Crece\RegistroBundle\Entity\CortePrenda
     */
    public function getCortePrenda()
    {
        return $this->corte_prenda;
    }

    /**
     * Set color
     *
     * @param \Crece\RegistroBundle\Entity\Color $color
     * @return CortePrendaDetalle
     */
    public function setColor(\Crece\RegistroBundle\Entity\Color $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \Crece\RegistroBundle\Entity\Color
     */
    public function getColor()
    {
        return $this->color;
    }
}
