<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Laminas\I18n\Translator\Resources;
use Laminas\ServiceManager\DelegatorFactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class TranslatorDelegator implements DelegatorFactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $name,
        callable $callback,
        array $options = null
    ) {
        $translator = $callback();

        $translator->addTranslationFilePattern(
            'phpArray',
            Resources::getBasePath(),
            Resources::getPatternForValidator()
        );
        $translator->addTranslationFilePattern(
            'phpArray',
            Resources::getBasePath(),
            Resources::getPatternForCaptcha()
        );

        return $translator;
    }

    public function createDelegatorWithName(
        ServiceLocatorInterface $container,
        $name,
        $requestedName,
        $callback
    ) {
        return $this($container, $requestedName, $callback);
    }
}
