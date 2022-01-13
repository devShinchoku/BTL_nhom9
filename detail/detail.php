<?php
if (isset($_POST['id'])) {
    require '../config/db.php';
    if ($_POST['tab'] == 0) {
        $sql = "SELECT * FROM db_tourpart WHERE tour_id = {$_POST['id']}";
    } else {
        $sql = "SELECT * FROM db_tour WHERE tour_id = {$_POST['id']}";
    }
    $result = mysqli_query($conn, $sql);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        if ($_POST['tab'] == 0) {
            $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $output .= '
                <div>
                    <div class="ct-detail mt-3">
                        <button class="ct-detail-icon">
                            <i class="bi bi-geo-alt"></i>
                        </button>
                        <span class="ct-detail-font">
                        ' . $datas[0]['name'] . '
                        </span>

                    </div>
                    <div style="display:flex">
                        <div style="with:40%; padding:12px;">
                            <img src="https://media.hahalolo.com/2021/12/30/07/59/f38d74fda5c43e4303d53e0323b82d92-1640851191_320xauto_high.jpg.webp">
                            <div style="display:flex;font-size:1rem;">
                                <i class="bi bi-geo-alt"></i>
                                '.$datas[0]['city'].', '. $datas[0]['country'].'
                            </div>
                        </div>
                        <div style="with:60%; padding:12px;font-size:0.8rem;">
                            '.$datas[0]['info'].'
                        </div>
                    </div>
                </div>';
            if(mysqli_num_rows($result) > 2){
                for($i = 0; $i<mysqli_num_rows($result)-1; $i++){
                    $output .= '
                        <div>
                            <div class="ct-detail mt-3">
                                <button class="ct-detail-icon ct-detail-icon1">
                                    <i class="bi bi-geo-alt"></i>
                                </button>
                                <span class="ct-detail-font">
                                ' . $datas[$i]['name'] . '
                                </span>
                            </div>
                            <div style="display:flex">
                                <div style="with:40%">
                                    <img src="https://media.hahalolo.com/2021/12/30/07/59/f38d74fda5c43e4303d53e0323b82d92-1640851191_320xauto_high.jpg.webp">
                                    <div style="display:flex">
                                        <i class="bi bi-geo-alt"></i>
                                        '.$datas[$i]['city'].', '. $datas[$i]['country'].'
                                    </div>
                                </div>
                                <div style="with:60%">
                                    '.$datas[$i]['info'].'
                                </div>
                        </div>';
                }
            }
            if(mysqli_num_rows($result) > 1){
                $output .= '
                        <div>
                            <div class="ct-detail mt-3">
                                <button class="ct-detail-icon ct-detail-icon2">
                                    <i class="bi bi-flag"></i>
                                </button>
                                <span class="ct-detail-font">
                                ' . $datas[$i]['name'] . '
                                </span>
                            </div>
                            <div style="display:flex">
                                <div style="with:40%">
                                    <img src="https://media.hahalolo.com/2021/12/30/07/59/f38d74fda5c43e4303d53e0323b82d92-1640851191_320xauto_high.jpg.webp">
                                    <div style="display:flex">
                                        <i class="bi bi-geo-alt"></i>
                                        '.$datas[$i]['city'].', '. $datas[$i]['country'].'
                                    </div>
                                </div>
                                <div style="with:60%">
                                    '.$datas[$i]['info'].'
                                </div>
                        </div>';
            }
        }
        elseif($_POST['tab'] == 1){
            $data = mysqli_fetch_assoc($result);
            $output = $data['rules'];
        }
        elseif($_POST['tab'] == 2){
            $data = mysqli_fetch_assoc($result);
            if($data['promotion'] != 0)
                $output = 'Giảm '.$data['promotion'].'%';
            else
                $output = 'Không có khuyến mãi';
        }
        elseif($_POST['tab'] == 3){
            $data = mysqli_fetch_assoc($result);
            $output = $data['policy'];
        }
        else{
            $output = 'Không có gì ở đây cả';
        }
    }
    echo json_encode($output);
    mysqli_close($conn);
}
