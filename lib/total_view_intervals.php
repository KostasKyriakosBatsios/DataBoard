<?php
    // Creating and Inserting the final data into final_records table of DB.
    // Steps: 1) Using TRUNCATE to clean the data from final_records table.
    //        2) Inserting the final data into final_records table with the calculated total_view_time (based on view_records table).
    //        3) Updating the final data from final_records table in order to insert user_name, video_title and video_duration.
    require_once "calculation_of_tvt.php";
    
    $cleaning_data = "TRUNCATE TABLE final_records";
    $mysqli->query($cleaning_data);

    // getting all the entries of the table view_records
    $entries = "SELECT * FROM view_records";
    $result = $mysqli->query($entries);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // calling respectable function to calculate the total view time
    $totalviewtime = calculateTotalViewTime($data);

    // inserting the user, video and total view time into the final_records table
    $view_time_calc = "INSERT INTO final_records (user_id, video_id, total_view_time)
                    SELECT user video, ?
                    FROM view_records
                    GROUP BY user, video;";
    $st = $mysqli->prepare($view_time_calc);
    $st->bind_param('i', $totalviewtime);
    $st->execute(); 

    $final_data = "UPDATE final_records
                    SET user_name = (
                        SELECT username
                        FROM users
                        WHERE final_records.user_id = users.id
                    ),
                    video_title = (
                        SELECT title
                        FROM videos
                        WHERE final_records.video_id = videos.id
                    ),
                    video_duration = (
                        SELECT duration
                        FROM videos
                        WHERE final_records.video_id = videos.id
                    )";
    $mysqli->query($final_data);   
?>