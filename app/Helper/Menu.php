<?php

function getSetting($key){
    $setting= \App\Models\Category::where('key',$key)->where('active',1)->first();
    if(!empty($setting)){
        return $setting->value_key;
    }
    return  "Loading...";
}

