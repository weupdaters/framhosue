@php
  $socialPlatforms = [
      'youtube' => [
          'name' => 'YouTube',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>',
          'default_url' => 'https://www.youtube.com/',
      ],
      'instagram' => [
          'name' => 'Instagram',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>',
          'default_url' => 'https://www.instagram.com/famehousemedia/',
      ],
      'linkedin' => [
          'name' => 'LinkedIn',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
          'default_url' => 'https://www.linkedin.com/',
      ],
      'facebook' => [
          'name' => 'Facebook',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
          'default_url' => 'https://www.facebook.com/',
      ],
      'twitter' => [
          'name' => 'Twitter / X',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16h4.267l-11.733 -16z M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/></svg>',
          'default_url' => '#',
      ],
      'tiktok' => [
          'name' => 'TikTok',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>',
          'default_url' => '#',
      ],
      'whatsapp' => [
          'name' => 'WhatsApp',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>',
          'default_url' => '#',
      ],
      'threads' => [
          'name' => 'Threads',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c2.25 0 4.33-.74 6-2l-1.5-1.5c-1.27.96-2.81 1.5-4.5 1.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8v1c0 1.1-.9 2-2 2s-2-.9-2-2v-1c0-2.21-1.79-4-4-4-2.21 0-4 1.79-4 4s1.79 4 4 4c1.1 0 2.1-.45 2.82-1.18.53.7 1.39 1.18 2.38 1.18 2.21 0 4-1.79 4-4v-1c0-5.52-4.48-10-10-10zm0 6c1.1 0 2 .9 2 2v1c0 1.1-.9 2-2 2s-2-.9-2-2v-1c0-1.1.9-2 2-2z"/></svg>',
          'default_url' => '#',
      ],
      'snapchat' => [
          'name' => 'Snapchat',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c-1.2 0-2.4.6-3 1.7A5 5 0 0 0 7.8 7c-.2.9-.1 1.8.2 2.6-.6.6-1 1.4-1.2 2.3a4.7 4.7 0 0 0 3.3 5.4c.5.5.7 1.2.5 1.8a2.3 2.3 0 0 0 2.2 2.3h.4a2.3 2.3 0 0 0 2.2-2.3c-.2-.6 0-1.3.5-1.8a4.7 4.7 0 0 0 3.3-5.4c-.2-.9-.6-1.7-1.2-2.3.3-.8.4-1.7.2-2.6a5 5 0 0 0-1.2-2.3c-.6-1.1-1.8-1.7-3-1.7z"/></svg>',
          'default_url' => '#',
      ],
      'behance' => [
          'name' => 'Behance',
          'icon' =>
              '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M9.667 9.883c1.325-.633 2.017-1.592 2.017-3.083 0-2.525-1.933-3.742-4.65-3.742H0v12.592h7.133c2.833 0 4.958-1.475 4.958-4.058 0-1.733-.892-2.817-2.425-1.709zM3 5.633h3.492c1.3 0 2.117.492 2.117 1.608 0 1.15-1.008 1.7-2.158 1.7H3V5.633zm3.733 7.55H3V9.658h3.733c1.45 0 2.308.575 2.308 1.767 0 1.175-.85 1.758-2.308 1.758zm15.967-5.192H17.325V6.5h5.367v1.492zm-.783 3.792c0-2.508-1.65-4.483-4.442-4.483-2.7 0-4.475 1.975-4.475 4.483 0 2.642 1.892 4.483 4.642 4.483 2.375 0 4.025-1.225 4.358-3.183h-2.283c-.242.733-.967 1.292-2.033 1.292-1.375 0-2.258-.867-2.375-2.175h6.592c.008-.142.017-.267.017-.417zm-6.542-.983c.192-1.142 1.025-1.85 2.15-1.85 1.108 0 1.883.683 2.033 1.85h-4.183z"/></svg>',
          'default_url' => '#',
      ],
  ];
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $site_settings['meta_title'] ?? 'Fame House | Portfolio' }}</title>
  <meta name="description" content="{{ $site_settings['meta_description'] ?? '' }}">
  <meta name="keywords" content="{{ $site_settings['meta_keywords'] ?? '' }}">
  <!-- Import style.css from public/assets -->
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}?v={{ time() }}">
  <link rel="stylesheet" href="{{ asset('assets/premium-carousel/carousel.css') }}?v={{ time() }}">
  <link rel="stylesheet" href="{{ asset('assets/premium-carousel/responsive.css') }}?v={{ time() }}">
  <link rel="icon" type="image/png" href="{{ asset('images/final_short_form.png') }}">

  @if (isset($site_settings['analytics_code']) && $site_settings['analytics_code'])
    {!! $site_settings['analytics_code'] !!}
  @endif
</head>

