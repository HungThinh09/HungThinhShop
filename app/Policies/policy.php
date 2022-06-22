<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class policy
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
    public function category(){
        return $this->user->check('categoryList');
    }
    public function banner(){
        return $this->user->check('bannerList');
    }
    public function setting(){
        return $this->user->check('settingList');
    }
    public function user(){
        return $this->user->check('userList');
    }
    public function role(){
        return $this->user->check('roleList');
    }
    public function permisstion(){
        return $this->user->check('permisstionList');
    }
    public function order(){
        return $this->user->check('orderList');
    }
    public function orderDetail(){
        return $this->user->check('orderEdit');
    }
    public function orderDelete(){
        return $this->user->check('orderDelete');
    }
}
