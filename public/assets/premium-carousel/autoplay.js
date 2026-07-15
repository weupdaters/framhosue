/* ==========================================================================
   AUTOPLAY CYCLE, HOVER DETECTORS & RESUME TIMER
   ========================================================================== */

(function() {
    window.PremiumCarousel = window.PremiumCarousel || {};
    
    function initAutoplay(carousel) {
        let isHoverPaused = false;
        let animationFrameId = null;
        
        // Custom speed: 0.0012 positions per frame (roughly 14 seconds per card rotation)
        const driftSpeed = 0.0012;
        
        function tick() {
            if (!isHoverPaused && window.innerWidth > 768 && !carousel.isDragging && (!carousel.positionSolver || !carousel.positionSolver.isAnimating)) {
                // Increment position target and current values together for a continuous linear drift
                const currentVal = carousel.positionSolver.current + driftSpeed;
                carousel.positionSolver.setValue(currentVal);
            }
            animationFrameId = requestAnimationFrame(tick);
        }
        
        function start() {
            if (!animationFrameId) {
                tick();
            }
        }
        
        function stop() {
            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
                animationFrameId = null;
            }
        }
        
        // Interface functions for carousel object
        carousel.startAutoplay = start;
        carousel.stopAutoplay = stop;
        carousel.pauseAutoplay = () => { isHoverPaused = true; };
        carousel.resumeAutoplay = () => { isHoverPaused = false; };
        
        // Bind pause on hover
        const stage = carousel.stage;
        if (stage) {
            stage.addEventListener('mouseenter', () => {
                carousel.pauseAutoplay();
            });
            
            stage.addEventListener('mouseleave', () => {
                carousel.resumeAutoplay();
            });
        }
        
        // Trigger initialization
        start();
    }
    
    window.PremiumCarousel.initAutoplay = initAutoplay;
})();
