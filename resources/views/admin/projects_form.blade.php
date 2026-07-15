<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($project) ? 'Edit Project' : 'Add New Work' }} | Fame House Dashboard</title>
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

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #000000;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
            padding: 2.5rem 1.8rem;
            box-sizing: border-box;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 3.5rem;
            text-decoration: none;
            color: #ffffff;
        }

        .brand-img {
            height: 36px;
        }

        .brand-text {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.5px;
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
            background: rgba(249, 199, 0, 0.08);
            color: var(--primary-color);
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
            background: radial-gradient(circle at top right, rgba(249, 199, 0, 0.02) 0%, transparent 60%);
        }

        .workspace-header {
            margin-bottom: 3rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: var(--primary-color);
        }

        .workspace-title h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
        }

        /* Form styling */
        .form-card {
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 3rem;
            box-sizing: border-box;
            max-width: 800px;
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

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .form-group-full {
            grid-column: span 2;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group select,
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
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 20px rgba(249, 199, 0, 0.08);
            background: rgba(0, 0, 0, 0.6);
        }

        .form-group select {
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='%23F9C700' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 20px;
            padding-right: 40px;
        }

        .form-group select option {
            background-color: #0c0e12;
            color: #ffffff;
            padding: 10px;
        }

        .checkbox-row {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            grid-column: span 2;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
        }

        .checkbox-group input {
            cursor: pointer;
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }

        .checkbox-group label {
            font-size: 0.9rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            user-select: none;
        }

        .btn-row {
            display: flex;
            gap: 1rem;
            grid-column: span 2;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 2rem;
            margin-top: 1rem;
        }

        .btn-submit {
            background: var(--primary-color);
            color: #080a0e;
            border: 1px solid var(--primary-color);
            padding: 1rem 2rem;
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
            box-shadow: 0 10px 25px rgba(249, 199, 0, 0.25);
        }

        .btn-cancel {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: var(--text-secondary);
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.03);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
        }

        .error-message {
            color: #ff3e6c;
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 0.3rem;
        }

        .thumbnail-preview {
            width: 140px;
            height: 90px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            background: #000;
            margin-top: 0.5rem;
        }

        .thumbnail-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="dashboard-layout">
        @include('admin.layouts.sidebar')

        <!-- Main Workspace -->
        <main class="workspace">
            <div class="workspace-header">
                <a href="{{ route('admin.dashboard') }}" class="back-link">
                    <img src="https://img.icons8.com/color/48/left.png" alt="Back" style="width: 16px; height: 16px;">
                    <span>Back to Portfolio Listing</span>
                </a>
                <div class="workspace-title">
                    <h1>{{ isset($project) ? 'Edit Project' : 'Add New Work' }}</h1>
                </div>
            </div>

            <div class="form-card">
                <form action="{{ isset($project) ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grid">
                        
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Project Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}" placeholder="e.g. Cinematic Brand Commercial" required>
                            @error('title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" required>
                                <option value="" disabled {{ !isset($project) ? 'selected' : '' }}>Select Category...</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->slug }}" {{ old('category', $project->category ?? '') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image File Upload -->
                        <div class="form-group">
                            <label for="image">Project Image / Cover Thumbnail (Required if no video supplied)</label>
                            <input type="file" name="image" id="image" accept="image/*">
                            <span style="font-size: 0.72rem; color: #FFF1B3; margin-top: 0.2rem;">⚠️ Select your poster/thumbnail image here. Do NOT select a video file in this field.</span>
                            @if(isset($project) && $project->image_path)
                                <div style="margin-top: 0.5rem;">
                                    <span style="font-size: 0.78rem; color: rgba(255,255,255,0.4)">Current Image:</span>
                                    <div class="thumbnail-preview">
                                        <img src="{{ asset('images/' . $project->image_path) }}" alt="Preview">
                                    </div>
                                </div>
                            @endif
                            @error('image')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Video ID (optional) -->
                        <div class="form-group">
                            <label for="video_id">YouTube Video Link or ID (Optional)</label>
                            <input type="text" name="video_id" id="video_id" value="{{ old('video_id', $project->video_id ?? '') }}" placeholder="e.g. https://www.youtube.com/watch?v=1KaDy7BBLweHUU7EyL55GIV1OYAxT8Mbk">
                            <span style="font-size: 0.72rem; color: rgba(255,255,255,0.35); margin-top: 0.2rem;">Copy-paste the whole YouTube link or short ID. We'll parse it automatically.</span>
                            @error('video_id')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Video File (optional) -->
                        <div class="form-group">
                            <label for="video_file">Upload Video File (.mp4/.mov) (Optional)</label>
                            <input type="file" name="video_file" id="video_file" accept="video/mp4,video/quicktime">
                            <span style="font-size: 0.72rem; color: #FFF1B3; margin-top: 0.2rem;">🎥 Select your `.mp4` or `.mov` video file here. (Max 50MB)</span>
                            @if(isset($project) && $project->video_path)
                                <div style="margin-top: 0.5rem;">
                                    <span style="font-size: 0.78rem; color: rgba(255,255,255,0.4)">Current Video File:</span>
                                    <span style="font-size: 0.82rem; font-weight:600; word-break:break-all; display:block; color:#55b2ff;">{{ $project->video_path }}</span>
                                </div>
                            @endif
                            <span style="font-size: 0.72rem; color: rgba(255,255,255,0.35); margin-top: 0.2rem;">Max 50MB. Upload local MP4/MOV if not hosted on YouTube.</span>
                            @error('video_file')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group form-group-full">
                            <label for="description">Caption / Description</label>
                            <textarea name="description" id="description" rows="4" placeholder="Brief details about this concept or campaign...">{{ old('description', $project->description ?? '') }}</textarea>
                            @error('description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Checkbox Flags -->
                        <div class="checkbox-row">
                            <div class="checkbox-group">
                                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
                                <label for="is_featured">Feature on Homepage Slider</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="is_vertical_reel" id="is_vertical_reel" value="1" {{ old('is_vertical_reel', $project->is_vertical_reel ?? false) ? 'checked' : '' }}>
                                <label for="is_vertical_reel">Use Vertical Layout Aspect (Tall Reel)</label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="btn-row">
                            <button type="submit" class="btn-submit">
                                <img src="https://img.icons8.com/color/48/plus--v1.png" alt="Save" style="width: 18px; height: 18px; margin-right: 2px;">
                                <span>Save Project</span>
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn-cancel">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>
