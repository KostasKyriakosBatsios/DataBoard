<?php
    // Creating and Inserting the final data into final_records table of DB.
    // 3 Main Parts: 
    // Part 1. Using TRUNCATE to clean the data from final_records table.
    // Part 2. Inserting the final data into final_records table with the calculated total_view_time (based on view_records table).
    // Part 3. Updating the final data from final_records table in order to insert user_name, video_title and video_duration.
    
    // --------------------- Part 1 ------------------------ //

    $cleaning_data = "TRUNCATE TABLE final_records";
    $mysqli->query($cleaning_data);

    // The following query simply calculates the total view intervals "The mistaken total view time": 
    /*  $view_time_calc = "INSERT INTO final_records (user_id, video_id, total_view_time)
                           SELECT user, video, SUM(end - begin) AS total_view_intervals
                           FROM view_records
                           GROUP BY user, video";
        $mysqli->query($view_time_calc); */


    // --------------------- Part 2 ------------------------ //

    // Step 1: Retrieving distinct user and video combinations.
    $all_combinations_query = "SELECT DISTINCT user, video FROM view_records";
    $combinations_result = $mysqli->query($all_combinations_query);

    if ($combinations_result) {

        while ($combination_row = $combinations_result->fetch_assoc()) {
            $user_id = $combination_row['user'];
            $video_id = $combination_row['video'];

            // Step 2: Retrieving distinct records for the current user and video.
            $user_video_records_query = "SELECT DISTINCT * FROM view_records WHERE user = $user_id AND video = $video_id";
            $user_video_records_result = $mysqli->query($user_video_records_query);

            if ($user_video_records_result) {
                // Step 3: Filtering duplicate records based on the following:
                // >> If there are same beginnings: we keep only the one row with the biggest ending.
                // >> If there are same endings: we keep only the one row with the smallest begining.
                $filteredRecords = filterDuplicateRecords($user_video_records_result);
                
                // Step 4: Processing records to remove overlaps.
                $finalRecords = processRecords($filteredRecords);

                // Step 5: Saving final records into the final_records table of the database with the calculated total_view_time.
                saveToFinalRecords($finalRecords, $user_id, $video_id, $mysqli);

            } else {
                echo "Error fetching user and video records: " . $mysqli->error;
            }
        }

    } else {
        echo "Error fetching user and video combinations: " . $mysqli->error;
    }

    function filterDuplicateRecords($userVideoRecordsResult) {
        $filteredRecords = [];

        while ($record = $userVideoRecordsResult->fetch_assoc()) {
            // Check if a similar record already exists in filteredRecords.
            $existingRecord = findExistingRecord($filteredRecords, $record);

            if ($existingRecord !== null) {
                // Duplicate found, existingRecord has been updated in findExistingRecord.
                // Skip adding the current record, as it has been merged or replaced.
                continue;
            }

            // No duplicate found, add the record to the filteredRecords array.
            $filteredRecords[] = $record;
        }

        return $filteredRecords;
    }

    function findExistingRecord(&$filteredRecords, $currentRecord) {
        foreach ($filteredRecords as &$existingRecord) {
            // Check if the existing record has the same begin as the current record.
            if ($existingRecord['begin'] == $currentRecord['begin']) {
                // If there is the same beginning, keep the one with the longest end.
                if ($currentRecord['end'] > $existingRecord['end']) {
                    $existingRecord = $currentRecord;
                }

                // Skip adding the current record, as it has been merged or replaced.
                return $existingRecord;
            }
    
            // Check if the existing record has the same end as the current record.
            if ($existingRecord['end'] == $currentRecord['end']) {
                // If there is the same end, keep the one with the smallest beginning.
                if ($currentRecord['begin'] < $existingRecord['begin']) {
                    $existingRecord = $currentRecord;
                }
                // Skip adding the current record, as it has been merged or replaced.
                return $existingRecord;
            }
        }
        
        // If no match is found, return null.
        return null;
    }           

    function processRecords($records) {
        // Sort records based on the end value in ascending order.
        usort($records, function ($a, $b) {
            return $a['end'] - $b['end'];
        });
    
        $filteredRecords = [];
    
        foreach ($records as $currentRecord) {
            $overlapping = false;

            foreach ($filteredRecords as $key => $otherRecord) {
                // Check if the current record is within the range of the other record.
                if ($currentRecord['end'] >= $otherRecord['begin'] && $currentRecord['begin'] <= $otherRecord['end']) {
                    $overlapping = true;
    
                    // Keep the smallest begin and the largest end.
                    $filteredRecords[$key]['begin'] = min($filteredRecords[$key]['begin'], $currentRecord['begin']);
                    $filteredRecords[$key]['end'] = max($filteredRecords[$key]['end'], $currentRecord['end']);
    
                    break;
                }
            }
    
            // If no overlapping record is found, add the current record to the filteredRecords array.
            if (!$overlapping) {
                $filteredRecords[] = $currentRecord;
            }
        }
    
        return $filteredRecords;
    }

    function calculateTotalViewTime($records) {
        $totalViewTime = 0;
    
        foreach ($records as $record) {
            $begin = $record['begin'];
            $end = $record['end'];
            $totalViewTime += ($end - $begin) + 1; // Add 1 to include the start time in the total view time.
        }
    
        return $totalViewTime;
    }

    function saveToFinalRecords($records, $user_id, $video_id, $mysqli) {

        // Calculating Total View Time.
        $totalViewTime = calculateTotalViewTime($records);

        // Inserting the final data into final_records table with the calculated total_view_time.
        $view_time_calc = "INSERT INTO final_records (user_id, video_id, total_view_time) 
                           VALUES ($user_id, $video_id, $totalViewTime)";
        $mysqli->query($view_time_calc);
    }

    // --------------------- Part 3 ------------------------ //

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