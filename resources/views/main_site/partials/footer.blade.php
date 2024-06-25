<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{ __('footer.categories') }}
                </h4>

                <ul>
                    @foreach (App\Models\Category::get() as $Category)
                        <li class="p-b-10">
                            <a href="/products?category={{ $Category->id }}" class="stext-107 cl7 hov-cl1 trans-04">
                                {{ $Category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{ __('footer.help') }}
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="{{ url('/faqs') }}" class="stext-107 cl7 hov-cl1 trans-04">
                            {{ __('footer.faqs') }}
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="{{ url('/policy/3') }}" class="stext-107 cl7 hov-cl1 trans-04">
                            {{ __('footer.return_policy') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{ __('footer.get_in_touch') }}
                </h4>

                <p class="stext-107 cl7 size-201">
                    {{ __('footer.get_in_touch_text') }}
                </p>

                <div class="p-t-27">
                    @foreach (App\Models\Social::get() as $Social)
                        <a href="{{ $Social->link }}" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="{{ $Social->icon }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{ __('footer.newsletter') }}
                </h4>

                <form action="{{ url('/addToNewsLetter') }}" method="POST">
                    @csrf
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="email" name="email"
                            placeholder="email@example.com" required>
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            {{ __('footer.newsletter_button') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">
            {{-- <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                </a>
            </div> --}}

            <p class="stext-107 cl6 txt-center">
                {{ __('footer.copyright') }}
            </p>
        </div>
    </div>
</footer>
