<?php

namespace App\Models\Category;

use App\Models\TalimPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talim extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function talimposts()
    {
        return $this->hasMany(TalimPost::class);
    }
}
