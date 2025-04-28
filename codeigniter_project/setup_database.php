<?php
$host = 'localhost';
$user = 'admin';
$pass = 'admin';
$dbname = 'kit_madrasah';

// Create connection
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Select database
$conn->select_db($dbname);

// Create tables and insert sample data
$schema = file_get_contents('database/schema.sql');
$sample_data = file_get_contents('database/sample_data.sql');

// Execute schema
if ($conn->multi_query($schema)) {
    echo "Schema imported successfully\n";
    // Clear results
    while ($conn->more_results() && $conn->next_result()) {
        if ($res = $conn->store_result()) {
            $res->free();
        }
    }
} else {
    echo "Error importing schema: " . $conn->error . "\n";
}

// Execute sample data
if ($conn->multi_query($sample_data)) {
    echo "Sample data imported successfully\n";
} else {
    echo "Error importing sample data: " . $conn->error . "\n";
}

$conn->close();

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

echo "Setup completed!\n";
?>
