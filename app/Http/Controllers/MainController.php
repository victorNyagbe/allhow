<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fichier;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;


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
        ])->orderBy('id', 'desc')
        ->simplePaginate(20);
        return $frenchFiles;
    }

    public function getEnglishFiles() {
        $englishFiles = Fichier::where([
            ['language_id', '=', 2],
        ])->orderBy('id', 'desc')
        ->simplePaginate(20);
        return $englishFiles;
    }

    public function contact() {
        return view('visitors.contact');
    }

    public function contactUs(Request $request) {
        $request->validate([
            'sender_name' => 'required',
            'sender_email' => 'required',
            'sender_text' => 'required'
        ], 
        [
            'sender_name.required' => 'Veuillez renseinger votre nom',
            'sender_email.required' => 'Veuillez renseigner votre mail',
            'sender_text.required' => 'Veuillez saisir votre message'
        ]);

        $data = [
            'sender_name' => $request->get('sender_name'),
            'sender_email' => $request->get('sender_email'),
            'sender_text' => $request->get('sender_text')
        ];

        Mail::to('deblaa.ap@gmail.com')->send(new ContactUsMail($data));

        return back()->with('success', 'Votre message a bien été envoyé');
    }

    public function about() {
        return view('visitors.about');
    }

    public function search(Request $request) {
        $request->validate([
            'search_input' => 'required'
        ],
        [
            'search_input.required' => 'Le champ de recherche est requis pour cette opération'
        ]);

        $results = Fichier::where('title', 'LIKE', "%{$request->get('search_input')}%")->get();

        return view('visitors.search', compact('results'));
    }
}
