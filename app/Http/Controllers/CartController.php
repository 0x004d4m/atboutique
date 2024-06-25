<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addItemToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "product_id" => 'required',
            "size_id" => 'required',
            "color_id" => 'required',
            "quantity" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ]);
        }

        if (Session::has('customer_id')) {
            if (Cart::where('customer_id', Session::get('customer_id'))->where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->whereNull('order_id')->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product Already Added To Cart'
                ]);
            }
        }

        if (Session::has('session_id')) {
            if (Cart::where('session_id', Session::get('session_id'))->where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->whereNull('order_id')->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product Already Added To Cart'
                ]);
            }
        }

        $Product = Product::where('id', $request->product_id)->first();
        if (!$Product) {
            return response()->json([
                'success' => false,
                'message' => 'Not A Product'
            ]);
        } else {
            if ($Product->stock < 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product Out Of Stock'
                ]);
            }

            if ($Product->stock < $request->quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Too Much Quantity'
                ]);
            }
        }
        try {
            Cart::create([
                'quantity' => $request->quantity,
                'single_product_cost_price' => $Product->cost_price,
                'total_product_cost_price' => ($Product->cost_price * $request->quantity),
                'single_product_selling_price' => $Product->selling_price,
                'total_product_selling_price' => ($Product->selling_price * $request->quantity),
                'session_id' => Session::get('session_id', null),
                'customer_id' => Session::get('customer_id', null),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'order_id' => null,
                'rate' => 0,
            ]);

            $Product->update([
                'stock' => ($Product->stock - $request->quantity),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product Added Successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            "product_id" => 'required',
            "size_id" => 'required',
            "color_id" => 'required',
            "quantity" => 'required',
        ]);

        $Cart = null;
        if (Session::has('customer_id')) {
            $Cart = Cart::where('id', $id)->where('customer_id', Session::get('customer_id'))->where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->whereNull('order_id')->first();
        }

        if (Session::has('session_id')) {
            $Cart = Cart::where('id', $id)->where('session_id', Session::get('session_id'))->where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->whereNull('order_id')->first();
        }

        if (!$Cart) {
            return request()->json('error', 'No Product');
        }

        $Product = Product::where('id', $request->product_id)->first();
        if (!$Product) {
            return request()->json('error', 'Not A Product');
        } else {
            if ($Product->stock < 1) {
                return request()->json('error', 'Product Out Of Stock');
            }

            if (($Product->stock + $Cart->quantity) < $request->quantity) {
                return request()->json('error', 'Too Much Quantity');
            }
        }

        try {
            $Cart->update([
                'quantity' => $request->quantity,
                'single_product_cost_price' => $Product->cost_price,
                'total_product_cost_price' => ($Product->cost_price * $request->quantity),
                'single_product_selling_price' => $Product->selling_price,
                'total_product_selling_price' => ($Product->selling_price * $request->quantity),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
            ]);

            $Product->update([
                'stock' => (($Product->stock + $Cart->quantity) - $request->quantity),
            ]);

            return request()->json('success', 'Product Updated Successsfully');
        } catch (Exception) {
            return request()->json('error', 'Error');
        }
    }
    public function deleteItemFromCart(Request $request)
    {
        $request->validate([
            "id" => 'required|integer',
        ]);

        $id = $request->id;

        $Cart = null;
        if (Session::has('customer_id')) {
            $Cart = Cart::where('id', $id)->where('customer_id', Session::get('customer_id'))->whereNull('order_id')->first();
        }

        if (Session::has('session_id')) {
            $Cart = Cart::where('id', $id)->where('session_id', Session::get('session_id'))->whereNull('order_id')->first();
        }

        if (!$Cart) {
            return response()->json(['error' => 'No Product']);
        }

        $Product = Product::where('id', $Cart->product_id)->first();
        if (!$Product) {
            return response()->json(['error' => 'Not A Product']);
        }

        try {
            $Cart->delete();

            $Product->update([
                'stock' => ($Product->stock + $Cart->quantity),
            ]);

            return response()->json(['success' => 'Cart Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error']);
        }
    }
    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required',
        ]);

        $coupon = Coupon::where('name', $request->coupon)->first();
        if (!$coupon) {
            return response()->json(['error' => 'Wrong Coupon']);
        }

        $carts = [];
        if (Session::has('customer_id')) {
            $carts = Cart::where('customer_id', Session::get('customer_id'))->whereNull('order_id')->get();
        }

        if (Session::has('session_id')) {
            $carts = Cart::where('session_id', Session::get('session_id'))->whereNull('order_id')->get();
        }

        if (count($carts) == 0) {
            return response()->json(['error' => 'No Products In Cart']);
        }

        return response()->json(['success' => true, 'coupon' => $coupon]);
    }

    public function getCartItemsCount(Request $request)
    {
        $count = 0;
        if (Session::has('customer_id')) {
            $count = Cart::where('customer_id', Session::get('customer_id'))->whereNull('order_id')->count();
        }

        if (Session::has('session_id')) {
            $count = Cart::where('session_id', Session::get('session_id'))->whereNull('order_id')->count();
        }

        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }
    public function getCartItems(Request $request)
    {
        $items = [];
        if (Session::has('customer_id')) {
            $items = Cart::with(['product','size','color'])->where('customer_id', Session::get('customer_id'))->whereNull('order_id')->get();
        }

        if (Session::has('session_id')) {
            $items = Cart::with(['product','size','color'])->where('session_id', Session::get('session_id'))->whereNull('order_id')->get();
        }

        return response()->json([
            'success' => true,
            'items' => $items
        ]);
    }
    public function checkoutView(Request $request)
    {
        $items = [];
        $total = 0;
        if (Session::has('customer_id')) {
            $items = Cart::where('customer_id', Session::get('customer_id'))->whereNull('order_id')->get();
            $total = Cart::where('customer_id', Session::get('customer_id'))->whereNull('order_id')->sum('total_product_selling_price');
        }

        if (Session::has('session_id')) {
            $items = Cart::where('session_id', Session::get('session_id'))->whereNull('order_id')->get();
            $total = Cart::where('session_id', Session::get('session_id'))->whereNull('order_id')->sum('total_product_selling_price');
        }
        return view('checkout',[
            "items" => $items,
            "total" => $total,
        ]);
    }
}
