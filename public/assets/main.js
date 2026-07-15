document.addEventListener('DOMContentLoaded', function() {
    // Horizontal Swiper Slider Navigation Logic
    const viewport = document.getElementById('portfolio-slider-viewport');
    const prevStackBtn = document.getElementById('portfolio-prev');
    const nextStackBtn = document.getElementById('portfolio-next');

    if (viewport && prevStackBtn && nextStackBtn) {
        // Calculate dynamic card scroll step width
        const getScrollStep = () => {
            const firstCard = viewport.querySelector('.portfolio-slide-card:not(.hide)');
            if (firstCard) {
                return firstCard.getBoundingClientRect().width + 35; // card width + gap
            }
            return 340; // Default fallback scroll step
        };

        const slideNext = () => {
            const step = getScrollStep();
            const maxScrollLeft = viewport.scrollWidth - viewport.clientWidth;
            
            // Check if we are at the end (with a 5px threshold for rounding errors)
            if (viewport.scrollLeft >= maxScrollLeft - 5) {
                // Wrap around back to the beginning smoothly
                viewport.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                viewport.scrollBy({ left: step, behavior: 'smooth' });
            }
        };

        const slidePrev = () => {
            const step = getScrollStep();
            if (viewport.scrollLeft <= 5) {
                // Wrap around to the end smoothly
                const maxScrollLeft = viewport.scrollWidth - viewport.clientWidth;
                viewport.scrollTo({ left: maxScrollLeft, behavior: 'smooth' });
            } else {
                viewport.scrollBy({ left: -step, behavior: 'smooth' });
            }
        };

        nextStackBtn.addEventListener('click', (e) => {
            e.preventDefault();
            slideNext();
            resetAutoplay(); // Reset timer on manual interaction
        });

        prevStackBtn.addEventListener('click', (e) => {
            e.preventDefault();
            slidePrev();
            resetAutoplay(); // Reset timer on manual interaction
        });

        // Autoplay Logic
        let autoplayInterval;
        const AUTOPLAY_DELAY = 3500; // Slide every 3.5 seconds

        const startAutoplay = () => {
            stopAutoplay(); // Ensure no duplicate intervals
            autoplayInterval = setInterval(() => {
                slideNext();
            }, AUTOPLAY_DELAY);
        };

        const stopAutoplay = () => {
            if (autoplayInterval) {
                clearInterval(autoplayInterval);
            }
        };

        const resetAutoplay = () => {
            stopAutoplay();
            startAutoplay();
        };

        // Start autoplay on load
        startAutoplay();

        // Pause autoplay on mouse enter / resume on mouse leave
        viewport.addEventListener('mouseenter', stopAutoplay);
        viewport.addEventListener('mouseleave', startAutoplay);
        
        // Support touch events (for mobile devices)
        viewport.addEventListener('touchstart', stopAutoplay, { passive: true });
        viewport.addEventListener('touchend', startAutoplay, { passive: true });
    }

    // Homepage Portfolio Slider Card Filtering by Category
    const filterTabBtns = document.querySelectorAll('.portfolio-tab-btn');
    const slideCards = document.querySelectorAll('.portfolio-slide-card');

    if (filterTabBtns.length > 0 && slideCards.length > 0) {
        filterTabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Set active class
                filterTabBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                slideCards.forEach(card => {
                    const cardCat = card.getAttribute('data-category');
                    card.classList.remove('show', 'hide');

                    if (filterValue === 'all' || cardCat === filterValue) {
                        card.classList.add('show');
                    } else {
                        card.classList.add('hide');
                    }
                });

                // Reset scroll position of the viewport to the start when filter changes
                if (viewport) {
                    viewport.scrollLeft = 0;
                }
            });
        });
    }

    // Toast Notification System
    const showToast = (message, type) => {
        let container = document.querySelector('.toast-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'toast-container';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = 'toast-item';
        
        let iconSvg = '';
        if (type === 'like') {
            toast.style.borderColor = 'rgba(255, 62, 108, 0.3)';
            iconSvg = `<span class="toast-icon like"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></span>`;
        } else if (type === 'save') {
            toast.style.borderColor = 'rgba(249, 199, 0, 0.3)';
            iconSvg = `<span class="toast-icon save"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></span>`;
        }

        toast.innerHTML = `${iconSvg}<span>${message}</span>`;
        container.appendChild(toast);

        // Trigger reflow & show
        setTimeout(() => toast.classList.add('show'), 50);

        // Hide and remove
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 400);
        }, 2800);
    };

    // Load persisted state from LocalStorage
    let likedProjects = JSON.parse(localStorage.getItem('liked_projects')) || [];
    let savedProjects = JSON.parse(localStorage.getItem('saved_projects')) || [];

    // Initialize button states from persisted LocalStorage values
    const initPersistedStates = () => {
        document.querySelectorAll('.portfolio-slide-card').forEach(card => {
            const projectId = card.getAttribute('data-project-id');
            if (!projectId) return;

            const loveBtn = card.querySelector('.love-btn');
            const saveBtn = card.querySelector('.save-btn');

            if (loveBtn && likedProjects.includes(projectId)) {
                loveBtn.classList.add('active-love');
                const svg = loveBtn.querySelector('svg');
                if (svg) {
                    svg.setAttribute('fill', '#ff3e6c');
                    svg.setAttribute('stroke', '#ff3e6c');
                }
            }

            if (saveBtn && savedProjects.includes(projectId)) {
                saveBtn.classList.add('active-save');
                const svg = saveBtn.querySelector('svg');
                if (svg) {
                    svg.setAttribute('fill', '#F9C700');
                    svg.setAttribute('stroke', '#F9C700');
                }
            }
        });
    };
    initPersistedStates();

    // Love & Bookmark buttons interactivity
    const loveBtns = document.querySelectorAll('.love-btn');
    const saveBtns = document.querySelectorAll('.save-btn');

    loveBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const card = this.closest('.portfolio-slide-card');
            const projectId = card ? card.getAttribute('data-project-id') : null;
            const projectTitle = card ? (card.getAttribute('data-project-title') || 'Project') : 'Project';

            this.classList.toggle('active-love');
            const svg = this.querySelector('svg');
            
            if (this.classList.contains('active-love')) {
                if (svg) {
                    svg.setAttribute('fill', '#ff3e6c');
                    svg.setAttribute('stroke', '#ff3e6c');
                }
                this.style.transform = 'scale(1.2)';
                setTimeout(() => this.style.transform = '', 200);

                // Add to localStorage if it's a valid project ID
                if (projectId && !likedProjects.includes(projectId)) {
                    likedProjects.push(projectId);
                    localStorage.setItem('liked_projects', JSON.stringify(likedProjects));
                }
                showToast(`Liked "${projectTitle}"`, 'like');
            } else {
                if (svg) {
                    svg.setAttribute('fill', 'none');
                    svg.setAttribute('stroke', 'currentColor');
                }
                // Remove from localStorage
                if (projectId) {
                    likedProjects = likedProjects.filter(id => id !== projectId);
                    localStorage.setItem('liked_projects', JSON.stringify(likedProjects));
                }
                showToast(`Removed like from "${projectTitle}"`, 'like');
            }
        });
    });

    saveBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const card = this.closest('.portfolio-slide-card');
            const projectId = card ? card.getAttribute('data-project-id') : null;
            const projectTitle = card ? (card.getAttribute('data-project-title') || 'Project') : 'Project';

            this.classList.toggle('active-save');
            const svg = this.querySelector('svg');

            if (this.classList.contains('active-save')) {
                if (svg) {
                    svg.setAttribute('fill', '#F9C700');
                    svg.setAttribute('stroke', '#F9C700');
                }
                this.style.transform = 'scale(1.2)';
                setTimeout(() => this.style.transform = '', 200);

                // Add to localStorage
                if (projectId && !savedProjects.includes(projectId)) {
                    savedProjects.push(projectId);
                    localStorage.setItem('saved_projects', JSON.stringify(savedProjects));
                }
                showToast(`Saved "${projectTitle}" to bookmarks`, 'save');
            } else {
                if (svg) {
                    svg.setAttribute('fill', 'none');
                    svg.setAttribute('stroke', 'currentColor');
                }
                // Remove from localStorage
                if (projectId) {
                    savedProjects = savedProjects.filter(id => id !== projectId);
                    localStorage.setItem('saved_projects', JSON.stringify(savedProjects));
                }
                showToast(`Removed "${projectTitle}" from bookmarks`, 'save');
            }
        });
    });

    // Video Modal Logic
    const gridEl = document.getElementById('portfolio-grid');
    const sliderViewport = document.getElementById('portfolio-slider-viewport');
    const modal = document.getElementById('video-modal');
    const iframe = document.getElementById('modal-video-iframe');
    const videoPlayer = document.getElementById('modal-video-player');
    const closeBtn = document.getElementById('modal-close-btn');

    if (modal && (iframe || videoPlayer) && closeBtn) {
        const openModal = (card) => {
            const videoId = card.getAttribute('data-video-id');
            const videoPath = card.getAttribute('data-video-path');

            const modalContent = modal.querySelector('.modal-content');
            const iframeContainer = modal.querySelector('.iframe-container');
            const imagePlayer = modal.querySelector('#modal-image-player');
            
            if (modalContent) modalContent.classList.remove('modal-vertical');
            if (iframeContainer) iframeContainer.classList.remove('modal-vertical');

            // Hide everything by default
            if (iframe) iframe.style.display = 'none';
            if (videoPlayer) videoPlayer.style.display = 'none';
            if (imagePlayer) imagePlayer.style.display = 'none';

            // Show native cursor inside modal
            document.body.classList.add('modal-active');
            document.body.style.overflow = 'hidden';

            if (videoPath) {
                videoPlayer.src = `/videos/${videoPath}`;
                videoPlayer.style.display = 'block';
                if (iframeContainer) iframeContainer.style.display = 'block';
                modal.classList.add('active');
            } else if (videoId) {
                if (videoId.startsWith('instagram:')) {
                    const igId = videoId.replace('instagram:', '');
                    iframe.src = `https://www.instagram.com/reel/${igId}/embed`;
                    if (modalContent) modalContent.classList.add('modal-vertical');
                    if (iframeContainer) iframeContainer.classList.add('modal-vertical');
                } else if (videoId.length > 20) {
                    iframe.src = `https://drive.google.com/file/d/${videoId}/preview`;
                } else {
                    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                }
                iframe.style.display = 'block';
                if (iframeContainer) iframeContainer.style.display = 'block';
                modal.classList.add('active');
            } else {
                // Image/Graphic item!
                const imgEl = card.querySelector('img');
                if (imgEl && imagePlayer) {
                    imagePlayer.src = imgEl.src;
                    imagePlayer.style.display = 'block';
                    if (iframeContainer) iframeContainer.style.display = 'none';
                    modal.classList.add('active');
                }
            }
        };

        // Event delegation for dynamic portfolio filter grid
        if (gridEl) {
            gridEl.addEventListener('click', (e) => {
                const card = e.target.closest('.project-card, .video-card');
                if (card) {
                    if (e.target.closest('.card-icon-btn')) return;
                    openModal(card);
                }
            });
        }

        // Click handler for portfolio slider cards (both videos and graphics)
        if (sliderViewport) {
            sliderViewport.addEventListener('click', (e) => {
                const card = e.target.closest('.portfolio-slide-card');
                if (card) {
                    if (e.target.closest('.card-action-btn')) return;
                    openModal(card);
                }
            });
        }

        // General click triggers for any other .video-card or service card mockup elements on homepage
        document.querySelectorAll('.service-card-mockup, .card-right-image').forEach(card => {
            card.addEventListener('click', () => {
                openModal(card);
            });
        });

        const closeModal = () => {
            modal.classList.remove('active');
            if (iframe) iframe.src = '';
            if (videoPlayer) videoPlayer.src = '';
            const imagePlayer = modal.querySelector('#modal-image-player');
            if (imagePlayer) imagePlayer.src = '';
            
            if (iframe) iframe.style.display = 'none';
            if (videoPlayer) videoPlayer.style.display = 'none';
            if (imagePlayer) imagePlayer.style.display = 'none';
            
            document.body.style.overflow = '';
            document.body.classList.remove('modal-active'); // Restore custom cursor
            try {
                videoPlayer.pause();
            } catch(e) {}
        };

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close on ESC key press
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    }

    // ==========================================
    // 1. SCROLL REVEAL INTERSECTION OBSERVER
    // ==========================================
    const revealElements = document.querySelectorAll('.reveal');
    
    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, {
            root: null, // viewport
            threshold: 0.05, // trigger when 5% is visible
            rootMargin: '0px 0px -40px 0px' // trigger slightly before bottom of screen
        });
        
        revealElements.forEach(el => revealObserver.observe(el));
    }

    // ==========================================
    // 2. INTERACTIVE CARD HOVER GLOWS
    // ==========================================
    const glowCards = document.querySelectorAll('.project-card, .service-card-old, .pricing-card-v3, .portfolio-slide-card, .collage-card-v6');
    
    glowCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left; // x position relative to card
            const y = e.clientY - rect.top;  // y position relative to card
            
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // ==========================================
    // 3. PREMIUM CUSTOM MOUSE FOLLOWER (CURSOR)
    // ==========================================
    const initCustomCursor = () => {
        if (window.matchMedia('(pointer: fine)').matches) {
            const cursor = document.createElement('div');
            cursor.className = 'custom-cursor';
            const ring = document.createElement('div');
            ring.className = 'custom-cursor-ring';
            
            document.body.appendChild(cursor);
            document.body.appendChild(ring);
            document.body.classList.add('custom-cursor-active');

            let mouseX = 0, mouseY = 0;
            let ringX = 0, ringY = 0;
            let isMouseMoving = false;
            
            cursor.style.opacity = '0';
            ring.style.opacity = '0';

            document.addEventListener('mousemove', (e) => {
                if (!isMouseMoving) {
                    isMouseMoving = true;
                    cursor.style.opacity = '1';
                    ring.style.opacity = '1';
                }
                
                mouseX = e.clientX;
                mouseY = e.clientY;
                
                cursor.style.left = `${mouseX}px`;
                cursor.style.top = `${mouseY}px`;
            });

            // Smooth interpolation (LERP) for ring lag
            const animateRing = () => {
                ringX += (mouseX - ringX) * 0.12;
                ringY += (mouseY - ringY) * 0.12;
                
                ring.style.left = `${ringX}px`;
                ring.style.top = `${ringY}px`;
                
                requestAnimationFrame(animateRing);
            };
            animateRing();

            // Hover Morph Target Selector
            const hoverTargets = 'a, button, select, input, textarea, .filter-btn, .project-card, .service-card-old, .love-btn, .save-btn, .btn-view-more, .btn-contact, .service-preview-capsule, .services-featured-card, .modal-close-btn, .portfolio-slide-card, .collage-card-v6';
            
            document.addEventListener('mouseover', (e) => {
                if (e.target.closest(hoverTargets)) {
                    document.body.classList.add('cursor-hover');
                }
                if (e.target.closest('.play-overlay, .capsule-play-btn, .featured-play-btn, .iframe-container')) {
                    document.body.classList.add('cursor-video');
                }
            });

            document.addEventListener('mouseout', (e) => {
                if (e.target.closest(hoverTargets)) {
                    if (!e.relatedTarget || !e.relatedTarget.closest(hoverTargets)) {
                        document.body.classList.remove('cursor-hover');
                    }
                }
                if (e.target.closest('.play-overlay, .capsule-play-btn, .featured-play-btn, .iframe-container')) {
                    if (!e.relatedTarget || !e.relatedTarget.closest('.play-overlay, .capsule-play-btn, .featured-play-btn, .iframe-container')) {
                        document.body.classList.remove('cursor-video');
                    }
                }
            });
            
            document.addEventListener('mouseleave', () => {
                cursor.style.opacity = '0';
                ring.style.opacity = '0';
                isMouseMoving = false;
            });
        }
    };

    initCustomCursor();

    // ==========================================
    // 4. SMOOTH SCROLL TO TOP
    // ==========================================
    const scrollTopBtn = document.getElementById('scroll-top-btn');
    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ==========================================
    // 5. DYNAMIC CONTACT FORM SUBMISSION (AJAX)
    // ==========================================
    const contactForm = document.getElementById('contact-form');
    const contactSubmitBtn = document.getElementById('contact-submit-btn');
    const contactAlert = document.getElementById('contact-form-alert');

    if (contactForm && contactSubmitBtn && contactAlert) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Disable button and show spinner
            const originalBtnContent = contactSubmitBtn.innerHTML;
            contactSubmitBtn.disabled = true;
            contactSubmitBtn.innerHTML = `<span>Sending...</span><svg class="spinner" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,0.2)"></circle><path d="M4 12a8 8 0 0 1 8-8"></path></svg>`;

            const formData = new FormData(contactForm);
            const actionUrl = contactForm.getAttribute('action');

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Restore button state
                contactSubmitBtn.disabled = false;
                contactSubmitBtn.innerHTML = originalBtnContent;

                if (data.success) {
                    // Success state styling
                    contactAlert.style.borderColor = 'rgba(249, 199, 0, 0.4)';
                    contactAlert.style.background = 'rgba(249, 199, 0, 0.08)';
                    contactAlert.style.color = 'var(--primary-color)';
                    contactAlert.textContent = data.message;
                    contactAlert.style.display = 'block';
                    
                    // Reset fields
                    contactForm.reset();

                    // Scroll to alert
                    contactAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

                    // Auto hide after 8s
                    setTimeout(() => {
                        contactAlert.style.display = 'none';
                    }, 8000);
                } else {
                    // Validation or logical error
                    contactAlert.style.borderColor = 'rgba(255, 62, 108, 0.4)';
                    contactAlert.style.background = 'rgba(255, 62, 108, 0.08)';
                    contactAlert.style.color = '#ff3e6c';
                    contactAlert.textContent = 'Invalid input fields. Please correct and try again.';
                    contactAlert.style.display = 'block';
                }
            })
            .catch(error => {
                contactSubmitBtn.disabled = false;
                contactSubmitBtn.innerHTML = originalBtnContent;

                contactAlert.style.borderColor = 'rgba(255, 62, 108, 0.4)';
                contactAlert.style.background = 'rgba(255, 62, 108, 0.08)';
                contactAlert.style.color = '#ff3e6c';
                contactAlert.textContent = 'Server error! Please check your connection and try again.';
                contactAlert.style.display = 'block';
            });
        });
    }

    // ==========================================
    // 6. AUTO SELECT PLAN FROM GET STARTED BUTTONS
    // ==========================================
    const getStartedBtns = document.querySelectorAll('.get-started-btn');
    const formSubjectSelect = document.getElementById('form-subject');

    if (getStartedBtns.length > 0 && formSubjectSelect) {
        getStartedBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const planValue = btn.getAttribute('data-plan');
                if (planValue) {
                    formSubjectSelect.value = planValue;
                }
            });
        });
    }



    // ==========================================
    // 8. 3D INTERACTIVE TILT FOR SHOWREEL CARD
    // ==========================================
    const showreelCard = document.querySelector('.about-showreel-container');
    if (showreelCard) {
        showreelCard.addEventListener('mousemove', (e) => {
            const rect = showreelCard.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const xc = rect.width / 2;
            const yc = rect.height / 2;
            const angleX = (yc - y) / 18; // Subtle rotation on X
            const angleY = (x - xc) / 18; // Subtle rotation on Y
            
            showreelCard.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) translateY(-5px)`;
        });
        
        showreelCard.style.transition = 'transform 0.15s ease, box-shadow 0.3s ease';
        
        showreelCard.addEventListener('mouseleave', () => {
            showreelCard.style.transition = 'transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.6s ease';
            showreelCard.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)`;
        });
    }

    // ==========================================
    // 9. CLICK HANDLER FOR PREMIUM 3D CAROUSEL CARDS
    // ==========================================
    const premiumTrack = document.querySelector('.premium-carousel-track');
    if (premiumTrack) {
        premiumTrack.addEventListener('click', (e) => {
            if (window.isCarouselDragging) return;
            
            const card = e.target.closest('.premium-carousel-card.active-card');
            if (card) {
                openModal(card);
            }
        });
    }
    // ==========================================
    // 10. FLOATING BOTTOM NAVBAR SCROLLSPY
    // ==========================================
    const bottomNavLinks = document.querySelectorAll('.bottom-nav-link');
    const sections = document.querySelectorAll('section[id]');

    if (bottomNavLinks.length > 0 && sections.length > 0) {
        const spyScroll = () => {
            let currentSectionId = 'home';
            const scrollPos = window.scrollY + window.innerHeight / 3;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    currentSectionId = sectionId;
                }
            });

            // Special check: if scrolled to the absolute bottom of the page, activate contact link
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50) {
                currentSectionId = 'contact';
            }

            bottomNavLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === currentSectionId) {
                    link.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', spyScroll);
        spyScroll(); // Run once on load
        
        // Smooth scrolling fallback check
        bottomNavLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - 30,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
});
