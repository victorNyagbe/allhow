@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-5"></div>
        <div class="row">

            <?php $video_link = ''; ?>

            @forelse ($results as $result)
                <div class="col-12 col-md-4 mt-3 mb-4">
                    <div class="card z-depth-2">
                        <iframe height="200" src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::substr($result->link, 17) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php $video_link = \Illuminate\Support\Str::substr($result->link, 17) ?>
                        <div class="card-body py-2 allhowpdf-color">
                            <p class="d-flex justify-content-between align-items-center white-text">
                                <strong>{{ $result->title }}</strong>
                                <span><i class="fas fa-eye"></i> {{ Alaouy\Youtube\Facades\Youtube::getVideoInfo("$video_link")->statistics->viewCount }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 col-md-4 my-5">
                    <p class="text-center">Aucun fichier retrouvé pour votre recherche!</p>
                </div>
            @endforelse   
        </div>
    </div>
@endsection