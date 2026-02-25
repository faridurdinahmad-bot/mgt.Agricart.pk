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
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     * Uses Auth::attempt with session regeneration.
     * Rejects non-approved users before allowing access.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => __('The provided credentials do not match our records.'),
            ])->onlyInput('email');
        }

        $user = Auth::user();

        if (!$user->isApproved()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => __('Your account is pending approval from the administrator.'),
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Log the authenticated user out and redirect to the welcome page.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }

    /**
     * Show the registration form.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function showRegisterForm(Request $request)
    {
        $type = $request->query('type', null); // 'staff' | 'vendor' | null (choice screen)
        return view('auth.register', ['type' => $type]);
    }

    /**
     * Handle a registration request.
     * New accounts are always set to pending/unapproved.
     */
    public function register(Request $request)
    {
        $type = $request->input('role', 'staff');
        $rules = [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role'     => ['required', 'in:staff,vendor'],
        ];

        if ($type === 'vendor') {
            $rules['company_name']      = ['required', 'string', 'max:255'];
            $rules['whatsapp_number']   = ['required', 'string', 'max:20'];
            $rules['city']              = ['required', 'string', 'max:100'];
            $rules['business_category'] = ['required', 'in:Retailer,Wholesaler,Manufacturer,Other'];
            $rules['terms_accepted']    = ['required', 'accepted'];
        } else {
            $rules['whatsapp_number'] = ['required', 'string', 'max:20'];
            $rules['designation']     = ['required', 'string', 'max:100'];
            $rules['joining_date']    = ['required', 'date'];
            $rules['cnic_front']      = ['required', 'file', 'image', 'max:2048'];
            $rules['cnic_back']       = ['required', 'file', 'image', 'max:2048'];
        }

        $validated = $request->validate($rules);

        $cnicFrontPath = null;
        $cnicBackPath  = null;
        if ($type === 'staff') {
            $cnicFrontPath = $request->file('cnic_front')->store('cnic', 'public');
            $cnicBackPath  = $request->file('cnic_back')->store('cnic', 'public');
        }

        $user = User::create([
            'name'              => $validated['name'],
            'email'             => $validated['email'],
            'password'          => Hash::make($validated['password']),
            'role'              => $validated['role'],
            'status'            => 'pending',
            'is_approved'       => false,
            'company_name'      => $validated['company_name'] ?? null,
            'department'        => $validated['department'] ?? null,
            'whatsapp_number'   => $validated['whatsapp_number'] ?? null,
            'city'              => $validated['city'] ?? null,
            'business_category' => $validated['business_category'] ?? null,
            'designation'       => $validated['designation'] ?? null,
            'joining_date'      => $validated['joining_date'] ?? null,
            'cnic_front_path'   => $cnicFrontPath,
            'cnic_back_path'    => $cnicBackPath,
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

    /**
     * Check the approval status for a given email address.
     */
    public function checkStatus(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => __('No application found with this email.')])->withInput();
        }

        $status = $user->isApproved()
            ? 'Approved'
            : ($user->status === 'rejected' ? 'Rejected' : 'Pending');

        return back()->with('status_result', [
            'email'  => $user->email,
            'status' => $status,
        ]);
    }

    /**
     * Show the forgot-password form.
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle a forgot-password request (placeholder; real reset link is a TODO).
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        // Placeholder: in production you would send the actual reset link here
        return back()->with('status', __('If an account exists for this email, you will receive a password reset link shortly.'));
    }
}
