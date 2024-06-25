@extends('main_site.layout')

@section('content')
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Options</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                @foreach ($items as $item)
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{ url($item->product->main_image) }}" alt="{{ $item->product->name }}">
                                            </div>
                                        </td>
                                        <td class="column-2">
                                            <input type="hidden" name="product_id[]" value="{{ $item->product->id }}">
                                            {{ $item->product->name }}
                                            <br>
                                            {{ __('checkout.price') }}: $ {{ $item->product->selling_price }}
                                        </td>
                                        <td class="column-3">
                                            <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-9 m-t-9 m-r-9">
                                                <select class="js-select2" name="size[]">
                                                    @foreach (App\Models\Size::get() as $Size)
                                                        <option value="{{ $Size->id }}" @if ($item->size->id == $Size->id) selected @endif>
                                                            {{ $Size->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-9 m-t-9 m-r-9">
                                                <select class="js-select2" name="color[]">
                                                    @foreach (App\Models\Color::get() as $Color)
                                                        <option value="{{ $Color->id }}" @if ($item->color->id == $Color->id) selected @endif>
                                                            {{ $Color->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
                                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity[]" value="{{ $item->quantity }}">
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">$ 36.00</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" id="coupon-code" placeholder="Coupon Code">
                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" id="apply-coupon-btn">
                                    Apply coupon
                                </div>
                            </div>
                            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div>
                        <div id="coupon-message" class="m-t-15"></div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">Cart Totals</h4>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">Subtotal:</span>
                            </div>
                            <div class="size-209">
                                <span class="mtext-110 cl2">${{ $total }}</span>
                            </div>
                        </div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">Shipping:</span>
                            </div>
                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or contact us if you need any help.
                                </p>
                                <div class="p-t-15">
                                    <span class="stext-112 cl8">Calculate Shipping</span>
                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="country_id" id="country-select">
                                            <option value="">Select a country...</option>
                                            @foreach (App\Models\Country::get() as $Country)
                                                <option value="{{ $Country->id }}">{{ $Country->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="state_id" id="state-select">
                                            <option value="">Select a state...</option>
                                            @foreach (App\Models\State::get() as $State)
                                                <option data-country_id="{{ $State->country_id }}" value="{{ $State->id }}">{{ $State->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Address">
                                    </div>
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="zip_code" placeholder="Postcode / Zip">
                                    </div>
                                    <div class="flex-w">
                                        <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                            Update Totals
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">Total:</span>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">${{ $total }}</span>
                            </div>
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#apply-coupon-btn').on('click', function() {
            var couponCode = $('#coupon-code').val();
            $.ajax({
                url: '{{ url("/applyCoupon") }}',
                method: 'GET',
                data: { coupon: couponCode },
                success: function(response) {
                    var messageDiv = $('#coupon-message');
                    messageDiv.empty();
                    if(response.error) {
                        messageDiv.append('<div class="alert alert-danger">' + response.error + '</div>');
                    } else if(response.success) {
                        messageDiv.append('<div class="alert alert-success">Coupon applied successfully!</div>');
                    }
                }
            });
        });

        var stateSelect = $('#state-select');
        var allStates = stateSelect.html(); // Store all state options

        $('#country-select').change(function() {
            var selectedCountryId = $(this).val();

            // Clear current state options
            stateSelect.html('<option value="">Select a state...</option>');

            // Filter and append state options based on selected country
            $(allStates).each(function() {
                var stateOption = $(this);
                if (stateOption.data('country_id') == selectedCountryId) {
                    stateSelect.append(stateOption); // Append the matching option
                }
            });
        });
    });
</script>
@endpush
