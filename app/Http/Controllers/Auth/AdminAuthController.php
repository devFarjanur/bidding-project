<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();  // Get the authenticated user

            if ($user) {  // Check if user is authenticated
                if ($user->isAdmin() && request()->routeIs('vendor.*', 'customer.*')) {
                    flash_error('Unauthorized access');
                    abort(403, 'Unauthorized Access');
                }
                if ($user->isVendor() && request()->routeIs('admin.*', 'customer.*')) {
                    flash_error('Unauthorized access');
                    abort(403, 'Unauthorized Access');
                }
                if ($user->isCustomer() && request()->routeIs('admin.*', 'vendor.*')) {
                    flash_error('Unauthorized access');
                    abort(403, 'Unauthorized Access');
                }
            }

            return $next($request);
        });
    }

    public function adminLogin()
    {
        return view('admin.admin_login');
    }

    public function adminLoginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user) { // Check if the user is authenticated
                flash_success('Login successful');

                if ($user->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->isVendor()) {
                    return redirect()->route('vendor.dashboard');
                } elseif ($user->isCustomer()) {
                    return redirect()->route('customer.dashboard');
                }
            }
        }

        flash_error('Invalid credentials');
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        flash_success('Logout successful');
        return redirect()->route('admin.login');
    }

    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();
        flash_success('Admin Profile Updated Successfully');
        return redirect()->back();
    }

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            flash_error('Old Password does not match');
            return back();
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        flash_success('Password Changed Successfully');
        return back();
    }
}
