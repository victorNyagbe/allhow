@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-5">
            <div class="col-12 mt-5">
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