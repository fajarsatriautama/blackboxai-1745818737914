<?php
// Create uploads directory if it doesn't exist
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
    echo "Created uploads directory\n";
}

// Create empty placeholder files for images
$files = [
    'slider1.jpg',
    'slider2.jpg',
    'slider3.jpg',
    'article1.jpg',
    'article2.jpg',
    'article3.jpg'
];

foreach ($files as $file) {
    touch('uploads/' . $file);
    echo "Created placeholder file: $file\n";
}

// Create .htaccess to allow direct access to uploads
file_put_contents('uploads/.htaccess', "
<IfModule mod_authz_core.c>
    Require all granted
</IfModule>
<IfModule !mod_authz_core.c>
    Order allow,deny
    Allow from all
</IfModule>
");

echo "Setup completed!\n";
?>
