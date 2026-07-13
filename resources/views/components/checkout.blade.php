@props(['cartTotal' => 0, 'shippingMethods' => ['Standard' => 100, 'Express' => 250, 'Premium' => 500], 'paymentMethods' => ['Credit Card', 'Debit Card', 'UPI', 'Net Banking', 'Wallet']])

<section class="py-12 md:py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-12" data-fade-in>
            <h1 class="heading-display text-4xl md:text-5xl text-gray-800 mb-4">Checkout</h1>
            <p class="text-gray-600 text-lg">Complete your order securely</p>
        </div>

        <!-- Progress Indicator -->
        <div class="mb-12" data-fade-in>
            <div class="flex items-center justify-between max-w-2xl">
                <!-- Step 1: Shipping -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-luxury text-white flex items-center justify-center font-bold mb-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-800">Shipping</span>
                </div>
                <div class="flex-1 h-1 bg-luxury mx-2"></div>

                <!-- Step 2: Payment -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-luxury text-white flex items-center justify-center font-bold mb-2">
                        2
                    </div>
                    <span class="text-sm font-semibold text-gray-800">Payment</span>
                </div>
                <div class="flex-1 h-1 bg-gray-300 mx-2"></div>

                <!-- Step 3: Review -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold mb-2">
                        3
                    </div>
                    <span class="text-sm font-semibold text-gray-600">Review</span>
                </div>
            </div>
        </div>

        <!-- Main Checkout Form -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Forms -->
            <div class="lg:col-span-2 space-y-6" data-fade-in>
                <!-- 1. Shipping Information -->
                <div class="bg-white rounded-lg p-8 shadow-sm">
                    <div class="flex items-center mb-6 pb-4 border-b border-gray-200">
                        <div class="w-8 h-8 rounded-full bg-luxury text-white flex items-center justify-center mr-3 font-bold">
                            1
                        </div>
                        <h2 class="heading-serif text-2xl text-gray-800">Shipping Information</h2>
                    </div>

                    <form class="space-y-4">
                        <!-- Name Row -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">First Name</label>
                                <input type="text" placeholder="John" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Last Name</label>
                                <input type="text" placeholder="Doe" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Email Address</label>
                            <input type="email" placeholder="john@example.com" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Phone Number</label>
                            <div class="flex gap-2">
                                <select class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury bg-white">
                                    <option>+91</option>
                                    <option>+1</option>
                                    <option>+44</option>
                                </select>
                                <input type="tel" placeholder="9876543210" 
                                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Street Address</label>
                            <input type="text" placeholder="123 Main Street" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                        </div>

                        <!-- City, State, Zip -->
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">City</label>
                                <input type="text" placeholder="Mumbai" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">State</label>
                                <input type="text" placeholder="Maharashtra" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Postal Code</label>
                                <input type="text" placeholder="400001" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                        </div>

                        <!-- Country -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Country</label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury bg-white">
                                <option>India</option>
                                <option>United States</option>
                                <option>United Kingdom</option>
                                <option>Canada</option>
                            </select>
                        </div>

                        <!-- Checkbox: Different Billing Address -->
                        <div class="flex items-center gap-3 pt-4">
                            <input type="checkbox" id="billingAddress" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                            <label for="billingAddress" class="text-sm text-gray-700">Billing address is different from shipping address</label>
                        </div>
                    </form>
                </div>

                <!-- 2. Shipping Method -->
                <div class="bg-white rounded-lg p-8 shadow-sm">
                    <div class="flex items-center mb-6 pb-4 border-b border-gray-200">
                        <div class="w-8 h-8 rounded-full bg-luxury text-white flex items-center justify-center mr-3 font-bold">
                            2
                        </div>
                        <h2 class="heading-serif text-2xl text-gray-800">Shipping Method</h2>
                    </div>

                    <div class="space-y-3">
                        @foreach ($shippingMethods as $method => $cost)
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-luxury transition-colors" data-shipping-option>
                                <input type="radio" name="shipping" value="{{ $method }}" 
                                       class="w-5 h-5 text-luxury rounded-full" {{ $loop->first ? 'checked' : '' }} />
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-800">{{ $method }} Shipping</p>
                                    <p class="text-sm text-gray-600">{{ $method === 'Standard' ? 'Delivery in 7-10 business days' : ($method === 'Express' ? 'Delivery in 3-5 business days' : 'Delivery in 1-2 business days') }}</p>
                                </div>
                                <span class="font-bold text-gray-800">₹{{ $cost }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- 3. Payment Information -->
                <div class="bg-white rounded-lg p-8 shadow-sm">
                    <div class="flex items-center mb-6 pb-4 border-b border-gray-200">
                        <div class="w-8 h-8 rounded-full bg-luxury text-white flex items-center justify-center mr-3 font-bold">
                            3
                        </div>
                        <h2 class="heading-serif text-2xl text-gray-800">Payment Method</h2>
                    </div>

                    <div class="space-y-3 mb-6">
                        @foreach ($paymentMethods as $index => $method)
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-luxury transition-colors">
                                <input type="radio" name="payment" value="{{ $method }}" 
                                       class="w-5 h-5 text-luxury rounded-full" {{ $index === 0 ? 'checked' : '' }} />
                                <span class="ml-4 font-semibold text-gray-800">{{ $method }}</span>
                            </label>
                        @endforeach
                    </div>

                    <!-- Credit Card Form (shown when Credit Card selected) -->
                    <div id="creditCardForm" class="space-y-4 pt-4 border-t border-gray-200">
                        <h3 class="font-semibold text-gray-800 mb-4">Card Information</h3>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Cardholder Name</label>
                            <input type="text" placeholder="John Doe" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Card Number</label>
                            <input type="text" placeholder="4532 1234 5678 9010" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Expiry Date</label>
                                <input type="text" placeholder="MM/YY" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">CVV</label>
                                <input type="text" placeholder="123" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
                            </div>
                        </div>

                        <!-- Billing Address Checkbox -->
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="saveBillingAddress" checked class="w-4 h-4 rounded border-gray-300 text-luxury" />
                            <label for="saveBillingAddress" class="text-sm text-gray-700">Same as shipping address</label>
                        </div>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="flex items-start gap-3">
                        <input type="checkbox" id="terms" class="w-5 h-5 rounded border-gray-300 text-luxury mt-1" />
                        <label for="terms" class="text-sm text-gray-700">
                            I agree to the <a href="#" class="text-luxury font-semibold hover:underline">Terms & Conditions</a> and 
                            <a href="#" class="text-luxury font-semibold hover:underline">Privacy Policy</a>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Right Column: Order Summary -->
            <div class="lg:col-span-1" data-fade-in>
                <div class="sticky top-4 bg-white rounded-lg p-6 shadow-sm">
                    <!-- Order Summary Header -->
                    <h2 class="heading-serif text-xl text-gray-800 mb-6 pb-4 border-b border-gray-200">Order Summary</h2>

                    <!-- Sample Items -->
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center text-sm text-gray-700">
                            <span>Premium Silk Fabric x2</span>
                            <span class="font-semibold">₹2,000</span>
                        </div>
                        <div class="flex justify-between items-center text-sm text-gray-700">
                            <span>Luxury Linen x1</span>
                            <span class="font-semibold">₹1,500</span>
                        </div>
                        <div class="flex justify-between items-center text-sm text-gray-700">
                            <span>Fine Wool Blend x1</span>
                            <span class="font-semibold">₹1,800</span>
                        </div>
                    </div>

                    <!-- Pricing Breakdown -->
                    <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">
                        <div class="flex justify-between items-center text-gray-700">
                            <span>Subtotal</span>
                            <span class="font-semibold">₹6,300</span>
                        </div>
                        <div class="flex justify-between items-center text-gray-700">
                            <span>Shipping</span>
                            <span class="font-semibold" id="shippingCost">₹100</span>
                        </div>
                        <div class="flex justify-between items-center text-gray-700">
                            <span>Tax (18%)</span>
                            <span class="font-semibold">₹1,134</span>
                        </div>
                        <div class="flex justify-between items-center text-green-600">
                            <span>Discount</span>
                            <span class="font-semibold">-₹0</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center">
                            <span class="heading-serif text-lg text-gray-800">Total Amount</span>
                            <span class="heading-serif text-2xl text-luxury" id="totalAmount">₹7,534</span>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button onclick="placeOrder()" class="btn-luxury w-full rounded-lg py-3 font-semibold mb-3 hover:shadow-lg transition-shadow">
                        Place Order
                    </button>

                    <!-- Continue Shopping Button -->
                    <a href="/cart" class="block w-full text-center btn-outline-luxury rounded-lg py-3 font-semibold text-gray-800 border border-gray-300 hover:bg-gray-50 transition-colors">
                        Back to Cart
                    </a>

                    <!-- Security Badges -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-xs text-gray-600 text-center mb-4">Your payment is secure and encrypted</p>
                        <div class="flex items-center justify-center gap-3">
                            <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Update shipping cost when method changes
    document.querySelectorAll('input[name="shipping"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const costs = { 'Standard': 100, 'Express': 250, 'Premium': 500 };
            document.getElementById('shippingCost').textContent = '₹' + costs[this.value];
            updateTotal();
        });
    });

    function updateTotal() {
        // Recalculate total (simplified)
        console.log('Total updated');
    }

    function placeOrder() {
        if (document.getElementById('terms').checked) {
            alert('Order placed successfully! Order confirmation has been sent to your email.');
        } else {
            alert('Please agree to Terms & Conditions to proceed');
        }
    }
</script>
