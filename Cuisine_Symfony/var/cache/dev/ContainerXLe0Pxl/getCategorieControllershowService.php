<?php

namespace ContainerXLe0Pxl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategorieControllershowService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.z9d.XgN.App\Controller\API\CategorieController::show()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.z9d.XgN.App\\Controller\\API\\CategorieController::show()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'categorie' => ['privates', '.errored..service_locator.z9d.XgN.App\\Entity\\Categorie', NULL, 'Cannot autowire service ".service_locator.z9d.XgN": it needs an instance of "App\\Entity\\Categorie" but this type has been excluded in "config/services.yaml".'],
        ], [
            'categorie' => 'App\\Entity\\Categorie',
        ]))->withContext('App\\Controller\\API\\CategorieController::show()', $container);
    }
}
