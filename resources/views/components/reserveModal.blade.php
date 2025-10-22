<div x-data="modal()" x-cloak x-init="$watch('open', value => {
    if (value) {
        document.body.classList.add('overflow-hidden');
        document.documentElement.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
        document.documentElement.classList.remove('overflow-hidden');
        paymentUploaded = false;
        uploadedFile = null;
        fileName = '';
    }
})">

    <!-- Trigger Button -->
    <button @click="open = true" class="bg-[#253e16] px-5 py-3 text-white">
        Reserve Now
    </button>

    <template x-teleport="body">
        <div x-show="open" x-cloak x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
            <div @click.outside="open = false"
                class="w-full max-w-3xl mx-4 overflow-hidden bg-white shadow-lg rounded-xl">
                <!-- Header -->
                <div class="p-6 border-b" x-show="!paymentSuccess" x-transition>
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

                <!-- If Payment Success -->
                <div x-show="paymentSuccess"
                    class="fixed inset-0 z-50 flex items-center justify-center text-[#253e16] overflow-y-auto px-4 py-6"
                    x-transition>

                    <div
                        class="relative bg-white w-full max-w-[600px] md:max-w-[50%] lg:max-w-[40%] rounded-lg shadow-xl overflow-hidden">
                        <!-- Background layer -->
                        <div class="relative">
                            <img src="{{ asset('img/dots-bg.png') }}" alt=""
                                class="absolute inset-0 object-cover w-full h-full opacity-10">

                            <!-- Content -->
                            <div
                                class="relative flex flex-col items-center justify-center h-full gap-5 p-6 text-center sm:p-8">

                                <!-- Success Icon + Title -->
                                <div class="flex flex-col items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                                        class="w-20 h-20 text-[#00721b] sm:w-28 sm:h-28">
                                        <path fill="currentColor"
                                            d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m45.66 85.66l-56 56a8 8 0 0 1-11.32 0l-24-24a8 8 0 0 1 11.32-11.32L112 148.69l50.34-50.35a8 8 0 0 1 11.32 11.32" />
                                    </svg>
                                    <div class="text-2xl font-semibold sm:text-3xl">Reservation Successful!</div>
                                    <div class="text-base leading-snug text-gray-700 sm:text-lg">
                                        Your lot reservation is completed. <br>
                                        Below are the details of your reservation.
                                    </div>
                                </div>

                                <!-- Details Section -->
                                <div class="bg-[#f8f8f8] w-full py-5 px-4 rounded-md text-left text-sm sm:text-base">
                                    <div class="grid grid-cols-1 gap-3 pb-5 border-b sm:grid-cols-5 sm:gap-5">
                                        <div class="flex flex-col gap-2 font-medium sm:col-span-2">
                                            <div>Name:</div>
                                            <div>Lot:</div>
                                            <div>Lot Area:</div>
                                            <div>Type:</div>
                                            <div>Ref. No.:</div>
                                        </div>
                                        <div class="flex flex-col gap-2 sm:col-span-3">
                                            <div>John Doe</div>
                                            <div>
                                                <span class="font-bold">SANDERIANA</span> (Road Lot 3, Block 5 Lot 12,
                                                Apo Yama Residences)
                                            </div>
                                            <div>120 sqm</div>
                                            <div>Residential</div>
                                            <div>QWED123546</div>
                                        </div>
                                    </div>
                                    <div class="pt-5 text-xs text-gray-700 sm:text-sm">
                                        An email with the details has been sent to your email <span
                                            class="font-bold">johndoe@gmail.com</span>.
                                        Our team will contact you shortly to assist with the next steps.
                                    </div>
                                </div>

                                <!-- Button -->
                                <button @click="open = false; paymentSuccess = false; step = 1"
                                    class="px-6 py-3 text-white bg-[#253e16] hover:bg-green-700 rounded-md text-sm sm:text-base transition">
                                    Back to Sitemap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- STEP 1 -->
                <!-- STEP 1 -->
                <div x-show="step === 1 && !paymentSuccess" x-transition
                    class="p-6 space-y-6 overflow-y-auto max-h-[80vh]">

                    <!-- Lot Details -->
                    <div x-show="activeLot" x-transition>
                        <div class="bg-[#d3e3d5] text-[#1E4D2B] px-4 py-2 font-semibold rounded-t-md">
                            Lot Details
                        </div>
                        <div class="flex gap-4 p-4 border rounded-b-md">
                            <img
                                x-show="activeLot"
                                :src="activeLot?.house_details?.length 
        ? activeLot.house_details[0] 
        : '{{ asset($property['house'] ?? 'img/default-house.jpg') }}'"
                                alt="Property"
                                class="object-cover w-32 h-32 rounded-md transition-all duration-500 ease-in-out" />

                            <div class="space-y-1 text-sm">
                                <h3 class="font-bold text-lg text-[#1E4D2B]" x-text="activeLot.name ?? 'No Lot Selected'"></h3>
                                <p>
                                    Lot Selected:
                                    <span x-text="activeLot.address ?? '-'"></span>

                                </p>
                                <p>Lot Area: <span x-text="`${activeLot.size ?? 0}`"></span></p>
                                <p>Type: <span x-text="activeLot.type ?? 'N/A'"></span></p>
                                <p class="font-semibold">
                                    <span x-text="activeLot.price && !isNaN(Number(activeLot.price))
                                        ? `Price: ₱${Number(activeLot.price).toLocaleString()}`
                                        : (activeLot.price ? `Price: ${activeLot.price}` : 'Price: N/A')">
                                    </span>
                                </p>
                                <p>Status:
                                    <span :class="{
                        'text-green-700 font-semibold': activeLot.status === 'Available',
                        'text-yellow-500 font-semibold': activeLot.status === 'Reserved',
                        'text-red-600 font-semibold': activeLot.status === 'Sold'
                        " x-text="activeLot.status ?? 'Unknown'"></span>
                                </p>
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
                <div x-show="step === 1 && !paymentSuccess" x-transition
                    class="flex items-center justify-between px-6 py-5 border-t bg-gray-50">
                    <button @click="open = false"
                        class="text-[#1E4D2B] font-medium flex items-center space-x-2 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"
                                stroke-width="0.5" stroke="currentColor" />
                        </svg>
                        <div>Cancel Reservation</div>
                    </button>

                    <button @click="step = 2" class="bg-[#1E4D2B] text-white px-6 py-2 rounded-md hover:bg-[#16381f]">
                        Proceed to Payment
                    </button>
                </div>

                <!-- STEP 2 -->
                <div x-show="step === 2 && !paymentSuccess" x-transition
                    class="p-6 space-y-6 overflow-y-auto max-h-[80vh]">
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

                    <!-- File Upload Section -->
                    <div>
                        <h4 class="text-[#1E4D2B] font-semibold mb-3">Proof of Payment</h4>

                        <!-- Default Upload Area -->
                        <template x-if="!paymentUploaded">
                            <label
                                class="flex items-center gap-3 p-4 text-gray-500 border-2 border-dashed bg-[#f6f6f6] rounded-md cursor-pointer hover:border-[#1E4D2B] hover:bg-[#f0f7f0] transition-colors"
                                @click="$refs.fileInput.click()">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                        viewBox="0 0 16 14">
                                        <path fill="currentColor"
                                            d="M12 11c-.28 0-.5-.22-.5-.5s.22-.5.5-.5c1.65 0 3-1.35 3-3s-1.35-3-3-3h-1.05c-.18 0-.34-.09-.43-.25C9.88 2.65 8.76 2 7.51 2c-1.93 0-3.5 1.57-3.5 3.5c0 .28-.22.5-.5.5h-.5c-1.1 0-2 .9-2 2s.9 2 2 2c.28 0 .5.22.5.5s-.22.5-.5.5c-1.65 0-3-1.35-3-3s1.35-3 3-3h.03c.25-2.25 2.16-4 4.47-4c1.49 0 2.89.76 3.72 2h.78c2.21 0 4 1.79 4 4s-1.79 4-4 4Z" />
                                        <path fill="currentColor"
                                            d="M10 9.25a.47.47 0 0 1-.35-.15L7.5 6.95L5.35 9.1c-.2.2-.51.2-.71 0s-.2-.51 0-.71l2.5-2.5c.2-.2.51-.2.71 0l2.5 2.5c.2.2.2.51 0 .71c-.1.1-.23.15-.35.15" />
                                        <path fill="currentColor"
                                            d="M7.5 13c-.28 0-.5-.22-.5-.5v-6c0-.28.22-.5.5-.5s.5.22.5.5v6c0 .28-.22.5-.5.5" />
                                    </svg>
                                </div>
                                <div class="text-[#1E4D2B] font-medium">Upload Screenshot / Photo of Payment</div>
                                <input x-ref="fileInput" type="file" class="hidden" accept="image/*,.pdf"
                                    @change="handleFileUpload($event)">
                            </label>
                        </template>

                        <!-- Uploaded File Display -->
                        <template x-if="paymentUploaded">
                            <div class="p-4 border-2 border-green-200 rounded-md bg-green-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="p-2 bg-green-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-[#1E4D2B]"
                                                x-text="fileName || 'File uploaded successfully'"></p>
                                            <p class="text-sm text-gray-600">File ready for submission</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button
                                            @click="paymentUploaded = false; uploadedFile = null; fileName = ''; $refs.fileInput.value = ''"
                                            class="text-gray-500 hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div>
                        <h4 class="text-[#1E4D2B] font-semibold mb-2">Reference Number (Optional)</h4>
                        <input type="text" placeholder="REF1234567"
                            class="p-3 border rounded-md w-full focus:ring-[#1E4D2B] focus:border-[#1E4D2B]">
                    </div>

                    <div class="p-3 text-sm gap-2 text-gray-600 flex items-center bg-[#f6f6f6]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 20 20">
                            <path fill="currentColor"
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07m12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32M9 5h2v6H9zm0 8h2v2H9z" />
                        </svg>
                        <div>
                            Transfer <span class="font-semibold">₱50,000.00</span> and upload proof of payment within
                            48 hours. Your lot will be held temporarily until verification.
                        </div>
                    </div>
                </div>

                <!-- Step 2 Footer -->
                <div x-show="step === 2 && !paymentSuccess" x-transition
                    class="flex items-center justify-between px-6 py-4 border-t bg-gray-50">
                    <button @click="step = 1"
                        class="text-[#1E4D2B] font-medium flex items-center space-x-2 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"
                                stroke-width="0.5" stroke="currentColor" />
                        </svg>
                        <span>Back to Step 1</span>
                    </button>

                    <button :disabled="!paymentUploaded" @click="confirmPayment()"
                        :class="paymentUploaded ? 'bg-[#1E4D2B] hover:bg-[#16381f]' : 'bg-gray-400 cursor-not-allowed'"
                        class="px-6 py-2 text-white transition-colors rounded-md">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>
    </template>

    <script>
        function confirmPayment() {
            // Add your payment confirmation logic here
            // For demo purposes, we'll just show success
            this.paymentSuccess = true;
            // In real implementation, you would:
            // 1. Send form data to server
            // 2. Handle FormData with the uploaded file
            // 3. Process payment verification
            console.log('Payment confirmed with file:', this.uploadedFile);
        }
    </script>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('modal', () => ({
            open: false,
            step: 1,
            paymentSuccess: false,
            paymentUploaded: false,
            uploadedFile: null,
            fileName: '',

            handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif',
                        'application/pdf'
                    ];
                    const maxSize = 5 * 1024 * 1024; // 5MB

                    if (!allowedTypes.includes(file.type)) {
                        alert('Please upload a valid image or PDF (max 5MB)');
                        event.target.value = '';
                        return;
                    }

                    if (file.size > maxSize) {
                        alert('File size must be less than 5MB');
                        event.target.value = '';
                        return;
                    }

                    this.uploadedFile = file;
                    this.fileName = file.name;
                    this.paymentUploaded = true;
                }
            },

            removeFile() {
                this.paymentUploaded = false;
                this.uploadedFile = null;
                this.fileName = '';
                if (this.$refs.fileInput) this.$refs.fileInput.value = '';
            },

            // ✅ Blade form submission (no API, just simulate success UI)
            confirmPayment() {
                if (!this.paymentUploaded) {
                    alert('Please upload your proof of payment before proceeding.');
                    return;
                }

                // Instead of API, just show success box (simulate success)
                this.paymentSuccess = true;

                // You can also trigger a <form>.submit() here if needed
                // Example: this.$refs.paymentForm.submit()
            },
        }));
    });
</script>