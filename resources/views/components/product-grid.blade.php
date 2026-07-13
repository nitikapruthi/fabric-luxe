@props(['products' => [], 'title' => 'Our Collection', 'showFilters' => true, 'sortOptions' => ['newest', 'price-low', 'price-high', 'popular', 'rating']])

<section class="py-12 md:py-20 bg-white">
    <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-12" data-fade-in>
            <h1 class="heading-display text-4xl md:text-5xl text-gray-800 mb-4">{{ $title }}</h1>
            <p class="text-gray-600 text-lg max-w-2xl">Explore our curated collection of premium fabrics for every style and occasion</p>
        </div>

        <!-- Top Bar: Results Count & Sort -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8 pb-6 border-b border-gray-200" data-fade-in>
            <p class="text-gray-600 text-sm">
                Showing <span class="font-semibold">{{ count($products) }}</span> products
            </p>

            <!-- Sort Dropdown -->
            <div class="flex gap-4 items-center">
                <label class="text-gray-700 font-semibold text-sm">Sort by:</label>
                <select id="sortSelect" onchange="handleSort(this.value)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury bg-white text-gray-700">
                    <option value="newest">Newest</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="popular">Most Popular</option>
                    <option value="rating">Highest Rated</option>
                </select>
            </div>
        </div>

        <!-- Main Content: Filters + Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            @if ($showFilters)
                <div class="lg:col-span-1" data-fade-in>
                    <div class="sticky top-4 space-y-6">
                        <!-- Filters Header -->
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="heading-serif text-lg text-gray-800">Filters</h3>
                            <button onclick="resetFilters()" class="text-luxury hover:text-amber-800 text-sm font-semibold transition-colors">
                                Reset
                            </button>
                        </div>

                        <!-- Price Filter -->
                        <div class="accordion" data-accordion>
                            <button class="accordion-trigger w-full text-left font-semibold text-gray-800 hover:text-luxury transition-colors flex items-center justify-between" data-accordion-trigger>
                                <span>Price Range</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </button>
                            <div class="accordion-content pt-4" data-accordion-content>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" id="price-0" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                        <label for="price-0" class="text-sm text-gray-700">₹0 - ₹5,000</label>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" id="price-1" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                        <label for="price-1" class="text-sm text-gray-700">₹5,000 - ₹10,000</label>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" id="price-2" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                        <label for="price-2" class="text-sm text-gray-700">₹10,000 - ₹20,000</label>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" id="price-3" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                        <label for="price-3" class="text-sm text-gray-700">₹20,000+</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fabric Type Filter -->
                        <div class="accordion" data-accordion>
                            <button class="accordion-trigger w-full text-left font-semibold text-gray-800 hover:text-luxury transition-colors flex items-center justify-between" data-accordion-trigger>
                                <span>Fabric Type</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </button>
                            <div class="accordion-content pt-4" data-accordion-content>
                                <div class="space-y-3">
                                    @foreach (['Silk', 'Linen', 'Cotton', 'Wool', 'Velvet', 'Satin'] as $fabric)
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" id="fabric-{{ strtolower($fabric) }}" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                            <label for="fabric-{{ strtolower($fabric) }}" class="text-sm text-gray-700">{{ $fabric }}</label>
                                            <span class="text-xs text-gray-500 ml-auto">({{ rand(5, 25) }})</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Color Filter -->
                        <div class="accordion" data-accordion>
                            <button class="accordion-trigger w-full text-left font-semibold text-gray-800 hover:text-luxury transition-colors flex items-center justify-between" data-accordion-trigger>
                                <span>Colors</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </button>
                            <div class="accordion-content pt-4" data-accordion-content>
                                <div class="grid grid-cols-4 gap-3">
                                    @foreach (['#000000', '#FFFFFF', '#8B0000', '#FFD700', '#4169E1', '#FF69B4', '#32CD32', '#FF8C00'] as $color)
                                        <button class="w-10 h-10 rounded-full border-2 border-gray-300 hover:border-luxury transition-all" style="background-color: {{ $color }}" title="Color"></button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Pattern Filter -->
                        <div class="accordion" data-accordion>
                            <button class="accordion-trigger w-full text-left font-semibold text-gray-800 hover:text-luxury transition-colors flex items-center justify-between" data-accordion-trigger>
                                <span>Patterns</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </button>
                            <div class="accordion-content pt-4" data-accordion-content>
                                <div class="space-y-3">
                                    @foreach (['Solid', 'Striped', 'Floral', 'Geometric', 'Damask', 'Jacquard'] as $pattern)
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" id="pattern-{{ strtolower($pattern) }}" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                            <label for="pattern-{{ strtolower($pattern) }}" class="text-sm text-gray-700">{{ $pattern }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Rating Filter -->
                        <div class="accordion" data-accordion>
                            <button class="accordion-trigger w-full text-left font-semibold text-gray-800 hover:text-luxury transition-colors flex items-center justify-between" data-accordion-trigger>
                                <span>Rating</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </button>
                            <div class="accordion-content pt-4" data-accordion-content>
                                <div class="space-y-3">
                                    @for ($i = 5; $i >= 3; $i--)
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" id="rating-{{ $i }}" class="w-4 h-4 rounded border-gray-300 text-luxury" />
                                            <label for="rating-{{ $i }}" class="text-sm text-gray-700">
                                                @for ($j = 0; $j < $i; $j++)
                                                    <svg class="inline w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                @endfor
                                                & up
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Products Grid -->
            <div class="lg:col-span-3" data-fade-in>
                @if (count($products) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="productsGrid">
                        @foreach ($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-center gap-2 mt-12">
                        <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                            Previous
                        </button>
                        <button class="px-4 py-2 bg-luxury text-white rounded-lg">1</button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">2</button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">3</button>
                        <span class="text-gray-500">...</span>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                            Next
                        </button>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-20">
                        <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z"></path>
                        </svg>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">No Products Found</h3>
                        <p class="text-gray-600 text-center max-w-md">Try adjusting your filters or search to find what you're looking for</p>
                        <button onclick="resetFilters()" class="btn-luxury mt-6 rounded-lg px-6 py-3">
                            Clear Filters
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    function handleSort(sortType) {
        console.log('Sorting by:', sortType);
        // Sort logic would be implemented here
        alert('Products sorted by: ' + sortType);
    }

    function resetFilters() {
        // Reset all filter checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = false;
        });
        alert('Filters reset!');
    }
</script>
