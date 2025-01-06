<?php

namespace App\Http\Controllers;

use App\Http\Resources\AxborotP;
use App\Models\AxborotPost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->query('search');
        if($search)
        {
            $axborotPost = AxborotPost::where('title', 'LIKE', "%$search%")->get();

            return response()->json(AxborotP::collection($axborotPost));
        }
        return response()->json(AxborotP::collection(AxborotPost::all()));
    }
}
