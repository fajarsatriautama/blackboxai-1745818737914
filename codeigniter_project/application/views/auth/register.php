<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar - KIT Madrasah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Daftar Anggota</h2>
    <?php if (isset($error)): ?>
      <p class="text-red-600 mb-4 text-center"><?= $error ?></p>
    <?php endif; ?>
    <form action="<?= site_url('auth/register') ?>" method="POST" class="space-y-6">
      <div>
        <label for="name" class="block mb-2 font-semibold">Nama</label>
        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>
      <div>
        <label for="email" class="block mb-2 font-semibold">Email</label>
        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>
      <div>
        <label for="password" class="block mb-2 font-semibold">Password</label>
        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Daftar</button>
    </form>
    <p class="mt-4 text-center text-gray-600">
      Sudah punya akun? <a href="<?= site_url('auth/anggota_login') ?>" class="text-blue-600 hover:underline">Login disini</a>
    </p>
  </div>
</body>
</html>
