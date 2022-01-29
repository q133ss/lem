<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\DirectionsBlock;
class Direction extends Model
{
    use HasTranslations;
    
    protected $translatable = ['name', 'preview_text', 'detail_text'];
    protected $fillable = ['slug', 'photo', 'active'];

    public function block(){
        return $this->hasOne(DirectionsBlock::class);
    }
}
