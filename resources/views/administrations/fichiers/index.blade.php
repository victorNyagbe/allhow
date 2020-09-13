@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h5>Liste des vidéos postées</h5>
                <hr>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($videos as $video)
                <div class="col-12 col-md-4 col-lg-3 my-3">
                    <div class="card">
                        <a href="{{ $video->link }}" target="_blank" class="text-decoration-none">
                            <div class="card-body grey white-text">
                                <h6 class="h5-responsive">{{ $video->title }}</h6>
                                <small class="mt-2 text-muted text-white-50"> - {{ $video->language->name == 'French' ? 'Français' : 'Anglais' }}</small>
                            </div>
                        </a>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('fichiers.edition', $video->id) }}" class="btn btn-amber btn-sm">Editer</a>
                            <form action="{{ route('fichiers.destroy', $video->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

