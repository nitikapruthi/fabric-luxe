import './bootstrap';

// DOM Utilities
const DOM = {
    ready: (callback) => {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', callback);
        } else {
            callback();
        }
    },
    select: (selector) => document.querySelector(selector),
    selectAll: (selector) => document.querySelectorAll(selector),
    on: (element, event, handler) => element?.addEventListener(event, handler),
    addClass: (element, className) => element?.classList.add(className),
    removeClass: (element, className) => element?.classList.remove(className),
    toggleClass: (element, className) => element?.classList.toggle(className),
    hasClass: (element, className) => element?.classList.contains(className),
};

// Product Gallery Lightbox
class ProductGallery {
    constructor() {
        this.currentIndex = 0;
        this.init();
    }

    init() {
        const galleries = DOM.selectAll('[data-gallery]');
        galleries.forEach((gallery, idx) => {
            this.setupGallery(gallery, idx);
        });
    }

    setupGallery(gallery, idx) {
        const images = gallery.querySelectorAll('img');
        const thumbnails = gallery.querySelectorAll('[data-thumbnail]');

        // Main image click to open lightbox
        DOM.on(gallery.querySelector('[data-main-image]'), 'click', () => {
            this.openLightbox(images);
        });

        // Thumbnail clicks
        thumbnails.forEach((thumb, i) => {
            DOM.on(thumb, 'click', (e) => {
                e.preventDefault();
                const mainImage = gallery.querySelector('[data-main-image]');
                mainImage.src = thumb.dataset.thumbnail;
                mainImage.dataset.alt = thumb.alt;
                thumbnails.forEach(t => DOM.removeClass(t, 'ring-2'));
                DOM.addClass(thumb, 'ring-2');
            });
        });
    }

    openLightbox(images) {
        const lightbox = document.createElement('div');
        lightbox.className = 'fixed inset-0 bg-black/90 z-50 flex items-center justify-center fade-in';
        lightbox.innerHTML = `
            <button class="absolute top-4 right-6 text-white text-3xl hover:text-gray-300" aria-label="Close">×</button>
            <button class="absolute left-6 text-white text-3xl hover:text-gray-300" aria-label="Previous">‹</button>
            <img class="max-w-4xl max-h-[80vh] object-contain" src="${images[0].src}" alt="Product Gallery">
            <button class="absolute right-6 text-white text-3xl hover:text-gray-300" aria-label="Next">›</button>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white text-sm"><span class="gallery-counter">1</span> / ${images.length}</div>
        `;

        document.body.appendChild(lightbox);
        this.currentIndex = 0;
        const img = lightbox.querySelector('img');
        const counter = lightbox.querySelector('.gallery-counter');
        const prevBtn = lightbox.querySelector('button:nth-of-type(2)');
        const nextBtn = lightbox.querySelector('button:nth-of-type(3)');
        const closeBtn = lightbox.querySelector('button:first-of-type');

        const updateImage = () => {
            img.src = images[this.currentIndex].src;
            counter.textContent = this.currentIndex + 1;
        };

        DOM.on(nextBtn, 'click', () => {
            this.currentIndex = (this.currentIndex + 1) % images.length;
            updateImage();
        });

        DOM.on(prevBtn, 'click', () => {
            this.currentIndex = (this.currentIndex - 1 + images.length) % images.length;
            updateImage();
        });

        DOM.on(closeBtn, 'click', () => lightbox.remove());
        DOM.on(lightbox, 'click', (e) => {
            if (e.target === lightbox) lightbox.remove();
        });

        // Keyboard navigation
        const handleKeyboard = (e) => {
            if (e.key === 'ArrowRight') nextBtn.click();
            if (e.key === 'ArrowLeft') prevBtn.click();
            if (e.key === 'Escape') closeBtn.click();
        };
        DOM.on(document, 'keydown', handleKeyboard);
        lightbox.addEventListener('remove', () => {
            document.removeEventListener('keydown', handleKeyboard);
        });
    }
}

