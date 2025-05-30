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
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">Klub Informatika dan Teknologi (KIT) Madrasah</h1>
      <nav class="space-x-6 text-gray-700">
        <a href="#" class="hover:text-blue-600">Beranda</a>
        <a href="auth/anggota_login.php" class="hover:text-blue-600">Login Anggota</a>
        <a href="auth/admin_login.php" class="hover:text-blue-600">Login Admin</a>
        <a href="auth/register.php" class="hover:text-blue-600">Daftar</a>
      </nav>
    </div>
  </header>

  <!-- Home Page Slider -->
  <section class="mt-8 max-w-6xl mx-auto px-6">
    <div class="relative overflow-hidden rounded-lg shadow-lg">
      <div id="homeSlider" class="relative h-64 sm:h-96">
        <?php
        $sliders = [
          ['caption' => 'Selamat Datang di KIT Madrasah'],
          ['caption' => 'Belajar Teknologi Bersama'],
          ['caption' => 'Komunitas IT Madrasah']
        ];
        foreach ($sliders as $index => $slider): ?>
          <div class="absolute inset-0 transition-opacity duration-1000 <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>" data-slide="<?= $index ?>">
            <div class="w-full h-full bg-gradient-to-r from-blue-600 to-blue-800 flex items-center justify-center">
              <h2 class="text-white text-3xl sm:text-5xl font-bold text-center px-4"><?= $slider['caption'] ?></h2>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <button id="prevSlide" aria-label="Slide Sebelumnya" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
        <i class="fas fa-chevron-left text-gray-800"></i>
      </button>
      <button id="nextSlide" aria-label="Slide Berikutnya" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
        <i class="fas fa-chevron-right text-gray-800"></i>
      </button>
    </div>
  </section>

  <!-- Artikel Section -->
  <section class="mt-16 max-w-6xl mx-auto px-6">
    <h3 class="text-2xl font-semibold mb-6 text-center text-blue-600">Artikel Terbaru</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $articles = [
        ['title' => 'Pengenalan Programming', 'content' => 'Artikel tentang dasar-dasar programming untuk pemula. Mari belajar bersama di komunitas KIT Madrasah!'],
        ['title' => 'Tips Belajar Coding', 'content' => 'Beberapa tips yang berguna untuk belajar coding. Simak tips-tips menarik dari pengalaman anggota KIT Madrasah.'],
        ['title' => 'Project Pertama', 'content' => 'Panduan membuat project pertama dalam programming. Mulai langkah pertama Anda dalam dunia programming!']
      ];
      foreach ($articles as $article): ?>
        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
          <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
            <i class="fas fa-code text-6xl text-blue-600"></i>
          </div>
          <div class="p-4">
            <h4 class="font-semibold text-lg mb-2"><?= $article['title'] ?></h4>
            <p class="text-gray-600 mb-3"><?= $article['content'] ?></p>
            <div class="flex justify-between items-center text-sm text-gray-500">
              <span>Oleh Admin</span>
              <span><?= date('d M Y') ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- YouTube Videos Section -->
  <section class="mt-16 max-w-6xl mx-auto px-6">
    <h3 class="text-2xl font-semibold mb-6 text-center text-blue-600">Video YouTube</h3>
    <div class="relative">
      <div class="overflow-x-auto">
        <div id="youtubeSlider" class="flex space-x-4 pb-4">
          <?php
          $videos = [
            ['title' => 'Tutorial Programming #1'],
            ['title' => 'Tutorial Programming #2'],
            ['title' => 'Tutorial Programming #3']
          ];
          foreach ($videos as $video): ?>
            <div class="min-w-[300px] bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
              <div class="w-full h-[169px] bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
                <i class="fab fa-youtube text-6xl text-red-600"></i>
              </div>
              <div class="p-4">
                <h4 class="font-semibold text-lg line-clamp-2"><?= $video['title'] ?></h4>
                <div class="mt-2 flex items-center text-blue-600">
                  <i class="fab fa-youtube mr-2"></i>
                  <span>Tonton Video</span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <button onclick="scrollYoutubeSlider('left')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-3 shadow-lg z-10">
        <i class="fas fa-chevron-left text-gray-800"></i>
      </button>
      <button onclick="scrollYoutubeSlider('right')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-3 shadow-lg z-10">
        <i class="fas fa-chevron-right text-gray-800"></i>
      </button>
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
