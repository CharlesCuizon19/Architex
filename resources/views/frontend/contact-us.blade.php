@extends('layouts.guest')

@section('content')
@php
$heroes = [
[
'title' => '',
'description' => '',
'button_text' => '',
'button_link' => '#',
'video' => '',
'fallback_image' => 'img/contact-us/page-header.png',
],
];

$breadcrumbs = [
'homepage' => 'Home',
'contact-us' => 'Contact Us',
];

$pageTitle = 'Contact Us';
@endphp

<div>
    <x-banner2 page="Contact Us" breadcrumb="Contact Us" img="img/contact-us/page-header.png" />
</div>

<section class="bg-gray-100 pt-20 pb-[20rem] px-4 sm:px-6 lg:px-8 relative">
    <div class="max-w-screen-xl mx-auto">

        {{-- SECTION HEADING BLOCK (Relative positioning is set on the parent section) --}}
        <div class="relative mb-12 text-left">
            {{-- This is the element using the custom text-outline class --}}
            <span
                class="absolute -top-1 left-0 text-[5rem] md:text-[4rem] opacity-20 leading-none select-none text-outline z-0">
                Get in Touch
            </span>
            <p class="relative z-10 text-sm font-semibold tracking-wide text-green-700 uppercase">Get in Touch</p>
            <h2 class="mt-4 text-3xl font-bold text-[#253e16] relative z-10">SEND US A MESSAGE</h2>
        </div>

        <div class="relative z-10 flex flex-col gap-12 lg:flex-row lg:gap-16">

            {{-- ✅ LEFT COLUMN: Contact Form (w-2/3) --}}
            <div class="p-8 rounded-lg lg:w-2/3">
                <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Success Message --}}
                    @if(session('Success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded-lg">
                        {{ session('Success') }}
                    </div>
                    @endif

                    {{-- Error Messages --}}
                    @if($errors->any())
                    <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-300 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="sr-only">Full Name</label>
                            <input type="text" name="name" id="name" autocomplete="name" required
                                class="block w-full px-4 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                placeholder="Full Name*" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="phone_number" class="sr-only">Contact Number</label>
                            <input type="tel" name="phone_number" id="phone_number" autocomplete="tel" required
                                class="block w-full px-4 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                placeholder="Contact Number*" value="{{ old('phone_number') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="email" class="sr-only">Email Address</label>
                            <input type="email" name="email" id="email" autocomplete="email" required
                                class="block w-full px-4 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                placeholder="Email Address*" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" required
                                class="block w-full px-4 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                placeholder="Subject*" value="{{ old('subject') }}">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="sr-only">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="block w-full px-4 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Message*">{{ old('message') }}</textarea>
                    </div>

                    <div>
                        <button type="submit"
                            class="inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-base text-black bg-[#ffd601] hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            {{-- ✅ RIGHT COLUMN: Contact Details (w-1/3) --}}
            <div class="p-6 rounded-lg lg:w-1/2 lg:p-10">
                <div class="space-y-8">
                    {{-- Note: Ensure your asset paths and image sizes (w-10 h-10) are correct --}}
                    {{-- ... (Contact details content with <img> tags) ... --}}

                    <div class="flex items-start gap-4">
                        <span class="flex-shrink-0">
                            <img src="{{ asset('img/contact-us/location-icon.png') }}" alt="Location icon"
                                class="w-16 h-auto mt-1">
                        </span>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Address</h3>
                            <p class="mt-1 text-gray-700">
                                Door 7, Josie 1944 Commercial Bldg., E. Palma Gil St., Obrero, Brgy. 13-B, Davao City,
                                Philippines
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="flex-shrink-0">
                            <img src="{{ asset('img/contact-us/phone-icon.png') }}" alt="Phone icon"
                                class="w-16 h-auto mt-1">
                        </span>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Phone</h3>
                            <p class="mt-1 text-gray-700">0927 725 7326</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="flex-shrink-0">
                            <img src="{{ asset('img/contact-us/email-icon.png') }}" alt="Email icon"
                                class="w-16 h-auto mt-1">
                        </span>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Email</h3>
                            <p class="mt-1 text-gray-700">info@architexphil.com</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- MAP SECTION --}}
        <div class="mt-20">
            <h3 class="mb-4 text-lg font-semibold text-gray-900">Awhag Village Subdivision</h3>
            <div class="relative overflow-hidden bg-gray-200 border border-gray-300 rounded-lg aspect-w-16 aspect-h-9">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.088653229712!2d125.6027376!3d7.127818499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f96d66e5f1f13b%3A0x2f8b5a7e9b0b4a4c!2sAwhag%20Subdivision%2C%20Davao%20City%2C%20Davao%20del%20Sur!5e0!3m2!1sen!2sph!4v1700650967890!5m2!1sen!2sph"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="absolute p-2 text-sm bg-white rounded-md shadow-sm top-4 left-4">
                    View larger map
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent normal form submit

            let form = $(this);
            let submitButton = form.find('button[type="submit"]');
            submitButton.prop('disabled', true).text('Sending...');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent!',
                        text: 'Your contact form has been submitted successfully.',
                        confirmButtonColor: '#16a34a',
                        timer: 2500
                    });

                    // Reset form
                    form.trigger('reset');
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    let errorMessage = 'Something went wrong. Please try again.';

                    if (errors) {
                        errorMessage = Object.values(errors).flat().join('\n');
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: errorMessage,
                        confirmButtonColor: '#EF4444'
                    });
                },
                complete: function() {
                    submitButton.prop('disabled', false).text('Send Message');
                }
            });
        });
    });
</script>
@endpush
@endsection