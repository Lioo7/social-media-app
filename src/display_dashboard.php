<?php
require_once 'header.php';
require_once 'db_connection.php';

// Fetch post counts by date and hour
$sqlFile = '../sql/count_posts_by_date_and_hour.sql';
$sql = file_get_contents($sqlFile);

// Execute the SQL query to fetch post counts
$postCounts = $db->select($sql);
?>

<div class='post-container'>
    <!-- Table to display post counts -->
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

<?php require_once 'footer.php'; ?>
