@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <p class="text-center d-none d-lg-block" style="font-size: 2.5rem;">Find the how of everything in Videos </p>
                <p class="text-center d-none d-lg-block"><small class="text-muted" style="font-size: 18px;">In less than 5 minutes</small></p>
                <p class="text-center d-block d-lg-none" style="font-size: 1.75rem;">Find the how of everything in Videos</p>
                <p class="text-center d-block d-lg-none"><small class="text-muted" style="font-size: 12px;">In less than 5 minutes</small></p>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <ul class="alert alert-danger list-unstyled alert-dismissible fade show mb-4" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </ul> 
                @endif
                <form action="{{ route('visitors.search') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text allhowpdf-color"><i class="fas fa-search white-text"
                              aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="How ......." aria-label="Search" name="search_input">
                      </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">

            <?php $video_link = ''; ?>
            
            @foreach ($english_files as $english_file)
                <div class="col-12 col-md-4 mt-3 mb-4">
                    <div class="card z-depth-2">
                        <iframe height="200" src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::substr($english_file->link, 17) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php $video_link = \Illuminate\Support\Str::substr($english_file->link, 17) ?>
                        <div class="card-body py-2 allhowpdf-color">
                            <p class="d-flex justify-content-between align-items-center white-text">
                                <strong>{{ $english_file->title }}</strong>
                                <span><i class="fas fa-eye"></i> {{ Alaouy\Youtube\Facades\Youtube::getVideoInfo("$video_link")->statistics->viewCount }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-md-3">
                {{ $english_files->links() }}
            </div>
        </div>
    </div>
@endsection