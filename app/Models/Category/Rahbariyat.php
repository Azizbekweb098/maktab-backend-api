<?php

namespace App\Models\Category;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rahbariyat extends Model
{
    use HasFactory;
    protected $fillable = ['kim'];
    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
