<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - KIT Madrasah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Admin Dashboard</h1>
            <div class="flex items-center space-x-4">
                <a href="<?= site_url('home') ?>" class="text-gray-600 hover:text-blue-600">
                    <i class="fas fa-home mr-1"></i> View Site
                </a>
                <a href="<?= site_url('auth/logout') ?>" class="text-red-600 hover:text-red-700">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </a>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 py-8">
        <?php if (isset($upload_error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= $upload_error ?>
            </div>
        <?php endif; ?>

        <!-- Slider Management -->
        <section class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Manage Sliders</h2>
            
            <!-- Add Slider Form -->
            <form action="<?= site_url('admin/add_slider') ?>" method="post" enctype="multipart/form-data" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Image</label>
                        <input type="file" name="image" required class="w-full border rounded p-2" accept="image/*">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Caption</label>
                        <input type="text" name="caption" class="w-full border rounded p-2">
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Slider
                </button>
            </form>

            <!-- Existing Sliders -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($sliders as $slider): ?>
                    <div class="border rounded-lg overflow-hidden">
                        <img src="<?= base_url('uploads/' . $slider->image) ?>" alt="Slider" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-gray-600 mb-2"><?= htmlspecialchars($slider->caption) ?></p>
                            <a href="<?= site_url('admin/delete_slider/' . $slider->id) ?>" 
                               onclick="return confirm('Are you sure you want to delete this slider?')"
                               class="text-red-600 hover:text-red-700">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- YouTube Thumbnails Management -->
        <section class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Manage YouTube Videos</h2>
            
            <!-- Add YouTube Video Form -->
            <form action="<?= site_url('admin/add_youtube') ?>" method="post" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Video ID</label>
                        <input type="text" name="video_id" required placeholder="e.g., dQw4w9WgXcQ" 
                               class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Title</label>
                        <input type="text" name="title" required class="w-full border rounded p-2">
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add YouTube Video
                </button>
            </form>

            <!-- Existing YouTube Videos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($youtube_thumbnails as $thumbnail): ?>
                    <div class="border rounded-lg overflow-hidden">
                        <img src="<?= htmlspecialchars($thumbnail->thumbnail_url) ?>" 
                             alt="<?= htmlspecialchars($thumbnail->title) ?>" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-medium mb-2"><?= htmlspecialchars($thumbnail->title) ?></h3>
                            <div class="flex justify-between items-center">
                                <a href="https://www.youtube.com/watch?v=<?= htmlspecialchars($thumbnail->video_id) ?>" 
                                   target="_blank" class="text-blue-600 hover:text-blue-700">
                                    <i class="fab fa-youtube"></i> Watch
                                </a>
                                <a href="<?= site_url('admin/delete_youtube/' . $thumbnail->id) ?>" 
                                   onclick="return confirm('Are you sure you want to delete this video?')"
                                   class="text-red-600 hover:text-red-700">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Post Management -->
        <section class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Manage Posts</h2>
            
            <!-- Add Post Form -->
            <form action="<?= site_url('admin/add_post') ?>" method="post" enctype="multipart/form-data" class="mb-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Title</label>
                        <input type="text" name="title" required class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Content</label>
                        <textarea name="content" required rows="4" class="w-full border rounded p-2"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Featured Image</label>
                        <input type="file" name="featured_image" required class="w-full border rounded p-2" accept="image/*">
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Post
                </button>
            </form>

            <!-- Existing Posts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($posts as $post): ?>
                    <div class="border rounded-lg overflow-hidden">
                        <?php if ($post->featured_image): ?>
                            <img src="<?= base_url('uploads/' . $post->featured_image) ?>" 
                                 alt="<?= htmlspecialchars($post->title) ?>" 
                                 class="w-full h-48 object-cover">
                        <?php endif; ?>
                        <div class="p-4">
                            <h3 class="font-medium mb-2"><?= htmlspecialchars($post->title) ?></h3>
                            <p class="text-gray-600 text-sm mb-3">
                                <?= substr(strip_tags($post->content), 0, 100) ?>...
                            </p>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500">
                                    By <?= htmlspecialchars($post->author_name) ?>
                                </span>
                                <a href="<?= site_url('admin/delete_post/' . $post->id) ?>" 
                                   onclick="return confirm('Are you sure you want to delete this post?')"
                                   class="text-red-600 hover:text-red-700">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</body>
</html>
