<?php

namespace ContainerXLe0Pxl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategorieControlleredit2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.if1zL3r.App\Controller\API\CategorieController::edit()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.if1zL3r.App\\Controller\\API\\CategorieController::edit()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'categorieRepository' => ['privates', 'App\\Repository\\CategorieRepository', 'getCategorieRepositoryService', true],
            'serializer' => ['privates', 'debug.serializer', 'getDebug_SerializerService', false],
            'validator' => ['privates', 'debug.validator', 'getDebug_ValidatorService', false],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
        ], [
            'categorieRepository' => 'App\\Repository\\CategorieRepository',
            'serializer' => '?',
            'validator' => '?',
            'entityManager' => '?',
        ]))->withContext('App\\Controller\\API\\CategorieController::edit()', $container);
    }
}
