// Filter Search by User Id. Using Ajax and jQuery to handle filter_search.php
$(document).ready(function() {

    $("#filter_search").keyup(function() {
        
        var input = $(this).val();
        
        if(input != "") {
            $.ajax({
                url: "lib/filter_search.php",
                method: "POST",
                data: {input:input},
                success: function(data) {
                    $("#show_data").css("display", "none");
                    $(".pagination").css("display", "none");
                    $("#search_result").html(data);
                    $("#search_result").css("display", "block");
                }
            });
        } else {
            $("#search_result").css("display", "none");
            $("#show_data").css("display", "table");
            $(".pagination").css("display", "flex");
        }
    });
});