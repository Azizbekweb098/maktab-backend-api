<?php

namespace App\Models\Category;

use App\Models\AxborotPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Axborat extends Model
{
    use HasFactory;
    protected $fillable =['news_filter'];

    public function posts()
    {
        return $this->hasMany(AxborotPost::class);
    }
}
