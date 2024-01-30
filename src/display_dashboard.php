<?php
require_once 'config.php';
require_once 'Database.php';

// Establish database connection
$db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

if ($db->getConnectionError()) {
    die("Connection failed: " . $db->getConnectionError());
}

// Load the SQL query to fetch post counts by date and hour
$sqlFile = '../sql/count_posts_by_date_and_hour.sql';
$sql = file_get_contents($sqlFile);

// Execute the SQL query to fetch post counts
$postCounts = $db->select($sql);

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<header>
    <h1>Social Media</h1>
    <h2>Dashboard 📊</h2>
</header>

<div class='post-container'>
    <table>
        <tr>
            <th>Date</th>
            <th>Hour</th>
            <th>Post Count</th>
        </tr>
        <?php foreach ($postCounts as $count): ?>
            <tr>
                <td><?php echo $count['post_date']; ?></td>
                <td><?php echo $count['post_hour']; ?></td>
                <td><?php echo $count['post_count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
