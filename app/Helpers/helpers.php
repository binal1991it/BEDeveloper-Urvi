<?php

use App\Models\Lists;

function GenerateOrder(){
    $Lists = Lists::orderBy('points', 'desc')->orderBy('created_at', 'desc')->get();
    foreach($Lists as $k => $list){
        $list->order = $k+1;
        $list->save();
    }
    return $Lists;
}
