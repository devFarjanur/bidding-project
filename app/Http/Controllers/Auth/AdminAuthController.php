<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class AdminAuthController extends Controller
{
    public function adminLogin()
    {
        return view('admin.admin_login');
    }

    public function adminLoginPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user && $user->isAdmin()) {
                    return redirect()->route('admin.dashboard')->with(notify('Login successfully', 'success'));
                } else {
                    Auth::logout();
                    session()->flash('error', 'You are not authorized to access this area');
                    return redirect()->route('admin.login');
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

    public function adminLogout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flash('success', 'Logout successful');
            return redirect()->route('admin.login');
        } catch (Exception $e) {
            Log::error('Admin logout error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred, please try again later.');
            return redirect()->route('admin.dashboard');
        }
    }

    public function adminDashboard()
    {
        try {
            return view('admin.admin_dashboard');
        } catch (Exception $e) {
            Log::error('Admin dashboard error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while loading the dashboard.');
            return redirect()->route('admin.login');
        }
    }

    public function adminProfile()
    {
        try {
            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('admin.admin_profile_view', compact('profileData'));
        } catch (Exception $e) {
            Log::error('Admin profile error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while loading your profile.');
            return redirect()->route('admin.dashboard');
        }
    }

    public function adminProfileStore(Request $request)
    {
        try {
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
            session()->flash('success', 'Admin Profile Updated Successfully');
            return redirect()->back();
        } catch (Exception $e) {
            Log::error('Admin profile update error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while updating your profile.');
            return back();
        }
    }

    public function adminChangePassword()
    {
        try {
            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('admin.admin_change_password', compact('profileData'));
        } catch (Exception $e) {
            Log::error('Admin change password error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while loading the change password page.');
            return redirect()->route('admin.dashboard');
        }
    }

    public function adminUpdatePassword(Request $request)
    {
        try {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);

            if (!Hash::check($request->old_password, auth()->user()->password)) {
                session()->flash('error', 'Old Password does not match');
                return back();
            }

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            session()->flash('success', 'Password Changed Successfully');
            return back();
        } catch (Exception $e) {
            Log::error('Admin password update error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while changing the password.');
            return back();
        }
    }
}
