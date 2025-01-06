<?php

namespace App\Models;

use App\Models\Category\Oqituvchilar;
use App\Models\Category\Rahbariyat;
use App\Models\TalimPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rahbaryat()
    {
        return $this->belongsTo(Rahbariyat::class, 'rahbariyat_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Oqituvchilar::class, 'oqituvchilar_id');
    }
 
}
