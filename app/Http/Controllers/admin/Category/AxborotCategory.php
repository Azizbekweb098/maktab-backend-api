<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutSchool;
use App\Http\Resources\AxoboratCategorysRsource;
use App\Models\Category\Axborat;
use Illuminate\Http\Request;

class AxborotCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(AxoboratCategorysRsource::collection(Axborat::all()));
    }

  

    /**
     * Store a newly created resource in storage.
     */
/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
  $count = Axborat::count();

  if($count >= 3){
    return response()->json(['xatolik' => 'Faqatgina 3-ta Category yarata Olasiz']);
  }
  $requestData = Axborat::create($request->all());

  return response()->json(['xat' => 'Yaratildi']);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $requestData = Axborat::find($id);
        return response()->json($requestData);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = Axborat::find($id);

        $requestData->update($request->all());

        return response()->json(['xat' => 'ozgartirildi']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requestData = Axborat::find($id);
        $requestData->delete();

        return response()->json('ochirildi');
    }
}
