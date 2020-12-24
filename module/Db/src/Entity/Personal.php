<?php 

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="personal")
 */
class Personal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     * @var int
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="informacionPersonal", fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $apellidos;

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

    public function setId(int $id): Personal
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): Personal
    {
        $this->userId = $userId;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Personal
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): Personal
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getCreatedAt(): \Datetime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\Datetime $createdAt): Personal
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): \Datetime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\Datetime $updatedAt): Personal
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
