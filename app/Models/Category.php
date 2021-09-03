<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Category extends Model
{
    protected $table="categories";
    use HasFactory;
    public function posts(){
        return $this->hasMany("App\Models\Posts");
    }
}