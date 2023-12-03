<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBoard</title>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- CSS Files & Icons -->
    <link rel="stylesheet" href="css/databoard.css">
    <link rel="stylesheet" href="css/pagination.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <?php
        // Setting pagination highlighting!
        if(isset($_GET['page-nr'])) {
            $page_id = $_GET['page-nr'];
        } else {
            $page_id  = 1;
        }
    ?>
</head>
<body id="<?php echo $page_id ?>">
    <div class="container">
        <!-- Sidebar Menu Section  -->
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="img/Logo.png" alt="">
                    <h2>Data<span class="success">Board</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#recent-data">
                    <span class="fa fa-database"></span>
                    <h3>Recent Data</h3>
                </a>
                <a href="#top-videos">
                    <span class="material-icons-sharp">smart_display</span>
                    <h3>Top Videos</h3>
                </a>
                <a href="#analytics">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- Main Section  -->
        <main>
            <h1>Dashboard</h1>

            <div class="date">
                <input type="date" id="today_date">
            </div>
            
            <div class="insights">
                <!-- Total Users -->
                <div class="users">
                    <span class="material-icons-sharp">group</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Users</h3>
                            <h1>500</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
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
                            <h1>500</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>62%</p>
                            </div>
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
                            <h1>500</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>35%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>

            <!-- Recent Data (Table) -->
            <div class="recent-data" id="recent-data">
                <div class="data-start">
                    <h2>Recent Data</h2>
                    <input type="text" class="form-control" id="filter_search" autocomplete="off" placeholder="Search by User ID">
                </div>

                <table id="show_data">
                    <?php 
                        require_once "lib/show_data.php"; 
                    ?>
                </table>

                <div id="search_result"></div>

                
                <div class="pagination">
                    <!-- Showing page info -->
                    <div class="page-info">
                        <?php
                            if(!isset($_GET['page-nr'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page-nr'];
                            }
                        ?>
                        Showing <?php echo $page ?> of <?php echo $pages ?> pages
                    </div>
                    
                    <!-- Go to the first page -->
                    <a href="?page-nr=1">First</a>

                    <!-- Go to the previous page -->
                    <?php 
                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
                            ?>
                                <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                            <?php
                        } else {
                            ?>
                                <a>Previous</a>
                            <?php
                        }
                    ?>

                    <div class="page-numbers">
                        <?php
                            for($counter = 1; $counter <= $pages; $counter++) {
                                ?>
                                    <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                                <?php
                            }
                        ?>
                    </div>

                    <!-- Go to the next page -->
                    <?php 
                        if(!isset($_GET['page-nr'])) {
                            ?>
                                <a href="?page-nr=2">Next</a>
                            <?php
                        } else {
                            if($_GET['page-nr'] >= $pages) {
                                ?>
                                    <a>Next</a>
                                <?php
                            } else {
                                ?>
                                    <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                                <?php
                            }
                        }
                    ?>

                    <!-- Go to the last page -->
                    <a href="?page-nr=<?php echo $pages ?>">Last</a>
                </div>
            </div>
        </main>

        <div class="right">
            <!-- Menu, Dark Mode <-> Light Mode -->
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Alex</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="img/Admin.png" alt="">
                    </div>
                </div>
            </div>
            <!-- Top Videos -->
            <div class="top-videos" id="top-videos">
                <h2>Top Videos</h2>
                <div class="top-3-videos">
                    <div class="vid">
                        <div class="profile-photo">
                            <img src="img/number-1.png" alt="">
                        </div>
                        <div class="vid-1-title">
                            <p><b>#1 Video</b></p>
                            <small class="text-muted">...#1 video's name goes here...</small>
                        </div>
                    </div>
                    <div class="vid">
                        <div class="profile-photo">
                            <img src="img/number-2.png" alt="">
                        </div>
                        <div class="vid-2-title">
                            <p><b>#2 Video</b></p>
                            <small class="text-muted">...#2 video's name goes here...</small>
                        </div>
                    </div>
                    <div class="vid">
                        <div class="profile-photo">
                            <img src="img/number-3.png" alt="">
                        </div>
                        <div class="vid-3-title">
                            <p><b>#3 Video</b></p>
                            <small class="text-muted">...#3 video's name goes here...</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Analytics -->
            <div class="analytics" id="analytics">
                <h2>Analytics</h2>
                <div class="item person_added">
                    <div class="icon">
                        <span class="material-icons-sharp">person_add</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Most recently added User</h3>
                            <small class="text-muted">...last user's id...</small>
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
                            <small class="text-muted">...last video's id...</small>
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
                            <small class="text-muted">...max video's duration...</small>
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
                            <small class="text-muted">...min video's duration...</small>
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
                            <small class="text-muted">...max view's time...</small>
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
                            <small class="text-muted">...min view's time...</small>
                        </div>
                        <h5 class="danger">min</h5>
                        <h3></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JS Scripts -->
    <script src="js/databoard.js" type="text/javascript"></script>
    <script src="js/filtering.js" type="text/javascript"></script>
    <script>
        let links = document.querySelectorAll('.pagination .page-numbers > a');
        let bodyId = parseInt(document.body.id) - 1;
        links[bodyId].classList.add("active")
    </script>
</body>
</html>