<?php
namespace App\Components;
use Illuminate\Support\Facades\Gate;
class Permisstion{

    public function permisstionGeta(){
        $this->permisstionDefine();
    }

    public function PermisstionDefine(){
        Gate::define('orderList', 'App\Policies\OrderPolicy@view');
        Gate::define('orderEdit', 'App\Policies\OrderPolicy@update');
        Gate::define('orderAdd', 'App\Policies\OrderPolicy@create');
        Gate::define('orderDelete', 'App\Policies\OrderPolicy@delete');
    }
}