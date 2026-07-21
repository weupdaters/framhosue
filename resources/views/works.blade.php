<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site_settings['meta_title'] ?? 'Explore Portfolio | Fame House' }}</title>
    <meta name="description" content="{{ $site_settings['meta_description'] ?? '' }}">
    <meta name="keywords" content="{{ $site_settings['meta_keywords'] ?? '' }}">
    <!-- Import style.css from public/assets -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}?v={{ time() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @if(isset($site_settings['analytics_code']) && $site_settings['analytics_code'])
        {!! $site_settings['analytics_code'] !!}
    @endif
</head>
<body class="works-archive-body">

    <!-- Minimal Header Nav -->
    <nav class="works-header-nav">
        <div class="works-nav-container">
            <a href="{{ route('home') }}" class="back-home-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                <span>Back to Home</span>
            </a>
            <a href="{{ route('home') }}" class="logo-link">
                <div class="logo-wrapper">
                    <img src="{{ isset($site_settings['site_logo']) && $site_settings['site_logo'] ? asset('images/' . $site_settings['site_logo']) : asset('images/final short form logo.png') }}" alt="Logo" class="nav-logo" style="height: 50px;">
                </div>
            </a>
            <div style="display: flex; align-items: center; gap: 0.8rem;">
                <a href="{{ route('home') }}#contact" class="top-nav-btn">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Contact Us
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <section class="works-archive-section">
        <div class="works-title-block">
            <span class="portfolio-tag">CREATIVE ARCHIVE</span>
            <h1 class="works-archive-title">Our Complete Portfolio</h1>
            <p class="works-archive-desc">
                Browse through all our commercial campaigns, video edits, high-impact social reels, and premium graphic design templates.
            </p>
        </div>

        <!-- Filter Tab Buttons -->
        <div class="works-filter-nav">
            <button class="works-tab-btn active" data-filter="all">All Works</button>
            @foreach(\App\Models\Category::all() as $cat)
                <button class="works-tab-btn" data-filter="{{ $cat->slug }}">{{ $cat->name }}</button>
            @endforeach
        </div>

        <!-- Works Grid -->
        <div class="works-archive-grid">
            
            @foreach($projects as $project)
                <!-- Dynamic Archive Card -->
                <div class="archive-card {{ ($project->video_id || $project->video_path) ? 'video-card' : '' }} {{ $project->is_vertical_reel ? 'card-vertical-reel' : '' }}" data-category="{{ $project->category }}" {!! $project->video_id ? 'data-video-id="' . e($project->video_id) . '"' : '' !!} {!! $project->video_path ? 'data-video-path="' . e($project->video_path) . '"' : '' !!}>
                    <div class="archive-card-img-wrapper">
                        <img src="{{ asset('images/' . $project->image_path) }}" alt="{{ $project->title }}">
                        @if($project->video_id || $project->video_path)
                            <div class="archive-play-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            </div>
                        @endif
                    </div>
                    <div class="archive-card-details">
                        <span class="archive-card-category">
                            {{ $project->categoryDetails->name ?? ucfirst($project->category) }}
                        </span>
                        <h3 class="archive-card-title">{{ $project->title }}</h3>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <!-- Video Modal -->
    <div id="video-modal" class="video-modal">
        <div class="modal-content">
            <button class="modal-close-btn" id="modal-close-btn">&times;</button>
            <div class="iframe-container" id="modal-iframe-wrapper">
                <iframe id="modal-video-iframe" src="" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="display: none;"></iframe>
                <video id="modal-video-player" controls autoplay style="display: none; width: 100%; height: auto; border-radius: 12px; max-height: 80vh; background: #000;"></video>
            </div>
            <img id="modal-image-player" src="" style="display: none; width: 100%; height: auto; border-radius: 12px; max-height: 80vh; object-fit: contain; background: #000; margin: 0 auto;">
        </div>
    </div>

    <!-- Script assets for works filtering and playing -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Blurred background helper for contained images
            document.querySelectorAll('.archive-card-img-wrapper').forEach(wrapper => {
                const img = wrapper.querySelector('img');
                if (img) {
                    wrapper.style.setProperty('--bg-image', `url('${img.src}')`);
                }
            });

            // Filter Tabs
            const filterButtons = document.querySelectorAll('.works-tab-btn');
            const archiveCards = document.querySelectorAll('.archive-card');

            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const category = btn.getAttribute('data-filter');

                    archiveCards.forEach(card => {
                        const cardCat = card.getAttribute('data-category');
                        card.classList.remove('show', 'hide');

                        if (category === 'all' || cardCat === category) {
                            card.classList.add('show');
                        } else {
                            card.classList.add('hide');
                        }
                    });
                });
            });

            // Video Playback Modal & Parser Helper
            function parseVideoSource(videoId, videoPath) {
                if (videoPath) {
                    let path = videoPath.startsWith('/') ? videoPath : `{{ asset('videos') }}/${videoPath}`;
                    return { type: 'video', src: path };
                }

                if (!videoId) return null;
                let str = String(videoId).trim();
                if (!str) return null;

                const igMatch = str.match(/(?:instagram\.com\/(?:p|reel|tv)\/|instagram:)([a-zA-Z0-9_-]+)/i);
                if (igMatch) {
                    return {
                        type: 'iframe',
                        src: `https://www.instagram.com/reel/${igMatch[1]}/embed`,
                        isVertical: true
                    };
                }

                const ytIdMatch = str.match(/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/|youtube:)([a-zA-Z0-9_-]{11})/i);
                if (ytIdMatch) {
                    const ytId = ytIdMatch[1];
                    const isShort = str.includes('/shorts/');
                    return {
                        type: 'iframe',
                        src: `https://www.youtube.com/embed/${ytId}?autoplay=1&rel=0`,
                        isVertical: isShort
                    };
                }

                const vmMatch = str.match(/(?:vimeo\.com\/|vimeo:)([0-9]+)/i);
                if (vmMatch) {
                    return {
                        type: 'iframe',
                        src: `https://player.vimeo.com/video/${vmMatch[1]}?autoplay=1`
                    };
                }

                const drMatch = str.match(/(?:drive\.google\.com\/file\/d\/|drive:)([a-zA-Z0-9_-]+)/i);
                if (drMatch) {
                    return {
                        type: 'iframe',
                        src: `https://drive.google.com/file/d/${drMatch[1]}/preview`
                    };
                }

                if (str.startsWith('http://') || str.startsWith('https://')) {
                    if (str.match(/\.(mp4|webm|ogg|mov)(\?.*)?$/i)) {
                        return { type: 'video', src: str };
                    }
                    try {
                        const urlObj = new URL(str);
                        const vParam = urlObj.searchParams.get('v');
                        if (vParam) {
                            return {
                                type: 'iframe',
                                src: `https://www.youtube.com/embed/${vParam}?autoplay=1&rel=0`
                            };
                        }
                    } catch(e) {}
                    return { type: 'iframe', src: str };
                }

                if (/^[a-zA-Z0-9_-]{11}$/.test(str)) {
                    return {
                        type: 'iframe',
                        src: `https://www.youtube.com/embed/${str}?autoplay=1&rel=0`
                    };
                }

                if (str.length > 20) {
                    return {
                        type: 'iframe',
                        src: `https://drive.google.com/file/d/${str}/preview`
                    };
                }

                return {
                    type: 'iframe',
                    src: `https://www.youtube.com/embed/${str}?autoplay=1&rel=0`
                };
            }

            const videoModal = document.getElementById('video-modal');
            const modalIframe = document.getElementById('modal-video-iframe');
            const modalVideoPlayer = document.getElementById('modal-video-player');
            const modalClose = document.getElementById('modal-close-btn');

            // Modal Playback (Videos & Images)
            const clickCards = document.querySelectorAll('.archive-card');

            clickCards.forEach(card => {
                card.addEventListener('click', () => {
                    const videoId = card.getAttribute('data-video-id');
                    const videoPath = card.getAttribute('data-video-path');
                    
                    const modalContent = videoModal.querySelector('.modal-content');
                    const iframeContainer = videoModal.querySelector('.iframe-container');
                    const imagePlayer = videoModal.querySelector('#modal-image-player');
                    
                    if (modalContent) modalContent.classList.remove('modal-vertical');
                    if (iframeContainer) iframeContainer.classList.remove('modal-vertical');

                    // Hide everything by default
                    modalIframe.style.display = 'none';
                    modalIframe.src = '';
                    modalVideoPlayer.style.display = 'none';
                    modalVideoPlayer.src = '';
                    if (imagePlayer) {
                        imagePlayer.style.display = 'none';
                        imagePlayer.src = '';
                    }

                    // Show native cursor inside modal
                    document.body.classList.add('modal-active');

                    const cardIsVertical = card.classList.contains('card-vertical-reel') || card.getAttribute('data-category') === 'reels';
                    const mediaSource = parseVideoSource(videoId, videoPath);

                    if (mediaSource) {
                        if (mediaSource.isVertical || cardIsVertical) {
                            if (modalContent) modalContent.classList.add('modal-vertical');
                            if (iframeContainer) iframeContainer.classList.add('modal-vertical');
                        }

                        if (mediaSource.type === 'video') {
                            modalVideoPlayer.src = mediaSource.src;
                            modalVideoPlayer.style.display = 'block';
                            if (iframeContainer) iframeContainer.style.display = 'block';
                            videoModal.classList.add('active');
                            modalVideoPlayer.play().catch(e => console.log("Native video autoplay blocked:", e));
                        } else if (mediaSource.type === 'iframe') {
                            modalIframe.src = mediaSource.src;
                            modalIframe.style.display = 'block';
                            if (iframeContainer) iframeContainer.style.display = 'block';
                            videoModal.classList.add('active');
                        }
                    } else {
                        // Image/Graphic item!
                        const imgEl = card.querySelector('img');
                        if (imgEl && imagePlayer) {
                            imagePlayer.src = imgEl.src;
                            imagePlayer.style.display = 'block';
                            if (iframeContainer) iframeContainer.style.display = 'none';
                            videoModal.classList.add('active');
                        }
                    }
                });
            });

            const closeModal = () => {
                videoModal.classList.remove('active');
                modalIframe.src = '';
                modalVideoPlayer.src = '';
                const imagePlayer = videoModal.querySelector('#modal-image-player');
                if (imagePlayer) imagePlayer.src = '';
                
                modalVideoPlayer.style.display = 'none';
                modalIframe.style.display = 'none';
                if (imagePlayer) imagePlayer.style.display = 'none';
                
                document.body.classList.remove('modal-active'); // Restore custom cursor
                try {
                    modalVideoPlayer.pause();
                } catch(e) {}
            };

            if (modalClose) {
                modalClose.addEventListener('click', closeModal);
            }

            if (videoModal) {
                videoModal.addEventListener('click', (e) => {
                    if (e.target === videoModal) {
                        closeModal();
                    }
                });
            }
        });
    </script>
</body>
</html>
