@extends('main_site.layout')

@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ __('reset.title') }}
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <form method="POST">
                            @csrf
                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <label>{{ __('reset.email') }}</label>
                            <input class="form-control mb-3" type="email" name="email" required readonly value="{{ Session::get('email') }}">
                            <label>{{ __('reset.forget_code') }}</label>
                            <input class="form-control mb-3" type="text" name="forget_code" required>
                            <label>{{ __('reset.password') }}</label>
                            <input class="form-control mb-3" type="password" name="password" required>
                            <label>{{ __('reset.password_confirmation') }}</label>
                            <input class="form-control mb-3" type="password" name="password_confirmation" required>
                            <br>
                            <button class="btn btn-primary my-3">{{ __('reset.reset_button') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
