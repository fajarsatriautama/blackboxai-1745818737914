#!/bin/bash

# Create uploads directory
mkdir -p uploads

# Create sample images for sliders
convert -size 1200x600 xc:blue -gravity center -pointsize 60 -fill white -draw "text 0,0 'Welcome to KIT Madrasah'" uploads/slider1.jpg
convert -size 1200x600 xc:green -gravity center -pointsize 60 -fill white -draw "text 0,0 'Learn Technology Together'" uploads/slider2.jpg
convert -size 1200x600 xc:red -gravity center -pointsize 60 -fill white -draw "text 0,0 'IT Community'" uploads/slider3.jpg

# Create sample images for articles
convert -size 800x400 xc:purple -gravity center -pointsize 40 -fill white -draw "text 0,0 'Programming Introduction'" uploads/article1.jpg
convert -size 800x400 xc:orange -gravity center -pointsize 40 -fill white -draw "text 0,0 'Coding Tips'" uploads/article2.jpg
convert -size 800x400 xc:teal -gravity center -pointsize 40 -fill white -draw "text 0,0 'First Project'" uploads/article3.jpg

# Set permissions
chmod -R 777 uploads

echo "Setup completed! Sample images have been created in the uploads directory."
