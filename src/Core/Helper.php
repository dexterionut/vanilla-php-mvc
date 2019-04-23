<?php

namespace App\Core;

class Helper
{
    public static function getAppSubfolder()
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $filePath = dirname(__FILE__);

        if ($root == $filePath) {
            return false; // installed in the root
        } else {
            return dirname($_SERVER['SCRIPT_NAME']);  // installed in a subfolder or subdomain
        }
    }

    public static function jsonResponse(array $response = [], int $code = 200)
    {
        // clear the old headers
        header_remove();
        // set the actual code
        http_response_code($code);
        // set the header to make sure cache is forced
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        // treat this as json
        header('Content-Type: application/json');
        $status = [
            200 => '200 OK',
            400 => '400 Bad Request',
            404 => 'Page not found',
            422 => 'Unprocessable Entity',
            500 => '500 Internal Server Error'
        ];
        // ok, validation error, or failure
        header('Status: ' . $status[$code]);
        // return the encoded json
        return json_encode(array_merge([
            'status' => $code < 300 ? 'success' : 'failed', // success or not?
        ], $response));
    }
}