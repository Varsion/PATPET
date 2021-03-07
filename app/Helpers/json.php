<?php

if (!function_exists('json_response')) {
    function json_response($code, $msg, $data = null, $status = 200)
    {
        return response()->json(array('code' => $code, 'msg' => $msg, 'data' => $data == null ? null : $data), $status);
    }
}
if (!function_exists('json_success')) {
    function json_success($msg = 'Successful operation!', $data = null, $code = 0, $StatusCode = 200)
    {
        return json_response($code, $msg, $data, $StatusCode);
    }
}
if (!function_exists('json_fail')) {
    function json_fail($msg = 'operation failed!', $data = null, $code = 1, $StatusCode = 200)
    {
        return json_response($code, $msg, $data, $StatusCode);
    }
}
if (!function_exists('json_page')) {
    function json_page($data, $count, $msg = '', $code = 0)
    {
        return response()->json(array('data' => $data, 'count' => $count, 'code' => $code, 'msg' => $msg));
    }
}


if (!function_exists('to_json_response')) {
    function to_json_response($obj)
    {
        $data = isset($obj->data) ? $obj->data : null;
        if (isset($obj->status) && $obj->status) {
            return json_success($obj->msg, $data);
        } else {
            return json_fail($obj->msg, $data);
        }
    }
}

if (!function_exists('json_success_fail')) {
    function json_success_fail($model, $msg1 = null, $msg2 = null)
    {
        if ($model) {
            return json_success($msg2 === null ? 'Successful operation！' : $msg2, $model);
        } else {
            return json_fail($msg1 === null ? 'operation failed!' : $msg1);
        }
    }
}