<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Fabric Luxe - Premium Textiles' }}</title>
    <meta name="description" content="{{ $description ?? 'Discover premium textile collections crafted for luxury living.' }}">
    
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    
    <!-- Luxury Styles -->
    <style>
        :root {
            --color-luxury: #a88e5e;
            --color-accent: #d32f2f;
            --color-dark: #1a1a1a;
            --color-light: #f5f5f5;
        }

        /* Typography */
        .heading-serif {
            font-family: 'Georgia', 'Garamond', serif;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .heading-display {
            font-family: 'Georgia', 'Garamond', serif;
            font-weight: 700;
            letter-spacing: -1px;
        }

        /* Colors */
        .text-luxury {
            color: var(--color-luxury);
        }

        .text-accent {
            color: var(--color-accent);
        }

        .bg-luxury {
            background-color: var(--color-luxury);
        }

        .bg-accent {
            background-color: var(--color-accent);
        }

        /* Gradient Backgrounds */
        .luxury-gradient-dark {
            background: linear-gradient(135deg, #a88e5e 0%, #8b7845 100%);
        }

        .luxury-gradient-light {
            background: linear-gradient(135deg, #f0e6d2 0%, #e8dcc4 100%);
        }

        .luxury-gradient-text {
            background: linear-gradient(135deg, #a88e5e 0%, #d32f2f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Buttons */
        .btn-luxury {
            @apply px-6 py-3 bg-luxury text-white font-semibold hover:bg-amber-800 transition-all duration-300 cursor-pointer;
        }

        .btn-luxury:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(168, 142, 94, 0.3);
        }

        .btn-outline-luxury {
            @apply px-6 py-3 border-2 border-luxury text-luxury font-semibold hover:bg-luxury hover:text-white transition-all duration-300 rounded-lg cursor-pointer;
        }

        /* Badges */
        .badge-luxury {
            @apply bg-amber-50 text-luxury border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold;
        }

        .badge-accent {
            @apply bg-red-50 text-accent border border-red-200 px-3 py-1 rounded-full text-xs font-semibold;
        }

        /* Dividers */
        .divider-luxury {
            background: linear-gradient(90deg, transparent, var(--color-luxury), transparent);
        }

        /* Cards */
        .card-luxury {
            @apply bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300;
        }

        .card-luxury:hover {
            transform: translateY(-4px);
        }

        /* Input Styles */
        .input-luxury {
            @apply px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-luxury focus:border-luxury transition-all;
        }

        .input-luxury::placeholder {
            @apply text-gray-400;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse-soft {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        [data-fade-in] {
            animation: fadeIn 0.6s ease-out;
        }

        [data-slide-in-left] {
            animation: slideInLeft 0.6s ease-out;
        }

        [data-slide-in-right] {
            animation: slideInRight 0.6s ease-out;
        }

        /* Accordion Functionality */
        [data-accordion-trigger] {
            @apply w-full text-left font-semibold text-gray-800 hover:text-luxury transition-colors;
        }

        [data-accordion-content] {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        [data-accordion-trigger].active + [data-accordion-content] {
            max-height: 500px;
        }

        /* Responsive Typography */
        @media (max-width: 768px) {
            .heading-display {
                font-size: 1.5rem;
            }

            .heading-serif {
                font-size: 1.25rem;
            }
        }

        /* Utility Classes */
        .luxury-hover {
            transition: all 0.3s ease;
        }

        .luxury-hover:hover {
            color: var(--color-luxury);
        }

        .smooth-scroll {
            scroll-behavior: smooth;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--color-luxury);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-accent);
        }

        /* Selection Color */
        ::selection {
            background-color: var(--color-luxury);
            color: white;
        }

        /* Global Body Styles */
        body {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: #333;
            background-color: #fafafa;
            line-height: 1.6;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="smooth-scroll">
    <!-- Header -->
    @include('components.header', ['categories' => $categories ?? []])

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Global Scripts -->
    <script>
        // Accordion Toggle Functionality
        document.querySelectorAll('[data-accordion-trigger]').forEach(trigger => {
            trigger.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const isActive = this.classList.contains('active');
                
                // Close all other accordions in the same group
                const accordion = this.closest('[data-accordion]');
                if (accordion) {
                    accordion.querySelectorAll('[data-accordion-trigger]').forEach(t => {
                        t.classList.remove('active');
                    });
                    accordion.querySelectorAll('[data-accordion-content]').forEach(c => {
                        c.style.maxHeight = '0';
                    });
                }
                
                // Toggle current accordion
                if (!isActive) {
                    this.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + 'px';
                }
            });
        });

        // Cart Drawer Toggle
        document.querySelector('[data-cart-toggle]')?.addEventListener('click', function() {
            const drawer = document.querySelector('[data-cart-drawer]');
            drawer?.classList.toggle('translate-x-full');
        });

        document.querySelector('[data-cart-close]')?.addEventListener('click', function() {
            const drawer = document.querySelector('[data-cart-drawer]');
            drawer?.classList.add('translate-x-full');
        });

        // Close cart drawer when clicking outside
        document.addEventListener('click', function(event) {
            const drawer = document.querySelector('[data-cart-drawer]');
            const cartBtn = document.querySelector('[data-cart-toggle]');
            
            if (drawer && !drawer.contains(event.target) && !cartBtn.contains(event.target)) {
                drawer.classList.add('translate-x-full');
            }
        });

        // Smooth scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

    @vite('resources/js/app.js')
</body>
</html>
