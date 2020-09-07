@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h5>Liste des vidéos postées</h5>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($videos as $video)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card">
                        <a href="{{ $video->link }}" target="_blank" class="text-decoration-none">
                            <div class="card-body grey white-text">
                                <h6 class="h5-responsive">{{ $video->title }}</h6>
                                <small class="mt-2 text-muted text-white-50"> - {{ $video->language->name == 'French' ? 'Français' : 'Anglais' }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

