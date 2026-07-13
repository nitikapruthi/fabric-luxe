@props(['product', 'showSpecs' => true])

<div class="card-luxury group" data-fade-in>
    <!-- Product Image Section -->
    <div class="relative overflow-hidden bg-gray-100 aspect-square" data-gallery>
        <!-- Main Image -->
        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x400?text=' . urlencode($product->name) }}" 
             alt="{{ $product->name }}"
             class="w-full h-full object-cover scale-on-hover cursor-pointer shine-effect" 
             data-main-image />

        <!-- Overlay Badge -->
        @if ($product->is_featured)
            <div class="absolute top-4 left-4 z-10">
                <span class="badge-luxury">✨ Featured</span>
            </div>
        @endif

        <!-- Stock Status -->
        <div class="absolute top-4 right-4 z-10">
            @if ($product->stock > 0)
                <span class="inline-block px-3 py-1 bg-green-500/90 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                    In Stock
                </span>
            @else
                <span class="inline-block px-3 py-1 bg-red-500/90 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                    Out of Stock
                </span>
            @endif
        </div>

        <!-- Secondary Images (Thumbnails) -->
        @if (isset($product->images) && count($product->images) > 1)
            <div class="absolute bottom-4 left-4 right-4 flex gap-2 z-20">
                @foreach ($product->images as $img)
                    <img src="{{ $img }}" 
                         alt="{{ $product->name }}"
                         data-thumbnail="{{ $img }}"
                         class="w-10 h-10 object-cover rounded cursor-pointer border-2 border-transparent hover:border-amber-500 transition-all" />
                @endforeach
            </div>
        @endif

        <!-- Quick View Button (Hover) -->
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex items-end justify-center pb-4">
            <a href="{{ route('product', $product->slug) }}" 
               class="opacity-0 group-hover:opacity-100 transition-all duration-300 btn-luxury rounded-lg text-center">
                Quick View
            </a>
        </div>
    </div>

    <!-- Product Info Section -->
    <div class="p-6">
        <!-- Category Badge -->
        <div class="mb-2">
            @if ($product->category)
                <a href="{{ route('shop', ['category' => $product->category->slug]) }}" 
                   class="text-xs font-semibold text-amber-700 hover:text-amber-900 uppercase tracking-wider">
                    → {{ $product->category->name }}
                </a>
            @endif
        </div>

        <!-- Product Name -->
        <h3 class="heading-display text-lg md:text-xl text-luxury mb-2 line-clamp-2 group-hover:text-accent transition-colors">
            <a href="{{ route('product', $product->slug) }}" class="hover:underline">
                {{ $product->name }}
            </a>
        </h3>

        <!-- Description -->
        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
            {{ $product->description ?? 'Premium fabric collection' }}
        </p>

        <!-- Divider -->
        <div class="divider-luxury mb-3"></div>

        <!-- Fabric Specs (Show on Hover) -->
        @if ($showSpecs && isset($product->specifications))
            <div class="mb-3 p-3 bg-amber-50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 max-h-0 group-hover:max-h-32 overflow-hidden">
                <h4 class="text-xs font-bold text-luxury mb-2 uppercase">Fabric Specs</h4>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    @foreach ($product->specifications as $key => $value)
                        <div>
                            <span class="font-semibold text-gray-700">{{ ucfirst($key) }}:</span>
                            <span class="text-gray-600">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Rating -->
        <div class="flex items-center gap-2 mb-4">
            <div class="flex gap-1">
                @for ($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 {{ $i < ($product->rating ?? 4) ? 'text-yellow-400' : 'text-gray-300' }}" 
                         fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                @endfor
            </div>
            <span class="text-xs text-gray-500">{{ $product->rating ?? 4 }}.0</span>
        </div>

        <!-- Price Section -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-luxury">₹{{ number_format($product->price, 0) }}</span>
                @if ($product->original_price > $product->price)
                    <span class="text-sm text-gray-500 line-through">₹{{ number_format($product->original_price, 0) }}</span>
                    <span class="text-xs font-bold text-accent bg-red-50 px-2 py-1 rounded">
                        -{{ round((1 - $product->price / $product->original_price) * 100) }}%
                    </span>
                @endif
            </div>
        </div>

        <!-- Add to Cart Button -->
        @if ($product->stock > 0)
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-2">
                @csrf
                <div class="flex gap-2">
                    <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" 
                           class="w-16 px-3 py-2 border border-gray-300 rounded-lg text-center text-sm focus:outline-none focus:ring-2 focus:ring-luxury" />
                    <button type="submit" class="flex-1 btn-luxury rounded-lg text-center font-semibold">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Add to Cart
                        </span>
                    </button>
                </div>
            </form>
        @else
            <button disabled class="w-full py-3 bg-gray-300 text-gray-600 rounded-lg font-semibold cursor-not-allowed">
                Out of Stock
            </button>
        @endif

        <!-- Wishlist & Share -->
        <div class="flex gap-3 pt-3 border-t border-gray-200">
            <button class="flex-1 flex items-center justify-center gap-2 py-2 text-luxury hover:bg-amber-50 rounded-lg transition-colors text-sm font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                Wishlist
            </button>
            <button class="flex-1 flex items-center justify-center gap-2 py-2 text-luxury hover:bg-amber-50 rounded-lg transition-colors text-sm font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C9.589 12.066 10 10.682 10 9c0-3.866-3.582-7-8-7s-8 3.134-8 7 3.582 7 8 7c.694 0 1.352-.122 1.984-.349m0 0a5.999 5.999 0 0015.632 3.346M19 13a2 2 0 100-4m0 4v3m0 0a2 2 0 100 4m0-4v3"></path>
                </svg>
                Share
            </button>
        </div>
    </div>
</div>
