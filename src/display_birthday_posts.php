<?php
require_once 'config.php';
require_once 'Database.php';

// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
}

// Load the SQL query to fetch latest posts for users with birthday in current month
$sqlFile = '../sql/latest_posts_for_users_with_birthday_this_month.sql';
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
    <title>Latest Birthday Posts</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<header>
    <h1>Social Media</h1>
    <h2>Latest Birthday Posts 🎉</h2>
</header>


<div class='post-container'>
    <?php foreach ($postResults as $post): ?>
        <div class='post'>
            <?php $profileImage = '/images/user-profile-image.jpg'; ?>
            <img src='<?php echo $profileImage; ?>' alt='Profile Photo'>
            <div class="post-content">
                <p class="user-name"><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></p>
                <p class='post-title'><?php echo $post['title']; ?></p>
                <p class='post-text'><?php echo $post['content']; ?></p>
                <p class='post-date'>Posted on: <?php echo $post['creation_date']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
