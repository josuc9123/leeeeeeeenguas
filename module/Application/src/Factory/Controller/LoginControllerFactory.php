<?php 

namespace Application\Factory\Controller;

use Application\Controller\LoginController;
use Application\Service\UserManager;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\Authentication\AuthenticationService;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use Laminas\ServiceManager\Factory\FactoryInterface;

class LoginControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authService = $container->get(AuthenticationService::class);
        $userManager = $container->get(UserManager::class);

        return new LoginController($authService, $userManager);
    }
}