<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClearController extends Controller
{
    public function clear($table)
    {
        try {
            DB::table($table)->truncate();

            return response()->json([
                'message' => "Jadval tozalandi."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Xato: " . $e->getMessage()
            ], 500);
        }
    }
}
