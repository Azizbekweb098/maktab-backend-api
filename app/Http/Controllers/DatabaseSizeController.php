<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseSizeController extends Controller
{
    public function database()
    {
        $cout = 'Xozir Bu Code Toliq Emas';

        return response()->json(['xat' => $cout]);
    }
}
