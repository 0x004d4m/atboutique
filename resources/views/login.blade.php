@extends('main_site.layout')

@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ __('login.title') }}
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
                            <label>{{ __('login.email') }}</label>
                            <input class="form-control mb-3" type="email" name="email" required>
                            <label>{{ __('login.password') }}</label>
                            <input class="form-control" type="password" name="password" required>
                            <small><a class="link-info" href="{{ url('forgetPassword') }}">{{ __('login.forget_link') }}</a></small>
                            <br>
                            <button class="btn btn-primary my-3">{{ __('login.login_button') }}</button>
                            <p>{{ __('login.register_text') }} <a href="{{ url('register') }}">{{ __('login.register_link') }}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
