<?php

namespace App\Models;

use App\Helpers\ITranslatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model implements ITranslatable
{
    use HasFactory;

    protected  $fillable=
    [
      'adress',
      'email',
      'phone_1',
      'phone_2',
      'phone_3',
      'ins',
      'fb',
      'tw',
      'wp',
      'ln',
      'you',
      'tg',
      'teacher_aktiv',
    ];

    protected $casts = [
        'adress'=>'array',
    ];

    public function translate(string $attr)
{
    return json_decode($this->{$attr})->{app()->getLocale()};
}
}
