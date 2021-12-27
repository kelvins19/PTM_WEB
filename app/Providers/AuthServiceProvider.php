<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public static $permissions = [
        'index-product' => [0, 1, 2, 3],
        'show-product' => [0, 1, 2, 3],
        'create-product' => [1, 2],
        'store-product' => [1, 2],
        'edit-product' => [1, 2],
        'update-product' => [1, 2],
        'destroy-product' => [1, 2],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
