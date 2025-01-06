<?php

namespace App\Models\Category;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oqituvchilar extends Model
{
    use HasFactory;
    protected $fillable = ['toyifa'];
    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
