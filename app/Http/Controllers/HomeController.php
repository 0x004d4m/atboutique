<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactRequest;
use App\Models\Filters\ProductFilters;
use App\Models\NewsLetter;
use App\Models\Product;
use App\Models\SiteText;
use Backpack\LangFileManager\app\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function changeLang(Request $request, $locale)
    {
        if (in_array($locale, Language::where('active', 1)->pluck('abbr')->toArray())) {
            Session::put('locale', $locale);
        }
        return redirect('/');
    }
    public function home()
    {
        return view('home');
    }
    public function faqs()
    {
        return view('faqs');
    }
    public function policy($id)
    {
        return view('policy', [
            'Text' => SiteText::where('id', $id)->first()
        ]);
    }
    public function products(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with(['images', 'category'])
                ->filter(new ProductFilters($request))
                ->paginate(12);

            return response()->json([
                'products' => view('main_site.partials.product_list', compact('products'))->render(),
                'pagination' => view('main_site.partials.pagination', compact('products'))->render()
            ]);
        }

        $categories = Category::all();
        $products = Product::with(['images', 'category'])
            ->filter(new ProductFilters($request))
            ->paginate(12);

        return view('products', compact('categories', 'products'));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function contactRequest(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email', 'message' => 'required']);
        ContactRequest::create([
            'email' => $request->email,
            'message' => $request->message
        ]);
        return back()->with('success', 'Thank you for Sending Us A Message!');
    }
    public function addToNewsLetter(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email']);
        if (NewsLetter::where('email', $request->email)->count() == 0) {
            NewsLetter::create([
                'email' => $request->email
            ]);
        }
        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
