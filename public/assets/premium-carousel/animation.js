/* ==========================================================================
   SPRING TWEEN ENGINE & FPS-TICKER
   ========================================================================== */

(function() {
    window.PremiumCarousel = window.PremiumCarousel || {};

    class SpringSolver {
        constructor({ stiffness = 0.08, damping = 0.82, precision = 0.0001 } = {}) {
            this.stiffness = stiffness;
            this.damping = damping;
            this.precision = precision;
            
            this.current = 0;
            this.target = 0;
            this.velocity = 0;
            
            this.isAnimating = false;
            this.onUpdate = null;
            this.onComplete = null;
        }
        
        setTarget(targetVal) {
            this.target = targetVal;
            if (!this.isAnimating) {
                this.isAnimating = true;
                this.tick();
            }
        }
        
        setValue(value) {
            this.current = value;
            this.target = value;
            this.velocity = 0;
            if (this.onUpdate) this.onUpdate(this.current, 0);
        }
        
        tick() {
            if (!this.isAnimating) return;
            
            const force = (this.target - this.current) * this.stiffness;
            this.velocity += force;
            this.velocity *= this.damping;
            this.current += this.velocity;
            
            if (this.onUpdate) {
                // Pass current value and velocity (velocity helps compute motion blur!)
                this.onUpdate(this.current, this.velocity);
            }
            
            const isNearTarget = Math.abs(this.target - this.current) < this.precision;
            const isSettled = Math.abs(this.velocity) < this.precision;
            
            if (isNearTarget && isSettled) {
                this.current = this.target;
                this.velocity = 0;
                if (this.onUpdate) this.onUpdate(this.current, 0);
                if (this.onComplete) this.onComplete(this.current);
                this.isAnimating = false;
            } else {
                requestAnimationFrame(() => this.tick());
            }
        }
    }
    
    // Custom cubic-bezier easing solver function
    // Solves coordinates matching cubic-bezier(.22, 1, .36, 1)
    function cubicBezier(t, x1, y1, x2, y2) {
        const cx = 3.0 * x1;
        const bx = 3.0 * (x2 - x1) - cx;
        const ax = 1.0 - cx - bx;
         
        const cy = 3.0 * y1;
        const by = 3.0 * (y2 - y1) - cy;
        const ay = 1.0 - cy - by;
        
        // Solve X for t
        let sampleX = t;
        for (let i = 0; i < 5; i++) {
            const currentX = ((ax * sampleX + bx) * sampleX + cx) * sampleX - t;
            if (Math.abs(currentX) < 1e-4) break;
            const derivativeX = (3.0 * ax * sampleX + 2.0 * bx) * sampleX + cx;
            if (Math.abs(derivativeX) < 1e-3) break;
            sampleX -= currentX / derivativeX;
        }
        
        // Return Y for sampleX
        return ((ay * sampleX + by) * sampleX + cy) * sampleX;
    }
    
    window.PremiumCarousel.SpringSolver = SpringSolver;
    window.PremiumCarousel.easeOutPremium = (t) => cubicBezier(t, 0.22, 1.0, 0.36, 1.0);
})();
