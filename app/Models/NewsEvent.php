<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsEvent extends Model implements ITranslatable
{
    use HasFactory;

    use HasFactory;
    protected  $fillable=
    [
      'title',
      'type',
      'desc',
      'slug',
      'img',
      'short_desc',
      'date',
      'seen',
    ];
protected $casts = [
    'title'=>'array',
    'desc'=>'array',
    'slug'=>'array',
    'short_desc'=>'array'
];

public function translate(string $attr)
{
    return json_decode($this->{$attr})->{app()->getLocale()};
}
}
