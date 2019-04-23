<?php

namespace App\Controllers;

use App\Models\Test;

class TestController
{
    public function sum()
    {
        return [
            'result' => Test::selectAll()
        ];
    }
}
