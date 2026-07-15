/* ==========================================================================
   MOUSE DRAG PHYSICS & INERTIA MODULE
   ========================================================================== */

(function() {
    window.PremiumCarousel = window.PremiumCarousel || {};
    
    function initDrag(carousel) {
        let isDragging = false;
        let startX = 0;
        let startPos = 0;
        let lastX = 0;
        let lastTime = 0;
        let dragVelocity = 0;
        
        const stage = carousel.stage;
        if (!stage) return;
        
        stage.addEventListener('pointerdown', (e) => {
            // Disable custom mouse drag on small mobile screen touch viewports (uses native CSS horizontal scrolling instead)
            if (window.innerWidth <= 768) return;
            if (e.button && e.button !== 0) return; // Accept left click only
            
            isDragging = true;
            carousel.isDragging = true;
            startX = e.clientX;
            lastX = e.clientX;
            lastTime = performance.now();
            startPos = carousel.positionSolver.current;
            dragVelocity = 0;
            
            carousel.pauseAutoplay();
            stage.style.cursor = 'grabbing';
            
            // Disengage active spring solver animations during drag
            carousel.positionSolver.isAnimating = false;
        }, { passive: true });
        
        window.addEventListener('pointermove', (e) => {
            if (!isDragging) return;
            
            const now = performance.now();
            const dt = now - lastTime;
            const dx = e.clientX - lastX;
            
            if (dt > 0) {
                // Drag speed calculation
                dragVelocity = dx / dt;
            }
            
            lastX = e.clientX;
            lastTime = now;
            
            const deltaX = e.clientX - startX;
            // 450px drag width matches 1 index item shift
            const dragSensitivity = 1 / 450;
            const dragPos = startPos - deltaX * dragSensitivity;
            
            carousel.positionSolver.setValue(dragPos);
        }, { passive: true });
        
        window.addEventListener('pointerup', (e) => {
            if (!isDragging) return;
            isDragging = false;
            carousel.isDragging = false;
            stage.style.cursor = 'grab';
            
            carousel.resumeAutoplay();
            
            // Calculate snapping momentum offset
            // Speed controls inertia offset scale
            const momentumScaling = 280;
            const momentumOffset = dragVelocity * momentumScaling * -1;
            
            // Snaps with inertia
            let snappedTarget = Math.round(carousel.positionSolver.current + momentumOffset);
            
            carousel.goToIndex(snappedTarget);
        });
    }
    
    window.PremiumCarousel.initDrag = initDrag;
})();
