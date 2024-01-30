<?php
require_once(__DIR__ . '/src/initialize.php');
require_once(__DIR__ . '/src/download_profile_image.php');

# Redirect to the feed page
header('Location: /src/pages/display_feed.php');
exit;

?>