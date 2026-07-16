<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Settings | Fame House Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #080a0e;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: #000000;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
            padding: 2.5rem 1.8rem;
            box-sizing: border-box;
        }

        /* Sidebar Logo Wrapper & Animation */
        .logo-wrapper {
            position: relative;
            height: 48px;
            width: 100%;
            display: flex;
            align-items: center;
            overflow: visible;
        }

        .nav-logo {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .logo-expand-container {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%) scale(0.95);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease, transform 0.4s ease;
            width: 170px;
        }

        .nav-logo-hover {
            display: block;
            max-width: 100%;
            height: auto !important;
        }

        .logo-link:hover .nav-logo {
            opacity: 0;
            transform: translateY(-50%) scale(0.9);
        }

        .logo-link:hover .logo-expand-container {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1.2rem;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .menu-link:hover, .menu-link.active {
            background: rgba(184, 255, 52, 0.08);
            color: var(--primary-color);
        }

        .unread-badge {
            background: #ff3e6c;
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            border-radius: 20px;
            margin-left: auto;
        }

        .logout-btn-wrapper {
            margin-top: auto;
        }

        .sidebar-logout-btn {
            background: transparent;
            border: 1px solid rgba(255, 62, 108, 0.25);
            color: #ff3e6c;
            width: 100%;
            padding: 0.9rem;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            transition: all 0.3s;
        }

        .sidebar-logout-btn:hover {
            background: #ff3e6c;
            color: #ffffff;
        }

        /* Workspace */
        .workspace {
            flex-grow: 1;
            padding: 3rem 4rem;
            box-sizing: border-box;
            background: radial-gradient(circle at top right, rgba(184, 255, 52, 0.02) 0%, transparent 60%);
        }

        .workspace-header {
            margin-bottom: 3rem;
        }

        .workspace-title h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .workspace-title p {
            color: var(--text-secondary);
            font-size: 0.92rem;
            margin: 0.4rem 0 0 0;
        }

        /* Form styling */
        .form-card {
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 3rem;
            box-sizing: border-box;
            max-width: 900px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent 0%, var(--primary-color) 50%, transparent 100%);
        }

        .settings-section-title {
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-color);
            margin: 2rem 0 1.2rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .settings-section-title:first-of-type {
            margin-top: 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.8rem;
        }

        .form-group-full {
            grid-column: span 2;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1rem;
        }

        .form-group label {
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 1.1rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            color: #ffffff;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-sizing: border-box;
            width: 100%;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 20px rgba(184, 255, 52, 0.08);
            background: rgba(0, 0, 0, 0.6);
        }

        .btn-row {
            display: flex;
            gap: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 2rem;
            margin-top: 2.5rem;
        }

        .btn-submit {
            background: var(--primary-color);
            color: #080a0e;
            border: 1px solid var(--primary-color);
            padding: 1rem 2.2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(184, 255, 52, 0.25);
        }

        .alert-success {
            background: rgba(179, 245, 0, 0.06);
            border: 1px solid rgba(179, 245, 0, 0.2);
            color: #b3f500;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            max-width: 900px;
        }

        .error-message {
            color: #ff3e6c;
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 0.3rem;
        }

        /* Social settings grid & toggle switch */
        .social-setting-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .social-setting-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 1.2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        .social-setting-card:hover {
            border-color: rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.03);
        }
        .social-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .social-title-group {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .social-icon-preview {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            color: var(--primary-color);
        }
        .social-icon-preview svg {
            width: 18px;
            height: 18px;
            stroke-width: 2px;
        }
        .social-name {
            font-weight: 600;
            font-size: 0.95rem;
        }
        .switch-container {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        .switch-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.4);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 22px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.1);
            transition: .3s;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
        }
        input:checked + .slider {
            background-color: var(--primary-color);
        }
        input:checked + .slider:before {
            transform: translateX(22px);
            background-color: #080a0e;
        }
        .slider.round {
            border-radius: 22px;
        }
        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <div class="dashboard-layout">
        @include('admin.layouts.sidebar')

        <!-- Main Workspace -->
        <main class="workspace">
            <div class="workspace-header">
                <div class="workspace-title">
                    <h1>Website Settings</h1>
                    <p>Manage dynamic page metadata, SEO configurations, contact information, and social links.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="form-card">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- SECTION 1: SEO & Metadata -->
                    <div class="settings-section-title">SEO & Metadata</div>
                    <div class="form-grid">
                        <div class="form-group form-group-full">
                            <label for="meta_title">Website Title (Meta Title)</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" placeholder="e.g. Vibhu | Portfolio" required>
                            @error('meta_title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3" placeholder="Brief summary of your website for search engines..." required>{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                            @error('meta_description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="meta_keywords">Meta Keywords (Comma separated)</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" placeholder="e.g. video, reels, graphics" required>
                            @error('meta_keywords')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- SECTION 2: Contact Information -->
                    <div class="settings-section-title">Contact Info</div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="contact_email">Email Address</label>
                            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" placeholder="e.g. contact@famehouse.com" required>
                            @error('contact_email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_phone">Phone Number</label>
                            <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" placeholder="e.g. +91 98765 43210" required>
                            @error('contact_phone')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="contact_address">Studio Address / Location</label>
                            <input type="text" name="contact_address" id="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}" placeholder="e.g. New Delhi, India" required>
                            @error('contact_address')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- SECTION 3: Social Media URL Links -->
                    <div class="settings-section-title">Social Media Links</div>
                    <div class="social-setting-grid">
                        @php
                            $platforms = [
                                'instagram' => [
                                    'name' => 'Instagram',
                                    'placeholder' => 'https://instagram.com/username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>'
                                ],
                                'youtube' => [
                                    'name' => 'YouTube',
                                    'placeholder' => 'https://youtube.com/c/channelname',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>'
                                ],
                                'linkedin' => [
                                    'name' => 'LinkedIn',
                                    'placeholder' => 'https://linkedin.com/in/username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>'
                                ],
                                'facebook' => [
                                    'name' => 'Facebook',
                                    'placeholder' => 'https://facebook.com/username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>'
                                ],
                                'twitter' => [
                                    'name' => 'Twitter / X',
                                    'placeholder' => 'https://x.com/username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4l11.733 16h4.267l-11.733 -16z M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/></svg>'
                                ],
                                'tiktok' => [
                                    'name' => 'TikTok',
                                    'placeholder' => 'https://tiktok.com/@username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>'
                                ],
                                'whatsapp' => [
                                    'name' => 'WhatsApp',
                                    'placeholder' => 'https://wa.me/phonenumber',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>'
                                ],
                                'threads' => [
                                    'name' => 'Threads',
                                    'placeholder' => 'https://threads.net/@username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c2.25 0 4.33-.74 6-2l-1.5-1.5c-1.27.96-2.81 1.5-4.5 1.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8v1c0 1.1-.9 2-2 2s-2-.9-2-2v-1c0-2.21-1.79-4-4-4-2.21 0-4 1.79-4 4s1.79 4 4 4c1.1 0 2.1-.45 2.82-1.18.53.7 1.39 1.18 2.38 1.18 2.21 0 4-1.79 4-4v-1c0-5.52-4.48-10-10-10zm0 6c1.1 0 2 .9 2 2v1c0 1.1-.9 2-2 2s-2-.9-2-2v-1c0-1.1.9-2 2-2z"/></svg>'
                                ],
                                'snapchat' => [
                                    'name' => 'Snapchat',
                                    'placeholder' => 'https://snapchat.com/add/username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 3c-1.2 0-2.4.6-3 1.7A5 5 0 0 0 7.8 7c-.2.9-.1 1.8.2 2.6-.6.6-1 1.4-1.2 2.3a4.7 4.7 0 0 0 3.3 5.4c.5.5.7 1.2.5 1.8a2.3 2.3 0 0 0 2.2 2.3h.4a2.3 2.3 0 0 0 2.2-2.3c-.2-.6 0-1.3.5-1.8a4.7 4.7 0 0 0 3.3-5.4c-.2-.9-.6-1.7-1.2-2.3.3-.8.4-1.7.2-2.6a5 5 0 0 0-1.2-2.3c-.6-1.1-1.8-1.7-3-1.7z"/></svg>'
                                ],
                                'behance' => [
                                    'name' => 'Behance',
                                    'placeholder' => 'https://www.behance.net/username',
                                    'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12h3M9 12a2 2 0 1 1 0-4h3v4M9 12a2 2 0 1 0 0 4h3v-4M18 11.5a3.5 3.5 0 0 0-7 0v1.5h7v-1.5zM14 7h6"/></svg>'
                                ]
                            ];
                        @endphp

                        @foreach ($platforms as $key => $platform)
                            @php
                                $urlKey = $key . '_url';
                                $showKey = 'show_' . $key;
                                $urlValue = old($urlKey, $settings[$urlKey] ?? '');
                                $showValue = old($showKey, $settings[$showKey] ?? '1');
                            @endphp
                            <div class="social-setting-card">
                                <div class="social-header">
                                    <div class="social-title-group">
                                        <span class="social-icon-preview">{!! $platform['icon'] !!}</span>
                                        <span class="social-name">{{ $platform['name'] }}</span>
                                    </div>
                                    <div class="switch-container">
                                        <span class="switch-label">Show</span>
                                        <label class="switch">
                                            <input type="hidden" name="{{ $showKey }}" value="0">
                                            <input type="checkbox" name="{{ $showKey }}" value="1" {{ $showValue == '1' ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <input type="text" name="{{ $urlKey }}" id="{{ $urlKey }}" value="{{ $urlValue }}" placeholder="{{ $platform['placeholder'] }}">
                                    @error($urlKey)
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- SECTION 4: Carousel Settings -->
                    <div class="settings-section-title">Curved Carousel Header Settings</div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="carousel_subtitle">Carousel Subtitle (Tagline)</label>
                            <input type="text" name="carousel_subtitle" id="carousel_subtitle" value="{{ old('carousel_subtitle', $settings['carousel_subtitle'] ?? 'Behind the Designs') }}" placeholder="e.g. Behind the Designs">
                            @error('carousel_subtitle')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="carousel_cta_text">Carousel CTA Button Text</label>
                            <input type="text" name="carousel_cta_text" id="carousel_cta_text" value="{{ old('carousel_cta_text', $settings['carousel_cta_text'] ?? 'See more Projects') }}" placeholder="e.g. See more Projects">
                            @error('carousel_cta_text')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="carousel_title">Carousel Title (Main Heading)</label>
                            <input type="text" name="carousel_title" id="carousel_title" value="{{ old('carousel_title', $settings['carousel_title'] ?? 'Curious What Else We\'ve Created?') }}" placeholder="e.g. Curious What Else We've Created?">
                            @error('carousel_title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="carousel_desc">Carousel Description</label>
                            <textarea name="carousel_desc" id="carousel_desc" rows="2" placeholder="Explore more brand identities, packaging... Description text below the heading.">{{ old('carousel_desc', $settings['carousel_desc'] ?? 'Explore more brand identities, packaging, and digital design work in our creative showcase.') }}</textarea>
                            @error('carousel_desc')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- SECTION 5: About Us Settings -->
                    <div class="settings-section-title">About Us Section Settings</div>
                    <div class="form-grid">
                        <div class="form-group form-group-full">
                            <label for="about_title">About Title (Main Heading)</label>
                            <input type="text" name="about_title" id="about_title" value="{{ old('about_title', $settings['about_title'] ?? '') }}" placeholder="e.g. WE TELL STORIES <br> THAT STAY <span class=&quot;about-italic-highlight&quot;>WITH YOU.</span>">
                            <span style="font-size: 0.72rem; color: rgba(255,255,255,0.35); margin-top: 0.2rem;">Supports HTML tag rendering for italics/highlights.</span>
                            @error('about_title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="about_description">About Description (Content)</label>
                            <textarea name="about_description" id="about_description" rows="4" placeholder="Description text in the about section...">{{ old('about_description', $settings['about_description'] ?? '') }}</textarea>
                            @error('about_description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="about_video_id">About Video Link or ID (YouTube, Vimeo, or Google Drive) (Optional)</label>
                            <input type="text" name="about_video_id" id="about_video_id" value="{{ old('about_video_id', $settings['about_video_id'] ?? '') }}" placeholder="e.g. YouTube, Vimeo, or Google Drive URL/ID">
                            @error('about_video_id')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="about_thumbnail">About Thumbnail / Cover Image (Optional)</label>
                            <input type="file" name="about_thumbnail" id="about_thumbnail" accept="image/*">
                            @if(isset($settings['about_thumbnail']) && $settings['about_thumbnail'])
                                <div style="margin-top: 0.5rem;">
                                    <span style="font-size: 0.78rem; color: rgba(255,255,255,0.4)">Current Thumbnail:</span>
                                    <div class="thumbnail-preview" style="width: 140px; height: 90px; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.1); overflow: hidden; background: #000; margin-top: 0.5rem;">
                                        <img src="{{ asset('images/' . $settings['about_thumbnail']) }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            @endif
                            @error('about_thumbnail')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="btn-row">
                        <button type="submit" class="btn-submit">
                            <img src="https://img.icons8.com/color/48/plus--v1.png" alt="Save" style="width: 18px; height: 18px; margin-right: 2px;">
                            <span>Save Settings</span>
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>
</html>
