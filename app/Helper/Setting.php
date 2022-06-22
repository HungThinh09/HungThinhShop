<?php

function getSetting($key){
    $setting= \App\Models\Setting::where('settingName',$key)->where('status',1)->first();
    if(!empty($setting)){
        return $setting->value;
    }
    return  "Loading...";
}

