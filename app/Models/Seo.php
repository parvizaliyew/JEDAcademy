<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seo extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'title',
      'meta_desc',
      'meta_keyword',
      'type',
    ];

    protected $casts = [
        'meta_desc'=>'array',
        'meta_keyword'=>'array',
        'title'=>'array',
    ];

    public function translate(string $attr)
{
    return json_decode($this->{$attr})->{app()->getLocale()};
}
}
