<?php

// Create uploads directory
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

// Function to create a simple colored image
function createImage($width, $height, $color, $text, $filename) {
    $image = imagecreatetruecolor($width, $height);
    
    // Create colors
    $bg = imagecolorallocate($image, 
        hexdec(substr($color, 0, 2)),
        hexdec(substr($color, 2, 2)),
        hexdec(substr($color, 4, 2))
    );
    $white = imagecolorallocate($image, 255, 255, 255);
    
    // Fill background
    imagefill($image, 0, 0, $bg);
    
    // Add text
    $font_size = 5;
    $x = ($width - strlen($text) * imagefontwidth($font_size)) / 2;
    $y = ($height - imagefontheight($font_size)) / 2;
    imagestring($image, $font_size, $x, $y, $text, $white);
    
    // Save image
    imagejpeg($image, 'uploads/' . $filename);
    imagedestroy($image);
}

// Create slider images
createImage(1200, 600, '4169E1', 'Welcome to KIT Madrasah', 'slider1.jpg');
createImage(1200, 600, '228B22', 'Learn Technology Together', 'slider2.jpg');
createImage(1200, 600, 'DC143C', 'IT Community', 'slider3.jpg');

// Create article images
createImage(800, 400, '800080', 'Programming Introduction', 'article1.jpg');
createImage(800, 400, 'FFA500', 'Coding Tips', 'article2.jpg');
createImage(800, 400, '008080', 'First Project', 'article3.jpg');

echo "Setup completed! Sample images have been created in the uploads directory.\n";
?>
