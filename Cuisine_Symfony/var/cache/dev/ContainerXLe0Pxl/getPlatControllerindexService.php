<?php

namespace ContainerXLe0Pxl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPlatControllerindexService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.9T6YsAE.App\Controller\API\PlatController::index()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.9T6YsAE.App\\Controller\\API\\PlatController::index()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'platRepository' => ['privates', 'App\\Repository\\PlatRepository', 'getPlatRepositoryService', true],
        ], [
            'platRepository' => 'App\\Repository\\PlatRepository',
        ]))->withContext('App\\Controller\\API\\PlatController::index()', $container);
    }
}
