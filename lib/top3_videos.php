<?php
    require_once "dbconnect.php";

    // Selecting the top 3 videos, that appears the most (most seen).
    $video1 = "SELECT video, COUNT(*) AS video_count
               FROM view_records
               GROUP BY video DESC
               LIMIT 1"; # top 1 video.
               
    $video2 = "SELECT video, COUNT(*) AS video_count
               FROM view_records
               GROUP BY video DESC
               LIMIT 1 OFFSET 1"; # top 2 video.

    $video2 = "SELECT video, COUNT(*) AS video_count
               FROM view_records
               GROUP BY video DESC
               LIMIT 1 OFFSET 2"; # top 3 video.

    $n1_video = $mysqli->query($video1);
    $n2_video = $mysqli->query($video2);
    $n3_video = $mysqli->query($video2);

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
                                $video_id = $row['video'];
                                $video_count = $row['video_count'];
                                ?>
                                    Video with ID: <strong><?php echo $video_id; ?></strong>,
                                    Total Count: <strong><?php echo $video_count; ?></strong>
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
                                $video2_id = $row['video'];
                                $video2_count = $row['video_count'];
                                ?>
                                    Video with ID: <strong><?php echo $video2_id; ?></strong>,
                                    Total Count: <strong><?php echo $video2_count; ?></strong>
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
                                $video3_id = $row['video'];
                                $video3_count = $row['video_count'];
                                ?>
                                    Video with ID: <strong><?php echo $video3_id; ?></strong>,
                                    Total Count: <strong><?php echo $video3_count; ?></strong>
                                <?php
                            } 
                        ?>
                    </small>
                </div>
            </div>
        <?php
    }
?>