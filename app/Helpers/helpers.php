<?php

if (!function_exists('flash_success')) {
    function flash_success($message)
    {
        session()->flash('message', $message);
        session()->flash('alert-type', 'success');
    }
}

if (!function_exists('flash_error')) {
    function flash_error($message)
    {
        session()->flash('message', $message);
        session()->flash('alert-type', 'error');
    }
}

if (!function_exists('flash_warning')) {
    function flash_warning($message)
    {
        session()->flash('message', $message);
        session()->flash('alert-type', 'warning');
    }
}

if (!function_exists('flash_info')) {
    function flash_info($message)
    {
        session()->flash('message', $message);
        session()->flash('alert-type', 'info');
    }
}

if (!function_exists('notify')) {
    function notify($message, $type = 'info')
    {
        return [
            'message' => $message,
            'alert-type' => in_array($type, ['success', 'error', 'warning', 'info']) ? $type : 'info',
        ];
    }
}






