<?php 

namespace Personal;

return [
    'service_manager' => [
        'factories' => [
            Action\CreateNewPersonal::class => Factory\Action\CreateNewPersonalFactory::class,
            Action\FindPersonalByUserId::class => Factory\Action\FindPersonalByUserIdFactory::class,
        ],
    ]
];

