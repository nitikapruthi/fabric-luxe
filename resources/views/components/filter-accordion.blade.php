@props(['filters' => [], 'activeFilters' => []])

<div class="bg-white rounded-lg border border-gray-200 p-6" data-fade-in>
    <!-- Filters Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="heading-display text-lg text-luxury">Filters</h2>
        @if (count($activeFilters) > 0)
            <a href="{{ route('shop') }}" class="text-sm text-accent hover:text-accent font-semibold">
                Clear All
            </a>
        @endif
    </div>

    <!-- Active Filters Display -->
    @if (count($activeFilters) > 0)
        <div data-active-filters class="mb-6 flex flex-wrap gap-2">
            @foreach ($activeFilters as $key => $values)
                @foreach ((array) $values as $value)
                    <span class="badge-luxury inline-flex items-center gap-2 text-xs">
                        {{ ucfirst($key) }}: {{ $value }}
                        <a href="{{ route('shop', array_merge(request()->query(), [$key => array_filter((array) $values, fn($v) => $v !== $value)])) }}" 
                           class="hover:opacity-80 transition-opacity">
                            ×
                        </a>
                    </span>
                @endforeach
            @endforeach
        </div>
    @endif

    <!-- Filter Sections -->
    <div class="space-y-4" data-accordion>
        <!-- Price Range Filter -->
        <div class="border-b border-gray-200 pb-4">
            <button class="flex items-center justify-between w-full py-2 group" data-accordion-trigger>
                <span class="font-semibold text-gray-800 group-hover:text-luxury transition-colors">Price Range</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>
            <div class="hidden pt-4 space-y-3" data-accordion-content>
                <div class="space-y-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                               name="price" value="0-500" 
                               @checked(in_array('0-500', (array) ($activeFilters['price'] ?? [])))
                               onchange="location.href='{{ route('shop') }}?price=' + this.value" />
                        <span class="text-gray-700 group-hover:text-luxury transition-colors">Under ₹500</span>
                        <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">234</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                               name="price" value="500-1000"
                               @checked(in_array('500-1000', (array) ($activeFilters['price'] ?? [])))
                               onchange="location.href='{{ route('shop') }}?price=' + this.value" />
                        <span class="text-gray-700 group-hover:text-luxury transition-colors">₹500 - ₹1000</span>
                        <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">156</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                               name="price" value="1000-2000"
                               @checked(in_array('1000-2000', (array) ($activeFilters['price'] ?? [])))
                               onchange="location.href='{{ route('shop') }}?price=' + this.value" />
                        <span class="text-gray-700 group-hover:text-luxury transition-colors">₹1000 - ₹2000</span>
                        <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">89</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                               name="price" value="2000+"
                               @checked(in_array('2000+', (array) ($activeFilters['price'] ?? [])))
                               onchange="location.href='{{ route('shop') }}?price=' + this.value" />
                        <span class="text-gray-700 group-hover:text-luxury transition-colors">Above ₹2000</span>
                        <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">45</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Fabric Type Filter -->
        <div class="border-b border-gray-200 pb-4">
            <button class="flex items-center justify-between w-full py-2 group" data-accordion-trigger>
                <span class="font-semibold text-gray-800 group-hover:text-luxury transition-colors">Fabric Type</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>
            <div class="hidden pt-4 space-y-3" data-accordion-content>
                <div class="space-y-2">
                    @php
                        $fabricTypes = [
                            ['name' => 'Silk', 'count' => 234],
                            ['name' => 'Cotton', 'count' => 567],
                            ['name' => 'Linen', 'count' => 189],
                            ['name' => 'Wool', 'count' => 145],
                            ['name' => 'Velvet', 'count' => 98],
                        ];
                    @endphp
                    @foreach ($fabricTypes as $type)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                                   name="fabric_type" value="{{ strtolower($type['name']) }}"
                                   @checked(in_array(strtolower($type['name']), (array) ($activeFilters['fabric_type'] ?? [])))
                                   onchange="location.href='{{ route('shop') }}?fabric_type=' + this.value" />
                            <span class="text-gray-700 group-hover:text-luxury transition-colors">{{ $type['name'] }}</span>
                            <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ $type['count'] }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Color Filter -->
        <div class="border-b border-gray-200 pb-4">
            <button class="flex items-center justify-between w-full py-2 group" data-accordion-trigger>
                <span class="font-semibold text-gray-800 group-hover:text-luxury transition-colors">Color</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>
            <div class="hidden pt-4" data-accordion-content>
                <div class="grid grid-cols-4 gap-3">
                    @php
                        $colors = [
                            ['name' => 'Black', 'hex' => '#000000'],
                            ['name' => 'White', 'hex' => '#FFFFFF'],
                            ['name' => 'Brown', 'hex' => '#8B5A3C'],
                            ['name' => 'Beige', 'hex' => '#D4A574'],
                            ['name' => 'Red', 'hex' => '#C41E3A'],
                            ['name' => 'Blue', 'hex' => '#1E40AF'],
                            ['name' => 'Green', 'hex' => '#15803D'],
                            ['name' => 'Gray', 'hex' => '#6B7280'],
                        ];
                    @endphp
                    @foreach ($colors as $color)
                        <label class="cursor-pointer group relative" title="{{ $color['name'] }}">
                            <input type="checkbox" class="hidden" 
                                   name="color" value="{{ strtolower($color['name']) }}"
                                   @checked(in_array(strtolower($color['name']), (array) ($activeFilters['color'] ?? [])))
                                   onchange="location.href='{{ route('shop') }}?color=' + this.value" />
                            <div class="w-10 h-10 rounded-lg border-2 border-gray-200 group-hover:border-luxury transition-all" 
                                 style="background-color: {{ $color['hex'] }};">
                                <svg class="w-full h-full text-white hidden" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Pattern Filter -->
        <div class="border-b border-gray-200 pb-4">
            <button class="flex items-center justify-between w-full py-2 group" data-accordion-trigger>
                <span class="font-semibold text-gray-800 group-hover:text-luxury transition-colors">Pattern</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>
            <div class="hidden pt-4 space-y-3" data-accordion-content>
                <div class="space-y-2">
                    @php
                        $patterns = [
                            ['name' => 'Solid', 'count' => 456],
                            ['name' => 'Striped', 'count' => 234],
                            ['name' => 'Floral', 'count' => 189],
                            ['name' => 'Geometric', 'count' => 145],
                            ['name' => 'Damask', 'count' => 98],
                        ];
                    @endphp
                    @foreach ($patterns as $pattern)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                                   name="pattern" value="{{ strtolower($pattern['name']) }}"
                                   @checked(in_array(strtolower($pattern['name']), (array) ($activeFilters['pattern'] ?? [])))
                                   onchange="location.href='{{ route('shop') }}?pattern=' + this.value" />
                            <span class="text-gray-700 group-hover:text-luxury transition-colors">{{ $pattern['name'] }}</span>
                            <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ $pattern['count'] }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Rating Filter -->
        <div class="pb-4">
            <button class="flex items-center justify-between w-full py-2 group" data-accordion-trigger>
                <span class="font-semibold text-gray-800 group-hover:text-luxury transition-colors">Rating</span>
                <svg class="w-5 h-5 text-gray-600 group-hover:text-luxury transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>
            <div class="hidden pt-4 space-y-3" data-accordion-content>
                @php
                    $ratings = [
                        ['stars' => 5, 'count' => 234],
                        ['stars' => 4, 'count' => 156],
                        ['stars' => 3, 'count' => 89],
                        ['stars' => 2, 'count' => 34],
                        ['stars' => 1, 'count' => 12],
                    ];
                @endphp
                @foreach ($ratings as $rating)
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded accent-amber-700" 
                               name="rating" value="{{ $rating['stars'] }}"
                               @checked(in_array($rating['stars'], (array) ($activeFilters['rating'] ?? [])))
                               onchange="location.href='{{ route('shop') }}?rating=' + this.value" />
                        <div class="flex gap-1">
                            @for ($i = 0; $i < $rating['stars']; $i++)
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <span class="ml-auto text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ $rating['count'] }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Apply Filters Button -->
    <button class="w-full mt-6 btn-luxury rounded-lg text-center font-semibold">
        Apply Filters
    </button>
</div>
