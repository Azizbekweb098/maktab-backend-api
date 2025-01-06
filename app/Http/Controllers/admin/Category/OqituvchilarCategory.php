<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\RahBariyatCategory;
use App\Http\Resources\TeachersResouce;
use App\Models\Category\Oqituvchilar;
use App\Models\Category\Rahbariyat;
use Illuminate\Http\Request;

class OqituvchilarCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(TeachersResouce::collection(Oqituvchilar::latest()->get()));
    }


    public function store(Request $request)
    {
       Oqituvchilar::create($request->all());
      return response()->json(['xat' => 'yaratildi']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $oqituvchilar = Oqituvchilar::find($id);
        
        if (!$oqituvchilar) {
            return response()->json(['message' => 'Rahbariyat not found'], 404);
        }
    
        return response()->json(new TeachersResouce($oqituvchilar));
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = Oqituvchilar::find($id);

        $requestData->update($request->all());
        return response()->json($requestData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requestData = Oqituvchilar::find($id);
        $requestData->delete();
        return redirect()->json(['xat' => 'ochirildi']);
    }
}
