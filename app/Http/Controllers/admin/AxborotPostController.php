<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AxborotP;
use App\Models\AxborotPost;
use Illuminate\Http\Request;

class AxborotPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(AxborotP::collection(AxborotPost::all()));
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        AxborotPost::create($data);

        return response()->json(['xat' => 'yaratildi']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $requestData = AxborotPost::find($id);

        return response()->json(new AxborotP($requestData));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
