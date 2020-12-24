<?php 

namespace User;

return [
    'service_manager' => [
        'factories' => [
            Action\CreateNewUser::class => Factory\Action\CreateNewUserFactory::class,
            Action\UpdateUser::class    => Factory\Action\UpdateUserFactory::class,
            Action\UpdatePasswordUser::class => Factory\Action\UpdatePasswordUserFactory::class,
        ],
    ],
];
