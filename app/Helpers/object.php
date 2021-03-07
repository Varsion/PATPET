<?php

if ( ! function_exists('obj_info')) {
    function obj_info($status,$msg,$data=null){
        $newobj = new stdClass();
        $newobj->status = $status;
        $newobj->msg = $msg;
        if($data!=null){
            $newobj->data=$data;
        }
        return $newobj;
    }
}
if ( ! function_exists('get_ids')) {
    function get_ids($objs,$attr='id'){
        if($objs==null){
            return null;
        }
        $ids=[];
        foreach ($objs as $obj){
            if(is_array($obj)){
                $val=$obj[$attr];
            }else{
                $val=$obj->$attr;
            }
            if(!in_array($val,$ids)){
                array_push($ids,$val);
            }
        }
        return $ids;
    }
}


