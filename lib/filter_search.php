<?php
    require_once "dbconnect.php";

    if(isset($_POST['input'])) {

        $input = $_POST['input'];

        // Selecting All according to the User ID input, and in descending order based on User ID and Video ID.
        $searchByUserID = "SELECT * FROM view_records 
                           WHERE user = '{$input}' 
                           ORDER BY user DESC, video DESC";

        $result = $mysqli->query($searchByUserID);

        if($result->num_rows > 0) { // If num rows of database table aren't 0.
            ?>
                <table>
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
                </table> 
            <?php
        } else {
            // No data found message.
            echo "<h2 class='no-data-found'>No data Found...</h2>";
        }
    }
?>