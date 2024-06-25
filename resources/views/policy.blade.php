@extends('main_site.layout')

@section('title', $Text->name )
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ url('images/bg-01.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ $Text->name }}
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-75">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <p class="stext-113 cl6 p-b-26">
                            {!! $Text->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
