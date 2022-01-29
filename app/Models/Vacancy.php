<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Vacancy extends Model
{
    use HasTranslations;
    protected $translatable = ['name', 'detail_text'];
    protected $fillable = ['active', 'photo'];
}
