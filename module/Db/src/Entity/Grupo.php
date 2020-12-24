<?php 

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="grupos");
 */
class Grupo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="clave", type="string")
     */
    protected $clave;

    /**
     * @ORM\ManyToMany(targetEntity="Alumno", inversedBy="grupos")
     * @ORM\JoinTable(name="alumnos_grupos", 
     *      joinColumns={@ORM\JoinColumn(name="clave", referencedColumnName="clave")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="no_de_control", referencedColumnName="no_de_control")}
     * )
     * @var ArrayCollection
     */
    protected $alumnos;

    public function __construct()
    {
        $this->alumnos = new ArrayCollection;
    }

    public function setClave(string $clave)
    {
        $this->clave = $clave;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getAlumnos()
    {
        return $this->alumnos;
    }
}
