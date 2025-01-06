<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TalimPost;
use App\Models\TalimPost as ModelsTalimPost;
use Illuminate\Http\Request;

class TalimPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(TalimPost::collection(ModelsTalimPost::all()));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Rasm va faylni yuklash
        $data = $request->all();
        
        if ($request->file('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }
        
        if ($request->file('file')) {
            $data['file_path'] = $request->file('file')->store('files', 'public');
        }
    
        // Modelga ma'lumot qo'shish
        ModelsTalimPost::create($data);
    
        return response()->json('yaratildi', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $talim = ModelsTalimPost::find($id);

        return response()->json(new TalimPost($talim));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
