<?php

use Illuminate\Http\JsonResponse;
use ResponseTransformer\ResponseTransformer;
use ResponseTransformer\Contracts\ApiInterface;

if (!function_exists('api')) {

    /**
     * Create a new ResponseTransformer instance.
     *
     * @param int    $status
     * @param string $message
     * @param array  $data
     * @param array  $extraData
     *
     * @return ResponseTransformer|JsonResponse
     */
    function api($status = 200, $message = '', $data = [], ...$extraData)
    {
        if (func_num_args() === 0) {
            return app(ApiInterface::class);
        }

        return app(ApiInterface::class)->response($status, $message, $data, ...$extraData);
    }
}

if (!function_exists('ok')) {

    /**
     * Return success response.
     *
     * @param string $message
     * @param array  $data
     * @param array  $extraData
     *
     * @return JsonResponse
     */
    function ok($message = '', $data = [], ...$extraData)
    {
        return api()->ok($message, $data, ...$extraData);
    }
}

if (!function_exists('success')) {

    /**
     * Return success response.
     *
     * @param string $message
     * @param array  $data
     * @param array  $extraData
     *
     * @return JsonResponse
     */
    function success($message = '', $data = [], ...$extraData)
    {
        return api()->success($message, $data, ...$extraData);
    }
}
