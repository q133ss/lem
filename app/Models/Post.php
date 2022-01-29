<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Post extends Model
{
    use HasTranslations;
    
    protected $translatable = ['name', 'preview_text', 'detail_text'];
    protected $fillable = ['slug', 'photo', 'post_category_id', 'active'];
    public function post_category(){
        return $this->belongsTo(PostCategory::class);
    }
}
