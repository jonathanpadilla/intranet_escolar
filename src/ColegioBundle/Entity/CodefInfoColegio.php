<?php

namespace ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodefInfoColegio
 *
 * @ORM\Table(name="codef_info_colegio")
 * @ORM\Entity
 */
class CodefInfoColegio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="inf_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $infIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="inf_nombre", type="string", length=50, nullable=true)
     */
    private $infNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="inf_valor", type="string", length=200, nullable=true)
     */
    private $infValor;



    /**
     * Get infIdPk
     *
     * @return integer 
     */
    public function getInfIdPk()
    {
        return $this->infIdPk;
    }

    /**
     * Set infNombre
     *
     * @param string $infNombre
     * @return CodefInfoColegio
     */
    public function setInfNombre($infNombre)
    {
        $this->infNombre = $infNombre;

        return $this;
    }

    /**
     * Get infNombre
     *
     * @return string 
     */
    public function getInfNombre()
    {
        return $this->infNombre;
    }

    /**
     * Set infValor
     *
     * @param string $infValor
     * @return CodefInfoColegio
     */
    public function setInfValor($infValor)
    {
        $this->infValor = $infValor;

        return $this;
    }

    /**
     * Get infValor
     *
     * @return string 
     */
    public function getInfValor()
    {
        return $this->infValor;
    }
}
