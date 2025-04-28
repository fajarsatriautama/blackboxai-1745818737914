<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Anggota - KIT Madrasah</title>
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
            <h1 class="text-2xl font-bold text-blue-600">Dashboard Anggota</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Selamat datang, <?= htmlspecialchars($user->name) ?></span>
                <a href="<?= site_url('home') ?>" class="text-gray-600 hover:text-blue-600">
                    <i class="fas fa-home mr-1"></i> Lihat Situs
                </a>
                <a href="<?= site_url('auth/logout') ?>" class="text-red-600 hover:text-red-700">
                    <i class="fas fa-sign-out-alt mr-1"></i> Keluar
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Section -->
            <div class="lg:col-span-1">
                <section class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-xl font-semibold mb-4">Profil</h2>
                    <form action="<?= site_url('anggota/edit_profile') ?>" method="post" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nama</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($user->name) ?>" 
                                   required class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user->email) ?>" 
                                   required class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Password Baru (opsional)</label>
                            <input type="password" name="password" class="w-full border rounded p-2">
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Perbarui Profil
                        </button>
                    </form>
                </section>
            </div>

            <!-- Artikel Section -->
            <div class="lg:col-span-2">
                <section class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Artikel Saya</h2>
                    
                    <!-- Add Artikel Form -->
                    <form action="<?= site_url('anggota/add_artikel') ?>" method="post" enctype="multipart/form-data" class="mb-8">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Judul</label>
                                <input type="text" name="title" required class="w-full border rounded p-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Konten</label>
                                <textarea name="content" required rows="4" class="w-full border rounded p-2"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Gambar Unggulan</label>
                                <input type="file" name="featured_image" required class="w-full border rounded p-2" accept="image/*">
                            </div>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Buat Artikel
                            </button>
                        </div>
                    </form>

                    <!-- Existing Artikel -->
                    <div class="space-y-6">
                        <?php if (!empty($posts)): ?>
                            <?php foreach ($posts as $post): ?>
                                <div class="border rounded-lg overflow-hidden">
                                    <div class="flex">
                                        <?php if ($post->featured_image): ?>
                                            <div class="w-48 h-48">
                                                <img src="<?= base_url('uploads/' . $post->featured_image) ?>" 
                                                     alt="<?= htmlspecialchars($post->title) ?>" 
                                                     class="w-full h-full object-cover">
                                            </div>
                                        <?php endif; ?>
                                        <div class="flex-1 p-4">
                                            <h3 class="font-medium text-lg mb-2"><?= htmlspecialchars($post->title) ?></h3>
                                            <p class="text-gray-600 mb-3">
                                                <?= substr(strip_tags($post->content), 0, 150) ?>...
                                            </p>
                                            <div class="flex justify-between items-center text-sm">
                                                <span class="text-gray-500">
                                                    Diposting pada <?= date('d M Y', strtotime($post->created_at)) ?>
                                                </span>
                                                <a href="<?= site_url('anggota/delete_artikel/' . $post->id) ?>" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"
                                                   class="text-red-600 hover:text-red-700">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center text-gray-600">Anda belum membuat artikel apapun.</p>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
