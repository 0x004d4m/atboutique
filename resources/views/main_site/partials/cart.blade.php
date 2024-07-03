<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                {{ __('cart.title') }}
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full" id="cartItemsList">
                <!-- Cart items will be populated here dynamically -->
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40" id="cartTotal">
                    <!-- Total will be populated here dynamically -->
                </div>

                <div class="header-cart-buttons flex-w w-full" id="checkout">
                    <a href="/checkout"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        {{ __('cart.checkout') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function getCartItems() {
        $.ajax({
            url: '/getCartItems',
            type: 'GET',
            success: function(response) {
                var cartItemsList = $('#cartItemsList');
                var cartTotal = $('#cartTotal');
                cartItemsList.empty();
                var total = 0;

                response.items.forEach(function(item) {
                    var product = item.product;
                    var size = item.size;
                    var color = item.color;
                    var images = JSON.parse(product.images);
                    var itemTotal = item.quantity * item.single_product_selling_price;
                    total += itemTotal;

                    var cartItemHtml = `
                        <li class="header-cart-item flex-w flex-t m-b-12" data-id="${item.id}">
                            <div class="header-cart-item-img" data-id="${item.id}">
                                <img src="storage/${images[0]}" alt="IMG">
                            </div>
                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{ __('cart.product') }}: ${product.name.{{ App::getLocale() }}}
                                    <br>
                                    {{ __('cart.size') }}: ${size.name.{{ App::getLocale() }}}
                                    <br>
                                    {{ __('cart.color') }}: ${color.name.{{ App::getLocale() }}}
                                </a>
                                <span class="header-cart-item-info">
                                    ${item.quantity} x $${item.single_product_selling_price.toFixed(2)}
                                </span>
                            </div>
                        </li>
                    `;
                    cartItemsList.append(cartItemHtml);
                });

                if(response.items.length == 0){
                    $('#checkout').hide()
                }else{
                    $('#checkout').show()
                }

                cartTotal.html(`{{ __('cart.total') }}: $${total.toFixed(2)}`);
            },
            error: function() {
                console.error("{{ __('cart.error_fetch_items') }}");
            }
        });
    }

    function deleteCartItem(id) {
        $.ajax({
            url: '/deleteItemFromCart',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function(response) {
                if (response.success) {
                    getCartItems();
                } else {
                    console.error(response.error);
                }
            },
            error: function() {
                console.error("{{ __('cart.error_delete_items') }}");
            }
        });
    }

    $(document).ready(function() {
        getCartItems();

        $('#cartItemsList').on('click', '.header-cart-item-img', function() {
            var id = $(this).data('id');
            deleteCartItem(id);
        });
    });
</script>
@endpush
