@extends('main_site.layout')

@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ __('register.title') }}
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
                            <label>{{ __('register.first_name') }}</label>
                            <input class="form-control mb-3" type="text" name="first_name" required value="{{ Session::has('old')?Session::get('old')['first_name']:'' }}">
                            <label>{{ __('register.last_name') }}</label>
                            <input class="form-control mb-3" type="text" name="last_name" required value="{{ Session::has('old')?Session::get('old')['last_name']:'' }}">
                            <label>{{ __('register.country_id') }}</label>
                            <select required class="form-control" name="country_id">
                                <option value="">{{ __('register.select_country') }}</option>
                                @foreach (App\Models\Country::get() as $Country)
                                    <option {{ Session::has('old')?(Session::get('old')['country_id']==$Country->id?'Selected':''):'' }} value="{{ $Country->id }}">{{ $Country->name }}</option>
                                @endforeach
                            </select>
                            <label>{{ __('register.state_id') }}</label>
                            <select required class="form-control" name="state_id" value="{{ Session::has('old')?Session::get('old')['state_id']:'' }}">
                                <option value="">{{ __('register.select_state') }}</option>
                                @foreach (App\Models\State::get() as $State)
                                    <option {{ Session::has('old')?(Session::get('old')['state_id']==$Country->id?'Selected':''):'' }} value="{{ $State->id }}" data-country_id="{{ $State->country_id }}">
                                        {{ $State->name }}</option>
                                @endforeach
                            </select>
                            <label>{{ __('register.zip_code') }}</label>
                            <input class="form-control mb-3" type="text" name="zip_code" required value="{{ Session::has('old')?Session::get('old')['zip_code']:'' }}">
                            <label>{{ __('register.address') }}</label>
                            <input class="form-control mb-3" type="text" name="address" required value="{{ Session::has('old')?Session::get('old')['address']:'' }}">
                            <label>{{ __('register.phone') }}</label>
                            <input class="form-control mb-3" type="text" name="phone" required value="{{ Session::has('old')?Session::get('old')['phone']:'' }}">
                            <label>{{ __('register.email') }}</label>
                            <input class="form-control mb-3" type="email" name="email" required value="{{ Session::has('old')?Session::get('old')['email']:'' }}">
                            <label>{{ __('register.password') }}</label>
                            <input class="form-control" type="password" name="password" required>
                            <label>{{ __('register.password_confirmation') }}</label>
                            <input class="form-control" type="password" name="password_confirmation" required>
                            <br>
                            <button class="btn btn-primary my-3">{{ __('register.register_button') }}</button>
                            <p>{{ __('register.login_text') }} <a
                                    href="{{ url('login') }}">{{ __('register.login_link') }}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Store the original state options in a hidden element
            var originalStateOptions = $('select[name="state_id"]').html();

            // Function to show states based on selected country
            function ShowStates() {
                var selectedCountryId = $('select[name="country_id"]').val();
                var stateSelect = $('select[name="state_id"]');

                // Clear the current options in state select
                stateSelect.html('<option value="">{{ __('register.select_state') }}</option>');

                // Filter and add states for the selected country
                $(originalStateOptions).each(function() {
                    if ($(this).data('country_id') == selectedCountryId) {
                        stateSelect.append($(this));
                    }
                });
            }

            // Function to validate password confirmation
            function validatePasswordConfirmation() {
                var password = $('input[name="password"]').val();
                var passwordConfirmation = $('input[name="password_confirmation"]').val();

                if (password !== passwordConfirmation) {
                    $('input[name="password_confirmation"]').get(0).setCustomValidity("Passwords do not match");
                } else {
                    $('input[name="password_confirmation"]').get(0).setCustomValidity('');
                }
            }

            // Event listener for country change
            $('select[name="country_id"]').change(ShowStates);

            // Event listeners for password confirmation validation
            $('input[name="password"], input[name="password_confirmation"]').on('input',
                validatePasswordConfirmation);

            // Initial call to ShowStates to handle pre-selected values if any
            ShowStates();
        });
    </script>
@endpush
