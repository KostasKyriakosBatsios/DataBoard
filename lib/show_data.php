<?php
    require_once "dbconnect.php";

    require_once "pagination.php";

    // Selecting All, in descending order based on User ID and Video ID.
    // Also, performing pagination with 10 rows per page.
    $data = "SELECT * FROM final_records 
             ORDER BY user_id DESC, video_id DESC 
             LIMIT $start, $rows_per_page";

    $result = $mysqli->query($data);

    if($result->num_rows > 0) { // If num rows of database table aren't 0.
        ?>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Video ID</th>
                    <th>Video Title</th>
                    <th>Video Duration</th>
                    <th>Total View Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $userID = $row['user_id'];
                        $userName = $row['user_name'];
                        $videoID = $row['video_id'];
                        $videoTitle = $row['video_title'];
                        $videoDuration = $row['video_duration'];
                        $totalViewTime = $row['total_view_time'];
                        ?>
                            <tr>
                                <td><?php echo $userID; ?></td>
                                <td><?php echo $userName; ?></td>
                                <td><?php echo $videoID; ?></td>
                                <td><?php echo $videoTitle; ?></td>
                                <td><?php echo $videoDuration; ?></td>
                                <td><?php echo $totalViewTime; ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        <?php
    } else {
        // No data found message.
        echo "<h2 class='no-data-found'>No data Found...</h2>";
    }
?>