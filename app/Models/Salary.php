<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'title',
      'course_id',
      'junior',
      'middle',
      'senior',
      'junior_desc',
      'middle_desc',
      'senior_desc',

    ];

    protected $casts = [
        'title'=>'array',
        'junior_desc'=>'array',
        'middle_desc'=>'array',
        'senior_desc'=>'array',
    ];

    public function translate(string $attr)
{
    return json_decode($this->{$attr})->{app()->getLocale()};
}
}
