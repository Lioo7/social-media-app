<?php
require_once 'databases/db_connection.php';

// Generates the current date and time with randomized hours, minutes, and seconds
function getCurrentRandomizedDateTime()
{
    $currentDateTime = new DateTime('now', new DateTimeZone('Israel'));

    // Generate random values for hours, minutes, and seconds between 0 and 23, 0 and 59, and 0 and 59 respectively
    $randomHours = rand(0, 23);
    $randomMinutes = rand(0, 59);
    $randomSeconds = rand(0, 59);

    // Set the hours, minutes, and seconds parts of the current datetime to the random values
    $currentDateTime->setTime($randomHours, $randomMinutes, $randomSeconds);

    return $currentDateTime->format('Y-m-d H:i:s');
}

// Fetch post data from JSONPlaceholder
$url = "https://jsonplaceholder.typicode.com/posts";
$response = file_get_contents($url);

if ($response === false) {
    die("Failed to fetch user data from JSONPlaceholder.");
}

// Decode JSON response
$posts = json_decode($response, true);

// Prepare SQL INSERT statement for inserting posts
$sql = "INSERT INTO `post` (`user_id`, `title`, `content`, `creation_date`, `is_active`) VALUES (?, ?, ?, ?, ?)";

foreach ($posts as $post) {
    // Bind parameters for the INSERT statement
    $params = [
        ['type' => 'i', 'value' => $post['userId']],
        ['type' => 's', 'value' => $post['title']],
        ['type' => 's', 'value' => $post['body']],
        ['type' => 's', 'value' => getCurrentRandomizedDateTime()],
        ['type' => 'i', 'value' => 1],
    ];

    // Execute the INSERT statement
    $db->insert($sql, $params);
}

echo "User data inserted successfully!";
?>
