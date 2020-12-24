<?php 

namespace Application\Service;

use Db\Entity\User;
use Doctrine\ORM\EntityManager;

class UserManager
{

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function usersExists()
    {
        $qb = $this->entityManager->getRepository(User::class)->createQueryBuilder('u');
        $qb->select('COUNT (u.id)');

        $result = $qb->getQuery()->getSingleScalarResult();
        
        return $result > 0;
    }

    public function createAdminUser()
    {
        $password = \password_hash('password', PASSWORD_DEFAULT);
        $user = new User();
        $user->setUsername('admin')
            ->setPassword($password)
            ->setFirstName('Administrador')
            ->setLastName('-')
            ->setEmail('admin@proyecto.local')
            ->setCreatedAt(new \DateTime)
            ->setUpdatedAt(new \DateTime);
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function checkAdminCreate()
    {
        if (!$this->usersExists()) {
            $this->createAdminUser();
        }
    }

    public function update(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function findUser(int $id): ?User
    {
        return $this->entityManager->getRepository(User::class)->find($id);
    }
}
