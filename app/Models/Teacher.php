<?php

namespace App\Models;

use App\Models\Course;
use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'position',
      'name',
      'desc',
      'img',
      'slug',
      'company_name',
    ];

    protected $casts =
    [
        'name'=>'array',
        'position'=>'array',
        'desc'=>'array',
        'slug'=>'array',
        'company_name'=>'array',
    ];

    public function translate(string $attr)
    {
        return json_decode($this->{$attr})->{app()->getLocale()};
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teachers');
    }
}
