<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\RahBariyatCategory;
use App\Models\Category\Rahbariyat;
use Illuminate\Http\Request;

class RahbariyatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return response()->json(RahBariyatCategory::collection(Rahbariyat::latest()->get()));
    }

  

    public function store(Request $request)
    {
       Rahbariyat::create($request->all());
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rahbariyat = Rahbariyat::find($id);
        
        if (!$rahbariyat) {
            return response()->json(['message' => 'Rahbariyat not found'], 404);
        }
    
        return response()->json(new RahBariyatCategory($rahbariyat));
    }
    

  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = Rahbariyat::find($id);

        $requestData->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requestData = Rahbariyat::find($id);
        $requestData->delete();
        return redirect()->back();
    }
}
