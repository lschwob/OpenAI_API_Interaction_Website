<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Validator::extend('max_duration', function($attribute, $value, $parameters, $validator) {
            $maxDuration = $parameters[0];
            
            $getID3 = new \getID3;
            $fileInfo = $getID3->analyze($value->getPathname());
            
            // Vérifier si le fichier est un fichier audio
            if (isset($fileInfo['audio'])) {
                $fileDuration = $fileInfo['playtime_seconds'];
                return $fileDuration <= $maxDuration;
            } else {
                return false;
            }
        });        
    }
}
