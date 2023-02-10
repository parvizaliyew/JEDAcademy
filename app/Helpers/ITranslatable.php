<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

interface ITranslatable
{
    public function translate(string $attr);
}
