<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\RequestSize;
use App\Models\Request;

class RequestController extends Controller
{
    public function index()
    {
        return response()->json(RequestSize::collection(Request::all()));
    }
}
