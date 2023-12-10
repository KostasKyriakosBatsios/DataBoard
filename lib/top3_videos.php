<?php
    require_once "dbconnect.php";

    // Selecting the top 3 videos, that appears the most (most seen).
    $video1 = "SELECT video_id, COUNT(*) AS video_count
               FROM final_records
               GROUP BY video_id
               ORDER BY video_count DESC
               LIMIT 1"; # top 1 video.
               
    $video2 = "SELECT video_id, COUNT(*) AS video_count
               FROM final_records
               GROUP BY video_id
               ORDER BY video_count DESC
               LIMIT 1 OFFSET 1"; # top 2 video.

    $video3 = "SELECT video_id, COUNT(*) AS video_count
               FROM final_records
               GROUP BY video_id
               ORDER BY video_count DESC
               LIMIT 1 OFFSET 2"; # top 3 video.

    $n1_video = $mysqli->query($video1);
    $n2_video = $mysqli->query($video2);
    $n3_video = $mysqli->query($video3);

    if($n1_video->num_rows > 0 && $n2_video->num_rows > 0 && $n3_video->num_rows > 0) { // If num rows of database table aren't 0.
        ?>
            <div class="vid">
                <div class="profile-photo">
                    <img src="img/number-1.png" alt="">
                </div>
                <div class="vid-1-title">
                    <p><b>#1 Video</b></p>
                    <small class="text-muted">
                        <?php 
                            while($row = mysqli_fetch_assoc($n1_video)) { 
                                $videoID = $row['video_id'];
                                $videoCount = $row['video_count'];
                                ?>
                                    Video with ID: <strong><?php echo $videoID; ?></strong>,
                                    Total Count: <strong><?php echo $videoCount; ?></strong>
                                <?php
                            } 
                        ?>                                     
                    </small>
                </div>
            </div>
            <div class="vid">
                <div class="profile-photo">
                    <img src="img/number-2.png" alt="">
                </div>
                <div class="vid-2-title">
                    <p><b>#2 Video</b></p>
                    <small class="text-muted">
                        <?php 
                            while($row = mysqli_fetch_assoc($n2_video)) { 
                                $video2ID = $row['video_id'];
                                $video2Count = $row['video_count'];
                                ?>
                                    Video with ID: <strong><?php echo $video2ID; ?></strong>,
                                    Total Count: <strong><?php echo $video2Count; ?></strong>
                                <?php
                            } 
                        ?>                                     
                    </small>
                </div>
            </div>
            <div class="vid">
                <div class="profile-photo">
                    <img src="img/number-3.png" alt="">
                </div>
                <div class="vid-3-title">
                    <p><b>#3 Video</b></p>
                    <small class="text-muted">
                        <?php 
                            while($row = mysqli_fetch_assoc($n3_video)) { 
                                $video3ID = $row['video_id'];
                                $video3Count = $row['video_count'];
                                ?>
                                    Video with ID: <strong><?php echo $video3ID; ?></strong>,
                                    Total Count: <strong><?php echo $video3Count; ?></strong>
                                <?php
                            } 
                        ?>
                    </small>
                </div>
            </div>
        <?php
    }
?>