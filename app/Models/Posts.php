<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Posts extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo("App\Models\Category");
    }
    public function tags(){
        return $this->belongsToMany("App\Models\Tags");
    }
    public function comments(){
        return $this->hasMany("App\Models\comments");
    }
}