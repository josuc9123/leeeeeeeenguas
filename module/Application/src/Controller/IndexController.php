<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\View\Model\JsonModel;
use User\Action\CreateNewUser;
use Personal\Action\CreateNewPersonal;
use Personal\Action\FindPersonalByUserId;
use Application\Service\UserManager;
use Db\Entity\User;
use Db\Entity\Telefono;

class IndexController extends AbstractActionController
{
    /**
     * @var CreateNewUser
     */
    protected $createNewUser;

    protected $createNewPersonal;

    protected $findPersonalByUserId;

    protected $userManager;

    public function __construct(
        CreateNewUser $createNewUser, 
        CreateNewPersonal $createNewPersonal,
        FindPersonalByUserId $findPersonalByUserId,
        UserManager $userManager
    ) {
        $this->createNewUser = $createNewUser;
        $this->createNewPersonal = $createNewPersonal;
        $this->findPersonalByUserId = $findPersonalByUserId;
        $this->userManager = $userManager;
    }

    public function indexAction()
    {
        // $user = $this->createNewUser->execute([
        //     'username' => 'pruebas',
        //     'password' => 'password',
        //     'first_name' => 'Pruebas',
        //     'last_name'  => 'Apellido',
        //     'email'      => 'pruebas@test.local'
        // ]);

        // $personal = $this->createNewPersonal->execute([
        //     'user_id' => $user->getId(),
        //     'nombre'  => $user->getFirstName(),
        //     'apellidos' => $user->getLastName(),
        // ]);
        
        // $personal = $this->findPersonalByUserId->execute(1);
        $user = $this->userManager->findUser(1);
        dump($user);
       
        $telefono = new Telefono();
        $telefono->setUser($user);
        $telefono->setTelefono('961000004');
        $telefono->setCreatedAt(new \DateTime);
        $telefono->setUpdatedAt(new \DateTime);
        
        $user->getTelefonos()->add($telefono);
        
        $this->userManager->update($user);
        
        dd($user->getTelefonos());

        return new ViewModel([
            // 'user' => $user,
        ]);
    }

    public function saludoAction()
    {
        return new JsonModel([
            'data' => [
                'saludo' => 'Hola',
            ],
        ]);
    }
}
