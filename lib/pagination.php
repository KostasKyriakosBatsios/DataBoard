<?php
    // Creating pagination.
    $start = 0;
    $rows_per_page = 10;

    // Getting the total number of records from the DB.
    $rec = "SELECT * FROM final_records";
    $records = $mysqli->query($rec);
    $nr_of_rows = $records->num_rows;

    // Calculating the number of rows per page.
    $pages = ceil($nr_of_rows / $rows_per_page);

    // Handling pagination through btns.
    if(isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rows_per_page;
    }
?>