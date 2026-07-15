document.addEventListener('DOMContentLoaded', () => {
    const stage = document.querySelector('.carousel-3d-stage');
    const track = document.querySelector('.carousel-3d-track');
    const cards = document.querySelectorAll('.carousel-3d-card');
    
    if (!stage || !track || cards.length === 0) return;
    
    const count = cards.length;
    const angleUnit = 360 / count;
    
    // Calculate radius to spacing ratio based on card width
    // Formula: radius = width / (2 * tan(angleUnit / 2))
    // We also cap minimum radius to make sure 3D curve looks uniform
    const cardWidth = 290;
    const rad = Math.max(380, cardWidth / (2 * Math.sin(Math.PI / count)));
    
    let currentIndex = 0;
    let targetRotation = 0;
    let isDragging = false;
    let startX = 0;
    let startRotY = 0;
    
    // 1. Arrange cards in a cylindrical wrap
    function arrangeCards() {
        if (window.innerWidth <= 768) {
            // Reset mobile static layout styles
            cards.forEach(card => {
                gsap.set(card, { clearProps: "all" });
            });
            gsap.set(track, { clearProps: "all" });
            return;
        }
        
        cards.forEach((card, index) => {
            const angle = index * angleUnit;
            // Set position and rotation around cylinder center
            gsap.set(card, {
                rotationY: angle,
                transformOrigin: `50% 50% -${rad}px`,
                z: 0 // pushes rotation back
            });
        });
        
        // Set the track's transform origin to the center of the cylinder
        gsap.set(track, {
            transformOrigin: `50% 50% -${rad}px`
        });
        
        // Render starting position
        gotoIndex(0, 0);
    }
    
    // 2. Main Navigation function
    function gotoIndex(index, duration = 1.2) {
        if (window.innerWidth <= 768) return;
        
        // Wrap-around bounds check
        if (index < 0) index = count - 1;
        if (index >= count) index = 0;
        
        currentIndex = index;
        targetRotation = -index * angleUnit;
        
        // GSAP animate tracking rotation
        gsap.to(track, {
            rotationY: targetRotation,
            duration: duration,
            ease: "power3.out",
            onUpdate: updateCardStates,
            overwrite: "auto"
        });
    }
    
    // 3. Update dynamic highlighting & dimming states of cards based on rotation angle
    function updateCardStates() {
        const currentRotY = gsap.getProperty(track, "rotationY") || 0;
        
        cards.forEach((card, index) => {
            const cardAngle = index * angleUnit;
            // Find current relative angle to center (0 degrees)
            let relativeAngle = (cardAngle + currentRotY) % 360;
            if (relativeAngle < 0) relativeAngle += 360;
            if (relativeAngle > 180) relativeAngle -= 360;
            
            const absAngle = Math.abs(relativeAngle);
            
            // Highlight the card facing directly forward
            if (absAngle < angleUnit / 2) {
                card.classList.add('active-card');
                currentIndex = index;
            } else {
                card.classList.remove('active-card');
            }
            
            // Fade & hide background cards
            if (absAngle > 95) {
                gsap.set(card, { 
                    opacity: 0, 
                    pointerEvents: 'none', 
                    visibility: 'hidden',
                    display: 'none'
                });
            } else {
                // Dim cards as they rotate away from center
                const opacity = gsap.utils.mapRange(0, 95, 1, 0.15, absAngle);
                const scale = gsap.utils.mapRange(0, 95, 1, 0.8, absAngle);
                
                gsap.set(card, { 
                    opacity: opacity, 
                    scale: scale,
                    pointerEvents: 'auto', 
                    visibility: 'visible',
                    display: 'block'
                });
            }
        });
        
        // Update indicator bar fill
        const progress = count > 1 ? (currentIndex / (count - 1)) * 100 : 100;
        const fill = document.querySelector('.carousel-indicator-fill');
        if (fill) {
            fill.style.width = `${progress}%`;
        }
    }
    
    // 4. Drag & Swipe Interaction Logic
    stage.addEventListener('pointerdown', (e) => {
        if (window.innerWidth <= 768) return;
        
        // Only trigger on primary click
        if (e.button && e.button !== 0) return;
        
        isDragging = true;
        window.isCarouselDragging = false;
        startX = e.clientX;
        startRotY = gsap.getProperty(track, "rotationY") || 0;
        
        // Disable transitions during drag
        gsap.killTweensOf(track);
    });
    
    window.addEventListener('pointermove', (e) => {
        if (!isDragging) return;
        
        const deltaX = e.clientX - startX;
        if (Math.abs(deltaX) > 5) {
            window.isCarouselDragging = true;
        }
        
        // Sensitivity ratio ClientX diff -> rotation degrees
        const sensitivity = 0.2; 
        const currentDragRotY = startRotY + deltaX * sensitivity;
        
        gsap.set(track, {
            rotationY: currentDragRotY
        });
        
        updateCardStates();
    });
    
    window.addEventListener('pointerup', (e) => {
        if (!isDragging) return;
        
        setTimeout(() => {
            window.isCarouselDragging = false;
        }, 50);
        
        isDragging = false;
        
        const finalRotY = gsap.getProperty(track, "rotationY") || 0;
        
        // Snap calculation: find index closest to final rotation
        let snappedIndex = Math.round(-finalRotY / angleUnit);
        
        // Normalize snap range index
        snappedIndex = ((snappedIndex % count) + count) % count;
        
        gotoIndex(snappedIndex);
    });
    
    // 5. Arrow Controls Click Bindings
    const prevBtn = document.getElementById('carousel-prev');
    const nextBtn = document.getElementById('carousel-next');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            gotoIndex(currentIndex - 1);
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            gotoIndex(currentIndex + 1);
        });
    }
    
    // 6. Custom Event Listener for clicking side cards
    document.addEventListener('carouselGoto', (e) => {
        if (e.detail && typeof e.detail.index === 'number') {
            gotoIndex(e.detail.index);
        }
    });
    
    // 7. Init and Resize handler
    arrangeCards();
    window.addEventListener('resize', arrangeCards);
});
