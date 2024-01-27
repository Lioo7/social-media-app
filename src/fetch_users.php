<?php
require_once 'config.php';
require_once 'Database.php';

function splitFullName($fullName) {
    // Split name into parts by space
    $parts = explode(' ', $fullName);
    
    // Check if the first part contains a title
    $title = '';
    if (strpos($parts[0], '.') !== false) {
        $title = $parts[0]; // Extract title
        array_shift($parts); // Remove title from parts
    }
    
    $firstName = $parts[0];
    // If there are more than one part, join the remaining parts as last name
    $lastName = count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';
    // If a title was extracted, prepend it to the first name
    if (!empty($title)) {
        $firstName = $title . ' ' . $firstName;
    }

    return ['first_name' => $firstName, 'last_name' => $lastName];
}


// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
}

// Fetch user data from JSONPlaceholder
$url = "https://jsonplaceholder.typicode.com/users";
$response = file_get_contents($url);

if ($response === false) {
    die("Failed to fetch user data from JSONPlaceholder.");
}

// Decode JSON response
$users = json_decode($response, true);

// Prepare SQL INSERT statement for inserting users
$sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `is_active`) VALUES (?, ?, ?, ?)";

foreach ($users as $user) {
    // Split name into first name and last name
    $nameParts = splitFullName($user['name']);
    $firstName = $nameParts['first_name'];
    $lastName = $nameParts['last_name'];

    // Bind parameters for the INSERT statement
    $params = [
        ['type' => 's', 'value' => $firstName],
        ['type' => 's', 'value' => $lastName],
        ['type' => 's', 'value' => $user['email']],
        ['type' => 'i', 'value' => 1],
    ];

    // Execute the INSERT statement
    $db->insert($sql, $params);
}

echo "User data inserted successfully!";
?>
