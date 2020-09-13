@extends('layout.app')

@section('style')
    <style>

        .font-about {
            font-family: 'Ubuntu Regular';
        }

        @font-face {
            font-family: 'Ubuntu Regular';
            src: url("{{ URL::asset('fonts/Ubuntu-Regular.ttf') }}")
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 mt-4">
                <div class="jumbotron z-depth-3">
                    <p class="font-about">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Molestias voluptate explicabo facilis, aperiam adipisci beatae,
                        quisquam ullam rerum quas aliquam accusantium assumenda
                        nesciunt esse amet tempore velit nemo, impedit architecto.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Odit, maiores minima. Possimus blanditiis ipsum ab soluta.
                        Voluptates praesentium odit culpa deleniti numquam porro
                        totam nobis animi placeat non. Omnis, alias?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aspernatur ratione obcaecati officia dolor molestiae iusto
                        placeat quam aliquid voluptatem nesciunt quae natus cumque,
                        eveniet pariatur voluptatum tempora veritatis corporis minima.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Iusto quasi labore alias enim ipsa voluptates magni,
                        assumenda reiciendis beatae amet eos? Dolor id 
                        laudantium suscipit laboriosam, aspernatur quos voluptatem? Facere?
                    </p>
                    <div class="d-flex justify-content-center">
                        L'équipe ALL-HOW
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection