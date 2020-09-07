<?php

namespace App\Http\Controllers\Administration;

use App\Fichier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Language;

class FichierController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Fichier::latest()->get();

        return view('administrations.fichiers.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return  view('administrations.fichiers.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'link' => 'required|active_url',
            'language_id' => 'required|exists:languages,id'
        ],
        [
            'title.required' => 'Veuillez renseigner le titre de la vidéo',
            'title.string' => 'Le titre doit être une chaîne de caractères',
            'link.required' => 'Veuillez renseigner le lien de la vidéo',
            'link.active_url' => 'Le lien est incorrect',
            'language_id.required' => 'Veuillez sélectionner une langue',
            'language_id.exists' => 'La langue sélectionnée est invalide'
        ]);

        $video_created = Fichier::create($data);

        return back()->with('success', 'La vidéo renseignée a été enregistrée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichier $fichier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichier $fichier)
    {
        //
    }
}
