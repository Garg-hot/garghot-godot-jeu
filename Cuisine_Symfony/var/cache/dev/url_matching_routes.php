<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/categorie' => [
            [['_route' => 'app_api_categorie_index', '_controller' => 'App\\Controller\\API\\CategorieController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'app_api_categorie_create', '_controller' => 'App\\Controller\\API\\CategorieController::create'], null, ['POST' => 0], null, true, false, null],
        ],
        '/api/ingredient' => [
            [['_route' => 'app_api_ingredient_index', '_controller' => 'App\\Controller\\API\\IngredientController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'app_api_ingredient_create', '_controller' => 'App\\Controller\\API\\IngredientController::create'], null, ['POST' => 0], null, true, false, null],
        ],
        '/api/plat' => [
            [['_route' => 'app_api_plat_index', '_controller' => 'App\\Controller\\API\\PlatController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'app_api_plat_create', '_controller' => 'App\\Controller\\API\\PlatController::create'], null, ['POST' => 0], null, true, false, null],
        ],
        '/admin/categorie' => [[['_route' => 'admin.categorie.index', '_controller' => 'App\\Controller\\Admin\\CategorieController::index'], null, null, null, true, false, null]],
        '/admin/categorie/create' => [[['_route' => 'admin.categorie.create', '_controller' => 'App\\Controller\\Admin\\CategorieController::create'], null, null, null, false, false, null]],
        '/admin/plat' => [[['_route' => 'admin.plat.index', '_controller' => 'App\\Controller\\Admin\\PlatController::index'], null, null, null, true, false, null]],
        '/admin/plat/create' => [[['_route' => 'admin.plat.create', '_controller' => 'App\\Controller\\Admin\\PlatController::create'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|pi/(?'
                        .'|categorie/(?'
                            .'|([0-9]+)(*:234)'
                            .'|edit/([0-9]+)(*:255)'
                            .'|delete/([0-9]+)(*:278)'
                        .')'
                        .'|ingredient/(?'
                            .'|([0-9]+)(*:309)'
                            .'|edit/([0-9]+)(*:330)'
                            .'|delete/([0-9]+)(*:353)'
                        .')'
                        .'|plat/(?'
                            .'|([0-9]+)(*:378)'
                            .'|edit/([0-9]+)(*:399)'
                            .'|delete/([0-9]+)(*:422)'
                        .')'
                    .')'
                    .'|dmin/(?'
                        .'|categorie/(?'
                            .'|edit/([0-9]+)(*:466)'
                            .'|delete/([0-9]+)(*:489)'
                        .')'
                        .'|plat/(?'
                            .'|edit/([0-9]+)(*:519)'
                            .'|delete/([0-9]+)(*:542)'
                            .'|([a-z0-9\\-]+)\\-(\\d+)(*:570)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        234 => [[['_route' => 'app_api_categorie_show', '_controller' => 'App\\Controller\\API\\CategorieController::show'], ['id'], null, null, false, true, null]],
        255 => [[['_route' => 'app_api_categorie_edit', '_controller' => 'App\\Controller\\API\\CategorieController::edit'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null]],
        278 => [[['_route' => 'app_api_categorie_delete', '_controller' => 'App\\Controller\\API\\CategorieController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        309 => [[['_route' => 'app_api_ingredient_show', '_controller' => 'App\\Controller\\API\\IngredientController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        330 => [[['_route' => 'app_api_ingredient_edit', '_controller' => 'App\\Controller\\API\\IngredientController::edit'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null]],
        353 => [[['_route' => 'app_api_ingredient_delete', '_controller' => 'App\\Controller\\API\\IngredientController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        378 => [[['_route' => 'app_api_plat_show', '_controller' => 'App\\Controller\\API\\PlatController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        399 => [[['_route' => 'app_api_plat_edit', '_controller' => 'App\\Controller\\API\\PlatController::edit'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null]],
        422 => [[['_route' => 'app_api_plat_delete', '_controller' => 'App\\Controller\\API\\PlatController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        466 => [[['_route' => 'admin.categorie.edit', '_controller' => 'App\\Controller\\Admin\\CategorieController::edit'], ['id'], null, null, false, true, null]],
        489 => [[['_route' => 'admin.categorie.delete', '_controller' => 'App\\Controller\\Admin\\CategorieController::delete'], ['id'], null, null, false, true, null]],
        519 => [[['_route' => 'admin.plat.edit', '_controller' => 'App\\Controller\\Admin\\PlatController::edit'], ['id'], null, null, false, true, null]],
        542 => [[['_route' => 'admin.plat.delete', '_controller' => 'App\\Controller\\Admin\\PlatController::delete'], ['id'], null, null, false, true, null]],
        570 => [
            [['_route' => 'admin.plat.show', '_controller' => 'App\\Controller\\Admin\\PlatController::show'], ['slug', 'id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
