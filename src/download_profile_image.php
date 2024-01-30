<?php
$imageUrl = "https://cdn2.vectorstock.com/i/1000x1000/23/81/default-avatar-profile-icon-vector-18942381.jpg";
$imageData = file_get_contents($imageUrl);

if ($imageData === false) {
    die("Failed to download the image from the URL.");
}

$imagePath = "src/images/user-profile-image.jpg";

// Check if the directory exists, if not, create it
if (!file_exists(dirname($imagePath))) {
    mkdir(dirname($imagePath));
}

// Save the image to the specified path
if (file_put_contents($imagePath, $imageData) === false) {
    die("Failed to save the image to the specified path.");
}

echo "Image downloaded and saved successfully!";
?>
