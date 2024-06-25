@extends('main_site.layout')

@section('content')
    @php
        $Contact = App\Models\Contact::first();
    @endphp
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ __('header.faqs') }}
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-12 col-lg-12">
                    <div id="accordion">
                        @foreach (App\Models\Faq::get() as $Faq)
                            <div class="card">
                                <div class="card-header" id="heading{{ $Faq->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $Faq->id }}"
                                            aria-expanded="false" aria-controls="collapse{{ $Faq->id }}">
                                            {{ $Faq->question }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $Faq->id }}" class="collapse" aria-labelledby="heading{{ $Faq->id }}" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $Faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
