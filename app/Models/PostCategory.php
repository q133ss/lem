<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class PostCategory extends Model
{
    use HasTranslations;
    
    public $timestamps = false;
    protected $translatable = ['name'];
    protected $fillable = ['slug'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function frontPosts(){
        return $this->posts()->latest()->limit(5);
    }
}
