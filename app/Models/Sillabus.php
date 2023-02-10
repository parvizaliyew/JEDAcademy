<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sillabus extends Model
{
    use HasFactory;

    protected  $fillable=
    [
      'month_1',
      'month_2',
      'month_3',
      'month_4',
      'month_5',
      'month_6',
      'month_7',
      'month_8',
      'month_9',
      'month_10',
      'month_11',
      'month_12',
      'course_id'
    ];

    protected $casts =
    [
        'month_1'=>'array',
        'month_2'=>'array',
        'month_3'=>'array',
        'month_4'=>'array',
        'month_5'=>'array',
        'month_6'=>'array',
        'month_7'=>'array',
        'month_8'=>'array',
        'month_9'=>'array',
        'month_10'=>'array',
        'month_11'=>'array',
        'month_12'=>'array',
    ];

    public function translate(string $attr)
    {
        return json_decode($this->{$attr})->{app()->getLocale()};
    }
}
