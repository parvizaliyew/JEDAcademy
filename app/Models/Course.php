<?php

namespace App\Models;

use App\Models\Teacher;
use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'title',
      'sub_title',
      'short_desc',
      'month',
      'type',
      'hours',
      'slug',
      'desc',
      'images',
      'meta_title',
      'meta_key',
      'meta_desc',
      'seo_title',
      'seo_desc',
    ];

    protected $casts =
    [
        'title'=>'array',
        'sub_title'=>'array',
        'desc'=>'array',
        'short_desc'=>'array',
        'slug'=>'array',
        'images'=>'array',
        'meta_title'=>'array',
        'meta_key'=>'array',
        'meta_desc'=>'array',
        'seo_title'=>'array',
        'seo_desc'=>'array',
    ];

    public function translate(string $attr)
    {
        return json_decode($this->{$attr})->{app()->getLocale()};
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teachers');
    }
}
