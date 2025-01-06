<?php

namespace App\Models;

use App\Http\Controllers\admin\Category\TalimCategory;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalimPost extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'file', 'link'];

    public function talimCategory()
    {
        return  $this->belongsTo(TalimCategory::class);
    }
 
}
