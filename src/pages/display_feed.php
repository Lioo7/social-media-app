<?php
require_once '../includes/header.php';
require_once '../databases/db_connection.php';
?>

<div class='post-container'>
    <?php
    // Load the SQL query to fetch posts of all active users
    $sqlFile = '../../sql/active_users_and_posts.sql';
    $sql = file_get_contents($sqlFile);

    // Execute the SQL query to fetch posts
    $postResults = $db->select($sql);
    ?>

    <?php foreach ($postResults as $post): ?>
        <div class='post'>
            <?php $profileImage = '../images/user-profile-image.jpg'; ?>
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

<?php require_once '../includes/footer.php'; ?>
