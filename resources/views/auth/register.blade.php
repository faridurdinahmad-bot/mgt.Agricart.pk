@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 text-xs text-white/50">
            <li><a href="{{ route('welcome') }}" class="hover:text-white/80 transition-colors">Home</a></li>
            <li aria-hidden="true">/</li>
            <li class="text-white/70">{{ $type === 'vendor' ? 'Vendor Registration' : ($type === 'staff' ? 'Staff Registration' : 'Register') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto space-y-8">
        @if (!$type)
            {{-- Dual choice: Staff or Vendor --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white mb-2">Create an account</h1>
                <p class="text-sm text-white/80">Choose how you want to register.</p>
            </div>
            <div class="grid sm:grid-cols-2 gap-4">
                <a
                    href="{{ route('register', ['type' => 'staff']) }}"
                    class="group flex flex-col items-center gap-4 p-6 sm:p-8 rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:border-[#83b735]/50 transition-all"
                >
                    <span class="flex items-center justify-center w-14 h-14 rounded-2xl backdrop-blur-md bg-white/15 border border-white/25 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 text-white group-hover:text-[#83b735] transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </span>
                    <span class="text-lg font-bold tracking-tight text-white group-hover:text-[#83b735]">Register as Staff</span>
                    <span class="text-sm text-white/80 text-center">Employee or team member access.</span>
                </a>
                <a
                    href="{{ route('register', ['type' => 'vendor']) }}"
                    class="group flex flex-col items-center gap-4 p-6 sm:p-8 rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:border-[#83b735]/50 transition-all"
                >
                    <span class="flex items-center justify-center w-14 h-14 rounded-2xl backdrop-blur-md bg-white/15 border border-white/25 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 text-white group-hover:text-[#83b735] transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </span>
                    <span class="text-lg font-bold tracking-tight text-white group-hover:text-[#83b735]">Register as Vendor</span>
                    <span class="text-sm text-white/80 text-center">Supplier or partner access.</span>
                </a>
            </div>
        @elseif ($type === 'vendor')
            {{-- Vendor Registration Form (Glassmorphism, full fields) --}}
            <div class="max-w-lg mx-auto">
                <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-[0_32px_80px_rgba(0,0,0,0.35)] p-5 sm:p-8">
                    <div class="flex items-center gap-3 mb-6 sm:mb-8">
                        <a href="{{ route('register') }}" class="flex-shrink-0 p-1.5 rounded-xl text-white/80 hover:text-[#83b735] hover:bg-white/10 transition-colors" aria-label="Back">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </a>
                        <div>
                            <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-white">Vendor Registration</h1>
                            <p class="text-xs sm:text-sm text-white/70 mt-0.5">Join the Agricart network. One form, full control.</p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/50 text-sm text-red-200">
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @php
                        $inputClass = 'w-full pl-10 pr-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735] transition-colors';
                        $labelClass = 'block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5';
                        $iconClass = 'absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-white/50 pointer-events-none';
                    @endphp

                    <form method="POST" action="{{ route('register') }}" class="space-y-4 sm:space-y-5">
                        @csrf
                        <input type="hidden" name="role" value="vendor">

                        <div>
                            <label for="name" class="{{ $labelClass }}">Full Name</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name"
                                    class="{{ $inputClass }}" placeholder="Your full name">
                            </div>
                        </div>

                        <div>
                            <label for="company_name" class="{{ $labelClass }}">Business Name</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required
                                    class="{{ $inputClass }}" placeholder="Your business or company name">
                            </div>
                        </div>

                        <div>
                            <label for="whatsapp_number" class="{{ $labelClass }}">WhatsApp Number</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <input type="tel" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number') }}" required
                                    class="{{ $inputClass }}" placeholder="e.g. 03001234567" inputmode="numeric">
                            </div>
                            <p class="mt-1 text-[11px] text-white/60">Include country code if outside Pakistan. We’ll contact you here.</p>
                        </div>

                        <div>
                            <label for="email" class="{{ $labelClass }}">Email Address</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                                    class="{{ $inputClass }}" placeholder="you@company.com">
                            </div>
                        </div>

                        <div>
                            <label for="city" class="{{ $labelClass }}">City</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <select name="city" id="city" required class="{{ $inputClass }} appearance-none cursor-pointer pr-10">
                                    <option value="" class="bg-gray-800 text-white">Select your city</option>
                                    @foreach (['Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Peshawar', 'Quetta', 'Sialkot', 'Gujranwala', 'Bahawalpur', 'Sargodha', 'Sukkur', 'Larkana', 'Sheikhupura', 'Rahim Yar Khan', 'Jhang', 'Dera Ghazi Khan', 'Sahiwal', 'Mardan', 'Mingora', 'Mirpur Khas', 'Chiniot', 'Kamoke', 'Other'] as $city)
                                        <option value="{{ $city }}" class="bg-gray-800 text-white" {{ old('city') === $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                                <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-white/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <div>
                            <label for="business_category" class="{{ $labelClass }}">Business Category</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 7V9a2 2 0 002 2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v2m-6 12h.01"/></svg>
                                <select name="business_category" id="business_category" required class="{{ $inputClass }} appearance-none cursor-pointer pr-10">
                                    <option value="" class="bg-gray-800 text-white">Select category</option>
                                    @foreach (['Retailer', 'Wholesaler', 'Manufacturer', 'Other'] as $cat)
                                        <option value="{{ $cat }}" class="bg-gray-800 text-white" {{ old('business_category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                                <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-white/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <div x-data="{ showPassword: false }">
                            <label for="password" class="{{ $labelClass }}">Password</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required autocomplete="new-password"
                                    class="{{ $inputClass }} pr-11" placeholder="Min. 8 characters">
                                <button type="button" @click="showPassword = !showPassword" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-lg text-white/50 hover:text-white/80 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50">
                                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showPassword" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878a4.5 4.5 0 106.262 6.262M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                                </button>
                            </div>
                        </div>

                        <div x-data="{ showPasswordConfirm: false }">
                            <label for="password_confirmation" class="{{ $labelClass }}">Confirm Password</label>
                            <div class="relative">
                                <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <input :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"
                                    class="{{ $inputClass }} pr-11" placeholder="Re-enter password">
                                <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-lg text-white/50 hover:text-white/80 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50">
                                    <svg x-show="!showPasswordConfirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showPasswordConfirm" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543 7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878a4.5 4.5 0 106.262 6.262M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-[11px] sm:text-xs text-white/60 leading-relaxed">
                            Note: A date-stamped unique ID (e.g., AC-YYMMDD-001) will be generated for your business. This helps in tracking your partnership journey with Agricart.
                        </p>

                        <div class="pt-1">
                            <label class="flex items-start gap-3 cursor-pointer group">
                                <input type="checkbox" name="terms_accepted" id="terms_accepted" value="1" required
                                    class="mt-1 rounded border-white/30 bg-white/10 text-[#83b735] focus:ring-[#83b735]/80 focus:ring-offset-0">
                                <span class="text-sm text-white/90 group-hover:text-white">
                                    I agree to the <a href="{{ route('terms') }}" target="_blank" rel="noopener" class="underline text-[#a4d85f] hover:text-[#83b735]">Terms of Service</a> and <a href="{{ route('privacy') }}" target="_blank" rel="noopener" class="underline text-[#a4d85f] hover:text-[#83b735]">Privacy Policy</a>.
                                </span>
                            </label>
                            @error('terms_accepted')
                                <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col-reverse sm:flex-row gap-3 sm:gap-4">
                            <a href="{{ route('welcome') }}"
                                class="inline-flex items-center justify-center py-3.5 rounded-xl text-sm sm:text-base font-semibold tracking-wide text-white/90 bg-transparent border border-white/30 hover:bg-white/10 hover:border-white/40 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent">
                                Back to Home
                            </a>
                            <button type="submit"
                                class="flex-1 py-3.5 rounded-xl text-sm sm:text-base font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]">
                                Register My Business
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-center text-sm text-white/80">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-semibold text-[#83b735] hover:text-[#a4d85f] transition-colors">Login here</a>
                    </p>
                </div>
            </div>
        @else
            {{-- Staff Registration form --}}
            <div class="max-w-lg mx-auto rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-2xl p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <a href="{{ route('register') }}" class="flex-shrink-0 p-1.5 rounded-xl text-white/80 hover:text-[#83b735] hover:bg-white/10 transition-colors" aria-label="Back">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    </a>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-white">Register as Staff</h1>
                        <p class="text-xs sm:text-sm text-white/70 mt-0.5">Join the team. Your ID will be generated from your joining date.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/50 text-sm text-red-200">
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p class="text-[11px] sm:text-xs text-white/60 leading-relaxed mb-4">
                    Note: Staff ID will be automatically generated based on the joining date.
                </p>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-4 sm:space-y-5">
                    @csrf
                    <input type="hidden" name="role" value="staff">

                    @php
                        $inputClass = 'w-full pl-10 pr-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735] transition-colors';
                        $labelClass = 'block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5';
                        $iconClass = 'absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-white/50 pointer-events-none';
                    @endphp

                    <div>
                        <label for="name" class="{{ $labelClass }}">Full Name</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name"
                                class="{{ $inputClass }}" placeholder="Your full name">
                        </div>
                    </div>

                    <div>
                        <label for="staff_email" class="{{ $labelClass }}">Email</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <input type="email" name="email" id="staff_email" value="{{ old('email') }}" required autocomplete="email"
                                class="{{ $inputClass }}" placeholder="you@company.com">
                        </div>
                    </div>

                    <div>
                        <label for="staff_whatsapp" class="{{ $labelClass }}">WhatsApp Number</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <input type="tel" name="whatsapp_number" id="staff_whatsapp" value="{{ old('whatsapp_number') }}" required
                                class="{{ $inputClass }}" placeholder="e.g. 03001234567" inputmode="numeric">
                        </div>
                    </div>

                    <div>
                        <label for="designation" class="{{ $labelClass }}">Designation</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <select name="designation" id="designation" required class="{{ $inputClass }} appearance-none cursor-pointer pr-10">
                                <option value="" class="bg-gray-800 text-white">Select designation</option>
                                @foreach (['Manager', 'Sales Executive', 'Accountant', 'HR Officer', 'IT Support', 'Warehouse Staff', 'Clerk', 'Other'] as $opt)
                                    <option value="{{ $opt }}" class="bg-gray-800 text-white" {{ old('designation') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-white/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>

                    <div>
                        <label for="joining_date" class="{{ $labelClass }}">Joining Date</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <input type="date" name="joining_date" id="joining_date" value="{{ old('joining_date') }}" required
                                class="{{ $inputClass }}">
                        </div>
                    </div>

                    <div x-data="{ showPassword: false }">
                        <label for="password" class="{{ $labelClass }}">Password</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required autocomplete="new-password"
                                class="{{ $inputClass }} pr-11" placeholder="Min. 8 characters">
                            <button type="button" @click="showPassword = !showPassword" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-lg text-white/50 hover:text-white/80 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showPassword" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543 7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878a4.5 4.5 0 106.262 6.262M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                    </div>

                    <div x-data="{ showPasswordConfirm: false }">
                        <label for="password_confirmation" class="{{ $labelClass }}">Confirm Password</label>
                        <div class="relative">
                            <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <input :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"
                                class="{{ $inputClass }} pr-11" placeholder="Re-enter password">
                            <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-lg text-white/50 hover:text-white/80 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50">
                                <svg x-show="!showPasswordConfirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showPasswordConfirm" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543 7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878a4.5 4.5 0 106.262 6.262M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- CNIC Front Image - Glass upload zone --}}
                    <div>
                        <label class="{{ $labelClass }}">CNIC Front Image</label>
                        <label for="cnic_front" class="flex flex-col items-center justify-center w-full rounded-xl border-2 border-dashed border-white/30 backdrop-blur-md bg-white/5 hover:bg-white/10 hover:border-white/40 transition-all cursor-pointer min-h-[100px] py-6 px-4">
                            <input type="file" name="cnic_front" id="cnic_front" accept="image/*" required class="hidden">
                            <svg class="w-8 h-8 text-white/50 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm text-white/80 text-center">Click or drag to upload front side</span>
                            <span class="text-[11px] text-white/50 mt-0.5">PNG, JPG up to 2MB</span>
                        </label>
                        @error('cnic_front')
                            <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CNIC Back Image - Glass upload zone --}}
                    <div>
                        <label class="{{ $labelClass }}">CNIC Back Image</label>
                        <label for="cnic_back" class="flex flex-col items-center justify-center w-full rounded-xl border-2 border-dashed border-white/30 backdrop-blur-md bg-white/5 hover:bg-white/10 hover:border-white/40 transition-all cursor-pointer min-h-[100px] py-6 px-4">
                            <input type="file" name="cnic_back" id="cnic_back" accept="image/*" required class="hidden">
                            <svg class="w-8 h-8 text-white/50 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm text-white/80 text-center">Click or drag to upload back side</span>
                            <span class="text-[11px] text-white/50 mt-0.5">PNG, JPG up to 2MB</span>
                        </label>
                        @error('cnic_back')
                            <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row gap-3 sm:gap-4">
                        <a href="{{ route('welcome') }}"
                            class="inline-flex items-center justify-center py-3 rounded-xl text-sm font-semibold tracking-wide text-white/90 bg-transparent border border-white/30 hover:bg-white/10 hover:border-white/40 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent">
                            Back to Home
                        </a>
                        <button type="submit"
                            class="flex-1 py-3 rounded-xl text-sm font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]">
                            Submit application
                        </button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-white/70">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-[#83b735] hover:text-[#a4d85f]">Login here</a>
                </p>
            </div>
        @endif

        {{-- Check Application Status (shown on choice screen only) --}}
        @if (!$type)
        <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 p-6 sm:p-8">
            <h2 class="text-lg font-bold tracking-tight text-white mb-2">Check Application Status</h2>
            <p class="text-sm text-white/80 mb-4">Enter your email to see if your account is Pending, Approved, or Rejected.</p>

            @if (session('status_result'))
                <div class="mb-4 p-4 rounded-xl backdrop-blur-md bg-white/10 border border-white/25">
                    <p class="text-sm text-white/80">Email: <span class="font-semibold text-white">{{ session('status_result')['email'] }}</span></p>
                    <p class="text-sm mt-1">Status: <span class="font-bold {{ session('status_result')['status'] === 'Approved' ? 'text-[#83b735]' : (session('status_result')['status'] === 'Rejected' ? 'text-red-400' : 'text-amber-300') }}">{{ session('status_result')['status'] }}</span></p>
                </div>
            @endif

            @if (session('status_result') && $errors->isEmpty())
                {{-- Show form again to allow another check --}}
            @endif

            <form method="POST" action="{{ route('register.check-status') }}" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email"
                    class="flex-1 px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]">
                <button type="submit"
                    class="px-5 py-3 rounded-xl text-sm font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] transition-all whitespace-nowrap">
                    Check status
                </button>
            </form>
            @error('email')
                <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
            @enderror
        </div>
        @endif
    </div>
@endsection
