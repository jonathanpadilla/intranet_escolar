<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerHojavida
 *
 * @ORM\Table(name="per_hojavida", indexes={@ORM\Index(name="hoj_persona_fk", columns={"pho_persona_fk"}), @ORM\Index(name="hoj_redactor_fk", columns={"pho_redactor_fk"})})
 * @ORM\Entity
 */
class PerHojavida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pho_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phoIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="pho_anotacion", type="text", length=65535, nullable=true)
     */
    private $phoAnotacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pho_fecha_registro", type="datetime", nullable=true)
     */
    private $phoFechaRegistro;

    /**
     * @var \PerPersona
     *
     * @ORM\ManyToOne(targetEntity="PerPersona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pho_persona_fk", referencedColumnName="per_id_pk")
     * })
     */
    private $phoPersonaFk;

    /**
     * @var \PerPersona
     *
     * @ORM\ManyToOne(targetEntity="PerPersona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pho_redactor_fk", referencedColumnName="per_id_pk")
     * })
     */
    private $phoRedactorFk;



    /**
     * Get phoIdPk
     *
     * @return integer 
     */
    public function getPhoIdPk()
    {
        return $this->phoIdPk;
    }

    /**
     * Set phoAnotacion
     *
     * @param string $phoAnotacion
     * @return PerHojavida
     */
    public function setPhoAnotacion($phoAnotacion)
    {
        $this->phoAnotacion = $phoAnotacion;

        return $this;
    }

    /**
     * Get phoAnotacion
     *
     * @return string 
     */
    public function getPhoAnotacion()
    {
        return $this->phoAnotacion;
    }

    /**
     * Set phoFechaRegistro
     *
     * @param \DateTime $phoFechaRegistro
     * @return PerHojavida
     */
    public function setPhoFechaRegistro($phoFechaRegistro)
    {
        $this->phoFechaRegistro = $phoFechaRegistro;

        return $this;
    }

    /**
     * Get phoFechaRegistro
     *
     * @return \DateTime 
     */
    public function getPhoFechaRegistro()
    {
        return $this->phoFechaRegistro;
    }

    /**
     * Set phoPersonaFk
     *
     * @param \BaseBundle\Entity\PerPersona $phoPersonaFk
     * @return PerHojavida
     */
    public function setPhoPersonaFk(\BaseBundle\Entity\PerPersona $phoPersonaFk = null)
    {
        $this->phoPersonaFk = $phoPersonaFk;

        return $this;
    }

    /**
     * Get phoPersonaFk
     *
     * @return \BaseBundle\Entity\PerPersona 
     */
    public function getPhoPersonaFk()
    {
        return $this->phoPersonaFk;
    }

    /**
     * Set phoRedactorFk
     *
     * @param \BaseBundle\Entity\PerPersona $phoRedactorFk
     * @return PerHojavida
     */
    public function setPhoRedactorFk(\BaseBundle\Entity\PerPersona $phoRedactorFk = null)
    {
        $this->phoRedactorFk = $phoRedactorFk;

        return $this;
    }

    /**
     * Get phoRedactorFk
     *
     * @return \BaseBundle\Entity\PerPersona 
     */
    public function getPhoRedactorFk()
    {
        return $this->phoRedactorFk;
    }
}
