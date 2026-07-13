@props(['cartItems' => [], 'subtotal' => 0, 'tax' => 0, 'shipping' => 0, 'total' => 0, 'showPromo' => true])

<section class="py-12 md:py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-12" data-fade-in>
            <h1 class="heading-display text-4xl md:text-5xl text-gray-800 mb-4">Shopping Cart</h1>
            <p class="text-gray-600 text-lg">Review your items before checkout</p>
        </div>

        @if (count($cartItems) > 0)
            <!-- Main Grid: Cart Items + Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items Column -->
                <div class="lg:col-span-2" data-fade-in>
                    <!-- Cart Items Header -->
                    <div class="bg-white rounded-lg p-6 mb-6 shadow-sm">
                        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                            <h2 class="heading-serif text-2xl text-gray-800">Your Items</h2>
                            <span class="text-sm text-gray-600">{{ count($cartItems) }} item(s) in cart</span>
                        </div>

                        <!-- Cart Items List -->
                        <div class="space-y-6">
                            @foreach ($cartItems as $index => $item)
                                <div class="flex gap-6 pb-6 border-b border-gray-100 last:border-0 last:pb-0" data-cart-item>
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0 w-24 h-24 bg-gray-200 rounded-lg overflow-hidden">
                                        <img src="{{ $item['image'] ?? 'https://via.placeholder.com/150x150?text=Fabric' }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="w-full h-full object-cover" />
                                    </div>

                                    <!-- Product Details -->
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-2">
                                            <div>
                                                <h3 class="heading-serif text-lg text-gray-800 hover:text-luxury transition-colors cursor-pointer">
                                                    {{ $item['name'] }}
                                                </h3>
                                                <p class="text-sm text-gray-600 mt-1">{{ $item['description'] ?? 'Premium Fabric' }}</p>
                                            </div>
                                            <p class="heading-serif text-lg text-gray-800">
                                                ₹{{ number_format($item['price'] * $item['quantity'], 2) }}
                                            </p>
                                        </div>

                                        <!-- Product Attributes -->
                                        <div class="flex gap-4 text-sm text-gray-600 mb-4">
                                            <span>Color: <strong>{{ $item['color'] ?? 'Natural' }}</strong></span>
                                            <span>Size: <strong>{{ $item['size'] ?? '1m' }}</strong></span>
                                            <span>Type: <strong>{{ $item['type'] ?? 'Silk' }}</strong></span>
                                        </div>

                                        <!-- Quantity & Actions -->
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3 bg-gray-100 rounded-lg p-2">
                                                <button onclick="decreaseQuantity({{ $index }})" class="text-gray-600 hover:text-gray-800 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                <input type="number" value="{{ $item['quantity'] }}" readonly 
                                                       class="w-8 text-center bg-transparent text-gray-800 font-semibold border-0 focus:outline-none" />
                                                <button onclick="increaseQuantity({{ $index }})" class="text-gray-600 hover:text-gray-800 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Remove Button -->
                                            <button onclick="removeItem({{ $index }})" class="text-red-600 hover:text-red-700 transition-colors flex items-center gap-2 text-sm font-semibold">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Continue Shopping Button -->
                    <a href="/products" class="inline-flex items-center gap-2 text-luxury hover:text-amber-800 transition-colors font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Continue Shopping
                    </a>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-1" data-fade-in>
                    <div class="sticky top-4 bg-white rounded-lg p-6 shadow-sm">
                        <!-- Summary Header -->
                        <h2 class="heading-serif text-xl text-gray-800 mb-6 pb-4 border-b border-gray-200">Order Summary</h2>

                        <!-- Summary Items -->
                        <div class="space-y-4 mb-6">
                            <!-- Subtotal -->
                            <div class="flex justify-between items-center text-gray-700">
                                <span>Subtotal</span>
                                <span class="font-semibold">₹{{ number_format($subtotal, 2) }}</span>
                            </div>

                            <!-- Shipping -->
                            <div class="flex justify-between items-center text-gray-700">
                                <span>Shipping</span>
                                <span class="font-semibold">₹{{ number_format($shipping, 2) }}</span>
                            </div>

                            <!-- Tax -->
                            <div class="flex justify-between items-center text-gray-700">
                                <span>Tax (18% GST)</span>
                                <span class="font-semibold">₹{{ number_format($tax, 2) }}</span>
                            </div>

                            <!-- Discount Badge (if applicable) -->
                            <div class="flex justify-between items-center text-green-600 bg-green-50 p-3 rounded-lg">
                                <span class="font-semibold">Discount</span>
                                <span class="font-semibold">-₹0.00</span>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <div class="flex justify-between items-center">
                                <span class="heading-serif text-xl text-gray-800">Total</span>
                                <span class="heading-serif text-2xl text-luxury">₹{{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <!-- Promo Code (if enabled) -->
                        @if ($showPromo)
                            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                                <label class="text-sm font-semibold text-gray-800 block mb-2">Promo Code</label>
                                <div class="flex gap-2">
                                    <input type="text" placeholder="Enter code" 
                                           class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury text-sm" />
                                    <button onclick="applyPromo()" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors font-semibold text-sm">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        @endif

                        <!-- Checkout Button -->
                        <a href="/checkout" class="btn-luxury w-full text-center rounded-lg py-3 font-semibold mb-3 block hover:shadow-lg transition-shadow">
                            Proceed to Checkout
                        </a>

                        <!-- Continue Shopping Button -->
                        <a href="/products" class="w-full text-center btn-outline-luxury rounded-lg py-3 font-semibold text-gray-800 border border-gray-300 hover:bg-gray-50 transition-colors">
                            Continue Shopping
                        </a>

                        <!-- Trust Badges -->
                        <div class="mt-8 pt-6 border-t border-gray-200 space-y-3 text-center text-sm text-gray-600">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Secure Checkout</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0015.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"></path>
                                </svg>
                                <span>Free Returns</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155.03.299.066.41.147a.75.75 0 00.528.205.75.75 0 00.528-.205c.11-.081.255-.117.41-.147M7 10a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm6 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
                                    <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h6V2.75a.75.75 0 011.5 0V4h2.25a3 3 0 013 3v10.5a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7a3 3 0 013-3H4V2.75A.75.75 0 015.75 2zm-1 5.25a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm10-6a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V2a.75.75 0 00-.75-.75h-.008z" clip-rule="evenodd"></path>
                                </svg>
                                <span>7-Day Easy Returns</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart State -->
            <div class="bg-white rounded-lg p-12 text-center">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <h2 class="heading-display text-3xl text-gray-800 mb-4">Your Cart is Empty</h2>
                <p class="text-gray-600 text-lg mb-8">Start exploring our collection of premium fabrics</p>
                <a href="/products" class="btn-luxury rounded-lg px-8 py-4 inline-block font-semibold">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</section>

<script>
    function increaseQuantity(index) {
        alert('Quantity increased for item ' + (index + 1));
    }

    function decreaseQuantity(index) {
        alert('Quantity decreased for item ' + (index + 1));
    }

    function removeItem(index) {
        if (confirm('Are you sure you want to remove this item?')) {
            alert('Item ' + (index + 1) + ' removed from cart');
        }
    }

    function applyPromo() {
        alert('Promo code applied!');
    }
</script>
