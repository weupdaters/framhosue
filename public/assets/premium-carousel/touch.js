/* ==========================================================================
   TOUCH SCREEN EVENT OPTIMIZATIONS, SCROLL WHEEL & KEYBOARD INTERACTION
   ========================================================================== */

(function() {
    window.PremiumCarousel = window.PremiumCarousel || {};
    
    function initTouchAndControls(carousel) {
        const stage = carousel.stage;
        if (!stage) return;
        
        // 1. Mouse Wheel Scroll Navigation (Debounced to feel precise and premium)
        let wheelTimeout = null;
        let lastWheelTime = 0;
        
        stage.addEventListener('wheel', (e) => {
            if (window.innerWidth <= 768) return; // Native wheel scroll on mobile
            
            // Prevent default page scroll when interacting with the stage
            e.preventDefault();
            
            const now = performance.now();
            if (now - lastWheelTime < 180) return; // Debounce threshold
            
            if (Math.abs(e.deltaY) > 8 || Math.abs(e.deltaX) > 8) {
                lastWheelTime = now;
                
                // Determine direction
                const direction = (e.deltaY || e.deltaX) > 0 ? 1 : -1;
                carousel.goToIndex(carousel.currentIndex + direction);
                
                carousel.pauseAutoplay();
                clearTimeout(wheelTimeout);
                wheelTimeout = setTimeout(() => {
                    carousel.resumeAutoplay();
                }, 1500);
            }
        }, { passive: false });
        
        // 2. Keyboard Arrow Key Navigation
        window.addEventListener('keydown', (e) => {
            if (window.innerWidth <= 768) return;
            
            // Check if section is currently visible in viewport
            const rect = stage.getBoundingClientRect();
            const isVisible = (
                rect.top < window.innerHeight && 
                rect.bottom > 0
            );
            if (!isVisible) return;
            
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                carousel.goToIndex(carousel.currentIndex - 1);
                carousel.pauseAutoplay();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                carousel.goToIndex(carousel.currentIndex + 1);
                carousel.pauseAutoplay();
            }
        });
        
        // 3. Touch Screen Pointer gestures optimization
        // Set CSS touch-action to prevent pinch-zooming conflicts on stage container
        stage.style.touchAction = 'pan-y pinch-zoom';
    }
    
    window.PremiumCarousel.initTouchAndControls = initTouchAndControls;
})();
