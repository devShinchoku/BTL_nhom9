<?php
require('config/db.php');
if (isset($_POST["last_id"])) {
    if ($_POST["last_id"] != 0) {
        $query = " SELECT * FROM view_tour WHERE tour_id < {$_POST["last_id"]}";
    } else {
        $query = "SELECT * FROM view_tour";
    }

    if(isset($_POST['search_arr'][0])){
        if ($_POST["last_id"] != 0)
            $query .=" AND";
        else
            $query .=" WHERE";
        $query .=" (tour_name LIKE '%{$_POST['search_arr'][0]}%' OR country LIKE '%{$_POST['search_arr'][0]}%' OR city LIKE '%{$_POST['search_arr'][0]}%' OR district LIKE '%{$_POST['search_arr'][0]}%' OR address LIKE '%{$_POST['search_arr'][0]}%')";
        
        if($_POST['search_arr'][1] != '')
            $query .=" AND starttime < '{$_POST['search_arr'][1]}'";
    }
    
    if(isset($_POST['search_arr'][2])){
        if($_POST['search_arr'][2] != '')
            $query .=" AND (tour_name LIKE '%{$_POST['search_arr'][2]}%' OR country LIKE '%{$_POST['search_arr'][2]}%' OR city LIKE '%{$_POST['search_arr'][2]}%' OR district LIKE '%{$_POST['search_arr'][2]}%' OR address LIKE '%{$_POST['search_arr'][2]}%')";
        if($_POST['search_arr'][2] != '')
            $query .=" AND (tour_name LIKE '%{$_POST['search_arr'][3]}%' OR country LIKE '%{$_POST['search_arr'][3]}%' OR city LIKE '%{$_POST['search_arr'][3]}%' OR district LIKE '%{$_POST['search_arr'][3]}%' OR address LIKE '%{$_POST['search_arr'][3]}%')";
        if($_POST['search_arr'][4] != '')
            $query .=" AND category_name LIKE '%{$_POST['search_arr'][4]}%'";
        if($_POST['search_arr'][5] != 2)
            $query .=" AND type = {$_POST['search_arr'][5]}";
        if($_POST['search_arr'][6] != '')
            $query .=" AND tour_long = {$_POST['search_arr'][6]}";
        if($_POST['search_arr'][8] == 'true')
            $query .=" AND promotion > 0";
        if($_POST['search_arr'][9] == 'true')
            $query .=" AND is_installment = 1";
        
    }
    $query .=" ORDER BY tour_id DESC LIMIT 6";
    // echo $query;
    $result = mysqli_query($conn,$query);
    $output = '';
    $last_id = 0;
    if (mysqli_num_rows($result) > 0) {
        $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach ($datas as $row) {
            $output .= '
                <div class="card mt-3">
                    <div class="card-header m-content-header">
                        <div class="m-host">
                            <a class="host text-decoration-none">
                                <img src="https://media.hahalolo.com/3020/06/17/13/5ee2d8913862a170cb80d8d1200617134632zV_40x40_high.jpg.webp" alt="">
                                <span class="host-name">
                                   '.$row["host_name"].'
                                </span>
                            </a>
                            <button class="host-like-button">
                                <i class="bi bi-emoji-heart-eyes"></i>
                                HaHa trang
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="carouselControls'.$row["tour_id"].'" class="carousel slide mt-2" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/f1c7a859c510aff81a14bafcf12cf97d-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/fbffe78170600953993703b1845c45e8-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/4885429e7b5d0690dac4799ac3c5e9bf-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/cc47dc746d0f2e60f8dda43a206338a8-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/faa32a5b56388d84757c4b66c6cc6d81-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/0e0fdce1f172aded9d71edfca5700019-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.hahalolo.com/2021/01/05/07/04/88dd80066bc10f878abf1bd2dbfcb675-1609830240_640xauto_high.jpg.webp" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls'.$row["tour_id"].'" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls'.$row["tour_id"].'" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="tour-name mt-3">
                            '.$row["category_name"].'
                        </div>
                        <div class="tour-info mt-2">
                            <h6 class="tour-schedule">
                            <a href="detail/?id='.$row["tour_id"].'"> '.$row["tour_name"].'</a>
                            </h6>
                            <div class="tour-long">
                                '.$row["tour_long"].' ngày
                            </div>
                        </div>
                        <div class="tour-loc">
                            <i class="bi bi-signpost"></i>
                            <h5 class="tour-loc1">'.$row["district"].' - '.$row["city"].'</h5>
                        </div>
                        <div class="w-temper-saclesalendar">
                            <i class="bi bi-calendar"></i>
                            <h5 class="w-temper-saclesalendar1">'.date('d-m-Y').'</h5>
                        </div>
                        <div class="mt-2 tour-sort-info" style="font-size: 0.95rem;">
                            '.$row["description"].'
                        </div>
                        <div class="h-price">
                            <div>
                                <div class="h-price1">
                                    <b>Giá chỉ từ</b>
                                    <span>'.number_format($row["man_price"],0,',','.').' ₫</span>
                                </div>
                            </div>
                            <button class="h-price2">
                                <a href="detail/?id='.$row["tour_id"].'">Xem nhanh</a>
                                <i class="bi bi-caret-right"></i>
                            </button>
                        </div>

                        <div class="h-interactive mt-4">
                            <div class="h-interactive1">
                                <i class="bi bi-emoji-heart-eyes"></i>
                                <div>
                                    Tuaño Sheila, Sa Rương và 55 người khác
                                </div>
                            </div>
                            <div class="h-interactive2">
                                <span class="h-interactive2-iteam">
                                    7 Bình luận
                                </span>
                                <span class="h-interactive2-iteam">
                                    6 Lượt chia sẻ
                                </span>
                            </div>
                        </div>
                        <hr class="mb-1">
                        <div class="btn-interactive">
                            <button class="btn-interactive1">
                                <i class="bi bi-emoji-heart-eyes"></i>
                                haha
                            </button>
                            <button class="btn-interactive1">
                                <i class="bi bi-chat-dots-fill"></i>
                                bình luận
                            </button>
                            <button class="btn-interactive1">
                                <i class="bi bi-send"></i>
                                chia sẻ
                            </button>
                        </div>
                        <hr class="mt-1 mb-1">
                    </div>
                </div>';
            $last_id = $row["tour_id"];
        }
    } else {
        $output.='<div class="card mt-3" style="min-height:100px;justify-content:center; text-align: center; font-size: 24px; color="rgba(0, 0, 0, 0.54)"> Không có kết quả nào phù hợp</div>';
    }

    $output .= '<div id="clearfix_id" data-last_id="'.$last_id.'"></div>';

    echo json_encode($output);
    }
    mysqli_close($conn);
?>