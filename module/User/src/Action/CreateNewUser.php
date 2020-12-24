<?php 

namespace User\Action;

use Db\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateNewUser
{
    use CreatePasswordTrait;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(array $data)
    {
        $password = $this->createPassword($data['password']);
        $user = new User();
        $user->setUsername($data['username'])
            ->setPassword($password)
            ->setEmail($data['email'])
            ->setFirstName($data['first_name'])
            ->setLastName($data['last_name'])
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}

