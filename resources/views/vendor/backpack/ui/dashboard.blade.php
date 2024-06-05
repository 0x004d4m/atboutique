@extends(backpack_view('blank'))

@php
    Widget::add()
        ->to('before_content')
        ->type('div')
        ->class('row')
        ->content([
            [
                'type' => 'jumbotron',
                'heading' => 'Welcome!',
                'content' => 'Some important statistics',
            ],
        ]);
    Widget::add()
        ->to('before_content')
        ->type('div')
        ->class('row')
        ->content([
            [
                'type' => 'progress',
                'class' => 'card text-white bg-primary mb-2',
                'value' => App\Models\Customer::count(),
                'description' => 'Customers',
                'progress' =>
                    App\Models\Customer::count() /
                    (DB::table('sessions')->count() == 0 ? 1 : DB::table('sessions')->count()),
            ],
            [
                'type' => 'progress',
                'class' => 'card text-white bg-success mb-2',
                'value' =>
                    App\Models\Order::where('order_status_id', '6')->sum('total_selling_price') -
                    App\Models\Order::where('order_status_id', '6')->sum('total_cost_price'),
                'description' => 'Profit',
                'progress' =>
                    App\Models\Order::where('order_status_id', '6')->count() /
                    (App\Models\Order::count() == 0 ? 1 : App\Models\Order::count()),
            ],
            [
                'type' => 'progress',
                'class' => 'card text-white bg-success mb-2',
                'value' => App\Models\Order::where('order_status_id', '6')->count(),
                'description' => 'Completed Orders',
                'progress' =>
                    App\Models\Order::where('order_status_id', '6')->count() /
                    (App\Models\Order::count() == 0 ? 1 : App\Models\Order::count()),
            ],
            [
                'type' => 'progress',
                'class' => 'card text-white bg-info mb-2',
                'value' => App\Models\Product::sum('stock'),
                'description' => 'Items In Stock',
                'progress' =>
                    App\Models\Product::sum('stock') /
                    (App\Models\Product::count() * App\Models\Product::avg('stock') == 0
                        ? 1
                        : App\Models\Product::count() * App\Models\Product::avg('stock')),
            ],
        ]);
@endphp

@section('content')
    {{-- <p>Your custom HTML can live here</p> --}}
@endsection
