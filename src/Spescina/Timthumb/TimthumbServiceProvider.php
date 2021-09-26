<?php 
namespace Spescina\Timthumb;

use Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class TimthumbServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// $this->package('spescina/timthumb');        
        include __DIR__.'/../../routes.php';
		$this->publishConfig();
		$this->publishAssets();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->app['timthumb'] = $this->app->share(function($app){
                        // return new Timthumb;
                // });
		App::singleton('timthumb', function() {
			return new Timthumb;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('timthumb');
	}

	/**
	 * 
	 * 
	 */
	private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('timthumb.php')], 'config');
    }

	/**
	 * 
	 * @return string 
	 */
	private function getConfigPath()
    {
        return __DIR__.'/../../config/config.php';
    }

	/**
	 * 
	 */
	private function publishAssets() {
		$this->publishes([
			__DIR__.'/../../../public' => public_path('vendor/timthumb'),
		], 'public');
	}
}