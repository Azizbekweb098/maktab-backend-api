<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = [
            'rahbariyat Category' => DB::table('rahbariyats')->count(),
            'oqituvchilar Category' => DB::table('oqituvchilars')->count(),
            'Axborot Category' => DB::table('axborats')->count(),
            'Ishchilar' => DB::table('workers')->count(),
            'Makrab About' => DB::table('about_schools')->count(),
            'talim Category' => DB::table('talims')->count(),
            'Talim Postlari' => DB::table('talim_posts')->count(),
            'Axborot Postlari' => DB::table('axborot_posts')->count(),
        ];
        $total = array_sum($statistics);
        return response()->json([
            'Bazadagi Malumotlar',
            $statistics, 
            'hammasi bolib shuncha malumot bor' => $total,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
