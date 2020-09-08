<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;
use App\User;

class Fichier extends Model
{

    protected $guarded = [];

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
