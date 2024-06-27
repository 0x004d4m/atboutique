<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    {{ __('header.text') }}
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="{{ url('/faqs') }}" class="flex-c-m trans-04 p-lr-25">
                        {{ __('header.faqs') }}
                    </a>
                    @if (Session::has('customer_id'))
                        <a href="{{ url('/logout') }}" class="flex-c-m trans-04 p-lr-25">
                            {{ __('header.logout') }}
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="flex-c-m trans-04 p-lr-25">
                            {{ __('header.login') }}
                        </a>
                    @endif

                    <a href="{{ url('/changeLang/'.(App::getLocale()=='ar'?'en':'ar')) }}" class="flex-c-m trans-04 p-lr-25">
                        {{ App::getLocale()=='ar'?'AR':'EN' }}
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ url('images/icons/logo.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{ url('/') }}">{{ __('header.home') }}</a>
                        </li>

                        <li>
                            <a href="{{ url('/products') }}">{{ __('header.shop') }}</a>
                        </li>

                        <li>
                            <a href="{{ url('/about') }}">{{ __('header.about') }}</a>
                        </li>

                        <li>
                            <a href="{{ url('/contact') }}">{{ __('header.contact') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="0">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{ url('/') }}"><img src="{{ url('images/icons/logo.png') }}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                data-notify="0">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    {{ __('header.text') }}
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="{{ url('/faqs') }}" class="flex-c-m p-lr-10 trans-04">
                        {{ __('header.faqs') }}
                    </a>

                    <a href="{{ url('/login') }}" class="flex-c-m p-lr-10 trans-04">
                        {{ __('header.login') }}
                    </a>

                    <a href="{{ url('/changeLang/'.(App::getLocale()=='ar'?'en':'ar')) }}" class="flex-c-m p-lr-10 trans-04">
                        {{ App::getLocale()=='ar'?'AR':'EN' }}
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{ url('/') }}">{{ __('header.home') }}</a>
            </li>

            <li>
                <a href="{{ url('/products') }}">{{ __('header.shop') }}</a>
            </li>

            <li>
                <a href="{{ url('/about') }}">{{ __('header.about') }}</a>
            </li>

            <li>
                <a href="{{ url('/contact') }}">{{ __('header.contact') }}</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ url('images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="/products">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="{{ __('header.search') }}...">
            </form>
        </div>
    </div>
</header>
@push('scripts')
<script>
    function getCartItemsCount() {
        $.ajax({
            url: '/getCartItemsCount',
            type: 'GET',
            success: function(response) {
                if(response.count !== undefined) {
                    $('.js-show-cart').attr('data-notify', response.count);
                }
            },
            error: function() {
                console.error('Error fetching cart items count');
            }
        });
    }
    $(document).ready(function() {
        getCartItemsCount();
    });
</script>
@endpush