<body>

  <!-- Sticky Header -->
  <header>
    <div class="nav-container">
      <a href="#" class="logo-link">
        <div class="logo-wrapper">
          <img
            src="{{ isset($site_settings['site_logo']) && $site_settings['site_logo'] ? asset('images/' . $site_settings['site_logo']) : asset('images/final short form logo.png') }}"
            alt="Logo" class="nav-logo">
        </div>
      </a>
      <div class="top-status-badge">
        <span class="status-pulse-dot"></span>
        <span class="status-badge-text">Available for Projects</span>
      </div>
      <div style="display: flex; align-items: center; gap: 0.8rem;">
        <a href="#contact" class="top-nav-btn">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
          Contact Us
        </a>
      </div>
    </div>
  </header>

  <!-- Hero / Video Showcase Section -->
  <section id="home" class="hero">
    <!-- Full Screen Ambient Video Layer -->
    <div class="hero-video-container">
      <video class="hero-bg-video" autoplay loop muted playsinline
        poster="{{ isset($site_settings['hero_poster']) && $site_settings['hero_poster'] ? asset('images/' . $site_settings['hero_poster']) : asset('images/banner.png') }}">
        @if (isset($site_settings['hero_bg_video']) && $site_settings['hero_bg_video'])
          <source src="{{ asset($site_settings['hero_bg_video']) }}" type="video/mp4">
        @elseif(isset($site_settings['hero_bg_video_url']) && $site_settings['hero_bg_video_url'])
          <source src="{{ $site_settings['hero_bg_video_url'] }}" type="video/mp4">
        @else
          <source src="{{ asset('Create_a_second_seamless_lo.mp4') }}" type="video/mp4">
        @endif
      </video>
      <!-- Ambient Cinema Vignette Overlays -->
      <div class="hero-video-overlay-dark"></div>
      <div class="hero-video-overlay-glow"></div>
    </div>

    <!-- Premium Trendy Editorial Content Overlay -->
    <div class="hero-content-wrapper">
      <div class="hero-brand-category">
        <span class="category-dash"></span>
        <span class="category-text">{{ $site_settings['hero_tag'] ?? 'CREATIVE VISION. IMMERSIVE REALITY.' }}</span>
      </div>

      <h1 class="hero-editorial-title">
        {!! $site_settings['hero_title'] ?? 'WE EDIT.<br>WE CREATE.<br><span>WE TELL STORIES.</span>' !!}
      </h1>

      <p class="hero-editorial-desc">
        {{ $site_settings['hero_desc'] ?? 'Crafting premium visual campaigns, cinematic narrative showreels, and dynamic branding reels that leave an indelible impression.' }}
      </p>

      <div class="hero-cta-wrapper">
        <a href="{{ $site_settings['hero_cta1_link'] ?? '#portfolio' }}" class="hero-btn-primary">
          <span class="btn-text">{{ $site_settings['hero_cta1_text'] ?? 'EXPLORE WORKS' }}</span>
          <span class="btn-icon">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </span>
        </a>
        <a href="{{ $site_settings['hero_cta2_link'] ?? '#about' }}" class="hero-btn-secondary">
          <span>{{ $site_settings['hero_cta2_text'] ?? 'THE STUDIO' }}</span>
        </a>
      </div>
    </div>

    <!-- Bottom Page Transition Indicator -->
    <div class="hero-scroll-indicator">
      <span class="indicator-mouse">
        <span class="mouse-wheel"></span>
      </span>
      <span class="indicator-text">SCROLL</span>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="about" class="about-section">
    <div class="about-container">
      <div class="about-content-side">
        <div class="about-tag-row reveal reveal-slide-left">
          <span class="about-tag-badge">CREATIVE PRODUCTION</span>
        </div>
        <h2 class="about-title reveal reveal-slide-left" style="--delay: 1;">
          {!! $site_settings['about_title'] ??
              "WE TELL STORIES <br>\n                    THAT STAY <span class=\"about-italic-highlight\">WITH YOU.</span>" !!}
        </h2>
        <p class="about-desc reveal reveal-slide-left" style="--delay: 2;">
          {{ $site_settings['about_description'] ?? 'Fame House Media is a creative production and branding studio passionate about turning ideas into powerful visual experiences. We blend strategy, storytelling, and cinematic quality to help brands connect, inspire, and stand out.' }}
        </p>

        <div class="about-capsule-features reveal reveal-slide-left" style="--delay: 3;">
          <!-- Item 1 -->
          <div class="capsule-feature-item">
            <div class="capsule-feature-icon-circle">
              <!-- Clapboard icon -->
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                <line x1="7" y1="2" x2="7" y2="22"></line>
                <line x1="17" y1="2" x2="17" y2="22"></line>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <line x1="2" y1="7" x2="7" y2="7"></line>
                <line x1="2" y1="17" x2="7" y2="17"></line>
                <line x1="17" y1="17" x2="22" y2="17"></line>
                <line x1="17" y1="7" x2="22" y2="7"></line>
              </svg>
            </div>
            <span class="capsule-feature-text">COMMERCIAL PRODUCTION</span>
          </div>
          <!-- Item 2 -->
          <div class="capsule-feature-item">
            <div class="capsule-feature-icon-circle">
              <!-- Movie reel frame/wallet icon -->
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect>
                <path d="M12 2v20"></path>
                <path d="M17 5H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z"></path>
              </svg>
            </div>
            <span class="capsule-feature-text">SOCIAL MEDIA CONTENT</span>
          </div>
          <!-- Item 3 -->
          <div class="capsule-feature-item">
            <div class="capsule-feature-icon-circle">
              <!-- Target/Precision icon -->
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="12" r="3"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
              </svg>
            </div>
            <span class="capsule-feature-text">BRAND STORYTELLING</span>
          </div>
        </div>

        <div class="about-contact-social-bar reveal reveal-slide-left" style="--delay: 4;">
          <div class="bar-email">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span>{{ $site_settings['contact_email'] ?? 'famehousemedia@gmail.com' }}</span>
          </div>
          <div class="bar-divider"></div>
          <div class="bar-socials">
            <span class="socials-title">FOLLOW US</span>
            <div class="social-icons-wrapper">
              @foreach ($socialPlatforms as $key => $platform)
                @php
                  $urlKey = $key . '_url';
                  $showKey = 'show_' . $key;
                  $urlValue = $site_settings[$urlKey] ?? '';
                  if (empty($urlValue) && in_array($key, ['youtube', 'instagram', 'linkedin', 'facebook'])) {
                      $urlValue = $platform['default_url'];
                  }
                  $showValue = $site_settings[$showKey] ?? '1';
                @endphp
                @if (!empty($urlValue) && $urlValue !== '#' && $showValue === '1')
                  <a href="{{ $urlValue }}" target="_blank" rel="noopener noreferrer"
                    aria-label="{{ $platform['name'] }}">
                    {!! $platform['icon'] !!}
                  </a>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="about-image-side reveal reveal-zoom-out" style="--delay: 1;">
        <div class="about-showreel-container video-card"
          data-video-id="{{ $site_settings['about_video_id'] ?? '18xUMuIQu_PmSJCCqjxI-gNPflPs4Jxg9' }}">
          <div class="about-showreel-cover"
            style="background-image: url('{{ isset($site_settings['about_thumbnail']) ? asset('images/' . $site_settings['about_thumbnail']) : asset('images/services_camera_bg.png') }}')">
            <!-- Ambient Theater Glow -->
            <div class="showreel-glow-backdrop"></div>

            <!-- Floating Badges -->
            <div class="showreel-badge-top">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" class="star-icon">
                <polygon
                  points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                </polygon>
              </svg>
              <span>WATCH OUR SHOWREEL</span>
            </div>

            <!-- Pulsing Play Button -->
            <div class="showreel-play-btn">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <polygon points="5 3 19 12 5 21 5 3"></polygon>
              </svg>
            </div>

            <!-- Glassmorphic Info Bar -->
            <div class="showreel-info-bar">
              <div class="info-bar-left">
                <span class="pulse-dot"></span>
                <strong>FAME HOUSE MEDIA</strong>
              </div>
              <span class="info-bar-tag">4K ULTRA HD</span>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>

  <section id="portfolio" class="portfolio-section-v5">
    <div class="portfolio-container-v5">
      <!-- Header Row matching pricing header -->
      <div class="portfolio-header-v3 reveal reveal-slide-left">
        <div class="portfolio-tag-row-v3">
          <span class="portfolio-tag-v3">CREATIVE SHOWCASE</span>
          <span class="portfolio-tag-line-v3"></span>
        </div>

        <div class="portfolio-title-row-v3">
          <div class="portfolio-title-container-v3">
            <h2 class="portfolio-title-v3">
              Featured <br>
              <span>Projects</span>
            </h2>
            <div class="portfolio-brush-line-v3"></div>
          </div>

          <div class="portfolio-desc-wrapper-v3">
            <p class="portfolio-subtitle-v3">
              Explore commercials, cinematic films, YouTube productions, social media campaigns, motion graphics, and
              branding projects created to help clients grow.
            </p>
            <div class="slider-controls-v5">
              <a href="{{ route('works') }}" class="view-all-btn-v5" title="View All Works">
                <span class="view-all-dot"></span>
                <span class="view-all-text">VIEW ALL</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </a>
              <button class="control-btn-v5 prev-btn" id="portfolio-prev">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
              </button>
              <button class="control-btn-v5 next-btn" id="portfolio-next">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Filter Categories Row -->
      <div class="portfolio-filter-nav reveal reveal-slide-left" style="--delay: 1.5;">
        <button class="portfolio-tab-btn active" data-filter="all">All Works</button>
        @foreach (\App\Models\Category::all() as $cat)
          <button class="portfolio-tab-btn" data-filter="{{ $cat->slug }}">{{ $cat->name }}</button>
        @endforeach
      </div>

      <!-- Horizontal Slider Viewport -->
      <div class="portfolio-slider-viewport reveal reveal-zoom-out" id="portfolio-slider-viewport">
        <div class="portfolio-slider-track">
          @foreach ($featuredProjects as $project)
            <!-- Dynamic Slide Card -->
            <div class="portfolio-slide-card {{ $project->video_id || $project->video_path ? 'video-card' : '' }}"
              data-project-id="{{ $project->id }}" data-project-title="{{ e($project->title) }}"
              data-category="{{ $project->category }}" data-is-vertical="{{ $project->is_vertical_reel }}"
              {!! $project->video_id ? 'data-video-id="' . e($project->video_id) . '"' : '' !!} {!! $project->video_path ? 'data-video-path="' . e($project->video_path) . '"' : '' !!}>
              <div class="card-img-container">
                <img src="{{ asset('images/' . $project->image_path) }}" alt="{{ $project->title }}">
                @if ($project->video_id || $project->video_path)
                  <div class="card-img-overlay-play" style="opacity: 1; background: rgba(0,0,0,0.4);">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"
                      style="color: var(--primary-color);">
                      <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>
                  </div>
                @endif
              </div>
              <div class="card-actions-row">
                <button class="card-action-btn love-btn" aria-label="Like project">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="heart-icon">
                    <path
                      d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                  </svg>
                </button>
                <button class="card-action-btn save-btn" aria-label="Bookmark project">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="bookmark-icon">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                  </svg>
                </button>
              </div>
              <p class="card-desc-text">
                @php
                  $desc = e($project->description);
                  $keywords = ['KEVENTERS', 'EID', 'EV CHARGER', 'BRAND', 'CELLECOR', 'RATAN TATA'];
                  foreach ($keywords as $kw) {
                      $desc = preg_replace(
                          '/\b(' . preg_quote($kw, '/') . ')\b/i',
                          '<span class="highlight-green">$1</span>',
                          $desc,
                      );
                  }
                @endphp
                {!! $desc !!}
              </p>
            </div>
          @endforeach
        </div>
      </div>


    </div>
  </section>

  {{--
    <!-- 3D Curved Carousel Section -->
    <section id="premium-carousel" class="premium-carousel-section">
        <!-- Background Premium Effects -->
        <div class="premium-bg-effects">
            <div class="premium-radial-glow"></div>
            <div class="premium-noise-overlay"></div>
            <div class="premium-floating-particles"></div>
        </div>

        <div class="premium-carousel-wrapper">
            <!-- Header Block -->
            <div class="premium-header-block">
                <div class="premium-subtitle-container">
                    <span class="premium-subtitle">{{ $site_settings['carousel_subtitle'] ?? 'Behind the Designs' }}</span>
                </div>
                @php
                    $carouselTitle = $site_settings['carousel_title'] ?? "Curious What Else We've Created?";
                    $titleWords = explode(' ', $carouselTitle);
                    $spanWordCount = min(2, count($titleWords));
                    if ($spanWordCount > 0) {
                        $mainTitleText = implode(' ', array_slice($titleWords, 0, count($titleWords) - $spanWordCount));
                        $spanTitleText = implode(' ', array_slice($titleWords, -$spanWordCount));
                    } else {
                        $mainTitleText = $carouselTitle;
                        $spanTitleText = '';
                    }
                @endphp
                <h2 class="premium-title">{!! e($mainTitleText) !!} @if ($spanTitleText) <span>{!! e($spanTitleText) !!}</span> @endif</h2>
                <p class="premium-section-desc">{{ $site_settings['carousel_desc'] ?? 'Explore more brand identities, packaging, and digital design work in our creative showcase.' }}</p>
                <a href="#portfolio" class="premium-cta-btn">
                    <span class="premium-btn-text">{{ $site_settings['carousel_cta_text'] ?? 'See more Projects' }}</span>
                    <span class="premium-btn-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>
            </div>

            <!-- Stage & Track -->
            <div class="premium-carousel-stage">
                <div class="premium-carousel-track">
                    <!-- Project Cards -->
                    @foreach ($featuredProjects as $index => $project)
                        <div class="premium-carousel-card {{ ($project->video_id || $project->video_path) ? 'video-card' : '' }}" 
                             data-index="{{ $index }}"
                             data-project-id="{{ $project->id }}"
                             data-project-title="{{ e($project->title) }}"
                             data-category="{{ $project->category }}"
                             data-is-vertical="{{ $project->is_vertical_reel }}"
                             {!! $project->video_id ? 'data-video-id="' . e($project->video_id) . '"' : '' !!}
                             {!! $project->video_path ? 'data-video-path="' . e($project->video_path) . '"' : '' !!}>
                            <div class="premium-card-inner">
                                <div class="premium-card-img-container">
                                    <img src="{{ asset('images/' . $project->image_path) }}" alt="{{ $project->title }}" loading="lazy">
                                    
                                    <!-- Premium reflection inside overlay -->
                                    <div class="premium-card-overlay">
                                        <div class="premium-card-meta">
                                            <span class="premium-card-tag">{{ $project->categoryDetails->name ?? ucfirst(str_replace('-', ' ', $project->category)) }}</span>
                                            <h3 class="premium-card-title">{{ $project->title }}</h3>
                                            <p class="premium-card-desc">
                                                {{ Str::limit($project->description, 85, '...') }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Active Card Hover Indicator -->
                                    @if ($project->video_id || $project->video_path)
                                        <div class="premium-play-indicator" aria-label="Play Reel">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Autoplay-only Carousel -->
        </div>
    </section>
    --}}


  <!-- Portfolio Showcase Section -->
  <section id="services" class="services-section-v3">
    <!-- Ambient Glowing Lights -->
    <div class="services-ambient-glow"></div>
    <div class="services-ambient-glow-2"></div>

    <div class="services-container-v3">
      <!-- Header Row matching pricing header -->
      <div class="services-header-v3 reveal reveal-slide-left">
        <div class="services-tag-row-v3">
          <span class="services-tag-v3">OUR CORE CAPABILITIES</span>
          <span class="services-tag-line-v3"></span>
        </div>

        <div class="services-title-row-v3">
          <div class="services-title-container-v3">
            <h2 class="services-title-v3">
              Creative Services That<br>
              <span> Grows Bran.</span>
            </h2>
            <div class="services-brush-line-v3"></div>
          </div>

          <div class="services-desc-col-v3">
            <p class="services-desc-text-v3">
              From concept to final delivery, we provide cinematography, video production, editing, motion graphics, and
              creative design to help brands tell better stories..
            </p>
          </div>
        </div>
      </div>

      <!-- Grid matching reference mockup layout -->
      <div class="services-grid-mockup">
        @foreach ($services as $index => $service)
          <!-- Dynamic Service Card: {{ $service->title }} -->
          <div class="service-card-mockup reveal reveal-slide-up" style="--delay: {{ $index }};">
            <div class="card-left-content">
              <div>
                <span class="service-badge-mockup">{{ $service->service_code }}</span>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
              </div>
              @if ($service->video_id)
                <button class="btn-service-mockup video-card" data-video-id="{{ $service->video_id }}">
                  <span>Watch video</span>
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </button>
              @else
                <a href="{{ route('works') }}" class="btn-service-mockup">
                  <span>View Gallery</span>
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
              @endif
            </div>

            @if ($service->video_id)
              <div class="card-right-image video-card" data-video-id="{{ $service->video_id }}">
                <div class="services-big-icon-wrapper">
                  @if (($service->icon_type ?? 'camera') === 'play')
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"
                      class="services-big-icon">
                      <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>
                  @else
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="services-big-icon">
                      <rect x="2" y="6" width="14" height="12" rx="2" ry="2" />
                      <rect x="5" y="9" width="8" height="6" rx="0.5" ry="0.5" />
                      <path d="M7 3h8" />
                      <path d="M9 3v3" />
                      <path d="M13 3v3" />
                      <path d="M16 10l6-3v10l-6-3z" />
                    </svg>
                  @endif
                </div>
              </div>
            @else
              <div class="card-right-image">
                <div class="services-big-icon-wrapper">
                  @if (($service->icon_type ?? 'camera') === 'play')
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"
                      class="services-big-icon">
                      <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>
                  @else
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="services-big-icon">
                      <rect x="2" y="6" width="14" height="12" rx="2" ry="2" />
                      <rect x="5" y="9" width="8" height="6" rx="0.5" ry="0.5" />
                      <path d="M7 3h8" />
                      <path d="M9 3v3" />
                      <path d="M13 3v3" />
                      <path d="M16 10l6-3v10l-6-3z" />
                    </svg>
                  @endif
                </div>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Pricing Section (Mockup Style) -->
  <section id="pricing" class="pricing-section-v3">
    <div class="pricing-container-v3">
      <!-- Header -->
      <div class="pricing-header-v3 reveal reveal-slide-left">
        <div class="pricing-tag-row-v3">
          <span class="pricing-tag-v3">PRICING & PLANS</span>
          <span class="pricing-tag-line-v3"></span>
        </div>
        <div class="pricing-title-row-v3">
          <div class="pricing-title-container-v3">
            <h2 class="pricing-title-v3">
              Flexible Pricing <br>
              <span>Built For Creators & Brands.</span>
            </h2>
            <div class="pricing-brush-line-v3"></div>
          </div>
          <p class="pricing-subtitle-v3">
            Choose the perfect package for your brand. Get premium cinematic edits, high-retention social content, and
            professional design assets at a simple, flat monthly rate.
          </p>
        </div>
      </div>

      <div class="pricing-content-layout" style="margin-top: 3rem;">
        <div class="contact-form-col reveal reveal-zoom-in"
          style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); border-radius: 24px; padding: 3.5rem; position: relative; backdrop-filter: blur(10px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4); box-sizing: border-box; width: 100%;">
          <!-- Top neon green glow border -->
          <div
            style="position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, transparent 0%, var(--primary-color) 50%, transparent 100%);">
          </div>

          <form action="{{ route('contact.submit') }}" method="POST" class="contact-glass-form" id="contact-form"
            style="display: flex; flex-direction: column; gap: 1.8rem;">
            @csrf

            <!-- Form Header / Multi-Step Progress Tracker -->
            <div class="step-progress-wrapper">
              <div class="step-progress-bar">
                <div class="step-progress-fill" id="step-progress-fill"></div>
              </div>
              <div class="step-nodes">
                <div class="step-node active" data-step="1">
                  <div class="node-circle">1</div>
                  <span class="node-label">Service</span>
                </div>
                <div class="step-node" data-step="2">
                  <div class="node-circle">2</div>
                  <span class="node-label">Budget</span>
                </div>
                <div class="step-node" data-step="3">
                  <div class="node-circle">3</div>
                  <span class="node-label">Vision</span>
                </div>
                <div class="step-node" data-step="4">
                  <div class="node-circle">4</div>
                  <span class="node-label">Details</span>
                </div>
              </div>
            </div>

            <div id="contact-form-alert"
              style="display: none; margin-bottom: 1.5rem; padding: 1.2rem; border-radius: 16px; font-size: 0.9rem; line-height: 1.4; border: 1px solid rgba(184, 255, 52, 0.25); background: rgba(184, 255, 52, 0.08); color: var(--primary-color); box-shadow: 0 10px 20px rgba(184, 255, 52, 0.05);">
            </div>

            <!-- Step 1: Services -->
            <div class="form-step active" id="step-1">
              <div class="step-header">
                <h3>What service package are you interested in?</h3>
                <p>Select the option that best matches your project needs.</p>
              </div>
              <input type="hidden" name="subject" id="selected-subject" value="" required>

              <div class="options-grid scrollable-options">
                <!-- Option 1: Commercial Video -->
                <div class="option-card" data-value="Cinematic Video Editing">
                  <div class="option-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2">
                      <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                      <line x1="7" y1="2" x2="7" y2="22"></line>
                      <line x1="17" y1="2" x2="17" y2="22"></line>
                      <line x1="2" y1="12" x2="22" y2="12"></line>
                    </svg>
                  </div>
                  <div class="option-meta">
                    <h4>Cinematic Video Editing</h4>
                    <p>Commercials, ads, promo videos</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <!-- Option 2: Shorts & Reels -->
                <div class="option-card" data-value="Vertical Reels & Shorts">
                  <div class="option-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2">
                      <rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect>
                      <path d="M12 2v20"></path>
                    </svg>
                  </div>
                  <div class="option-meta">
                    <h4>Vertical Reels & Shorts</h4>
                    <p>Instagram Reels, YouTube Shorts, TikToks</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <!-- Option 3: Graphic Design -->
                <div class="option-card" data-value="Graphic Design & Thumbnails">
                  <div class="option-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2">
                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                  </div>
                  <div class="option-meta">
                    <h4>Graphic Design & Thumbnails</h4>
                    <p>Posters, banners, YouTube thumbnails</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <!-- Option 4: YouTube Editing -->
                <div class="option-card" data-value="YouTube Production">
                  <div class="option-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2">
                      <path
                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                      </path>
                      <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                    </svg>
                  </div>
                  <div class="option-meta">
                    <h4>YouTube Production</h4>
                    <p>Long-form video editing and production</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <!-- Option 5: Brand Content -->
                <div class="option-card" data-value="Brand Content Strategy">
                  <div class="option-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2">
                      <circle cx="12" cy="12" r="10"></circle>
                      <circle cx="12" cy="12" r="3"></circle>
                      <line x1="12" y1="1" x2="12" y2="3"></line>
                      <line x1="12" y1="21" x2="12" y2="23"></line>
                      <line x1="1" y1="12" x2="3" y2="12"></line>
                      <line x1="21" y1="12" x2="23" y2="12"></line>
                    </svg>
                  </div>
                  <div class="option-meta">
                    <h4>Brand Content Strategy</h4>
                    <p>Video identity, target positioning, scripts</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <!-- Option 6: Custom Request -->
                <div class="option-card" data-value="Custom Content Solution">
                  <div class="option-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2">
                      <circle cx="12" cy="12" r="10"></circle>
                      <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                  </div>
                  <div class="option-meta">
                    <h4>Custom Content Solution</h4>
                    <p>A tailored mix of different production deliverables</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
              </div>

              <div class="step-actions">
                <div></div>
                <button type="button" class="step-btn btn-next" data-next="2">Next Step</button>
              </div>
            </div>

            <!-- Step 2: Budget -->
            <div class="form-step" id="step-2">
              <div class="step-header">
                <h3>What is your estimated monthly budget?</h3>
                <p>This helps us understand the scale and speed of deliverables.</p>
              </div>
              <input type="hidden" name="budget" id="selected-budget" value="">

              <div class="budget-grid">
                <div class="option-card" data-value="1k-10k">
                  <span class="currency-tag">₹</span>
                  <div class="option-meta">
                    <h4>₹1,000 – ₹10,000</h4>
                    <p>Basic or trial package</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <div class="option-card" data-value="10k-30k">
                  <span class="currency-tag">₹₹</span>
                  <div class="option-meta">
                    <h4>₹10,000 – ₹30,000</h4>
                    <p>Standard editing & design support</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <div class="option-card" data-value="30k-100k">
                  <span class="currency-tag">₹₹₹</span>
                  <div class="option-meta">
                    <h4>₹30,000 – ₹1,00,000</h4>
                    <p>Premium content campaigns</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <div class="option-card" data-value="100k-plus">
                  <span class="currency-tag">₹₹₹₹</span>
                  <div class="option-meta">
                    <h4>₹1,00,000+</h4>
                    <p>Full scale enterprise/agency production</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
                <div class="option-card" data-value="Custom Budget" id="custom-budget-card"
                  style="grid-column: span 2;">
                  <span class="currency-tag" style="font-size: 1.2rem;">✍️</span>
                  <div class="option-meta">
                    <h4>Custom Budget / Range</h4>
                    <p>Specify your own budget or custom range</p>
                  </div>
                  <span class="check-circle"></span>
                </div>
              </div>

              <div class="form-group" id="custom-budget-input-wrapper"
                style="display: none; margin-top: 1.5rem; transition: all 0.3s ease;">
                <label for="custom-budget-value"
                  style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: rgba(255, 255, 255, 0.5); font-weight: 700; margin-bottom: 0.6rem; display: block;">Specify
                  Your Budget / Range (₹)</label>
                <input type="text" id="custom-budget-value" placeholder="e.g. ₹50,000 or ₹1,50,000 - ₹2,00,000"
                  style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 1.1rem; color: #fff; width: 100%; box-sizing: border-box;">
              </div>

              <div class="step-actions">
                <button type="button" class="step-btn btn-prev" data-prev="1">Back</button>
                <button type="button" class="step-btn btn-next" data-next="3">Next Step</button>
              </div>
            </div>

            <!-- Step 3: Vision / Message -->
            <div class="form-step" id="step-3">
              <div class="step-header">
                <h3>Tell us about your project vision</h3>
                <p>Describe what you need, timelines, specific examples, or deliverables.</p>
              </div>
              <div class="form-group">
                <textarea id="form-message" name="message" rows="6"
                  placeholder="Describe your brand, editing style preference, quantity of content, or any specific reference works you like..."
                  required></textarea>
              </div>

              <div class="step-actions">
                <button type="button" class="step-btn btn-prev" data-prev="2">Back</button>
                <button type="button" class="step-btn btn-next" data-next="4">Next Step</button>
              </div>
            </div>

            <!-- Step 4: Contact Details -->
            <div class="form-step" id="step-4">
              <div class="step-header">
                <h3>Let's stay connected</h3>
                <p>Provide your contact details so we can send a custom proposal.</p>
              </div>

              <div class="form-group">
                <label for="form-name">Your Full Name</label>
                <input type="text" id="form-name" name="name" placeholder="John Doe" required>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="form-email">Email Address</label>
                  <input type="email" id="form-email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                  <label for="form-phone">Phone Number (Optional)</label>
                  <input type="tel" id="form-phone" name="phone" placeholder="+91 98765 43210">
                </div>
              </div>

              <div class="step-actions" style="margin-top: 2rem;">
                <button type="button" class="step-btn btn-prev" data-prev="3">Back</button>
                <button type="submit" class="contact-submit-btn" id="contact-submit-btn">
                  <span>Send Project Proposal</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </button>
              </div>
              <div class="form-guarantee-badge" style="margin-top: 1.5rem; justify-content: center;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2.5">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <span>100% private & secure. We respond in under 2 hours.</span>
              </div>
            </div>
          </form>
        </div>

        <!-- Right Side: Editorial Callout Card -->
        <div class="pricing-editorial-card reveal reveal-slide-right" style="--delay: 1;">
          <div class="editorial-icon-badge">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
          </div>
          <h3 class="editorial-title">
            One vision.<br>
            Three packages.<br>
            All made to<br>
            <span class="editorial-highlight">scale your brand.</span>
          </h3>
          <div class="editorial-divider"></div>
          <p class="editorial-desc">
            Whether you're a solo creator or a growing agency, we've got a plan that fits your goals.
          </p>
          <div class="editorial-wave-graphic"></div>
        </div>
      </div>

      <!-- Bottom Horizontal Features Bar -->
      <div class="pricing-footer-features-bar reveal reveal-slide-up" style="--delay: 2;">
        <div class="footer-feature-item">
          <div class="feature-icon-wrapper-mini">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
            </svg>
          </div>
          <div class="feature-text-mini">
            <strong>Fast Turnaround</strong>
            <span>On-time, every time.</span>
          </div>
        </div>
        <div class="footer-feature-item">
          <div class="feature-icon-wrapper-mini">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
          </div>
          <div class="feature-text-mini">
            <strong>Premium Quality</strong>
            <span>Top-tier edits & design.</span>
          </div>
        </div>
        <div class="footer-feature-item">
          <div class="feature-icon-wrapper-mini">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
              <path
                d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z">
              </path>
            </svg>
          </div>
          <div class="feature-text-mini">
            <strong>Priority Support</strong>
            <span>We're here to help.</span>
          </div>
        </div>
        <div class="footer-feature-item">
          <div class="feature-icon-wrapper-mini">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
          </div>
          <div class="feature-text-mini">
            <strong>Cancel Anytime</strong>
            <span>No contracts. No hassle.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section">

    <!-- Decorative animated background orbs -->
    <div class="contact-orb contact-orb-1"></div>
    <div class="contact-orb contact-orb-2"></div>

    <div class="contact-container">

      <!-- Top Header Row -->
      <div class="contact-header-row reveal reveal-zoom-out">
        <div class="contact-tag-row">
          <span class="contact-tag">GET IN TOUCH</span>
          <span class="contact-tag-line"></span>
        </div>
        <h2 class="contact-title">Let's Make <span>Something Great.</span></h2>
        <p class="contact-desc">Have an upcoming project, creative campaign, or business query? We'd love to hear it —
          and turn your vision into cinema-quality reality.</p>
      </div>

      <!-- 3 Quick-Info Cards Row -->
      <div class="contact-quick-cards reveal reveal-slide-up" style="--delay: 0.5;">

        <!-- Card: Call -->
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site_settings['contact_phone'] ?? '+919876543210') }}"
          class="contact-quick-card contact-quick-card--call">
          <div class="cqc-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
              </path>
            </svg>
          </div>
          <div class="cqc-content">
            <span class="cqc-label">CALL DIRECTLY</span>
            <strong class="cqc-value">{{ $site_settings['contact_phone'] ?? '+91 98765 43210' }}</strong>
            <span class="cqc-sub">Mon–Sat, 10 AM – 7 PM IST</span>
          </div>
          <div class="cqc-arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
          <span class="cqc-live-dot"></span>
        </a>

        <!-- Card: Email -->
        <a href="mailto:{{ $site_settings['contact_email'] ?? 'famehousemedia@gmail.com' }}"
          class="contact-quick-card">
          <div class="cqc-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </div>
          <div class="cqc-content">
            <span class="cqc-label">EMAIL US</span>
            <strong class="cqc-value">{{ $site_settings['contact_email'] ?? 'famehousemedia@gmail.com' }}</strong>
            <span class="cqc-sub">Response within 2 hours</span>
          </div>
          <div class="cqc-arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>

        <!-- Card: Location -->
        <div class="contact-quick-card">
          <div class="cqc-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </div>
          <div class="cqc-content">
            <span class="cqc-label">STUDIO LOCATION</span>
            <strong class="cqc-value">{{ $site_settings['contact_address'] ?? 'New Delhi, India' }}</strong>
            <span class="cqc-sub">Available for on-site shoots</span>
          </div>
          <div class="cqc-arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </div>

      </div>

      <!-- Main Layout: Left Info + Right Form -->
      <div class="contact-layout">

        <!-- Left Column -->
        <div class="contact-info-col reveal reveal-slide-left" style="--delay: 0.8;">

          <!-- Why work with us -->
          <div class="contact-why-block">
            <h3 class="contact-why-title">Why Choose Us?</h3>
            <ul class="contact-why-list">
              <li>
                <span class="why-icon">✦</span>
                <div>
                  <strong>Cinematic Quality</strong>
                  <p>Every frame crafted with studio-grade equipment and post-production.</p>
                </div>
              </li>
              <li>
                <span class="why-icon">✦</span>
                <div>
                  <strong>On-Time Delivery</strong>
                  <p>We respect your timelines — always delivering ahead of deadlines.</p>
                </div>
              </li>
              <li>
                <span class="why-icon">✦</span>
                <div>
                  <strong>Dedicated Team</strong>
                  <p>A single point of contact who manages your project end-to-end.</p>
                </div>
              </li>
            </ul>
          </div>

          <!-- Social Links -->
          <div class="contact-social-block">
            <span class="contact-social-label">FOLLOW OUR WORK</span>
            <div class="contact-social-links">
              @foreach ($socialPlatforms as $key => $platform)
                @php
                  $urlKey = $key . '_url';
                  $showKey = 'show_' . $key;
                  $urlValue = $site_settings[$urlKey] ?? '';
                  if (empty($urlValue) && in_array($key, ['youtube', 'instagram', 'linkedin', 'facebook'])) {
                      $urlValue = $platform['default_url'];
                  }
                  $showValue = $site_settings[$showKey] ?? '1';
                @endphp
                @if (!empty($urlValue) && $urlValue !== '#' && $showValue === '1')
                  <a href="{{ $urlValue }}" class="contact-social-btn" title="{{ $platform['name'] }}"
                    target="_blank">
                    {!! $platform['icon'] !!}
                    <span>{{ $platform['name'] }}</span>
                  </a>
                @endif
              @endforeach
            </div>
          </div>

        </div>

        <!-- Right Column: Simple General Inquiry Form -->
        <div class="contact-form-col">
          <form action="{{ route('contact.submit') }}" method="POST"
            class="contact-glass-form reveal reveal-zoom-in" id="general-contact-form"
            style="--delay: 1; display: flex; flex-direction: column; gap: 1.5rem;">
            @csrf
            <div class="step-header" style="margin-bottom: 0.5rem;">
              <h3>Send Us A Message</h3>
              <p>For general inquiries, collaboration ideas, or custom projects.</p>
            </div>

            <div id="general-contact-alert"
              style="display: none; margin-bottom: 1rem; padding: 1.2rem; border-radius: 16px; font-size: 0.9rem; line-height: 1.4; border: 1px solid rgba(184, 255, 52, 0.25); background: rgba(184, 255, 52, 0.08); color: var(--primary-color);">
            </div>

            <div class="form-group">
              <label for="general-name">Full Name</label>
              <input type="text" name="name" id="general-name" placeholder="John Doe" required
                style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 1.1rem; color: #fff; width: 100%; box-sizing: border-box;">
            </div>

            <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
              <div class="form-group">
                <label for="general-email">Email Address</label>
                <input type="email" name="email" id="general-email" placeholder="john@example.com" required
                  style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 1.1rem; color: #fff; width: 100%; box-sizing: border-box;">
              </div>
              <div class="form-group">
                <label for="general-phone">Phone Number (Optional)</label>
                <input type="text" name="phone" id="general-phone" placeholder="+91 98765 43210"
                  style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 1.1rem; color: #fff; width: 100%; box-sizing: border-box;">
              </div>
            </div>

            <div class="form-group">
              <label for="general-message">Your Message</label>
              <textarea name="message" id="general-message" rows="5" placeholder="Tell us about your project or inquiry..."
                required
                style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 1.1rem; color: #fff; width: 100%; box-sizing: border-box;"></textarea>
            </div>

            <button type="submit" class="contact-submit-btn" id="general-submit-btn"
              style="border: none; padding: 1rem 2.2rem; border-radius: 12px; font-weight: 700; font-size: 0.9rem; background: var(--primary-color); color: #080a0e; cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;">
              <span>Send Message</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </button>
          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <!-- Footer -->
  <footer class="premium-footer">
    <!-- Huge Background Text -->
    <div class="footer-bg-text">FAME HOUSE</div>

    <div class="footer-main-container">
      <!-- Brand Column -->
      <div class="footer-column brand-column">
        <a href="#" class="logo-link" style="margin-bottom: 1.5rem;">
          <div class="logo-wrapper">
            <img
              src="{{ isset($site_settings['site_logo']) && $site_settings['site_logo'] ? asset('images/' . $site_settings['site_logo']) : asset('images/final short form logo.png') }}"
              alt="Logo" class="nav-logo" style="height: 50px;">
          </div>
        </a>
        <p class="brand-tagline">
          We edit, design, and direct high-impact cinematic stories that capture attention and build legendary digital
          presence.
        </p>
        <div class="footer-social-icons">
          @foreach ($socialPlatforms as $key => $platform)
            @php
              $urlKey = $key . '_url';
              $showKey = 'show_' . $key;
              $urlValue = $site_settings[$urlKey] ?? '';
              if (empty($urlValue) && in_array($key, ['youtube', 'instagram', 'linkedin', 'facebook'])) {
                  $urlValue = $platform['default_url'];
              }
              $showValue = $site_settings[$showKey] ?? '1';
            @endphp
            @if (!empty($urlValue) && $urlValue !== '#' && $showValue === '1')
              <a href="{{ $urlValue }}" target="_blank" rel="noopener noreferrer"
                aria-label="{{ $platform['name'] }}" class="social-icon-btn">
                {!! $platform['icon'] !!}
              </a>
            @endif
          @endforeach
        </div>
      </div>

      <!-- Links Columns -->
      <div class="footer-column links-column">
        <h4 class="footer-title">Explore</h4>
        <ul class="footer-links-list">
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About us</a></li>
          <li><a href="{{ route('works') }}">Our Works</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#pricing">Packages</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>

      <div class="footer-column links-column">
        <h4 class="footer-title">Expertise</h4>
        <ul class="footer-links-list">
          <li><a href="#services">Cinematic Video Editing</a></li>
          <li><a href="#services">Vertical Short Form / Reels</a></li>
          <li><a href="#services">Graphic Design & Thumbnails</a></li>
          <li><a href="#services">YouTube Video Production</a></li>
          <li><a href="#services">Brand Strategy</a></li>
        </ul>
      </div>

      <!-- Contact/Newsletter Column -->
      <div class="footer-column contact-info-column">
        <h4 class="footer-title">Get In Touch</h4>
        <div class="contact-details-list">
          <div class="contact-detail-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <a
              href="mailto:{{ $site_settings['contact_email'] ?? 'famehousemedia@gmail.com' }}">{{ $site_settings['contact_email'] ?? 'famehousemedia@gmail.com' }}</a>
          </div>
          <div class="contact-detail-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span>{{ $site_settings['contact_address'] ?? 'New Delhi, India' }}</span>
          </div>
        </div>
        <div class="newsletter-wrapper">
          <p class="newsletter-text">Subscribe for creative insights & project updates.</p>
          <form class="footer-newsletter-form" onsubmit="event.preventDefault(); alert('Subscribed!');">
            <input type="email" placeholder="Your email address" required>
            <button type="submit" aria-label="Subscribe">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom-bar">
      <div class="footer-bottom-container">
        <p class="copyright-text">
          &copy; {{ date('Y') }} Fame House. Crafted with passion. | Website design by <a
            href="https://www.weupdaters.com" target="_blank" rel="noopener noreferrer"
            style="color: var(--primary-color); text-decoration: none; font-weight: 600; transition: color 0.3s;">Weupdaters</a>
        </p>

        <button class="scroll-top-btn" id="scroll-top-btn" aria-label="Scroll to top">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
          </svg>
        </button>
      </div>
    </div>
  </footer>

  <!-- Video Modal -->
  <div id="video-modal" class="video-modal">
    <div class="modal-content">
      <button class="modal-close-btn" id="modal-close-btn">&times;</button>
      <div class="iframe-container" id="modal-iframe-wrapper">
        <iframe id="modal-video-iframe" src="" frameborder="0" allow="autoplay; fullscreen"
          allowfullscreen style="display: none;"></iframe>
        <video id="modal-video-player" controls autoplay
          style="display: none; width: 100%; height: auto; border-radius: 12px; max-height: 80vh; background: #000;"></video>
      </div>
      <img id="modal-image-player" src=""
        style="display: none; width: 100%; height: auto; border-radius: 12px; max-height: 80vh; object-fit: contain; background: #000; margin: 0 auto;">
    </div>
  </div>

  <!-- Floating Bottom Navbar -->
  <nav class="bottom-navbar">
    <ul class="bottom-nav-list">
      <li class="bottom-nav-item">
        <a href="#home" class="bottom-nav-link active" data-section="home">
          <!-- Home Icon -->
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
          </svg>
          <span class="bottom-nav-text">Home</span>
        </a>
      </li>
      <li class="bottom-nav-item">
        <a href="#about" class="bottom-nav-link" data-section="about">
          <!-- User/About Icon -->
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          <span class="bottom-nav-text">About</span>
        </a>
      </li>
      <li class="bottom-nav-item">
        <a href="#portfolio" class="bottom-nav-link" data-section="portfolio">
          <!-- Briefcase Icon -->
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
          </svg>
          <span class="bottom-nav-text">Portfolio</span>
        </a>
      </li>
      <li class="bottom-nav-item">
        <a href="#services" class="bottom-nav-link" data-section="services">
          <!-- Star/Services Icon -->
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon
              points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
            </polygon>
          </svg>
          <span class="bottom-nav-text">Services</span>
        </a>
      </li>
      <li class="bottom-nav-item">
        <a href="#pricing" class="bottom-nav-link" data-section="pricing">
          <!-- Tag/Pricing Icon -->
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23"></line>
            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
          </svg>
          <span class="bottom-nav-text">Enquire</span>
        </a>
      </li>
      <li class="bottom-nav-item">
        <a href="#contact" class="bottom-nav-link" data-section="contact">
          <!-- Message/Contact Icon -->
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
          </svg>
          <span class="bottom-nav-text">Contact</span>
        </a>
      </li>
    </ul>
  </nav>

  <!-- GSAP & Premium 3D Carousel JS Split Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="{{ asset('assets/premium-carousel/animation.js') }}?v={{ time() }}"></script>
  <script src="{{ asset('assets/premium-carousel/drag.js') }}?v={{ time() }}"></script>
  <script src="{{ asset('assets/premium-carousel/touch.js') }}?v={{ time() }}"></script>
  <script src="{{ asset('assets/premium-carousel/autoplay.js') }}?v={{ time() }}"></script>
  <script src="{{ asset('assets/premium-carousel/carousel.js') }}?v={{ time() }}"></script>
  <!-- Main JS Asset -->
  <script src="{{ asset('assets/main.js') }}?v={{ time() }}"></script>
</body>

</html>
