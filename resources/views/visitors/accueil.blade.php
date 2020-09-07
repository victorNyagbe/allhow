@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <p class="text-center d-none d-lg-block" style="font-size: 2.5rem;">Trouvez le comment de toute chose en Vidéos</p>
                <p class="text-center d-none d-lg-block"><small class="text-muted" style="font-size: 18px;">En moins de 5 minutes</small></p>
                <p class="text-center d-block d-lg-none" style="font-size: 1.75rem;">Trouvez le comment de toute chose en Vidéos</p>
                <p class="text-center d-block d-lg-none"><small class="text-muted" style="font-size: 12px;">En moins de 5 minutes</small></p>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-md-8">
                <form action="" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"
                              aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Comment ......." aria-label="Search">
                      </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            
            @foreach ($french_files as $french_file)
                <div class="col-12 col-md-4 mt-3 mb-4">
                    <div class="card z-depth-2">
                        <iframe height="200" src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::substr($french_file->link, 17) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom py-2">
                            <p>{{ $french_file->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-md-3">
                {{ $french_files->links() }}
            </div>
        </div>
    </div>
@endsection
