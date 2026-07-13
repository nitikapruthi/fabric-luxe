@props(['categories' => []])

<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm" data-fade-in>
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between gap-4">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <div class="w-10 h-10 rounded-lg luxury-gradient-dark flex items-center justify-center">
                    <span class="text-white font-bold text-lg heading-serif">FL</span>
                </div>
                <div class="hidden md:block">
                    <h1 class="heading-serif text-xl text-luxury">Fabric Luxe</h1>
                    <p class="text-xs text-gray-600">Premium Textiles</p>
                </div>
            </a>

            <!-- Navigation Menu (Desktop) -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-luxury font-medium transition-colors">Home</a>
                
                <!-- Mega Menu -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-luxury font-medium transition-colors flex items-center gap-2">
                        Shop
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </button>

                    <!-- Mega Menu Dropdown -->
                    <div class="absolute left-0 w-screen max-w-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 pt-2">
                        <div class="bg-white rounded-lg shadow-2xl border border-gray-100 p-6">
                            <h3 class="heading-display text-sm font-bold text-luxury mb-4 uppercase">Collections</h3>
                            <div class="space-y-2 mb-6">
                                @foreach ($categories as $category)
                                    <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                                       class="block px-3 py-2 rounded-lg hover:bg-amber-50 transition-colors group/item">
                                        <span class="text-gray-700 group-hover/item:text-luxury font-semibold">{{ $category->name }}</span>
                                        <p class="text-xs text-gray-500 group-hover/item:text-amber-600">{{ $category->products_count ?? 0 }} items</p>
                                    </a>
                                @endforeach
                            </div>
                            
                            <div class="divider-luxury mb-4"></div>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <a href="{{ route('shop') }}" class="p-3 bg-gradient-to-br from-amber-50 to-transparent rounded-lg hover:shadow-md transition-all">
                                    <h4 class="font-semibold text-luxury mb-1">New Arrivals</h4>
                                    <p class="text-xs text-gray-600">Fresh Collections</p>
                                </a>
                                <a href="{{ route('shop', ['sort' => 'popular']) }}" class="p-3 bg-gradient-to-br from-red-50 to-transparent rounded-lg hover:shadow-md transition-all">
                                    <h4 class="font-semibold text-accent mb-1">Best Sellers</h4>
                                    <p class="text-xs text-gray-600">Top Picks</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('shop') }}" class="text-gray-700 hover:text-luxury font-medium transition-colors">All Products</a>
                <a href="#" class="text-gray-700 hover:text-luxury font-medium transition-colors">About</a>
                <a href="#" class="text-gray-700 hover:text-luxury font-medium transition-colors">Contact</a>
            </nav>

            <!-- Search Bar (Desktop) -->
            <div class="hidden md:block flex-1 max-w-xs">
                <div class="relative">
                    <input type="text" placeholder="Search fabrics..." 
                           class="w-full px-4 py-2 bg-gray-100 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-luxury focus:bg-white transition-all"
                           id="search-input" />
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-luxury transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-4">
                <!-- Wishlist (Mobile Hidden) -->
                <button class="hidden sm:flex items-center justify-center w-10 h-10 rounded-lg hover:bg-amber-50 transition-colors group">
                    <svg class="w-6 h-6 text-gray-700 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </button>

                <!-- Cart Button -->
                <button data-cart-toggle class="relative flex items-center justify-center w-10 h-10 rounded-lg hover:bg-amber-50 transition-colors group">
                    <svg class="w-6 h-6 text-gray-700 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <!-- Cart Badge -->
                    @php
                        $cartCount = count(session('cart', []));
                    @endphp
                    @if ($cartCount > 0)
                        <span class="absolute top-0 right-0 w-5 h-5 bg-accent text-white text-xs font-bold rounded-full flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </button>

                <!-- Mobile Menu Toggle -->
                <button class="lg:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition-colors" id="mobile-menu-toggle">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Search -->
        <div class="mt-4 md:hidden">
            <div class="relative">
                <input type="text" placeholder="Search fabrics..." 
                       class="w-full px-4 py-2 bg-gray-100 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-luxury focus:bg-white transition-all"
                       id="search-input-mobile" />
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-luxury transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 bg-gray-50">
        <div class="container mx-auto px-6 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:text-luxury hover:bg-white rounded-lg transition-colors font-medium">
                Home
            </a>
            <a href="{{ route('shop') }}" class="block px-4 py-2 text-gray-700 hover:text-luxury hover:bg-white rounded-lg transition-colors font-medium">
                Shop All
            </a>
            
            <!-- Mobile Categories -->
            <div class="px-4 py-2">
                <p class="text-xs uppercase font-bold text-gray-500 mb-3">Collections</p>
                <div class="space-y-2">
                    @foreach ($categories as $category)
                        <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                           class="block px-3 py-2 text-gray-700 hover:text-luxury hover:bg-white rounded-lg transition-colors">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <a href="#" class="block px-4 py-2 text-gray-700 hover:text-luxury hover:bg-white rounded-lg transition-colors font-medium">
                About
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:text-luxury hover:bg-white rounded-lg transition-colors font-medium">
                Contact
            </a>
        </div>
    </div>
</header>

<!-- Cart Drawer -->
<div data-cart-drawer class="fixed right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300" style="transition: transform 0.3s ease-out;">
    <!-- Cart Header -->
    <div class="border-b border-gray-200 p-6 flex items-center justify-between">
        <h2 class="heading-display text-2xl text-luxury">Your Cart</h2>
        <button data-cart-close class="text-gray-500 hover:text-luxury transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-6">
        @php
            $cart = session('cart', []);
        @endphp

        @if (empty($cart))
            <div class="flex flex-col items-center justify-center h-64">
                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-gray-500 text-center">Your cart is empty</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($cart as $item)
                    <div class="flex gap-3 pb-4 border-b border-gray-200">
                        <img src="{{ $item['image'] ?? 'https://via.placeholder.com/80' }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-lg" />
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800">{{ $item['name'] }}</h4>
                            <p class="text-sm text-gray-600">₹{{ number_format($item['price'], 0) }} x {{ $item['quantity'] }}</p>
                            <p class="text-lg font-bold text-luxury mt-1">₹{{ number_format($item['price'] * $item['quantity'], 0) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Cart Footer -->
    @if (!empty($cart))
        <div class="border-t border-gray-200 p-6 space-y-3">
            <div class="flex justify-between items-center text-lg font-bold">
                <span>Total:</span>
                <span class="text-luxury">₹{{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 0) }}</span>
            </div>
            <a href="{{ route('checkout') }}" class="btn-luxury block text-center rounded-lg">
                Proceed to Checkout
            </a>
            <a href="{{ route('cart') }}" class="block w-full py-3 border-2 border-luxury text-luxury text-center rounded-lg font-semibold hover:bg-amber-50 transition-colors">
                View Cart
            </a>
        </div>
    @endif
</div>

<script>
    document.getElementById('mobile-menu-toggle')?.addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
