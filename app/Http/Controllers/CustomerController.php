<?php

namespace App\Http\Controllers;

use App\Mail\ForgetMail;
use App\Mail\RegisterMail;
use App\Models\Cart;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function loginView()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $Customer = Customer::where('email', $request->email)->first();
        if (!$Customer) {
            return redirect('/login')->with('error', __('login.response_wrong_email'));
        }

        if (!Hash::check($request->password, $Customer->password)) {
            return redirect('/login')->with('error', __('login.response_wrong_password'));
        }

        if ($Customer->email_verified == 0) {
            return redirect('/login')->with('error', __('login.response_check_email'));
        }

        $Carts = Cart::where('session_id', Session::get('session_id'))->get();
        foreach ($Carts as $Cart) {
            $Cart->update([
                'customer_id' => $Customer->id
            ]);
        }
        Session::put('customer_id', $Customer->id);
        return redirect('/products')->with('success', __('login.response_welcome') . ", $Customer->first_name $Customer->last_name");
    }
    public function registerView()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'zip_code' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        if (Customer::where('email', $request->email)->count() > 0) {
            return redirect('/register')->with('error', __('register.response_email_registered'))->with('old', $request->input());
        }

        if (Customer::where('country_id', $request->country_id)->where('phone', $request->phone)->count() > 0) {
            return redirect('/register')->with('error', __('register.response_phone_registered'))->with('old', $request->input());
        }

        if ($request->password != $request->password_confirmation) {
            return redirect('/register')->with('error', __('register.response_password_not_confirmed'))->with('old', $request->input());
        }

        try {
            $Customer = Customer::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'verify_token' => hash('sha256', now()->timestamp . Str::random(20))
            ]);

            Mail::to($Customer->email)->send(new RegisterMail($Customer));

            return redirect('/login')->with('success', __('register.response_welcome') . " $Customer->first_name $Customer->last_name, " . __('register.response_welcome2'));
        } catch (Exception $e) {
            Log::debug($e);
            return redirect('/register')->with('error', __('register.response_general_error'))->with('old', $request->input());
        }
    }
    public function verifyEmail($verify_token)
    {
        try {
            $Customer = Customer::where('verify_token', $verify_token)->first();

            $Customer->update([
                'email_verified' => 1
            ]);

            return redirect('/login')->with('success', __('register.response_welcome3') . " " . $Customer->first_name . " " . $Customer->last_name . " " . __('register.response_welcome4'));
        } catch (Exception $e) {
            Log::debug($e);
            return redirect('/register')->with('error', __('register.response_general_error'));
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function forgetPasswordView()
    {
        return view('forgetPassword');
    }
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $Customer = Customer::where('email', $request->email)->first();
        if (!$Customer) {
            return redirect('/forgetPassword')->with('error', __('forget.response_wrong_email'));
        }

        $code = rand(111111, 999999);
        $Customer->update([
            'forget_code' => $code
        ]);

        Mail::to($Customer->email)->send(new ForgetMail($Customer));
        return redirect('/resetPassword')->with('success', __('forget.response_check_email'))->with('email', $Customer->email);
    }
    public function resetPasswordView()
    {
        return view('resetPassword');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'forget_code' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $Customer = Customer::where('email', $request->email)->where('forget_code', $request->forget_code)->first();

        if ($request->password != $request->password_confirmation) {
            return redirect('/resetPassword')->with('error', __('reset.response_password_not_confirmed'))->with('email', $request->email);
        }

        if (Hash::check($request->password, $Customer->password)) {
            return redirect('/resetPassword')->with('error', __('reset.response_old_password_error'))->with('email', $request->email);
        }

        $Customer->update([
            'forget_code' => null,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', __('reset.response_login'));
    }
    public function profile()
    {
        if (Session::has('customer_id')) {
            return view('profile', [
                'Customer' => Customer::where('id', Session::get('customer_id'))->first()
            ]);
        }
        return view('errors.404');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'state_id' => 'required|exists:states,id',
            'zip_code' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Customer::where('id', Session::get('customer_id'))->first()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'state_id' => $request->state_id,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect('profile')->with('success', 'Profile Updated Successfully');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);

        $Customer = Customer::where('id', Session::get('customer_id'))->first();

        if ($request->new_password != $request->new_password_confirmation) {
            return redirect('/profile')->with('error', 'Password Not Confirmed');
        }

        if (!Hash::check($request->old_password, $Customer->password)) {
            return redirect('/profile')->with('error', 'Old Password Is Wrong');
        }

        if ($request->old_password == $request->new_password) {
            return redirect('/profile')->with('error', 'Password Use Same Password');
        }

        $Customer->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('profile')->with('success', 'Password Changed Successfully');
    }
}
