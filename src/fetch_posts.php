<?php
require_once 'config.php';
require_once 'Database.php';

function getCurrentDateTime()
{
    return (new DateTime('now', new DateTimeZone('Israel')))->format('Y-m-d H:i:s');
}

// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
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
        ['type' => 's', 'value' => getCurrentDateTime()],
        ['type' => 'i', 'value' => 1], # Assume that the user is active
    ];

    // Execute the INSERT statement
    $db->insert($sql, $params);
}

echo "User data inserted successfully!";
?>
