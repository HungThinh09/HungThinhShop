<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    private $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    public function product(){
        return $this->user->check('productList');
    }
    public function viewListDelete(){
        return $this->user->check('producDelete');
    }
    public function restore(){
        return $this->user->check('productRestore');
    }
    public function forceDelete(){
        return $this->user->check('productForceDelete');
    }

}
