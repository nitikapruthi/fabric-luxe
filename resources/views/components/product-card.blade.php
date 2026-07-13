@props(['product' => [], 'showQuickView' => true])

<div class="card-luxury group" data-fade-in>
    <!-- Product Image Container -->
    <div class="relative overflow-hidden bg-gray-100 h-64 md:h-80">
        <!-- Main Image -->
        <img src="{{ $product['image'] ?? 'https://via.placeholder.com/400x500?text=Fabric' }}" 
             alt="{{ $product['name'] ?? 'Product' }}" 
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />

        <!-- Overlay on Hover -->
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center">
            @if ($showQuickView)
                <button class="btn-luxury opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0" 
                        onclick="openQuickView('{{ $product['id'] ?? '' }}')">
                    Quick View
                </button>
            @endif
        </div>

        <!-- Badge (New/Sale) -->
        @if ($product['badge'] ?? false)
            <div class="absolute top-4 right-4">
                @if ($product['badge'] === 'new')
                    <span class="badge-luxury">New</span>
                @elseif ($product['badge'] === 'sale')
                    <span class="badge-accent">Sale</span>
                @endif
            </div>
        @endif

        <!-- Wishlist Button -->
        <button class="absolute top-4 left-4 w-10 h-10 rounded-full bg-white shadow-lg hover:bg-luxury hover:text-white transition-all duration-300 flex items-center justify-center group/wish" 
                onclick="toggleWishlist(this)" 
                data-product-id="{{ $product['id'] ?? '' }}">
            <svg class="w-5 h-5 text-gray-600 group-hover/wish:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        </button>
    </div>

    <!-- Product Info -->
    <div class="p-4 md:p-6">
        <!-- Category -->
        <p class="text-xs uppercase tracking-widest text-gray-500 mb-2">
            {{ $product['category'] ?? 'Uncategorized' }}
        </p>

        <!-- Product Name -->
        <h3 class="heading-serif text-lg text-gray-800 mb-2 line-clamp-2 group-hover:text-luxury transition-colors">
            <a href="{{ route('product.show', $product['id'] ?? '#') }}">
                {{ $product['name'] ?? 'Product Name' }}
            </a>
        </h3>

        <!-- Rating -->
        <div class="flex items-center gap-2 mb-3">
            <div class="flex gap-1">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < ($product['rating'] ?? 0))
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    @else
                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    @endif
                @endfor
            </div>
            <span class="text-xs text-gray-600">({{ $product['reviews'] ?? 0 }} reviews)</span>
        </div>

        <!-- Description (truncated) -->
        @if ($product['description'] ?? false)
            <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                {{ $product['description'] }}
            </p>
        @endif

        <!-- Price Section -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <span class="heading-serif text-xl text-luxury">₹{{ number_format($product['price'] ?? 0) }}</span>
                @if ($product['original_price'] ?? false)
                    <span class="text-sm text-gray-400 line-through">₹{{ number_format($product['original_price']) }}</span>
                    <span class="text-xs font-bold text-accent">{{ round(((($product['original_price'] - $product['price']) / $product['original_price']) * 100)) }}% OFF</span>
                @endif
            </div>
        </div>

        <!-- Fabric Details (if available) -->
        @if ($product['fabric'] ?? false || $product['color'] ?? false)
            <div class="flex items-center gap-2 mb-4 text-xs text-gray-600">
                @if ($product['fabric'] ?? false)
                    <span class="px-2 py-1 bg-gray-100 rounded">{{ $product['fabric'] }}</span>
                @endif
                @if ($product['color'] ?? false)
                    <div class="flex items-center gap-1">
                        <div class="w-4 h-4 rounded-full border border-gray-300" style="background-color: {{ $product['color_hex'] ?? '#cccccc' }}"></div>
                        <span>{{ $product['color'] }}</span>
                    </div>
                @endif
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="flex gap-3">
            <button onclick="addToCart('{{ $product['id'] ?? '' }}')" 
                    class="flex-1 btn-luxury rounded-lg text-center py-2 text-sm font-semibold">
                Add to Cart
            </button>
            <button onclick="openQuickView('{{ $product['id'] ?? '' }}')"
                    class="flex-1 btn-outline-luxury rounded-lg text-center py-2 text-sm font-semibold">
                Details
            </button>
        </div>
    </div>
</div>

<script>
    function addToCart(productId) {
        // Add to cart logic
        console.log('Added to cart:', productId);
        alert('Product added to cart!');
    }

    function toggleWishlist(button) {
        button.classList.toggle('bg-luxury');
        button.classList.toggle('text-white');
        button.classList.toggle('bg-white');
        button.classList.toggle('text-gray-600');
    }

    function openQuickView(productId) {
        // Quick view modal logic
        console.log('Opening quick view for:', productId);
        alert('Quick view modal would open for product ' + productId);
    }
</script>
