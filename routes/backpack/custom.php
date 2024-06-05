<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('country', 'CountryCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('color', 'ColorCrudController');
    Route::crud('size', 'SizeCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('product-image', 'ProductImageCrudController');
    Route::crud('coupon', 'CouponCrudController');
    Route::crud('slider', 'SliderCrudController');
    Route::crud('site-text', 'SiteTextCrudController');
    Route::crud('contact', 'ContactCrudController');
    Route::crud('social', 'SocialCrudController');
    Route::crud('news-letter', 'NewsLetterCrudController');
    Route::crud('shipping-company', 'ShippingCompanyCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('contact-request', 'ContactRequestCrudController');
    Route::crud('customer', 'CustomerCrudController');
    Route::crud('order-status', 'OrderStatusCrudController');
    Route::crud('order', 'OrderCrudController');
}); // this should be the absolute last line of this file