<?php

namespace App\Controllers;

use App\Core\Contracts\IRequest;
use App\Models\Test;

class TestController
{
    public function sum(IRequest $request)
    {
        $a = $request->getParamValue('a');
        $result = Test::selectAll();
        return [
            'a' => $a,
            'result' => $result,
            'typeof' => get_class($result[0])
        ];
    }
}
