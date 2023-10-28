<?php

namespace App\Providers;

use App\Models\Channel;
use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::creating(function ($model) {
            $model->uid = \Str::uuid();
        });

        Channel::creating(function ($model) {
            $model->uid = \Str::uuid();
        });
        Community::creating(function ($model) {

        });
    }
}
