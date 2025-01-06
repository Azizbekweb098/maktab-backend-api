<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkersReource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(WorkersReource::collection(Worker::all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'ish_kuni' => 'required|string',
            'tell' => 'required|string',
            'link' => 'required|string',
            'lorem' => 'nullable|string',
        ]);

        // Rasmni saqlash
        $image_path = null; // default qiymat
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'), $image_name);
            $image_path = "/images/" . $image_name; // to'g'ri yo'lni belgilash
        }

        // Rasm yo'lini $data ga qo'shish
        $data['image'] = $image_path;

        // Yangi worker yaratish
        $worker = Worker::create($data);

        return response()->json($worker, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }
        return response()->json(new WorkersReource($worker));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }

        // Requestdan o'zgartirilgan ma'lumotlarni olish
        $data = $request->validate([
            'name' => 'string',
            'last_name' => 'string',
            'ish_kuni' => 'string',
            'tell' => 'string',
            'link' => 'string',
            'lorem' => 'nullable|string',
        ]);

        // Rasmni saqlash (agar yangilanish bo'lsa)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'), $image_name);
            $data['image'] = "/images/" . $image_name;
        }

        // Yangi ma'lumotlarni saqlash
        $worker->update($data);

        return response()->json($worker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }

        $worker->delete();
        return response()->json(['message' => 'Worker deleted successfully']);
    }
}