// Collapsible Filter Accordion
class FilterAccordion {
    constructor() {
        this.init();
    }

    init() {
        const accordions = DOM.selectAll('[data-accordion]');
        accordions.forEach(accordion => {
            this.setupAccordion(accordion);
        });
    }

    setupAccordion(accordion) {
        const triggers = accordion.querySelectorAll('[data-accordion-trigger]');
        triggers.forEach(trigger => {
            DOM.on(trigger, 'click', () => {
                const content = trigger.nextElementSibling;
                const isOpen = DOM.hasClass(content, 'hidden');
                
                // Close all other accordions
                accordion.querySelectorAll('[data-accordion-content]').forEach(c => {
                    DOM.addClass(c, 'hidden');
                    c.previousElementSibling.setAttribute('aria-expanded', 'false');
                });

                // Toggle current
                if (isOpen) {
                    DOM.removeClass(content, 'hidden');
                    trigger.setAttribute('aria-expanded', 'true');
                    content.classList.add('slide-up');
                }
            });
        });
    }
}

// Sticky Mini Cart
class StickyCart {
    constructor() {
        this.cartBtn = DOM.select('[data-cart-toggle]');
        this.cartDrawer = DOM.select('[data-cart-drawer]');
        this.closeBtn = DOM.select('[data-cart-close]');
        this.init();
    }

    init() {
        if (!this.cartBtn) return;

        DOM.on(this.cartBtn, 'click', () => this.toggleCart());
        if (this.closeBtn) DOM.on(this.closeBtn, 'click', () => this.closeCart());
        DOM.on(document, 'click', (e) => {
            if (!this.cartBtn.contains(e.target) && !this.cartDrawer?.contains(e.target)) {
                this.closeCart();
            }
        });
    }

    toggleCart() {
        DOM.toggleClass(this.cartDrawer, 'translate-x-full');
        DOM.toggleClass(this.cartBtn, 'bg-amber-100');
    }

    closeCart() {
        DOM.addClass(this.cartDrawer, 'translate-x-full');
        DOM.removeClass(this.cartBtn, 'bg-amber-100');
    }
}

// Filter Active Tags Display
class FilterTags {
    constructor() {
        this.container = DOM.select('[data-active-filters]');
        this.init();
    }

    init() {
        if (!this.container) return;
        this.updateTags();
    }

    updateTags() {
        const filters = new URLSearchParams(window.location.search);
        const tags = [];

        filters.forEach((value, key) => {
            if (key !== 'sort') {
                tags.push({ key, value });
            }
        });

        this.container.innerHTML = tags.map(tag => `
            <span class="badge-luxury inline-flex items-center gap-2">
                ${tag.key}: ${tag.value}
                <a href="?${this.removeFilter(tag.key, tag.value)}" class="hover:opacity-80">×</a>
            </span>
        `).join('');
    }

    removeFilter(key, value) {
        const filters = new URLSearchParams(window.location.search);
        filters.delete(key);
        return filters.toString();
    }
}

// Smooth Scroll Animation
class SmoothScroll {
    constructor() {
        this.init();
    }

    init() {
        const links = DOM.selectAll('a[href^="#"]');
        links.forEach(link => {
            DOM.on(link, 'click', (e) => {
                const target = DOM.select(link.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }
}

// Fade In on Scroll
class FadeInOnScroll {
    constructor() {
        this.elements = DOM.selectAll('[data-fade-in]');
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    DOM.addClass(entry.target, 'fade-in');
                    this.observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        this.init();
    }

    init() {
        this.elements.forEach(el => this.observer.observe(el));
    }
}

// Initialize all components
DOM.ready(() => {
    console.log('🌟 Fabric Luxe UI initialized');
    new ProductGallery();
    new FilterAccordion();
    new StickyCart();
    new FilterTags();
    new SmoothScroll();
    new FadeInOnScroll();
});
