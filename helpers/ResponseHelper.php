<?php
use Illuminate\Http\Response;


/**
 * create rest_api response if doesnt exists
 * @param mixed data
 * @param array attribute
 * @param integer response code
 * @return Response
 */
if (!function_exists('rest_api')) {
    function rest_api($data, $message = null, $code = 200, $addHeaders = [])
    {
        if (substr($code, 0,1) == 2) {
            $rest = [
                "success"   => true,
                "message"   => $message ?? 'Response Success',
                "data"      => $data
            ];
        } else {
            $rest = [
                "success"       => false,
                "error-code"    => $code,
                "errors"        => $data,
                "message"       => $message ?? 'Error has occurred'
            ];
        }

        return response()
            ->json($rest, $code)
            ->withHeaders($addHeaders);
    }
}
