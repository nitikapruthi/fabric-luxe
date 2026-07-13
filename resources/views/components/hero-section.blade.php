@props(['title' => 'Luxury Fabrics', 'subtitle' => 'Discover Premium Textile Collections', 'backgroundImage' => null, 'ctaText' => 'Shop Now', 'ctaUrl' => '#'])

<section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden" data-fade-in>
    <!-- Background Layer -->
    <div class="absolute inset-0 z-0">
        @if ($backgroundImage)
            <img src="{{ $backgroundImage }}" alt="Hero Background" 
                 class="w-full h-full object-cover" />
        @else
            <div class="luxury-gradient-dark w-full h-full"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent"></div>
    </div>

    <!-- Fabric Texture Overlay -->
    <div class="absolute inset-0 fabric-texture z-0 opacity-5"></div>

    <!-- Content Layer -->
    <div class="relative z-10 container mx-auto px-6 md:px-12 text-center md:text-left max-w-4xl">
        <!-- Accent Badge -->
        <div class="mb-6 inline-block slide-up">
            <span class="badge-luxury text-sm md:text-base">
                ✨ Handpicked Collections
            </span>
        </div>

        <!-- Main Title -->
        <h1 class="heading-serif text-4xl md:text-6xl lg:text-7xl text-white mb-4 slide-up" 
            style="animation-delay: 0.1s">
            {{ $title }}
        </h1>

        <!-- Subtitle -->
        <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl slide-up" 
           style="animation-delay: 0.2s">
            {{ $subtitle }}
        </p>

        <!-- Luxury Divider -->
        <div class="divider-luxury w-20 h-1 mb-8 mx-auto md:mx-0 slide-up" 
             style="animation-delay: 0.3s"></div>

        <!-- CTA Buttons -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6 slide-up" 
             style="animation-delay: 0.4s">
            <a href="{{ $ctaUrl }}" 
               class="btn-luxury inline-flex items-center justify-center gap-2 rounded-lg text-center">
                {{ $ctaText }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            
            <button class="btn-luxury-outline inline-flex items-center justify-center gap-2 rounded-lg" 
                    onclick="document.querySelector('#collections')?.scrollIntoView({behavior: 'smooth'})">
                Explore Collections
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>
        </div>

        <!-- Feature Pills -->
        <div class="flex flex-col md:flex-row gap-6 mt-12 md:mt-16 slide-up" 
             style="animation-delay: 0.5s">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-6 h-6 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <h3 class="text-white font-semibold">Premium Quality</h3>
                    <p class="text-gray-300 text-sm">Curated Collections</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-6 h-6 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1V3a1 1 0 011-1h5a1 1 0 011 1v1h1V3a1 1 0 111 0v1h1a1 1 0 110 2H4a1 1 0 010-2h1V3a1 1 0 011-1zm0 5a1 1 0 011-1h10a1 1 0 011 1v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <h3 class="text-white font-semibold">Fast Delivery</h3>
                    <p class="text-gray-300 text-sm">Nationwide Shipping</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-6 h-6 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <h3 class="text-white font-semibold">Easy Returns</h3>
                    <p class="text-gray-300 text-sm">30-Day Guarantee</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <div class="flex flex-col items-center gap-2 text-white">
            <span class="text-sm font-medium">Scroll to explore</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>
