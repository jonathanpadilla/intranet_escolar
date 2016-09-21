<?php

namespace AlumnoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlumAlumno
 *
 * @ORM\Table(name="alum_alumno", indexes={@ORM\Index(name="alu_persona_fk", columns={"alu_persona_fk"})})
 * @ORM\Entity
 */
class AlumAlumno
{
    /**
     * @var integer
     *
     * @ORM\Column(name="alu_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aluIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="alu_clave", type="string", length=150, nullable=true)
     */
    private $aluClave;

    /**
     * @var integer
     *
     * @ORM\Column(name="alu_estado_vinculo", type="integer", nullable=true)
     */
    private $aluEstadoVinculo;

    /**
     * @var string
     *
     * @ORM\Column(name="alu_comentario", type="text", length=65535, nullable=true)
     */
    private $aluComentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alu_fecha_registro", type="datetime", nullable=true)
     */
    private $aluFechaRegistro;

    /**
     * @var \PerPersona
     *
     * @ORM\ManyToOne(targetEntity="PerPersona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alu_persona_fk", referencedColumnName="per_id_pk")
     * })
     */
    private $aluPersonaFk;



    /**
     * Get aluIdPk
     *
     * @return integer 
     */
    public function getAluIdPk()
    {
        return $this->aluIdPk;
    }

    /**
     * Set aluClave
     *
     * @param string $aluClave
     * @return AlumAlumno
     */
    public function setAluClave($aluClave)
    {
        $this->aluClave = $aluClave;

        return $this;
    }

    /**
     * Get aluClave
     *
     * @return string 
     */
    public function getAluClave()
    {
        return $this->aluClave;
    }

    /**
     * Set aluEstadoVinculo
     *
     * @param integer $aluEstadoVinculo
     * @return AlumAlumno
     */
    public function setAluEstadoVinculo($aluEstadoVinculo)
    {
        $this->aluEstadoVinculo = $aluEstadoVinculo;

        return $this;
    }

    /**
     * Get aluEstadoVinculo
     *
     * @return integer 
     */
    public function getAluEstadoVinculo()
    {
        return $this->aluEstadoVinculo;
    }

    /**
     * Set aluComentario
     *
     * @param string $aluComentario
     * @return AlumAlumno
     */
    public function setAluComentario($aluComentario)
    {
        $this->aluComentario = $aluComentario;

        return $this;
    }

    /**
     * Get aluComentario
     *
     * @return string 
     */
    public function getAluComentario()
    {
        return $this->aluComentario;
    }

    /**
     * Set aluFechaRegistro
     *
     * @param \DateTime $aluFechaRegistro
     * @return AlumAlumno
     */
    public function setAluFechaRegistro($aluFechaRegistro)
    {
        $this->aluFechaRegistro = $aluFechaRegistro;

        return $this;
    }

    /**
     * Get aluFechaRegistro
     *
     * @return \DateTime 
     */
    public function getAluFechaRegistro()
    {
        return $this->aluFechaRegistro;
    }

    /**
     * Set aluPersonaFk
     *
     * @param \AlumnoBundle\Entity\PerPersona $aluPersonaFk
     * @return AlumAlumno
     */
    public function setAluPersonaFk(\AlumnoBundle\Entity\PerPersona $aluPersonaFk = null)
    {
        $this->aluPersonaFk = $aluPersonaFk;

        return $this;
    }

    /**
     * Get aluPersonaFk
     *
     * @return \AlumnoBundle\Entity\PerPersona 
     */
    public function getAluPersonaFk()
    {
        return $this->aluPersonaFk;
    }
}
