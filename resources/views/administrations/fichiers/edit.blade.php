@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-10">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <h3 class="h3-responsive">Editer {{ $fichier->title }}</h3>
                <hr>
                <form action="{{ route('fichiers.update', $fichier) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Titre:</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required autofocus value="{{ $fichier->title }}">

                        @error('title')
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="link">URL:</label>
                        <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" required value="{{ $fichier->link }}">

                        @error('link')
                            <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="language">Langues:</label>
                        <select name="language_id" id="language" class="form-control @error('language_id') is-invalid @enderror">
                            <option value="">Sélectionner la langue</option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" {{ $language->id == $fichier->language_id ? 'selected' : '' }}>{{ $language->name == 'French' ? 'Française' : 'Anglaise' }}</option>
                            @endforeach

                            @error('language_id')
                                <div class="invalid-feedback">{{ $errors->first('language_id') }}</div>
                            @enderror

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-green">Valider la modification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection