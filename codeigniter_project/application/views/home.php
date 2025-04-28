<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Klub Informatika dan Teknologi (KIT) Madrasah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">Klub Informatika dan Teknologi (KIT) Madrasah</h1>
      <nav class="space-x-6 text-gray-700">
        <a href="<?= site_url('home') ?>" class="hover:text-blue-600">Beranda</a>
        <a href="<?= site_url('auth/anggota_login') ?>" class="hover:text-blue-600">Login Anggota</a>
        <a href="<?= site_url('auth/admin_login') ?>" class="hover:text-blue-600">Login Admin</a>
        <a href="<?= site_url('auth/register') ?>" class="hover:text-blue-600">Daftar</a>
      </nav>
    </div>
  </header>

  <!-- Home Page Slider -->
  <section class="mt-8 max-w-6xl mx-auto px-6">
    <div class="relative overflow-hidden rounded-lg shadow-lg">
      <div id="homeSlider" class="relative h-64 sm:h-96">
        <?php if (!empty($sliders)): ?>
          <?php foreach ($sliders as $index => $slider): ?>
            <div class="absolute inset-0 transition-opacity duration-1000 <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>" data-slide="<?= $index ?>">
              <img src="<?= base_url('uploads/' . $slider->image) ?>" alt="Slider Image" class="w-full h-full object-cover" />
              <?php if ($slider->caption): ?>
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                  <h2 class="text-white text-3xl sm:text-5xl font-bold"><?= htmlspecialchars($slider->caption) ?></h2>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="absolute inset-0 opacity-100 flex items-center justify-center bg-gray-300">
            <p class="text-gray-700 text-xl">Belum ada slider tersedia</p>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($sliders)): ?>
        <button id="prevSlide" aria-label="Slide Sebelumnya" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
          <i class="fas fa-chevron-left text-gray-800"></i>
        </button>
        <button id="nextSlide" aria-label="Slide Berikutnya" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
          <i class="fas fa-chevron-right text-gray-800"></i>
        </button>
      <?php endif; ?>
    </div>
  </section>

  <!-- Artikel Section -->
  <section class="mt-16 max-w-6xl mx-auto px-6">
    <h3 class="text-2xl font-semibold mb-6 text-center text-blue-600">Artikel Terbaru</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
          <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
            <?php if ($post->featured_image): ?>
              <img src="<?= base_url('uploads/' . $post->featured_image) ?>" alt="<?= htmlspecialchars($post->title) ?>" class="w-full h-48 object-cover" />
            <?php endif; ?>
            <div class="p-4">
              <h4 class="font-semibold text-lg mb-2"><?= htmlspecialchars($post->title) ?></h4>
              <p class="text-gray-600 mb-3"><?= substr(strip_tags($post->content), 0, 150) ?>...</p>
              <div class="flex justify-between items-center text-sm text-gray-500">
                <span>Oleh <?= htmlspecialchars($post->author_name) ?></span>
                <span><?= date('d M Y', strtotime($post->created_at)) ?></span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center text-gray-600 col-span-3">Belum ada artikel tersedia</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- YouTube Videos Section -->
  <section class="mt-16 max-w-6xl mx-auto px-6">
    <h3 class="text-2xl font-semibold mb-6 text-center text-blue-600">Video YouTube</h3>
    <div class="relative">
      <div class="overflow-x-auto">
        <div id="youtubeSlider" class="flex space-x-4 pb-4">
          <?php if (!empty($youtube_thumbnails)): ?>
            <?php foreach ($youtube_thumbnails as $thumbnail): ?>
              <a href="https://www.youtube.com/watch?v=<?= htmlspecialchars($thumbnail->video_id) ?>" 
                 target="_blank" 
                 class="min-w-[300px] bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                <img src="<?= htmlspecialchars($thumbnail->thumbnail_url) ?>" 
                     alt="<?= htmlspecialchars($thumbnail->title) ?>" 
                     class="w-full h-[169px] object-cover" />
                <div class="p-4">
                  <h4 class="font-semibold text-lg line-clamp-2"><?= htmlspecialchars($thumbnail->title) ?></h4>
                  <div class="mt-2 flex items-center text-blue-600">
                    <i class="fab fa-youtube mr-2"></i>
                    <span>Tonton Video</span>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-center text-gray-600 w-full">Belum ada video tersedia</p>
          <?php endif; ?>
        </div>
      </div>
      <?php if (!empty($youtube_thumbnails)): ?>
        <button onclick="scrollYoutubeSlider('left')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-3 shadow-lg z-10">
          <i class="fas fa-chevron-left text-gray-800"></i>
        </button>
        <button onclick="scrollYoutubeSlider('right')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-3 shadow-lg z-10">
          <i class="fas fa-chevron-right text-gray-800"></i>
        </button>
      <?php endif; ?>
    </div>
  </section>

  <footer class="mt-16 bg-white shadow-inner py-6 text-center text-gray-600">
    &copy; 2024 by Fajar Satria Utama
  </footer>

  <script>
    // Home slider functionality
    const slides = document.querySelectorAll('#homeSlider > div');
    let currentSlide = 0;
    const totalSlides = slides.length;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.opacity = i === index ? '1' : '0';
        slide.style.zIndex = i === index ? '10' : '0';
      });
    }

    // YouTube slider functionality
    function scrollYoutubeSlider(direction) {
      const slider = document.getElementById('youtubeSlider');
      const scrollAmount = 300; // Width of one thumbnail
      if (direction === 'left') {
        slider.scrollBy({
          left: -scrollAmount,
          behavior: 'smooth'
        });
      } else {
        slider.scrollBy({
          left: scrollAmount,
          behavior: 'smooth'
        });
      }
    }

    // Initialize home slider
    if (totalSlides > 0) {
      showSlide(currentSlide);
      
      // Add click handlers for navigation buttons
      document.getElementById('prevSlide')?.addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
      });

      document.getElementById('nextSlide')?.addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
      });

      // Auto advance slides every 5 seconds
      setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
      }, 5000);
    }
  </script>
</body>
</html>
