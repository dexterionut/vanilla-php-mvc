<?php

namespace App\Controllers;

use App\Core\Request;

class TestController
{
    public function sum(Request $request)
    {
        return [
            'result' => $request->getParamValue('a') + $request->getParamValue('b')
        ];
    }
}
