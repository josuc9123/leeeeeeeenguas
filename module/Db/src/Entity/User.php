<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int|null
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(name="first_name", type="string")
     * @var string
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string")
     * @var string
     */
    protected $lastName;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity="Personal", mappedBy="user")
     * @var Personal
     */
    protected $informacionPersonal;

    /**
     * @ORM\OneToMany(targetEntity="Telefono", mappedBy="user", cascade = "persist", fetch="EAGER")
     */
    protected $telefonos;

    public function __construct()
    {
        $this->telefonos = new \Doctrine\Common\Collections\ArrayCollection;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }
    
    public function setCreatedAt(\Datetime $createdAt): User
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(\Datetime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function getInformacionPersonal(): Personal
    {
        return $this->informacionPersonal;
    }

    public function getTelefonos()
    {
        return $this->telefonos;
    }
}
