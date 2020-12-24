<?php 

namespace User\Action;

use Db\Entity\User;
use Doctrine\ORM\EntityManager;

class UpdateUser
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(User $user, array $data)
    {
        $user->setUsername($data['username'])
            ->setEmail($data['email'])
            ->setFirstName($data['first_name'])
            ->setLastName($data['last_name'])
            ->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}

