<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerGrupofamiliar
 *
 * @ORM\Table(name="per_grupofamiliar", indexes={@ORM\Index(name="pgf_persona_fk", columns={"pgf_persona_fk"}), @ORM\Index(name="pgf_familia_fk", columns={"pgf_familia_fk"})})
 * @ORM\Entity
 */
class PerGrupofamiliar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pgf_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pgfIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="pgf_parentesco", type="string", length=20, nullable=true)
     */
    private $pgfParentesco;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pgf_fecha_registro", type="datetime", nullable=true)
     */
    private $pgfFechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="pgf_comentario", type="text", length=65535, nullable=true)
     */
    private $pgfComentario;

    /**
     * @var \PerPersona
     *
     * @ORM\ManyToOne(targetEntity="PerPersona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pgf_persona_fk", referencedColumnName="per_id_pk")
     * })
     */
    private $pgfPersonaFk;

    /**
     * @var \PerPersona
     *
     * @ORM\ManyToOne(targetEntity="PerPersona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pgf_familia_fk", referencedColumnName="per_id_pk")
     * })
     */
    private $pgfFamiliaFk;



    /**
     * Get pgfIdPk
     *
     * @return integer 
     */
    public function getPgfIdPk()
    {
        return $this->pgfIdPk;
    }

    /**
     * Set pgfParentesco
     *
     * @param string $pgfParentesco
     * @return PerGrupofamiliar
     */
    public function setPgfParentesco($pgfParentesco)
    {
        $this->pgfParentesco = $pgfParentesco;

        return $this;
    }

    /**
     * Get pgfParentesco
     *
     * @return string 
     */
    public function getPgfParentesco()
    {
        return $this->pgfParentesco;
    }

    /**
     * Set pgfFechaRegistro
     *
     * @param \DateTime $pgfFechaRegistro
     * @return PerGrupofamiliar
     */
    public function setPgfFechaRegistro($pgfFechaRegistro)
    {
        $this->pgfFechaRegistro = $pgfFechaRegistro;

        return $this;
    }

    /**
     * Get pgfFechaRegistro
     *
     * @return \DateTime 
     */
    public function getPgfFechaRegistro()
    {
        return $this->pgfFechaRegistro;
    }

    /**
     * Set pgfComentario
     *
     * @param string $pgfComentario
     * @return PerGrupofamiliar
     */
    public function setPgfComentario($pgfComentario)
    {
        $this->pgfComentario = $pgfComentario;

        return $this;
    }

    /**
     * Get pgfComentario
     *
     * @return string 
     */
    public function getPgfComentario()
    {
        return $this->pgfComentario;
    }

    /**
     * Set pgfPersonaFk
     *
     * @param \BaseBundle\Entity\PerPersona $pgfPersonaFk
     * @return PerGrupofamiliar
     */
    public function setPgfPersonaFk(\BaseBundle\Entity\PerPersona $pgfPersonaFk = null)
    {
        $this->pgfPersonaFk = $pgfPersonaFk;

        return $this;
    }

    /**
     * Get pgfPersonaFk
     *
     * @return \BaseBundle\Entity\PerPersona 
     */
    public function getPgfPersonaFk()
    {
        return $this->pgfPersonaFk;
    }

    /**
     * Set pgfFamiliaFk
     *
     * @param \BaseBundle\Entity\PerPersona $pgfFamiliaFk
     * @return PerGrupofamiliar
     */
    public function setPgfFamiliaFk(\BaseBundle\Entity\PerPersona $pgfFamiliaFk = null)
    {
        $this->pgfFamiliaFk = $pgfFamiliaFk;

        return $this;
    }

    /**
     * Get pgfFamiliaFk
     *
     * @return \BaseBundle\Entity\PerPersona 
     */
    public function getPgfFamiliaFk()
    {
        return $this->pgfFamiliaFk;
    }
}
