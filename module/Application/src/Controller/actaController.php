<?php
namespace Application\Controller;
use Db\Entity\Alumno;
use Db\Entity\Grupo;
use Db\Entity\Calificacion;
use Doctrine\ORM\EntityManager;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class actaController extends AbstractActionController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function actaAction()
    {
        $calificaciones = $this->entityManager->getRepository(Calificacion::class)->findOneBy('ASC')->getCalificacion();
        $grupo = $this->entityManager->getRepository(Grupo::class)->findOneBy(['clave' => 'ABC']);
        $alumnos = $grupo->getAlumnos();
       

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost('calificaciones');
            
            $this->save($data, $grupo);
            
            dd($data);
        }

        return new ViewModel([
            'alumnos' => $alumnos,
            'alumnos_calificaciones' => $calificaciones,
        ]);
    }
}