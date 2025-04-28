<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($post->title) ?> - KIT Madrasah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">Klub Informatika dan Teknologi (KIT) Madrasah</h1>
      <nav class="space-x-6 text-gray-700">
        <a href="<?= site_url() ?>" class="hover:text-blue-600">Beranda</a>
        <a href="<?= site_url('auth/anggota_login') ?>" class="hover:text-blue-600">Login Anggota</a>
        <a href="<?= site_url('auth/admin_login') ?>" class="hover:text-blue-600">Login Admin</a>
        <a href="<?= site_url('auth/register') ?>" class="hover:text-blue-600">Daftar</a>
      </nav>
    </div>
  </header>

  <main class="max-w-4xl mx-auto px-6 py-12 bg-white rounded-lg shadow">
    <h2 class="text-3xl font-bold mb-4"><?= htmlspecialchars($post->title) ?></h2>
    <div class="text-gray-600 mb-6">
      <span>Oleh <?= htmlspecialchars($post->author_name) ?></span> |
      <span><?= date('d M Y', strtotime($post->created_at)) ?></span>
    </div>
    <?php if ($post->featured_image): ?>
      <img src="<?= base_url('uploads/' . $post->featured_image) ?>" alt="<?= htmlspecialchars($post->title) ?>" class="w-full rounded mb-6" />
    <?php endif; ?>
    <div class="prose max-w-none">
      <?= $post->content ?>
    </div>
  </main>

  <footer class="mt-16 bg-white shadow-inner py-6 text-center text-gray-600">
    &copy; 2024 by Fajar Satria Utama
  </footer>
</body>
</html>
