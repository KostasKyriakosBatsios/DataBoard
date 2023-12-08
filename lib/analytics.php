<?php
    require_once "dbconnect.php";

    // Selecting Most Recently Added User.
    $user_query = "SELECT user
                   FROM view_records
                   GROUP BY user DESC
                   LIMIT 1";

    // Selecting Most Recently Added Video.
    $video_query = "SELECT video
                    FROM view_records
                    GROUP BY video DESC
                    LIMIT 1";

    // Selecting Max Video Duration. 
    // (potential for next time -> max_video_duration instead of max_video.)
    $video_maxDur_query = "SELECT MAX(video) AS max_video_duration
                           FROM view_records";

    // Selecting Min Video Duration. 
    // (potential for next time -> min_video_duration instead of min_video.)
    $video_minDur_query = "SELECT MIN(video) AS min_video_duration
                           FROM view_records";

    // Selecting Max View Time. 
    // (potential for next time -> max_view_time instead of max_end.)
    $maxViewTime_query = "SELECT MAX(end) AS max_view_time
                          FROM view_records";

                           
    // Selecting Min View Time. 
    // (potential for next time -> min_view_time instead of min_end.)
    $minViewTime_query = "SELECT MIN(end) AS min_view_time
                          FROM view_records;";

    $recently_added_user = $mysqli->query($user_query);
    $recently_added_video = $mysqli->query($video_query);
    $max_video_duration = $mysqli->query($video_maxDur_query);
    $min_video_duration = $mysqli->query($video_minDur_query);
    $max_view_time = $mysqli->query($maxViewTime_query);
    $min_view_time = $mysqli->query($minViewTime_query);

    if($recently_added_user->num_rows > 0 && $recently_added_video->num_rows > 0 && 
        $max_video_duration->num_rows > 0 && $min_video_duration->num_rows > 0 && 
        $max_view_time->num_rows > 0 && $min_view_time->num_rows > 0) { // If num rows of database table aren't 0.
        ?>
            <div class="item person_added">
                <div class="icon">
                    <span class="material-icons-sharp">person_add</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Most recently added User</h3>
                        <small class="text-muted">
                            <?php 
                                while($row = mysqli_fetch_assoc($recently_added_user)) { 
                                    $user_id = $row['user'];
                                    ?>
                                        Last User ID: <strong><?php echo $user_id; ?></strong>
                                    <?php
                                } 
                            ?> 
                        </small>
                    </div>
                    <h5 class="success">+1</h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item video_added">
                <div class="icon">
                    <span class="material-icons-sharp">smart_display</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Most recently added Video</h3>
                        <small class="text-muted">
                            <?php 
                                while($row = mysqli_fetch_assoc($recently_added_video)) { 
                                    $video_id = $row['video'];
                                    ?>
                                        Last Video ID: <strong><?php echo $video_id; ?></strong>
                                    <?php
                                } 
                            ?> 
                        </small>
                    </div>
                    <h5 class="success">+1</h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item max_vd">
                <div class="icon">
                    <span class="material-icons-sharp">timelapse</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Max Video Duration</h3>
                        <small class="text-muted">
                            <?php 
                                while($row = mysqli_fetch_assoc($max_video_duration)) { 
                                    $maxVideoDur = $row['max_video_duration'];
                                    ?>
                                        Max Duration: <strong><?php echo $maxVideoDur; ?></strong>
                                    <?php
                                } 
                            ?> 
                        </small>
                    </div>
                    <h5 class="success">max</h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item min_vd">
                <div class="icon">
                    <span class="material-icons-sharp">timelapse</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Min Video Duration</h3>
                        <small class="text-muted">
                            <?php 
                                while($row = mysqli_fetch_assoc($min_video_duration)) { 
                                    $minVideoDur = $row['min_video_duration'];
                                    ?>
                                        Min Duration: <strong><?php echo $minVideoDur; ?></strong>
                                    <?php
                                } 
                            ?> 
                        </small>
                    </div>
                    <h5 class="danger">min</h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item max_vt">
                <div class="icon">
                    <span class="material-icons-sharp">visibility</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Max View Time</h3>
                        <small class="text-muted">
                            <?php 
                                while($row = mysqli_fetch_assoc($max_view_time)) { 
                                    $maxViewTime = $row['max_view_time'];
                                    ?>
                                        Max View Time: <strong><?php echo $maxViewTime; ?></strong>
                                    <?php
                                } 
                            ?> 
                        </small>
                    </div>
                    <h5 class="success">max</h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item min_vt">
                <div class="icon">
                    <span class="material-icons-sharp">visibility</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Min View Time</h3>
                        <small class="text-muted">
                            <?php 
                                while($row = mysqli_fetch_assoc($min_view_time)) { 
                                    $minViewTime = $row['min_view_time'];
                                    ?>
                                        Min View Time: <strong><?php echo $minViewTime; ?></strong>
                                    <?php
                                } 
                            ?> 
                        </small>
                    </div>
                    <h5 class="danger">min</h5>
                    <h3></h3>
                </div>
            </div>
        <?php
    }
?>