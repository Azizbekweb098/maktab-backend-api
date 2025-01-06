<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\TalimResource;
use App\Models\Category\Talim;
use Illuminate\Http\Request;

class TalimCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(TalimResource::collection(Talim::all()));
    }


    public function store(Request $request)
    {
       $talim = Talim::create($request->all());
       return response()->json(new TalimResource($talim), 201);
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = Talim::find($id);

        $requestData->update($request->all());
        return response()->json('ozgartirldi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requestData = Talim::find($id);
        $requestData->delete();
        return response()->json('ochirildi');
    }
}
