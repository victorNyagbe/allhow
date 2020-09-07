<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class Fichier extends Model
{

    protected $guarded = [];

    public function language() {
        return $this->belongsTo(Language::class);
    }
}
