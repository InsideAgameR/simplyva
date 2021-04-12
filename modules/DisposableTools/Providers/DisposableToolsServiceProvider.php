<?php

namespace Modules\DisposableTools\Providers;

use App\Services\ModuleService;
use Illuminate\Support\ServiceProvider;
use Route;

class DisposableToolsServiceProvider extends ServiceProvider
{
  protected $moduleSvc;

  public function boot()
  {
    $this->moduleSvc = app(ModuleService::class);
    $this->registerLinks();
    $this->registerRoutes();
    $this->registerTranslations();
    $this->registerConfig();
    $this->registerViews();
  }

  public function register() { }

  public function registerLinks()
  {
    $this->moduleSvc->addAdminLink('Disposable Tools', '/admin/disposabletools');
  }

  protected function registerRoutes()
  {
    /** Routes for the admin **/
    Route::group([
        'as'     => 'DisposableTools.',
        'prefix' => 'admin',
        'middleware' => ['web', 'role:admin'],
        'namespace'  => 'Modules\DisposableTools\Http\Controllers',
    ], function () {
      Route::group([],
        function () {
        Route::get('disposabletools', 'DisposableToolsController@admin')->name('admin');
        });
    });
  }

  protected function registerConfig()
  {
    $this->publishes([ __DIR__.'/../Config/config.php' => config_path('DisposableTools.php'),], 'config');
    $this->mergeConfigFrom( __DIR__.'/../Config/config.php', 'DisposableTools');
  }

  public function registerTranslations()
  {
    $langPath = resource_path('lang/modules/DisposableTools');

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, 'DisposableTools');
    } else {
      $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'DisposableTools');
    }
  }

  public function registerViews()
  {
    $viewPath = resource_path('views/modules/DisposableTools');
    $sourcePath = __DIR__.'/../Resources/views';

    $this->publishes([$sourcePath => $viewPath,], 'views');

    $this->loadViewsFrom(array_merge(array_map(function ($path) {
      return $path . '/modules/DisposableTools';
    }, \Config::get('view.paths')), [$sourcePath]), 'DisposableTools');
  }

  public function provides(): array { return []; }
}
