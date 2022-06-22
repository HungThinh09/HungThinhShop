<?php

namespace App\Helper;

use App\Models\Permisstion;

class htmlPermisstion
{
    private $html;
    public function __construct()
    {
        $this->html = "";
    }
    public function permisstionAdd($perNames=[],$parentId = 0, $sub = "")
    {
        $data = Permisstion::where('parent_id', $parentId)->get();
            foreach($perNames as $perName){
            if(!($data->contains('name',$perName))){
                $this->html .= '<option  value="' .$perName . '">' .$perName . '</option>'; 
            }
        }
        return $this->html;
    }
}
