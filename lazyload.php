<?php
require('config/constants.php');
if (isset($_POST["last_id"])) {
    //sleep(5);
    if ($_POST["last_id"] != '') {
        $query = " SELECT * FROM view_tour 
                WHERE id < '{$_POST["last_id"] }'
                ORDER BY id DESC 
                LIMIT 4";
    } else {
        $query = "SELECT * FROM view_tour 
                ORDER BY id DESC LIMIT 4";
    }

    $statement = $connect->prepare($query);

    $statement->execute();

    $total_row = $statement->rowCount();

    $output = '';
    $not_found = '';
    $last_id = 0;
    if ($total_row > 0) {
        $result = $statement->fetchAll();
        $count = 0;
        $class = '';
        foreach ($result as $row) {
            $output .= "abc";
            $last_id = $row["ma_tour"];
            $count++;
        }
    } else {
        $not_found = '
  <div align="center" class="alert alert-info">No more data found</div>
  ';
    }

    $output .= '<div class="clearfix" id="clearfix_id" data-last_id="' . $last_id . '" style="float: none;"></div>';

    $test_output = array(
        'content_output' => $output,
        'no_data_output' => $not_found
    );

    echo json_encode($test_output);
}
