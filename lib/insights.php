<?php
    require_once "dbconnect.php";

    // Selecting Total Users, Total Videos and Total Views.
    $users_query = "SELECT user
                    FROM view_records
                    GROUP BY user";
    $users = $mysqli->query($users_query);
    $total_users = $users->num_rows;

    $videos_query = "SELECT video
                     FROM view_records
                     GROUP BY video";
    $videos = $mysqli->query($videos_query);
    $total_videos = $videos->num_rows;

    // (potential for next time -> total_views instead of begin.)
    $views_query = "SELECT begin
                    FROM view_records
                    GROUP BY begin";
    $views = $mysqli->query($views_query);
    $total_views = $views->num_rows;

    if($total_users > 0 && $total_videos > 0 && $total_views > 0) { // If num rows of database table aren't 0.
        ?>
           <!-- Total Users -->
           <div class="users">
                <span class="material-icons-sharp">group</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Users</h3>
                        <h1><?php echo $total_users; ?></h1>
                    </div>
                    <div class="progress">
                        <img src="img/users.png" alt="users">
                    </div>
                </div>
                <small class="text-muted">Last 24 Hours</small>
            </div>
            <!-- Total Videos -->
            <div class="videos">
                <span class="material-icons-sharp">smart_display</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Videos</h3>
                        <h1><?php echo $total_videos; ?></h1>
                    </div>
                    <div class="progress">
                        <img src="img/videos.png" alt="videos" height="86px" width="80px">
                    </div>
                </div>
                <small class="text-muted">Last 24 Hours</small>
            </div>
            <!-- Total Views -->
            <div class="views">
                <span class="material-icons-sharp">visibility</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Views</h3>
                        <h1><?php echo $total_views; ?></h1>
                    </div>
                    <div class="progress">
                        <img src="img/views.png" alt="views" height="82px" width="80px">
                    </div>
                </div>
                <small class="text-muted">Last 24 Hours</small>
            </div>
        <?php
    }
?>