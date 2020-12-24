<?php 

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="telefonos")
 */
class Telefono
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="telefonos", fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $telefono;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @var \Datetime
     */
    protected $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Telefono
    {
        $this->id = $id;
        return $this;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): Telefono
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getCreatedAt(): \Datetime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\Datetime $createdAt): Telefono
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): \Datetime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\Datetime $updatedAt): Telefono
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}
