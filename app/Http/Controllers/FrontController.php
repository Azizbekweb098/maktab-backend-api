<?php

namespace App\Http\Controllers;

use App\Http\Resources\AxborotP;
use App\Http\Resources\AxoboratCategorysRsource;
use App\Http\Resources\RahBariyatCategory;
use App\Http\Resources\TalimPost as ResourcesTalimPost;
use App\Http\Resources\TalimResource;
use App\Http\Resources\TeachersResouce;
use App\Http\Resources\WorkersReource;
use App\Models\AxborotPost;
use App\Models\Category\Axborat;
use App\Models\Category\Oqituvchilar;
use App\Models\Category\Rahbariyat;
use App\Models\Category\Talim;
use App\Models\TalimPost;
use App\Models\Worker;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;

class FrontController extends Controller
{
    public function rahbariyat()
    {
        return response()->json(RahBariyatCategory::collection(Rahbariyat::all()));
    }
    public function rahbariyats(string $id)
    {
        $rahbariyat = Rahbariyat::find($id);
        
        if (!$rahbariyat) {
            return response()->json(['message' => 'Rahbariyat not found'], 404);
        }
    
        return response()->json(new RahBariyatCategory($rahbariyat));
    }

    public function teachers()
    {
        return response()->json(TeachersResouce::collection(Oqituvchilar::all()));
    }
    public function show_teachers(string $id)
    {
        $teachers = Oqituvchilar::find($id);
        
        if (!$teachers) {
            return response()->json(['message' => 'Rahbariyat not found'], 404);
        }
    
        return response()->json(new TeachersResouce($teachers));
    }
    public function workers()
    {
        return response()->json(WorkersReource::collection(Worker::all()));
    }
    public function workers_id(string $id)
    {
        $worker = Worker::find($id);
        
        if (!$worker) {
            return response()->json(['message' => 'Rahbariyat not found'], 404);
        }
    
        return response()->json(new WorkersReource($worker));
    }
    public function talimCategory()
    {
        return response()->json(TalimResource::collection(Talim::all()));
    }
    public function talimPost()
    {
        return response()->json(ResourcesTalimPost::collection(TalimPost::all()));
    }
   public function talimPostId(string $id)
   {
   $talimPost = TalimPost::find($id);
   if (!$talimPost) {
    return response()->json(['message' => 'Rahbariyat not found'], 404);
}
  return response()->json(new ResourcesTalimPost($talimPost));
   }
   public function axborot()
   {
    return response()->json(AxoboratCategorysRsource::collection(Axborat::all()));
   }
   public function axborotid($id)
   {
    $axborotid = Axborat::find($id);
    return response()->json(new AxoboratCategorysRsource($axborotid));
   }
   public function axborotPost()
   {
    return response()->json(AxborotP::collection(AxborotPost::all()));
   }
}
