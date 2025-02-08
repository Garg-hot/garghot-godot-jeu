<?php

namespace ContainerXLe0Pxl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_PcuWhLmService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.pcuWhLm' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.pcuWhLm'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\API\\CategorieController::index' => ['privates', '.service_locator.rl9.iwW.App\\Controller\\API\\CategorieController::index()', 'getCategorieControllerindex2Service', true],
            'App\\Controller\\API\\CategorieController::show' => ['privates', '.service_locator.z9d.XgN.App\\Controller\\API\\CategorieController::show()', 'getCategorieControllershowService', true],
            'App\\Controller\\API\\CategorieController::create' => ['privates', '.service_locator.VNcvkjP.App\\Controller\\API\\CategorieController::create()', 'getCategorieControllercreateService', true],
            'App\\Controller\\API\\CategorieController::edit' => ['privates', '.service_locator.if1zL3r.App\\Controller\\API\\CategorieController::edit()', 'getCategorieControlleredit2Service', true],
            'App\\Controller\\API\\CategorieController::delete' => ['privates', '.service_locator.sMuMIEm.App\\Controller\\API\\CategorieController::delete()', 'getCategorieControllerdelete2Service', true],
            'App\\Controller\\API\\PlatController::index' => ['privates', '.service_locator.9T6YsAE.App\\Controller\\API\\PlatController::index()', 'getPlatControllerindexService', true],
            'App\\Controller\\API\\PlatController::show' => ['privates', '.service_locator.mfgUXI5.App\\Controller\\API\\PlatController::show()', 'getPlatControllershowService', true],
            'App\\Controller\\API\\PlatController::create' => ['privates', '.service_locator.VNcvkjP.App\\Controller\\API\\PlatController::create()', 'getPlatControllercreateService', true],
            'App\\Controller\\API\\PlatController::edit' => ['privates', '.service_locator.x3QV8rv.App\\Controller\\API\\PlatController::edit()', 'getPlatControlleredit2Service', true],
            'App\\Controller\\API\\PlatController::delete' => ['privates', '.service_locator.MQCRTt4.App\\Controller\\API\\PlatController::delete()', 'getPlatControllerdelete2Service', true],
            'App\\Controller\\Admin\\CategorieController::index' => ['privates', '.service_locator.4CyveaC.App\\Controller\\Admin\\CategorieController::index()', 'getCategorieControllerindexService', true],
            'App\\Controller\\Admin\\CategorieController::create' => ['privates', '.service_locator.egipcEH.App\\Controller\\Admin\\CategorieController::create()', 'getCategorieControllercreate2Service', true],
            'App\\Controller\\Admin\\CategorieController::edit' => ['privates', '.service_locator.i9YOweH.App\\Controller\\Admin\\CategorieController::edit()', 'getCategorieControllereditService', true],
            'App\\Controller\\Admin\\CategorieController::delete' => ['privates', '.service_locator.i9YOweH.App\\Controller\\Admin\\CategorieController::delete()', 'getCategorieControllerdeleteService', true],
            'App\\Controller\\Admin\\PlatController::index' => ['privates', '.service_locator.PrlWoMJ.App\\Controller\\Admin\\PlatController::index()', 'getPlatControllerindex2Service', true],
            'App\\Controller\\Admin\\PlatController::create' => ['privates', '.service_locator.egipcEH.App\\Controller\\Admin\\PlatController::create()', 'getPlatControllercreate2Service', true],
            'App\\Controller\\Admin\\PlatController::edit' => ['privates', '.service_locator.6uizWfF.App\\Controller\\Admin\\PlatController::edit()', 'getPlatControllereditService', true],
            'App\\Controller\\Admin\\PlatController::delete' => ['privates', '.service_locator.6uizWfF.App\\Controller\\Admin\\PlatController::delete()', 'getPlatControllerdeleteService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\API\\CategorieController:index' => ['privates', '.service_locator.rl9.iwW.App\\Controller\\API\\CategorieController::index()', 'getCategorieControllerindex2Service', true],
            'App\\Controller\\API\\CategorieController:show' => ['privates', '.service_locator.z9d.XgN.App\\Controller\\API\\CategorieController::show()', 'getCategorieControllershowService', true],
            'App\\Controller\\API\\CategorieController:create' => ['privates', '.service_locator.VNcvkjP.App\\Controller\\API\\CategorieController::create()', 'getCategorieControllercreateService', true],
            'App\\Controller\\API\\CategorieController:edit' => ['privates', '.service_locator.if1zL3r.App\\Controller\\API\\CategorieController::edit()', 'getCategorieControlleredit2Service', true],
            'App\\Controller\\API\\CategorieController:delete' => ['privates', '.service_locator.sMuMIEm.App\\Controller\\API\\CategorieController::delete()', 'getCategorieControllerdelete2Service', true],
            'App\\Controller\\API\\PlatController:index' => ['privates', '.service_locator.9T6YsAE.App\\Controller\\API\\PlatController::index()', 'getPlatControllerindexService', true],
            'App\\Controller\\API\\PlatController:show' => ['privates', '.service_locator.mfgUXI5.App\\Controller\\API\\PlatController::show()', 'getPlatControllershowService', true],
            'App\\Controller\\API\\PlatController:create' => ['privates', '.service_locator.VNcvkjP.App\\Controller\\API\\PlatController::create()', 'getPlatControllercreateService', true],
            'App\\Controller\\API\\PlatController:edit' => ['privates', '.service_locator.x3QV8rv.App\\Controller\\API\\PlatController::edit()', 'getPlatControlleredit2Service', true],
            'App\\Controller\\API\\PlatController:delete' => ['privates', '.service_locator.MQCRTt4.App\\Controller\\API\\PlatController::delete()', 'getPlatControllerdelete2Service', true],
            'App\\Controller\\Admin\\CategorieController:index' => ['privates', '.service_locator.4CyveaC.App\\Controller\\Admin\\CategorieController::index()', 'getCategorieControllerindexService', true],
            'App\\Controller\\Admin\\CategorieController:create' => ['privates', '.service_locator.egipcEH.App\\Controller\\Admin\\CategorieController::create()', 'getCategorieControllercreate2Service', true],
            'App\\Controller\\Admin\\CategorieController:edit' => ['privates', '.service_locator.i9YOweH.App\\Controller\\Admin\\CategorieController::edit()', 'getCategorieControllereditService', true],
            'App\\Controller\\Admin\\CategorieController:delete' => ['privates', '.service_locator.i9YOweH.App\\Controller\\Admin\\CategorieController::delete()', 'getCategorieControllerdeleteService', true],
            'App\\Controller\\Admin\\PlatController:index' => ['privates', '.service_locator.PrlWoMJ.App\\Controller\\Admin\\PlatController::index()', 'getPlatControllerindex2Service', true],
            'App\\Controller\\Admin\\PlatController:create' => ['privates', '.service_locator.egipcEH.App\\Controller\\Admin\\PlatController::create()', 'getPlatControllercreate2Service', true],
            'App\\Controller\\Admin\\PlatController:edit' => ['privates', '.service_locator.6uizWfF.App\\Controller\\Admin\\PlatController::edit()', 'getPlatControllereditService', true],
            'App\\Controller\\Admin\\PlatController:delete' => ['privates', '.service_locator.6uizWfF.App\\Controller\\Admin\\PlatController::delete()', 'getPlatControllerdeleteService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Controller\\API\\CategorieController::index' => '?',
            'App\\Controller\\API\\CategorieController::show' => '?',
            'App\\Controller\\API\\CategorieController::create' => '?',
            'App\\Controller\\API\\CategorieController::edit' => '?',
            'App\\Controller\\API\\CategorieController::delete' => '?',
            'App\\Controller\\API\\PlatController::index' => '?',
            'App\\Controller\\API\\PlatController::show' => '?',
            'App\\Controller\\API\\PlatController::create' => '?',
            'App\\Controller\\API\\PlatController::edit' => '?',
            'App\\Controller\\API\\PlatController::delete' => '?',
            'App\\Controller\\Admin\\CategorieController::index' => '?',
            'App\\Controller\\Admin\\CategorieController::create' => '?',
            'App\\Controller\\Admin\\CategorieController::edit' => '?',
            'App\\Controller\\Admin\\CategorieController::delete' => '?',
            'App\\Controller\\Admin\\PlatController::index' => '?',
            'App\\Controller\\Admin\\PlatController::create' => '?',
            'App\\Controller\\Admin\\PlatController::edit' => '?',
            'App\\Controller\\Admin\\PlatController::delete' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\Controller\\API\\CategorieController:index' => '?',
            'App\\Controller\\API\\CategorieController:show' => '?',
            'App\\Controller\\API\\CategorieController:create' => '?',
            'App\\Controller\\API\\CategorieController:edit' => '?',
            'App\\Controller\\API\\CategorieController:delete' => '?',
            'App\\Controller\\API\\PlatController:index' => '?',
            'App\\Controller\\API\\PlatController:show' => '?',
            'App\\Controller\\API\\PlatController:create' => '?',
            'App\\Controller\\API\\PlatController:edit' => '?',
            'App\\Controller\\API\\PlatController:delete' => '?',
            'App\\Controller\\Admin\\CategorieController:index' => '?',
            'App\\Controller\\Admin\\CategorieController:create' => '?',
            'App\\Controller\\Admin\\CategorieController:edit' => '?',
            'App\\Controller\\Admin\\CategorieController:delete' => '?',
            'App\\Controller\\Admin\\PlatController:index' => '?',
            'App\\Controller\\Admin\\PlatController:create' => '?',
            'App\\Controller\\Admin\\PlatController:edit' => '?',
            'App\\Controller\\Admin\\PlatController:delete' => '?',
        ]);
    }
}
