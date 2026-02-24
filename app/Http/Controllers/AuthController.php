<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => __('The provided credentials do not match our records.'),
            ])->onlyInput('email');
        }

        if (!$user->is_approved) {
            return back()->withErrors([
                'email' => __('Your account is pending approval from the administrator.'),
            ])->onlyInput('email');
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegisterForm(Request $request)
    {
        $type = $request->query('type', null); // 'staff' | 'vendor' | null (choice screen)
        return view('auth.register', ['type' => $type]);
    }

    public function register(Request $request)
    {
        $type = $request->input('role', 'staff');
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'in:staff,vendor'],
        ];

        if ($type === 'vendor') {
            $rules['company_name'] = ['required', 'string', 'max:255'];
            $rules['whatsapp_number'] = ['required', 'string', 'max:20'];
            $rules['city'] = ['required', 'string', 'max:100'];
            $rules['business_category'] = ['required', 'in:Retailer,Wholesaler,Manufacturer,Other'];
            $rules['terms_accepted'] = ['required', 'accepted'];
        } else {
            $rules['whatsapp_number'] = ['required', 'string', 'max:20'];
            $rules['designation'] = ['required', 'string', 'max:100'];
            $rules['joining_date'] = ['required', 'date'];
            $rules['cnic_front'] = ['required', 'file', 'image', 'max:2048'];
            $rules['cnic_back'] = ['required', 'file', 'image', 'max:2048'];
        }

        $validated = $request->validate($rules);

        $cnicFrontPath = null;
        $cnicBackPath = null;
        if ($type === 'staff') {
            $cnicFrontPath = $request->file('cnic_front')->store('cnic', 'public');
            $cnicBackPath = $request->file('cnic_back')->store('cnic', 'public');
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'status' => 'pending',
            'is_approved' => false,
            'company_name' => $validated['company_name'] ?? null,
            'department' => $validated['department'] ?? null,
            'whatsapp_number' => $validated['whatsapp_number'] ?? null,
            'city' => $validated['city'] ?? null,
            'business_category' => $validated['business_category'] ?? null,
            'designation' => $validated['designation'] ?? null,
            'joining_date' => $validated['joining_date'] ?? null,
            'cnic_front_path' => $cnicFrontPath,
            'cnic_back_path' => $cnicBackPath,
        ]);

        if ($type === 'vendor') {
            return redirect()->route('login')
                ->with('status', __('Registration successful. Your account is pending approval.'))
                ->with('registration_success_vendor', true)
                ->with('business_id_placeholder', 'AC-' . $user->created_at->format('ymd') . '-XXXX')
                ->with('registered_at', $user->created_at->format('F j, Y'));
        }

        return redirect()->route('login')->with('status', __('Registration successful. Your account is pending approval.'));
    }

    public function checkStatus(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => __('No application found with this email.')])->withInput();
        }

        $status = ($user->is_approved || $user->status === 'approved')
            ? 'Approved'
            : ($user->status === 'rejected' ? 'Rejected' : 'Pending');

        return back()->with('status_result', [
            'email' => $user->email,
            'status' => $status,
        ]);
    }
}
