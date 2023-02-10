<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhoCourseFor extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'logo',
      'title',
      'desc',
      'course_id',
    ];

    protected $casts =
    [
        'title'=>'array',
    ];

    public function translate(string $attr)
    {
        return json_decode($this->{$attr})->{app()->getLocale()};
    }

}
