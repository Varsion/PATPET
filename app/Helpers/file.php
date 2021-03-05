<?php
if (!function_exists('pic_store')) {
    /**
     * 返回给页面json的信息，ajax操作时返回的提示信息
     * @param $code
     * @param $msg
     * @param null $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    function pic_store($file)
    {
        $id = 1;
        return $id;
    }
}