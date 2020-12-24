<?php 

namespace Personal\Action;

use Db\Entity\Personal;
use Doctrine\ORM\EntityManager;

class FindPersonalByUserId
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(int $userId)
    {
        return $this->entityManager->getRepository(Personal::class)
            ->findOneBy(['user' => $userId]);
    }
}
