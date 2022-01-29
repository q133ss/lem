<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Project extends Model
{
    use HasTranslations;
    protected $translatable = ['name', 'preview_text', 'detail_text', 'owner'];
    protected $fillable = ['lat', 'lon', 'project_type_id', 'region_id', 'photo'];
    protected $with = ['region', 'type'];
    public function type(){
        return $this->belongsTo(ProjectType::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function photos_preview(){ //Для страницы с проектами
        return $this->morphMany(File::class, 'filable')->where('category', 'Gallery')->limit(5);
    }

    public function photos(){
        return $this->morphMany(File::class, 'filable')->where('category', 'Gallery');
    }

    public function video(){
        return $this->morphMany(File::class, 'filable')->where('category', 'Video');
    }
}
