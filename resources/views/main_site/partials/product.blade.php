<!-- Product -->
@php
    $parameters = request()->all();
    $queryString = http_build_query(array_reverse(array_unique(array_reverse($parameters), SORT_REGULAR)));
    $queryString = '?' . $queryString;
@endphp
<section class="bg0 p-t-23 p-b-140 m-tb-35">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button
                    class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request()->has('category') ? '' : 'how-active1' }}"
                    id="category_0" data-filter="*">
                    {{ __('products.all_products') }}
                </button>
                @foreach (App\Models\Category::get() as $Category)
                    <button
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request()->has('category') ? (request()->get('category') == $Category->id ? 'how-active1' : '') : '' }}"
                        data-filter=".{{ str_replace(' ', '_', $Category->name) }}" id="category_{{ $Category->id }}">
                        {{ $Category->name }}
                    </button>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter" id="Filters_Bar">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    {{ __('products.filter') }}
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search"
                    id="Search_Bar">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    {{ __('products.search') }}
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form class="bor8 dis-flex p-l-15" action="/products">
                    <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search"
                        value="{{ request()->has('search') ? request()->get('search') : '' }}">
                </form>
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            {{ __('products.sort_by') }}
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&sort=1"
                                    class="filter-link stext-106 trans-04 {{ request()->has('sort') ? (request()->get('sort') == 1 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.default') }}
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&sort=2"
                                    class="filter-link stext-106 trans-04 {{ request()->has('sort') ? (request()->get('sort') == 2 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.popularity') }}
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&sort=3"
                                    class="filter-link stext-106 trans-04 {{ request()->has('sort') ? (request()->get('sort') == 3 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.average_rating') }}
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&sort=4"
                                    class="filter-link stext-106 trans-04 {{ request()->has('sort') ? (request()->get('sort') == 4 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.newness') }}
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&sort=5"
                                    class="filter-link stext-106 trans-04 {{ request()->has('sort') ? (request()->get('sort') == 5 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.price_1') }}
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&sort=6"
                                    class="filter-link stext-106 trans-04 {{ request()->has('sort') ? (request()->get('sort') == 6 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.price_2') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            {{ __('products.price') }}
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&price=1"
                                    class="filter-link stext-106 trans-04 {{ request()->has('price') ? (request()->get('price') == 1 ? 'filter-link-active' : '') : '' }}">
                                    {{ __('products.all') }}
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&price=2"
                                    class="filter-link stext-106 trans-04 {{ request()->has('price') ? (request()->get('price') == 2 ? 'filter-link-active' : '') : '' }}">
                                    $0.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&price=3"
                                    class="filter-link stext-106 trans-04 {{ request()->has('price') ? (request()->get('price') == 3 ? 'filter-link-active' : '') : '' }}">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&price=4"
                                    class="filter-link stext-106 trans-04 {{ request()->has('price') ? (request()->get('price') == 4 ? 'filter-link-active' : '') : '' }}">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&price=5"
                                    class="filter-link stext-106 trans-04 {{ request()->has('price') ? (request()->get('price') == 5 ? 'filter-link-active' : '') : '' }}">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="/products{{ $queryString }}&price=6"
                                    class="filter-link stext-106 trans-04 {{ request()->has('price') ? (request()->get('price') == 6 ? 'filter-link-active' : '') : '' }}">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach (App\Models\Product::with(['images'])->filter(new App\Models\Filters\ProductFilters(request()))->get() as $Product)
                <div
                    class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ str_replace(' ', '_', $Product->category->name) }}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div onclick="viewProduct({{ json_encode($Product) }})"
                            class="block2-pic hov-img0 js-show-modal1">
                            <img src="{{ url($Product->main_image) }}" alt="{{ $Product->name }}">
                            <a onclick="viewProduct({{ json_encode($Product) }})"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                {{ __('products.quick_view') }}
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a onclick="viewProduct({{ json_encode($Product) }})"
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 js-show-modal1">
                                    {{ $Product->name }}
                                </a>

                                <span onclick="viewProduct({{ json_encode($Product) }})"
                                    class="stext-105 cl3 js-show-modal1">
                                    ${{ $Product->selling_price }}
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04"
                                        src="{{ url('images/icons/icon-heart-01.png') }}" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="{{ url('images/icons/icon-heart-02.png') }}" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@push('modals')
    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ url('images/icons/icon-close.png') }}" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg" id="images_wrap"></div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14" id="name"></h4>

                            <span class="mtext-106 cl2" id="price"></span>

                            <p class="stext-102 cl3 p-t-23" id="description"></p>

                            <form class="p-t-33" id="add_to_cart">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time" id="size" required>
                                                <option value="">Choose an option</option>
                                                @foreach (App\Models\Size::get() as $Size)
                                                    <option value="{{ $Size->id }}">{{ $Size->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time" id="color" required>
                                                <option value="">Choose an option</option>
                                                @foreach (App\Models\Color::get() as $Color)
                                                    <option value="{{ $Color->id }}">{{ $Color->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="id" name="id" required>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product" value="1" id="quantity" required>

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('scripts')
    <script>
        function viewProduct(product) {
            $('#images_wrap').empty();
            $('#images_wrap').append(`
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>
                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                    <div class="slick3 gallery-lb" id="images"></div>
                </div>
            `);
            $('#images').append(`
                <div class="item-slick3" data-thumb="${product.main_image}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${product.main_image}" alt="${product.name.{{ App::getLocale() }}}">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                            href="${product.main_image}">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `);
            if (product.images && product.images.length > 0) {
                product.images.forEach(image => {
                    $('#images').append(`
                        <div class="item-slick3" data-thumb="${image.image}">
                            <div class="wrap-pic-w pos-relative">
                                <img src="${image.image}" alt="${product.name.{{ App::getLocale() }}}">
                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                    href="${image.image}">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div>
                    `);
                });
            }

            $('#id').val(product.id)
            $('#name').text(product.name.{{ App::getLocale() }})
            $('#price').text("$" + product.selling_price)
            $('#description').text(product.description.{{ App::getLocale() }})

            $('.gallery-lb').each(function() {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    mainClass: 'mfp-fade'
                });
            });
            $('.wrap-slick3').each(function() {
                $(this).find('.slick3').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    infinite: true,
                    autoplay: false,
                    autoplaySpeed: 6000,

                    arrows: true,
                    appendArrows: $(this).find('.wrap-slick3-arrows'),
                    prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                    nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

                    dots: true,
                    appendDots: $(this).find('.wrap-slick3-dots'),
                    dotsClass: 'slick3-dots',
                    customPaging: function(slick, index) {
                        var portrait = $(slick.$slides[index]).data('thumb');
                        return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                    },
                });
            });
        }

        $(document).ready(function() {
            $('#add_to_cart').on('submit', function(event) {
                event.preventDefault();
                if ($('#size').val() == '') {

                }
                let formData = {
                    product_id: $('#id').val(),
                    size_id: $('#size').val(),
                    color_id: $('#color').val(),
                    quantity: $('#quantity').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };
                $.ajax({
                    url: '/addItemToCart',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            swal('', response.message, "success");
                        } else {
                            swal('', response.message, "error");
                        }
                        getCartItems();
                        getCartItemsCount();
                    },
                    error: function(response) {
                        swal('', response, "error");
                    }
                });
            });
        });
    </script>
    {!! request()->has('sort')||request()->has('price') ? "<script>$('#Filters_Bar').click();</script>" : '' !!}
    {!! request()->has('search') ? "<script>$('#Search_Bar').click();</script>" : '' !!}
    {!! request()->has('category')
        ? "<script>$('#category_" . request()->get('category') . "').click();</script>"
        : '' !!}
@endpush
@push('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
