<?php
    // Creating and Inserting the final data into final_records table of DB.
    // Steps: 1) Using TRUNCATE to clean the data from final_records table.
    //        2) Inserting the final data into final_records table with the calculated total_view_time (based on view_records table).
    //        3) Updating the final data from final_records table in order to insert user_name, video_title and video_duration.
    $cleaning_data = "TRUNCATE TABLE final_records";
    $mysqli->query($cleaning_data);

    $view_time_calc = "INSERT INTO final_records (user_id, video_id, total_view_time)
                       SELECT user, video, SUM(end - begin) AS total_view_intervals
                       FROM view_records
                       GROUP BY user, video";
    $mysqli->query($view_time_calc);    

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