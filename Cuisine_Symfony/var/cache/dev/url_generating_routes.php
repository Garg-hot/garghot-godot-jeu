<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt_stylesheet' => [[], ['_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], [], [['text', '/_wdt/styles']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_api_categorie_index' => [[], ['_controller' => 'App\\Controller\\API\\CategorieController::index'], [], [['text', '/api/categorie/']], [], [], []],
    'app_api_categorie_show' => [['id'], ['_controller' => 'App\\Controller\\API\\CategorieController::show'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/categorie']], [], [], []],
    'app_api_categorie_create' => [[], ['_controller' => 'App\\Controller\\API\\CategorieController::create'], [], [['text', '/api/categorie/']], [], [], []],
    'app_api_categorie_edit' => [['id'], ['_controller' => 'App\\Controller\\API\\CategorieController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/categorie/edit']], [], [], []],
    'app_api_categorie_delete' => [['id'], ['_controller' => 'App\\Controller\\API\\CategorieController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/categorie/delete']], [], [], []],
    'app_api_ingredient_index' => [[], ['_controller' => 'App\\Controller\\API\\IngredientController::index'], [], [['text', '/api/ingredient/']], [], [], []],
    'app_api_ingredient_show' => [['id'], ['_controller' => 'App\\Controller\\API\\IngredientController::show'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/ingredient']], [], [], []],
    'app_api_ingredient_create' => [[], ['_controller' => 'App\\Controller\\API\\IngredientController::create'], [], [['text', '/api/ingredient/']], [], [], []],
    'app_api_ingredient_edit' => [['id'], ['_controller' => 'App\\Controller\\API\\IngredientController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/ingredient/edit']], [], [], []],
    'app_api_ingredient_delete' => [['id'], ['_controller' => 'App\\Controller\\API\\IngredientController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/ingredient/delete']], [], [], []],
    'app_api_plat_index' => [[], ['_controller' => 'App\\Controller\\API\\PlatController::index'], [], [['text', '/api/plat/']], [], [], []],
    'app_api_plat_show' => [['id'], ['_controller' => 'App\\Controller\\API\\PlatController::show'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/plat']], [], [], []],
    'app_api_plat_create' => [[], ['_controller' => 'App\\Controller\\API\\PlatController::create'], [], [['text', '/api/plat/']], [], [], []],
    'app_api_plat_edit' => [['id'], ['_controller' => 'App\\Controller\\API\\PlatController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/plat/edit']], [], [], []],
    'app_api_plat_delete' => [['id'], ['_controller' => 'App\\Controller\\API\\PlatController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/plat/delete']], [], [], []],
    'admin.categorie.index' => [[], ['_controller' => 'App\\Controller\\Admin\\CategorieController::index'], [], [['text', '/admin/categorie/']], [], [], []],
    'admin.categorie.create' => [[], ['_controller' => 'App\\Controller\\Admin\\CategorieController::create'], [], [['text', '/admin/categorie/create']], [], [], []],
    'admin.categorie.edit' => [['id'], ['_controller' => 'App\\Controller\\Admin\\CategorieController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/categorie/edit']], [], [], []],
    'admin.categorie.delete' => [['id'], ['_controller' => 'App\\Controller\\Admin\\CategorieController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/categorie/delete']], [], [], []],
    'admin.plat.index' => [[], ['_controller' => 'App\\Controller\\Admin\\PlatController::index'], [], [['text', '/admin/plat/']], [], [], []],
    'admin.plat.create' => [[], ['_controller' => 'App\\Controller\\Admin\\PlatController::create'], [], [['text', '/admin/plat/create']], [], [], []],
    'admin.plat.edit' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PlatController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/plat/edit']], [], [], []],
    'admin.plat.delete' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PlatController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/plat/delete']], [], [], []],
    'admin.plat.show' => [['slug', 'id'], ['_controller' => 'App\\Controller\\Admin\\PlatController::show'], ['id' => '\\d+', 'slug' => '[a-z0-9\\-]+'], [['variable', '-', '\\d+', 'id', true], ['variable', '/', '[a-z0-9\\-]+', 'slug', true], ['text', '/admin/plat']], [], [], []],
    'App\Controller\API\CategorieController::index' => [[], ['_controller' => 'App\\Controller\\API\\CategorieController::index'], [], [['text', '/api/categorie/']], [], [], []],
    'App\Controller\API\CategorieController::show' => [['id'], ['_controller' => 'App\\Controller\\API\\CategorieController::show'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/categorie']], [], [], []],
    'App\Controller\API\CategorieController::create' => [[], ['_controller' => 'App\\Controller\\API\\CategorieController::create'], [], [['text', '/api/categorie/']], [], [], []],
    'App\Controller\API\CategorieController::edit' => [['id'], ['_controller' => 'App\\Controller\\API\\CategorieController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/categorie/edit']], [], [], []],
    'App\Controller\API\CategorieController::delete' => [['id'], ['_controller' => 'App\\Controller\\API\\CategorieController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/categorie/delete']], [], [], []],
    'App\Controller\API\IngredientController::index' => [[], ['_controller' => 'App\\Controller\\API\\IngredientController::index'], [], [['text', '/api/ingredient/']], [], [], []],
    'App\Controller\API\IngredientController::show' => [['id'], ['_controller' => 'App\\Controller\\API\\IngredientController::show'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/ingredient']], [], [], []],
    'App\Controller\API\IngredientController::create' => [[], ['_controller' => 'App\\Controller\\API\\IngredientController::create'], [], [['text', '/api/ingredient/']], [], [], []],
    'App\Controller\API\IngredientController::edit' => [['id'], ['_controller' => 'App\\Controller\\API\\IngredientController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/ingredient/edit']], [], [], []],
    'App\Controller\API\IngredientController::delete' => [['id'], ['_controller' => 'App\\Controller\\API\\IngredientController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/ingredient/delete']], [], [], []],
    'App\Controller\API\PlatController::index' => [[], ['_controller' => 'App\\Controller\\API\\PlatController::index'], [], [['text', '/api/plat/']], [], [], []],
    'App\Controller\API\PlatController::show' => [['id'], ['_controller' => 'App\\Controller\\API\\PlatController::show'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/plat']], [], [], []],
    'App\Controller\API\PlatController::create' => [[], ['_controller' => 'App\\Controller\\API\\PlatController::create'], [], [['text', '/api/plat/']], [], [], []],
    'App\Controller\API\PlatController::edit' => [['id'], ['_controller' => 'App\\Controller\\API\\PlatController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/plat/edit']], [], [], []],
    'App\Controller\API\PlatController::delete' => [['id'], ['_controller' => 'App\\Controller\\API\\PlatController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/api/plat/delete']], [], [], []],
    'App\Controller\Admin\CategorieController::index' => [[], ['_controller' => 'App\\Controller\\Admin\\CategorieController::index'], [], [['text', '/admin/categorie/']], [], [], []],
    'App\Controller\Admin\CategorieController::create' => [[], ['_controller' => 'App\\Controller\\Admin\\CategorieController::create'], [], [['text', '/admin/categorie/create']], [], [], []],
    'App\Controller\Admin\CategorieController::edit' => [['id'], ['_controller' => 'App\\Controller\\Admin\\CategorieController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/categorie/edit']], [], [], []],
    'App\Controller\Admin\CategorieController::delete' => [['id'], ['_controller' => 'App\\Controller\\Admin\\CategorieController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/categorie/delete']], [], [], []],
    'App\Controller\Admin\PlatController::index' => [[], ['_controller' => 'App\\Controller\\Admin\\PlatController::index'], [], [['text', '/admin/plat/']], [], [], []],
    'App\Controller\Admin\PlatController::create' => [[], ['_controller' => 'App\\Controller\\Admin\\PlatController::create'], [], [['text', '/admin/plat/create']], [], [], []],
    'App\Controller\Admin\PlatController::edit' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PlatController::edit'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/plat/edit']], [], [], []],
    'App\Controller\Admin\PlatController::delete' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PlatController::delete'], ['id' => '[0-9]+'], [['variable', '/', '[0-9]+', 'id', true], ['text', '/admin/plat/delete']], [], [], []],
    'App\Controller\Admin\PlatController::show' => [['slug', 'id'], ['_controller' => 'App\\Controller\\Admin\\PlatController::show'], ['id' => '\\d+', 'slug' => '[a-z0-9\\-]+'], [['variable', '-', '\\d+', 'id', true], ['variable', '/', '[a-z0-9\\-]+', 'slug', true], ['text', '/admin/plat']], [], [], []],
];
