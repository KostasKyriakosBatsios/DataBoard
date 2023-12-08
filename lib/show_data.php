<?php
    require_once "dbconnect.php";

    require_once "pagination.php";

    // Selecting All, in descending order based on User ID and Video ID.
    // Also, performing pagination with 10 rows per page.
    $data = "SELECT * FROM view_records 
             ORDER BY user DESC, video DESC 
             LIMIT $start, $rows_per_page";

    $result = $mysqli->query($data);

    if($result->num_rows > 0) { // If num rows of database table aren't 0.
        ?>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Video</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $user = $row['user'];
                        $video = $row['video'];
                        $begin = $row['begin'];
                        $end = $row['end'];
                        ?>
                            <tr>
                                <td><?php echo $user; ?></td>
                                <td><?php echo $video; ?></td>
                                <td><?php echo $begin; ?></td>
                                <td><?php echo $end; ?></td>
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