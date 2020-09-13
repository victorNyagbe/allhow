@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-5">
            <div class="col-12 mt-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="text-center">
                    <img src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" width="10%" height="10%" alt="" class="img-fluid rounded-circle">
                </div>

                @auth
                    <?php $user = Auth::user(); ?>
                    <p class="text-center font-weight-bolder text-uppercase" style="opacity: 0.5; font-size: 2rem;">All-How Administration Panel</p>
                    <p class="text-center mt-4x" style="font-size: 2rem;">Administrateur : <strong>{{ $user->name }}</strong></p>
                @endauth
            </div>
        </div>
    </div>
@endsection