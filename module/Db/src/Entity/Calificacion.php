<?php 

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="alumnos_calificaciones");
 */
class Calificacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Alumno", inversedBy="calificaciones", fetch="EAGER")
     * @ORM\JoinColumn(name="no_de_control", referencedColumnName="no_de_control")
     */
    protected $alumno;

    /**
     * @ORM\OneToOne(targetEntity="Grupo")
     * @ORM\JoinColumn(name="clave", referencedColumnName="clave")
     */
    protected $grupo;

    /**
     * @ORM\Column(type="integer")
     */
    protected $parcial;

    /**
     * @ORM\Column(type="integer")
     */
    protected $calificacion;

    public function setAlumno(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }

    public function getAlumno()
    {
        return $this->alumno;
    }

    public function setGrupo(Grupo $grupo)
    {
        $this->grupo = $grupo;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    public function setParcial(int $parcial)
    {
        $this->parcial = $parcial;
    }

    public function getParcial()
    {
        return $this->parcial;
    }

    public function setCalificacion(int $calificacion)
    {
        $this->calificacion = $calificacion;
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }
}

