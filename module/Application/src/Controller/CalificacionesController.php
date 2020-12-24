<?php

namespace Application\Controller;

use Db\Entity\Alumno;
use Db\Entity\Grupo;
use Db\Entity\Calificacion;
use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class CalificacionesController extends AbstractActionController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        //$grupo = $this->entityManager->getRepository(Grupo::class)->find('ABC');
        //$qb = $this->entityManager->getRepository(Alumno::class)
        //->createQueryBuilder('a');
        //$qb->where($qb->expr()->gt('a.noDeControl', ':noDeControl'))
        //->setParameter('noDeControl', '1627001');
        //$result = $qb->getQuery()->getResult();

        //foreach ($result as $alumno){
            //$alumno->getGrupos()->add($grupo);
           // $grupo->getAlumnos()->add($alumno);
          //  $this->entityManager->persist($alumno);
        //}
       // $this->entityManager->flush();

        //$grupos = [
            //['clave' => 'ABC'],
           // ['clave' => 'ABB'],
            //['clave' => 'ACC'],
          //  ['clave' => 'AAA'],
        //];
        //foreach ($grupos as $grupo) {
            //$entity = new Grupo;
            //$entity->setClave($grupo['clave']);
           // $this->entityManager->persist($entity);
          //  $this->entityManager->flush();
        //}
       // $alumnos =[
         //   ['noDeControl' => '1627001','nombre'=>'Estudiante 1'],
        //    ['noDeControl' => '1627002','nombre'=>'Estudiante 2'],
           // ['noDeControl' => '1627003','nombre'=>'Estudiante 3'],
            //['noDeControl' => '1627004','nombre'=>'Estudiante 4'],
            
        //];
        //foreach ($alumnos as $alumno){
          //  $entity = new Alumno();
            //$entity->setNoDeControl($alumno['noDeControl']);
            //$entity->setNombre($alumno['nombre']);
            //$this->entityManager->persist($entity);
            //$this->entityManager->flush();

        //}
        $grupo = $this->entityManager->getRepository(Grupo::class)->findOneBy(['clave' => 'ABC']);
        $alumnos = $grupo->getAlumnos();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost('calificaciones');
            
            $this->save($data, $grupo);
            
            dd($data);
        }

        return new ViewModel([
            'alumnos' => $alumnos,
        ]);
    }

    private function save($data, $grupo)
    {
        foreach($data as $key => $value) {
            $alumno = $grupo->getAlumnos()->filter(function ($item) use ($key) {
                return $item->getNoDeControl() == $key;
            })->first();

            $calificacion = new Calificacion;
            $calificacion->setAlumno($alumno);
            $calificacion->setGrupo($grupo);
            $calificacion->setParcial(1);
            $calificacion->setCalificacion($value);
            
            $this->entityManager->persist($calificacion);
        }

        $this->entityManager->flush();
    }
}
