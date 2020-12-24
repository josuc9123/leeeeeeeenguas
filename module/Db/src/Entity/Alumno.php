<?php 

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="alumnos");
 */
class Alumno
{
    /**
     * @ORM\Id
     * @ORM\Column(name="no_de_control", type="string")
     */
    protected $noDeControl;

    /**
     * @ORM\Column(type="string")
     */
    protected $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Calificacion", mappedBy="alumno")
     * @var ArrayCollection
     */
    protected $calificaciones;

    /**
     * @ORM\ManyToMany(targetEntity="Grupo", mappedBy="alumnos")
     */
    protected $grupos;

    public function __construct()
    {
        $this->calificaciones = new ArrayCollection;
        $this->grupos = new ArrayCollection;
    }

    public function setNoDeControl(string $noDeControl)
    {
        $this->noDeControl = $noDeControl;
    }

    public function getNoDeControl()
    {
        return $this->noDeControl;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCalificaciones()
    {
        return $this->calificaciones;
    }

    public function getGrupos() 
    {
        return $this->grupos;
    }
}
