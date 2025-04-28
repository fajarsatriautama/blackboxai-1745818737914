<?php
// Load the main content from home.php
$main_content = file_get_contents(APPPATH . 'views/home.php');

// Find the position before the closing footer
$footer_pos = strpos($main_content, '<footer');

// Split the content
$before_footer = substr($main_content, 0, $footer_pos);
$footer_and_after = substr($main_content, $footer_pos);

// Load the social media content
$social_media_content = file_get_contents(APPPATH . 'views/social_media.php');

// Combine everything
echo $before_footer;
echo $social_media_content;
echo $footer_and_after;
?>
