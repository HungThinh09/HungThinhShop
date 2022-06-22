<?php

namespace App\Helper;

use Illuminate\Support\Facades\Gate;

class policy
{

    public function PolicyGate()
    {
        $this->permisstionDefine();
    }

    public function PermisstionDefine()
    {

        Gate::define('product', 'App\Policies\ProductPolicy@product');
        Gate::define('productListDelete', 'App\Policies\ProductPolicy@viewListDelete');
        Gate::define('productRestore', 'App\Policies\ProductPolicy@restore');
        Gate::define('productForceDelete', 'App\Policies\ProductPolicy@forceDelete');

        Gate::define('category', 'App\Policies\policy@category');
        Gate::define('banner', 'App\Policies\policy@banner');
        Gate::define('setting', 'App\Policies\policy@setting');
        Gate::define('user', 'App\Policies\policy@user');
        Gate::define('role', 'App\Policies\policy@role');
        Gate::define('permisstion', 'App\Policies\policy@permisstion');
        Gate::define('order', 'App\Policies\policy@order');

        // Gate::resource('category', 'App\Policies\CategoryPolicy');
        // Gate::define('category.index', 'App\Policies\CategoryPolicy@view');
        // Gate::define('category.create', 'App\Policies\CategoryPolicy@create');
        // Gate::define('category.update', 'App\Policies\CategoryPolicy@update');
        // Gate::define('category.delete', 'App\Policies\CategoryPolicy@delete');
    }
}
