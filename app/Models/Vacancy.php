<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model implements ITranslatable
{
    use HasFactory;
    protected  $fillable=
    [
      'name',
      'logo',
      'desc',
      'slug',
      'job_info',
      'nam_req',
      'request',
    ];

    protected $casts = [
        'name'=>'array',
        'desc'=>'array',
        'slug'=>'array',
        'job_info'=>'array',
        'name_req'=>'array',
        'request'=>'array',
    ];

    public function translate(string $attr)
{
    return json_decode($this->{$attr})->{app()->getLocale()};
}
}
