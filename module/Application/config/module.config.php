<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'  => Literal::class,
                'options' => [
                    'route' => '/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'calificaciones' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/calificaciones',
                    'defaults' => [
                        'controller' => Controller\CalificacionesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'calificacionparcial' => [
                'type' => literal::class,
                'options' => [
                    'route' => '/calificacionparcial',
                    'defaults' => [
                        'controller' => Controller\CalificacionController::class,
                        'action'     => 'calificacion',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Factory\Controller\IndexControllerFactory::class,
            Controller\LoginController::class => Factory\Controller\LoginControllerFactory::class,
            Controller\CalificacionController::class => InvokableFactory::class,
            Controller\CalificacionesController::class => Factory\Controller\CalificacionesControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ],
    ],

    'service_manager' => [
        'factories'  => [
            Service\UserManager::class => Factory\Service\UserManagerFactory::class,
        ],
        'delegators' => [
            \Laminas\Mvc\I18n\Translator::class => [
                Service\TranslatorDelegator::class,
            ],
        ],
    ],

    'doctrine' => [
        'authentication' => [
            'orm_default' => [
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Db\Entity\User',
                'identity_property'   => 'username',
                'credential_property' => 'password',
                'credential_callable' => function (\Db\Entity\User $user, $password) {
                    return \password_verify($password, $user->getPassword());
                }
            ],
        ],
    ],
];
