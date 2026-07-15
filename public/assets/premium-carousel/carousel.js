/* ==========================================================================
   PREMIUM 3D CAROUSEL CORE CONTEXT & INITIALIZER
   ========================================================================== */

(function() {
    window.PremiumCarousel = window.PremiumCarousel || {};

    class CarouselController {
        constructor(selector) {
            this.section = document.querySelector(selector);
            if (!this.section) return;

            this.stage = this.section.querySelector('.premium-carousel-stage');
            this.track = this.section.querySelector('.premium-carousel-track');
            this.cards = this.section.querySelectorAll('.premium-carousel-card');
            
            if (!this.stage || !this.track || this.cards.length === 0) return;

            this.count = this.cards.length;
            this.currentIndex = 0;
            this.angleStep = 32;
            this.radius = Math.max(680, window.innerWidth * 0.52);
 
            // 1. Instantiate the SpringSolver physics loop with critically damped premium spring parameters
            this.positionSolver = new window.PremiumCarousel.SpringSolver({
                stiffness: 0.022,
                damping: 0.88,
                precision: 0.0001
            });

            this.positionSolver.onUpdate = (currentVal, velocity) => {
                this.render(currentVal, velocity);
            };

            this.init();
        }

        init() {
            // Setup Intersection Observer for premium fade-in loading sequence
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.section.classList.add('in-view');
                        // Render initial frame to setup all styles correctly
                        this.positionSolver.setValue(this.currentIndex);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.05 });

            // Fallback in case observer fails to trigger or is blocked
            setTimeout(() => {
                if (!this.section.classList.contains('in-view')) {
                    this.section.classList.add('in-view');
                    this.positionSolver.setValue(this.currentIndex);
                }
            }, 500);

            observer.observe(this.section);

            // Bind Arrow clicks
            const prevBtn = this.section.querySelector('#premium-prev');
            const nextBtn = this.section.querySelector('#premium-next');
            if (prevBtn) prevBtn.addEventListener('click', () => this.goToIndex(this.currentIndex - 1));
            if (nextBtn) nextBtn.addEventListener('click', () => this.goToIndex(this.currentIndex + 1));

            // Bind Background Cards Click to transition them directly
            this.cards.forEach((card, index) => {
                card.addEventListener('click', (e) => {
                    if (window.isCarouselDragging) return;
                    if (index !== this.currentIndex) {
                        e.preventDefault();
                        e.stopPropagation();
                        this.goToIndex(index);
                    }
                });

                // Subtle Tilt Parallax hover actions
                this.setupParallaxTilt(card);
            });

            // Initialize Sub-Modules (Autoplay only, mouse interaction is disabled)
            if (window.PremiumCarousel.initAutoplay) {
                window.PremiumCarousel.initAutoplay(this);
            }

            // Sync sizing on browser viewport changes
            window.addEventListener('resize', () => this.handleResize());
            this.handleResize();
        }

        goToIndex(targetIdx) {
            if (window.innerWidth <= 768) return; // Ignore custom transitions on mobile
 
            // Resolve targetIdx into nearest wrapped index coordinates
            let diff = targetIdx - this.currentIndex;
            
            // Shortest path mapping for infinite wrap loops
            const halfCount = this.count / 2;
            while (diff > halfCount) diff -= this.count;
            while (diff < -halfCount) diff += this.count;
            
            const targetPos = Math.round(this.positionSolver.current) + diff;
            
            this.currentIndex = ((this.currentIndex + diff) % this.count + this.count) % this.count;
            this.positionSolver.setTarget(targetPos);
        }

        render(positionVal, velocity) {
            if (window.innerWidth <= 768) return; // Disable calculations on mobile layout

            this.cards.forEach((card, index) => {
                let offset = index - positionVal;
                
                // Infinite looping circular coordinate wrapping
                const halfCount = this.count / 2;
                while (offset > halfCount) offset -= this.count;
                while (offset < -halfCount) offset += this.count;

                const absOffset = Math.abs(offset);
                
                // Rotate and position cards in 3D concave arc space matching the reference layout
                const angle = offset * 18; // 18 degrees rotation Y per offset
                const radians = angle * Math.PI / 180;
                
                // Dynamic spacing based on screen width (spacing matches reference gap, no overlapping)
                const spacing = window.innerWidth <= 1024 ? 240 : 320;
                const translateX = offset * spacing;
                
                // Concave curve calculation (side cards curve forward towards the user)
                let translateZ = (1 - Math.cos(radians)) * 380;
                
                // Scale side cards slightly larger as they swing forward (center card looks smaller, side cards larger)
                const scale = 0.80 + absOffset * 0.08;
                
                // Keep side cards highly visible and bright
                const opacity = Math.max(0.75, 1 - absOffset * 0.08);
                
                // Crystal clear cards with only a subtle velocity motion blur
                const cardBlur = Math.min(2.5, Math.abs(velocity) * 10);
 
                // Adjust card active classes
                if (absOffset < 0.5) {
                    card.classList.add('active-card');
                    this.currentIndex = index;
                } else {
                    card.classList.remove('active-card');
                }
 
                // Render properties
                gsap.set(card, {
                    x: translateX,
                    z: translateZ,
                    scale: scale,
                    opacity: opacity,
                    filter: cardBlur > 0.1 ? `blur(${cardBlur}px)` : 'none',
                    rotationY: -angle, // Rotate Y inwards to face the center
                    zIndex: Math.round(100 - absOffset * 10),
                    display: absOffset > 4.6 ? 'none' : 'block' // Performance culling cased for 9 cards (far off-screen entry/exit)
                });
            });

            // Synchronize indicator bar layout progress fill
            const progress = this.count > 1 ? (this.currentIndex / (this.count - 1)) * 100 : 100;
            const progressFill = this.section.querySelector('.premium-indicator-progress');
            if (progressFill) {
                progressFill.style.width = `${progress}%`;
            }
        }

        setupParallaxTilt(card) {
            card.addEventListener('mousemove', (e) => {
                if (!card.classList.contains('active-card')) return;
                
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                // Max tilt angle 8 degrees
                const rotateX = (centerY - y) / 10;
                const rotateY = (x - centerX) / 10;
                
                const img = card.querySelector('.premium-card-img-container img');
                const overlay = card.querySelector('.premium-card-overlay');
                const play = card.querySelector('.premium-play-indicator');
                
                // Tilt layers offset for parallax depth feel
                if (img) img.style.transform = `scale(1.08) translate3d(${rotateY * 0.6}px, ${-rotateX * 0.6}px, 12px)`;
                if (overlay) overlay.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(15px)`;
                if (play) play.style.transform = `scale(1.1) translate3d(${rotateY * 1.3}px, ${-rotateX * 1.3}px, 32px)`;
            });

            card.addEventListener('mouseleave', () => {
                const img = card.querySelector('.premium-card-img-container img');
                const overlay = card.querySelector('.premium-card-overlay');
                const play = card.querySelector('.premium-play-indicator');
                
                if (img) img.style.transform = `scale(1) translate3d(0, 0, 0)`;
                if (overlay) overlay.style.transform = `rotateX(0deg) rotateY(0deg) translateZ(0)`;
                if (play) play.style.transform = `scale(0.7) translate3d(0, 0, 0)`;
            });
        }

        handleResize() {
            if (window.innerWidth <= 768) {
                // Clear 3D layout styles on mobile
                this.cards.forEach(card => gsap.set(card, { clearProps: "all" }));
                gsap.set(this.track, { clearProps: "all" });
            } else {
                this.radius = Math.max(680, window.innerWidth * 0.52);
                this.positionSolver.setValue(this.currentIndex);
            }
        }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        window.PremiumCarousel.controller = new CarouselController('#premium-carousel');
    });
})();
