<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutSchool;
use App\Models\AboutSchool as ModelsAboutSchool;
use Illuminate\Http\Request;

class AboutSchollController extends Controller
{

    public function index()
    {
        return response(AboutSchool::collection(ModelsAboutSchool::all()));
    }  



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $aboutSchol = ModelsAboutSchool::first();
       if($aboutSchol) {
        return response()->json(['error' => 'alloqchon malumot bor endi uni ozgartirasiz yoki ochirasiz']);
       }

       $school = ModelsAboutSchool::create($request->all());

       return response()->json(['message' => 'Maktab haqida malumot yaratildi', $school]);
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
        $school = ModelsAboutSchool::find($id);
    
        if (!$school) {
            return response()->json(['error' => 'School not found'], 404);
        }
    
        $school->update($request->all());
    
        return response()->json(['xat' => 'ozgartirldi', $school]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requestData = ModelsAboutSchool::find($id);

        $requestData->delete();

        return response()->json(['xat' => 'ochirildi']);
    }
}
