<div x-data="{ open: false, step: 1 }" x-cloak x-init="$watch('open', value => {
    if (value) {
        document.body.classList.add('overflow-hidden');
        document.documentElement.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
        document.documentElement.classList.remove('overflow-hidden');
    }
})">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-[#253e16] px-5 py-3 text-white">
        Reserve Now
    </button>

    <!-- Teleported Modal -->
    <template x-teleport="body">
        <div x-show="open" x-cloak x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
            <div @click.outside="open = false"
                class="w-full max-w-3xl mx-4 overflow-hidden bg-white shadow-lg rounded-xl">
                <!-- Header -->
                <div class="p-6 border-b">
                    <h2 class="text-2xl font-bold text-[#1E4D2B]">RESERVE YOUR LOT</h2>
                    <div class="flex items-center mt-2 space-x-3 text-sm">
                        <span :class="step === 1 ? 'text-[#1E4D2B] font-semibold' : 'text-gray-400'">
                            ● Step 1: Personal Information
                        </span>
                        <span :class="step === 2 ? 'text-[#1E4D2B] font-semibold' : 'text-gray-400'">
                            ● Step 2: Payment Method
                        </span>
                    </div>
                </div>

                <!-- STEP 1 -->
                <div x-show="step === 1" x-transition class="p-6 space-y-6 overflow-y-auto max-h-[80vh]">
                    <!-- Lot Details -->
                    <div>
                        <div class="bg-[#d3e3d5] text-[#1E4D2B] px-4 py-2 font-semibold rounded-t-md">
                            Lot Details
                        </div>
                        <div class="flex gap-4 p-4 border rounded-b-md">
                            <img src="{{ asset($property->house) }}" alt="Property" class="object-cover w-32 h-32">
                            <div class="space-y-1 text-sm">
                                <h3 class="font-bold text-lg text-[#1E4D2B]">SANDERIANA</h3>
                                <p>Lot Selected: Block 5 Lot 12</p>
                                <p>Lot Area: 120 sqm</p>
                                <p>Type: Residential</p>
                                <p class="font-semibold">Price: ₱1,200,000.00</p>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Details -->
                    <div>
                        <h4 class="text-[#1E4D2B] font-semibold mb-3">Personal Details</h4>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <input type="text" placeholder="Full Name*"
                                class="p-3 border rounded-md focus:ring-[#1E4D2B] focus:border-[#1E4D2B]">
                            <input type="text" placeholder="Contact Number*"
                                class="p-3 border rounded-md focus:ring-[#1E4D2B] focus:border-[#1E4D2B]">
                            <input type="email" placeholder="Email Address*"
                                class="p-3 border rounded-md focus:ring-[#1E4D2B] focus:border-[#1E4D2B]">
                            <input type="text" placeholder="Tel. Number (optional)"
                                class="p-3 border rounded-md focus:ring-[#1E4D2B] focus:border-[#1E4D2B]">
                        </div>

                        <div class="mt-4 space-y-2 text-sm">
                            <label class="flex items-start space-x-2">
                                <input type="checkbox" class="mt-1">
                                <span>
                                    I agree to the
                                    <a href="#" class="text-[#1E4D2B] underline">Terms & Conditions</a>
                                    and the
                                    <a href="#" class="text-[#1E4D2B] underline">Privacy Policy</a>.
                                </span>
                            </label>
                            <label class="flex items-start space-x-2">
                                <input type="checkbox" class="mt-1">
                                <span>
                                    I confirm that the details provided are true and correct, and I understand that this
                                    reservation is subject to approval.
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Step 1 Footer -->
                <div x-show="step === 1" x-transition
                    class="flex items-center justify-between px-6 py-4 border-t bg-gray-50">
                    <button @click="open = false"
                        class="text-[#1E4D2B] font-medium flex items-center space-x-2 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Cancel Reservation</span>
                    </button>

                    <button @click="step = 2" class="bg-[#1E4D2B] text-white px-6 py-2 rounded-md hover:bg-[#16381f]">
                        Proceed to Payment
                    </button>
                </div>

                <!-- STEP 2 -->
                <div x-show="step === 2" x-transition class="p-6 space-y-6 overflow-y-auto max-h-[80vh]">
                    <div class="bg-[#d3e3d5] text-[#1E4D2B] px-4 py-2 font-semibold rounded-md">
                        Reservation Fee: ₱50,000.00
                    </div>

                    <div>
                        <h4 class="text-[#1E4D2B] font-semibold mb-3">Payment Method</h4>

                        <div class="space-y-4">
                            <label class="flex items-start p-4 space-x-3 border rounded-md cursor-pointer">
                                <input type="radio" name="payment" class="mt-1 text-[#1E4D2B]" checked>
                                <div>
                                    <p class="font-semibold text-[#1E4D2B]">Online Bank Transfer</p>
                                    <p class="text-sm text-gray-600">Bank: BDO</p>
                                    <p class="text-sm text-gray-600">Account Name: John Doe</p>
                                    <p class="text-sm text-[#1E4D2B] underline cursor-pointer">1234 5678 9012 3461</p>
                                </div>
                            </label>

                            <label class="flex items-start p-4 space-x-3 border rounded-md cursor-pointer">
                                <input type="radio" name="payment" class="mt-1 text-[#1E4D2B]">
                                <div>
                                    <p class="font-semibold text-[#1E4D2B]">Credit/Debit Card</p>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg"
                                        class="inline-block h-4 mr-2" alt="">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.svg"
                                        class="inline-block h-4" alt="">
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-[#1E4D2B] font-semibold mb-3">Proof of Payment</h4>
                        <label
                            class="block p-4 text-center text-gray-500 border-2 border-dashed rounded-md cursor-pointer">
                            <span class="text-[#1E4D2B] font-medium">Upload Screenshot / Photo of Payment</span>
                            <input type="file" class="hidden">
                        </label>
                    </div>

                    <div>
                        <h4 class="text-[#1E4D2B] font-semibold mb-2">Reference Number (Optional)</h4>
                        <input type="text" placeholder="REF1234567"
                            class="p-3 border rounded-md w-full focus:ring-[#1E4D2B] focus:border-[#1E4D2B]">
                    </div>

                    <div class="pt-3 text-sm text-gray-600 border-t">
                        <span class="font-semibold text-[#1E4D2B]">ℹ️</span>
                        Transfer <span class="font-semibold">₱50,000.00</span> and upload proof of payment within 48
                        hours.
                        Your lot will be held temporarily until verification.
                    </div>
                </div>

                <!-- Step 2 Footer -->
                <div x-show="step === 2" x-transition
                    class="flex items-center justify-between px-6 py-4 border-t bg-gray-50">
                    <button @click="step = 1"
                        class="text-[#1E4D2B] font-medium flex items-center space-x-2 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Back to Step 1</span>
                    </button>

                    <button class="bg-[#1E4D2B] text-white px-6 py-2 rounded-md hover:bg-[#16381f]">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
