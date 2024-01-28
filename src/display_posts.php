<?php
require_once 'config.php';
require_once 'Database.php';

// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
}

// Load the SQL query to fetch posts of all active users
$sqlFile = '../sql/active_users_and_posts.sql';
$sql = file_get_contents($sqlFile);

// Execute the SQL query to fetch posts
$postResults = $db->select($sql);

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Feed</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<header>
    <h1>Social Media Feed</h1>
</header>

<div class='post-container'>
    <?php foreach ($postResults as $post): ?>
        <?php $profileImage = '/images/user-profile-image.jpg'; ?>
        <div class='post'>
            <img src='<?php echo $profileImage; ?>' alt='Profile Photo'>
            <p><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></p>
            <p class='post-title'><?php echo $post['title']; ?></p>
            <p class='post-content'><?php echo $post['content']; ?></p>
            <p class='post-date'>Posted on: <?php echo $post['creation_date']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
