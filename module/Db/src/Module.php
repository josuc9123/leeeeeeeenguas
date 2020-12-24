<?php

namespace Db;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;
class Module implements ConfigProviderInterface 
{
    public function getConfig()
    {
        return include __DIR__ . '/../Config/module.config.php';

    }
}
