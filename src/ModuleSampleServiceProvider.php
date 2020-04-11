<?php

namespace Dorcas\ModulesSample;
use Illuminate\Support\ServiceProvider;

class ModulesSampleServiceProvider extends ServiceProvider {

	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
		$this->loadViewsFrom(__DIR__.'/resources/views', 'modules-sample');
		$this->publishes([
			__DIR__.'/config/modules-sample.php' => config_path('modules-sample.php'),
		], 'config');
		/*$this->publishes([
			__DIR__.'/assets' => public_path('vendor/modules-settings')
		], 'public');*/
	}

	public function register()
	{
		//check of parent module config exists
	    if ( !config_exist('modules-sample') && file_exists(__DIR__.'/config/navigation-menu.php') {
			$this->mergeConfigFrom(
				__DIR__.'/config/navigation-menu.php', 'navigation-menu'
			);
	    }
		
		//add menu config
		$this->mergeConfigFrom(
	        __DIR__.'/config/navigation-sub-menu.php', 'navigation-menu.modules-sample.sub-menu'
	     );

	}

}


?>