<?php

namespace ContainerXLe0Pxl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategorieControllerdelete2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.sMuMIEm.App\Controller\API\CategorieController::delete()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.sMuMIEm.App\\Controller\\API\\CategorieController::delete()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'categorieRepository' => ['privates', 'App\\Repository\\CategorieRepository', 'getCategorieRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
        ], [
            'categorieRepository' => 'App\\Repository\\CategorieRepository',
            'entityManager' => '?',
        ]))->withContext('App\\Controller\\API\\CategorieController::delete()', $container);
    }
}
