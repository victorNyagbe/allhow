<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fichier;

class Language extends Model
{

    protected $guarded = [];

    public function fichiers() {
        return $this->hasMany(Fichier::class);
    }
}
