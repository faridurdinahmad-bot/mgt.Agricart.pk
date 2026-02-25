@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12
@endsection

@section('content')
    {{-- Clean slate: ready for 3D Master Lock implementation. Top nav is in layouts/app. --}}
    <div class="min-h-[40vh] flex items-center justify-center">
        <p class="text-white/50 text-sm">Dashboard — clean start.</p>
    </div>
@endsection
