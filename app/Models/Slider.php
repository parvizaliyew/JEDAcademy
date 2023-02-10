<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'title',
      'desc',
      'img',
      'link',
    ];

    protected $casts = [
        'title'=>'array',
        'desc'=>'array',
    ];

    public function translate(string $attr)
{
    return json_decode($this->{$attr})->{app()->getLocale()};
}
}
