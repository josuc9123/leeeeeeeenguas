<?php 

namespace Personal\Action;

use Db\Entity\Personal;
use Doctrine\ORM\EntityManager;

class CreateNewPersonal 
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute($data): Personal
    {
        $personal = new Personal();
        $personal->setUserId($data['user_id'])
            ->setNombre($data['nombre'])
            ->setApellidos($data['apellidos'])
            ->setCreatedAt(new \Datetime)
            ->setUpdatedAt(new \Datetime);

        $this->entityManager->persist($personal);
        $this->entityManager->flush();

        return $personal;
    }
}
