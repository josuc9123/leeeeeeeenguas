<?php 

namespace Application\Factory\Controller;

use Application\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Action\CreateNewUser;
use Personal\Action\CreateNewPersonal;
use Personal\Action\FindPersonalByUserId;
use Application\Service\UserManager;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $createNewUser = $container->get(CreateNewUser::class);
        $createNewPersonal = $container->get(CreateNewPersonal::class);
        $findPersonalByUserId = $container->get(FindPersonalByUserId::class);
        $userManager = $container->get(UserManager::class);

        return new IndexController(
            $createNewUser, 
            $createNewPersonal,
            $findPersonalByUserId,
            $userManager
        );
    }
}
