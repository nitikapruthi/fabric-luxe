@props(['title' => 'Luxury Fabrics', 'subtitle' => 'Experience Premium Textiles', 'backgroundImage' => 'https://via.placeholder.com/1920x600?text=Hero+Banner', 'cta' => true, 'ctaText' => 'Shop Now', 'ctaUrl' => '#shop'])

<section class="relative h-screen md:h-[600px] overflow-hidden" data-slide-in-left>
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ $backgroundImage }}" 
             alt="{{ $title }}" 
             class="w-full h-full object-cover" />
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    </div>

    <!-- Content Container -->
    <div class="relative h-full flex items-center justify-center">
        <div class="container mx-auto px-6 text-center md:text-left">
            <div class="max-w-2xl">
                <!-- Subtitle -->
                <p class="text-luxury font-semibold uppercase tracking-widest mb-4 text-sm md:text-base" data-fade-in>
                    Welcome to Luxury
                </p>

                <!-- Main Title -->
                <h1 class="heading-display text-white text-4xl md:text-6xl lg:text-7xl mb-6 leading-tight" data-fade-in>
                    {{ $title }}
                </h1>

                <!-- Subtitle Description -->
                <p class="text-gray-100 text-lg md:text-xl mb-8 leading-relaxed max-w-xl" data-fade-in>
                    {{ $subtitle }}
                </p>

                <!-- CTA Buttons -->
                @if ($cta)
                    <div class="flex flex-col md:flex-row gap-4" data-fade-in>
                        <a href="{{ $ctaUrl }}" class="btn-luxury rounded-lg text-center py-4 px-8 font-semibold text-lg hover:scale-105 transform transition-transform">
                            {{ $ctaText }}
                        </a>
                        <a href="#featured" class="btn-outline-luxury rounded-lg text-center py-4 px-8 font-semibold text-lg text-white border-white hover:bg-white hover:text-luxury">
                            Explore Collection
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Featured Collections Section (Optional) -->
<section id="featured" class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-12" data-fade-in>
            <p class="text-luxury font-semibold uppercase tracking-widest mb-3 text-sm">Collections</p>
            <h2 class="heading-display text-gray-800 text-4xl md:text-5xl mb-4">Featured Collections</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">Discover our handpicked selection of premium fabrics curated for luxury living</p>
        </div>

        <!-- Collections Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-fade-in>
            <!-- Collection 1: Silks -->
            <a href="#" class="group relative overflow-hidden rounded-lg h-80 md:h-96">
                <img src="https://via.placeholder.com/400x500?text=Silk+Collection" alt="Silk Collection" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent flex items-end">
                    <div class="p-6 w-full">
                        <h3 class="heading-serif text-white text-2xl mb-2">Premium Silks</h3>
                        <p class="text-gray-200 text-sm mb-4">Luxurious silk fabrics for elegant designs</p>
                        <span class="inline-block text-luxury font-semibold group-hover:text-white transition-colors">Explore →</span>
                    </div>
                </div>
            </a>

            <!-- Collection 2: Linens -->
            <a href="#" class="group relative overflow-hidden rounded-lg h-80 md:h-96">
                <img src="https://via.placeholder.com/400x500?text=Linen+Collection" alt="Linen Collection" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent flex items-end">
                    <div class="p-6 w-full">
                        <h3 class="heading-serif text-white text-2xl mb-2">Finest Linens</h3>
                        <p class="text-gray-200 text-sm mb-4">Pure linen fabrics for comfort and style</p>
                        <span class="inline-block text-luxury font-semibold group-hover:text-white transition-colors">Explore →</span>
                    </div>
                </div>
            </a>

            <!-- Collection 3: Wools -->
            <a href="#" class="group relative overflow-hidden rounded-lg h-80 md:h-96">
                <img src="https://via.placeholder.com/400x500?text=Wool+Collection" alt="Wool Collection" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent flex items-end">
                    <div class="p-6 w-full">
                        <h3 class="heading-serif text-white text-2xl mb-2">Luxe Wools</h3>
                        <p class="text-gray-200 text-sm mb-4">Fine wool fabrics for warmth and elegance</p>
                        <span class="inline-block text-luxury font-semibold group-hover:text-white transition-colors">Explore →</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-16 md:py-24 bg-luxury-gradient-light">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-fade-in>
            <!-- Benefit 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-luxury rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="heading-serif text-gray-800 text-xl mb-2">Premium Quality</h3>
                <p class="text-gray-700">Handpicked fabrics sourced from the finest mills worldwide</p>
            </div>

            <!-- Benefit 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-luxury rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="heading-serif text-gray-800 text-xl mb-2">Fast Delivery</h3>
                <p class="text-gray-700">Quick and reliable shipping to your doorstep</p>
            </div>

            <!-- Benefit 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-luxury rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5-4a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="heading-serif text-gray-800 text-xl mb-2">Expert Support</h3>
                <p class="text-gray-700">Dedicated team to assist with all your textile needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Teaser (Optional) -->
<section class="py-16 md:py-20 bg-gray-900">
    <div class="container mx-auto px-6 text-center" data-fade-in>
        <h2 class="heading-display text-white text-3xl md:text-4xl mb-4">Stay Updated</h2>
        <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Subscribe to get exclusive access to new collections and special offers</p>
        <form class="max-w-md mx-auto flex gap-3" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
            <input type="email" placeholder="Enter your email" required 
                   class="flex-1 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury" />
            <button type="submit" class="btn-luxury rounded-lg px-6 py-3 font-semibold">
                Subscribe
            </button>
        </form>
    </div>
</section>
