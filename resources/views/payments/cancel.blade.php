@extends('layouts.guest')

@section('title', 'Payment Cancelled')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-100 via-red-200 to-red-50 flex items-center justify-center pt-20 pb-[50rem]">
    <div class="bg-white p-12 rounded-3xl shadow-2xl text-center max-w-md w-full transform transition-all hover:scale-105">
        <div class="text-red-600 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mx-auto animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Payment Cancelled</h1>
        <p class="text-gray-600 mb-8">
            Your payment process was cancelled. You can try again anytime.
        </p>
        <a href="{{ route('homepage') }}"
            class="inline-block bg-red-600 text-white px-8 py-3 rounded-xl shadow-lg hover:bg-red-700 transition transform hover:-translate-y-1">
            Return to Homepage
        </a>
    </div>
</div>
@endsection