<?php 

namespace User\Action;

use Db\Entity\User;
use Doctrine\ORM\EntityManager;

class UpdatePasswordUser
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

    public function execute(User $user, string $password)
    {
        $password = $this->createPassword($password);
        $user
            ->setPassword($password)
            ->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}

