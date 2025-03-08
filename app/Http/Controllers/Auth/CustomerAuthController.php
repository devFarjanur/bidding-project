<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class CustomerAuthController extends Controller
{
    public function customerLogin()
    {
        return view('layouts.pages.login');
    }

    public function customerLoginStore(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user && $user->isCustomer() && $user->status == 1) {
                    return redirect()->route('customer.index')->with(notify('Login successfully', 'success'));
                } else {
                    Auth::logout();
                    session()->flash('error', 'You are not authorized to access this area');
                    return redirect()->route('login');
                }
            }
            session()->flash('error', 'Invalid credentials');
            return redirect()->back();
        } catch (Exception $e) {
            Log::error('Admin login error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred, please try again later.');
            return back()->withInput();
        }
    }

    public function customerRegister()
    {
        return view('layouts.pages.register');
    }

    public function customerRegisterStore()
    {

    }

    public function customerLogout(Request $request)
    {
        try {

            Log::info('Logout method called'); // Add this line


            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flash('success', 'Logout successful');
            return redirect()->route('login');
        } catch (Exception $e) {
            Log::error('Customer logout error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred, please try again later.');
            return redirect()->route('customer.index');
        }
    }
}
