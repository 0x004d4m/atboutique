@extends('main_site.layout')

@section('content')
    <section class="bg0 p-t-23 p-b-140 m-tb-35">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" id="category_0"
                        data-category="0">
                        {{ __('products.all_products') }}
                    </button>
                    @foreach ($categories as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" id="category_{{ $category->id }}"
                            data-category="{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter"
                        id="Filters_Bar">
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

                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <form class="bor8 dis-flex p-l-15" id="searchForm">
                        <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" id="searchInput"
                            placeholder="Search">
                    </form>
                </div>

                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('products.sort_by') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-sort="1">
                                        {{ __('products.default') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-sort="2">
                                        {{ __('products.popularity') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-sort="3">
                                        {{ __('products.average_rating') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-sort="4">
                                        {{ __('products.newness') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-sort="5">
                                        {{ __('products.price_1') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-sort="6">
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
                                    <a href="#" class="filter-link stext-106 trans-04" data-price="1">
                                        {{ __('products.all') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-price="2">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-price="3">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-price="4">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-price="5">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04" data-price="6">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="productList">
                @include('main_site.partials.product_list', ['products' => $products])
            </div>

            <div id="paginationWrapper">
                @include('main_site.partials.pagination', ['products' => $products])
            </div>
        </div>
    </section>
@endsection
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
        function loadProducts(params = {}) {
            $.ajax({
                url: "{{ url('products') }}",
                type: 'GET',
                data: params,
                success: function(response) {
                    $('#productList').html(response.products);
                    $('#paginationWrapper').html(response.pagination);
                }
            });
        }

        $(document).on('click', '#paginationWrapper a', function(event) {
            event.preventDefault();
            const page = $(this).data('page');
            loadProducts({
                page
            });
        });

        $('#searchForm').on('submit', function(event) {
            event.preventDefault();
            const search = $('#searchInput').val();
            loadProducts({
                search
            });
        });

        $('[data-category]').on('click', function() {
            const category = $(this).data('category');
            loadProducts({
                category
            });
        });

        $('[data-sort]').on('click', function() {
            const sort = $(this).data('sort');
            loadProducts({
                sort
            });
        });

        $('[data-price]').on('click', function() {
            const price = $(this).data('price');
            loadProducts({
                price
            });
        });
    </script>

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
@endpush
@push('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
