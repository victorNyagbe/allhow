<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fichier;


class MainController extends Controller
{

    public function accueil() {
        $french_files = $this->getFrenchFiles();
        $frenchzone = 'frenchzone';
        return view('visitors.accueil', compact('frenchzone', 'french_files'));
    }

    public function home() {
        $english_files = $this->getEnglishFiles();
        $englishzone = 'englishzone';
        return view('visitors.english.home', compact('englishzone', 'english_files'));
    }


    public function getFrenchFiles() {
        $frenchFiles = Fichier::where([
            ['language_id', '=', 1],
        ])->simplePaginate(20);
        return $frenchFiles;
    }

    public function getEnglishFiles() {
        $englishFiles = Fichier::where([
            ['language_id', '=', 2],
        ])->simplePaginate(20);
        return $englishFiles;
    }
}
