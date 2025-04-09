<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class VendorAuthController extends Controller
{

    

    public function vendorLogin()
    {
        return view('vendor.vendor-login');
    }

    public function vendorLoginPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->isVendor()) {
                    $vendor = Vendor::where('user_id', $user->id)->first();

                    if ($vendor && $vendor->status == 1) {
                        return redirect()->route('vendor.dashboard')->with(notify('Login successfully', 'success'));
                    } else {
                        Auth::logout();
                        session()->flash('error', 'Your account is inactive. Please contact support.');
                        return redirect()->route('vendor.login');
                    }
                } else {
                    Auth::logout();
                    session()->flash('error', 'You are not authorized to access this area.');
                    return redirect()->route('vendor.login');
                }
            }

            session()->flash('error', 'Invalid credentials');
            return redirect()->back();
        } catch (Exception $e) {
            Log::error('Vendor login error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred, please try again later.');
            return back()->withInput();
        }
    }


    public function vendorRegistration()
    {
        return view('vendor.vendor-registration');
    }

    public function vendorRegistrationPost(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'vendor',
                'status' => 1,
            ]);

            Vendor::create([
                'user_id' => $user->id,
                'business_name' => $request->business_name,
                'status' => 0,
            ]);

            session()->flash('success', 'Registration successful');
            return redirect()->route('vendor.login');
        } catch (Exception $e) {
            Log::error('Vendor registration error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred, please try again later.');
            return redirect()->route('vendor.login');
        }
    }

    public function vendorLogout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flash('success', 'Logout successful');
            return redirect()->route('vendor.login');
        } catch (Exception $e) {
            Log::error('Vendor logout error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred, please try again later.');
            return redirect()->route('vendor.dashboard');
        }
    }

    public function vendorDashboard()
    {
        try {
            return view('vendor.vendor-dashboard');
        } catch (Exception $e) {
            Log::error('vendor dashboard error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while loading the dashboard.');
            return redirect()->route('vendor.login');
        }
    }

    public function vendorProfile()
    {
        try {
            $id = Auth::user()->id;
            $profileData = Vendor::with('user')->where('user_id', $id)->first();
    
            if (!$profileData) {
                session()->flash('error', 'Vendor profile not found.');
                return redirect()->route('vendor.dashboard');
            }
    
            return view('vendor.vendor-profile-view', compact('profileData'));
        } catch (Exception $e) {
            Log::error('Vendor profile error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while loading your profile.');
            return redirect()->route('vendor.dashboard');
        }
    }
    

    public function vendorProfileStore(Request $request)
    {
        try {
            $userId = Auth::id();

            $user = User::findOrFail($userId);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                @unlink(public_path('upload/admin_images/' . $user->profile_image));
                $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'), $filename);
                $user->profile_image = $filename;
            }

            $user->save();

            $vendor = Vendor::updateOrCreate(
                ['user_id' => $userId],
                [
                    'business_name' => $request->business_name,
                    'description' => $request->description,
                    'location' => $request->location,
                    'status' => 1,
                ]
            );
            return redirect()->back()->with(notify('update successfully successfully', 'success'));
        } catch (Exception $e) {
            Log::error('Vendor profile update error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while updating your profile.');
            return back();
        }
    }

    public function vendorChangePassword()
    {
        try {
            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('vendor.vendor-change-password', compact('profileData'));
        } catch (Exception $e) {
            Log::error('vendor change password error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while loading the change password page.');
            return redirect()->route('vendor.dashboard');
        }
    }

    public function vendorUpdatePassword(Request $request)
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
            Log::error('Vendor password update error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while changing the password.');
            return back();
        }
    }
}
