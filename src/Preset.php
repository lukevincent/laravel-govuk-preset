<?php

namespace GovukPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
	public static function install($withAuth = false)
	{
		static::cleanSassDirectory();
		static::updatePackages();
		static::cleanJsDirectory();
		static::updateMix();
		static::updateScripts();
		static::updateStyles();
		if($withAuth)
        {
            static::addAuthTemplates();
        }
        else
        {
            static::updateWelcomePage();
        }

	}

	public static function cleanSassDirectory()
	{
		File::cleanDirectory(resource_path('sass/'));
	}

	public static function cleanJsDirectory()
	{
		File::cleanDirectory(resource_path('js/'));
	}

	public static function updatePackageArray($packages)
	{
		return array_merge(['laravel-mix-tailwind' => '~0.1.0', 'govuk-frontend' => '~2.11.0'], Arr::except($packages, [
			'popper.js',
			'lodash',
			'jquery'
		]));
	}

	public static function updateMix()
	{
		copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
	}

	public static function updateScripts()
	{
		copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
		copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
	}

	public static function updateStyles()
	{
		copy(__DIR__.'/stubs/app.scss', resource_path('sass/app.scss'));
	}

	public static function addAuthTemplates()
	{
		// Add Home controller
        copy(__DIR__.'/stubs/Controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));

		// Add Auth route in 'routes/web.php'
		$auth_route_entry = "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n";
        file_put_contents('./routes/web.php', $auth_route_entry, FILE_APPEND);

		// Copy GOVUK Auth view templates
		File::copyDirectory(__DIR__.'/stubs/partials', resource_path('views/partials'));
		File::copyDirectory(__DIR__.'/stubs/auth', resource_path('views/auth'));
		File::copyDirectory(__DIR__.'/stubs/layouts', resource_path('views/layouts'));
		copy(__DIR__.'/stubs/layouts/auth.blade.php', resource_path('views/layouts/app.blade.php'));
		copy(__DIR__.'/stubs/home.blade.php', resource_path('views/home.blade.php'));
		copy(__DIR__.'/stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
	}

	public static function updateWelcomePage()
	{
		File::copyDirectory(__DIR__.'/stubs/partials', resource_path('views/partials'));
		File::makeDirectory(resource_path('views/layouts'));
		copy(__DIR__.'/stubs/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
		copy(__DIR__.'/stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
	}
}
