<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Survey extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = ['user_id', 'image', 'title', 'slug', 'status', 'description', 'expire_date'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateslugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function question()
    {
        return $this->hasMany(SurveyQuestion::class);
    }
    public function answer()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}
