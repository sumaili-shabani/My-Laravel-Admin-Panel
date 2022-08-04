<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('articles', ArticleController::class);
    $router->resource('article-types', ArticleTypeController::class);

    // mes scripts commencent
    $router->resource('carousels', Backend\CarouselController::class);
    $router->resource('valeurs', Backend\ValeurController::class);
    $router->resource('role-charges', Backend\RoleChargeController::class);
    $router->resource('services', Backend\ServiceController::class);
    $router->resource('choixes', Backend\ChoixController::class);
    $router->resource('membres', Backend\MembreController::class);
    $router->resource('partenaires', Backend\PartenaireController::class);
    $router->resource('technos', Backend\TechnoController::class);
    $router->resource('techno-images', Backend\TechnoImageController::class);
    $router->resource('galeries', Backend\GaleryController::class);
    $router->resource('videos', Backend\VideoController::class);
    $router->resource('savoirs', Backend\SavoirController::class);
    $router->resource('projets', Backend\ProjetController::class);
    $router->resource('sites', Backend\SiteController::class);


});
