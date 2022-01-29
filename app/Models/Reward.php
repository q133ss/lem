<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Reward extends Model
{
    use HasTranslations;
    protected $translatable = ['name', 'description'];
    protected $fillable = ['photo'];
}
