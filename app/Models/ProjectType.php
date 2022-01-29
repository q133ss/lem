<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Project;
class ProjectType extends Model
{
    use HasTranslations;
    public $timestamps = false;
    protected $translatable = ['name'];
    protected $fillable = ['icon'];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
