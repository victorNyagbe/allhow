@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h5 class="h5-responsive">Envoyer un message</h5>
                <hr>
                <form action="{{ route('visitors.contactUs') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="sender_name" id="sender_name" class="form-control @error('sender_name') is-invalid @enderror" value="{{ old('sender_name') }}" required autofocus autocomplete="sender_name" placeholder="Votre nom ici...">
                        @error('sender_name')
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('sender_name') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="sender_email" id="sender_email" class="form-control @error('sender_email') is-invalid @enderror" value="{{ old('sender_email') }}" required autocomplete="sender_email" placeholder="Votre E-mail ici....">
                        @error('sender_email')
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('sender_email') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="sender_text" id="sender_text" rows="10" class="form-control @error('sender_text') is_invalid @enderror" required placeholder="Votre message ici...."></textarea>
                        @error('sender_text')
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('sender_text') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-green">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <h5 class="h5-responsive mt-5 mt-md-0">Adresse</h5>
                <hr>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.408996931066!2d1.176905014323368!3d6.20966359550476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1021584ead60792b%3A0x2880b392b6f7baff!2sLA%20VOLONTE!5e0!3m2!1sfr!2stg!4v1599650113668!5m2!1sfr!2stg" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <h5 class="h5-responsive mt-4">Contacts</h5>
                <hr>
                <p>
                    <span class="fa white-text fa-google rounded-circle red p-3"></span> <strong class="font-weight-bold">deblaa.ap@gmail.com</strong>
                </p>
                <p>
                    <span class="fa white-text fa-whatsapp rounded-circle green p-3"></span> <strong class="font-weight-bold">(+228) 91 01 92 45</strong>
                </p>
                <p>
                    <span class="fa white-text fa-facebook rounded-circle primary-color-dark p-3"></span> <strong class="font-weight-bold"><a href="#" class="text-decoration-none black-text">https://fb.com/allhow</a></strong>
                </p>
                <p>
                    <span class="fa white-text fa-phone rounded-circle blue p-3"></span> <strong class="font-weight-bold">(+228) 97 53 17 17</strong>
                </p>

            </div>
        </div>
    </div>
@endsection