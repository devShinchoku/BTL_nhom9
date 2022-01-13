<?php
if (isset($_GET['id'])) {
    require '../config/db.php';
    $sql = "SELECT * FROM view_tour WHERE tour_id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        include '../template/header.php';
?>
            <main class="container container1 mt-5 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div id="carouselControls<?php echo $row["tour_id"] ?>" class="carousel slide mt-2" data-bs-ride="carousel">
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
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls'.$row[" tour_id"].'" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls'.$row[" tour_id"].'" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="ct-tour-name mt-3">
                            <?php echo $data['category_name'] ?>
                        </div>
                        <h6 class="ct-tour-schedule mt-2">
                            <?php echo $data['tour_name'] ?>
                        </h6>
                        <div class="ct-startend">
                            <div class="ct-start">
                                <p class="ct-start1">
                                    Điểm khởi hành
                                </p>
                                <div>
                                    <button class="ct-start2">
                                        <i class="bi bi-geo-alt"></i>
                                    </button>

                                </div>
                                <p>
                                    <?php echo $data['city'] . ', ' . $data['country']; ?>
                                </p>
                                <p class="ct-startend-time">
                                    <?php
                                    $date = date("U");
                                    $dateArrS = getdate($date);
                                    echo $dateArrS["mday"] . '/' . $dateArrS["mon"] . '/' . $dateArrS["year"];
                                    ?>
                                </p>
                            </div>
                            <div class="ct-end">
                                <p class="ct-end1">
                                    Điểm kết thúc
                                </p>
                                <div>
                                    <button class="ct-end2">
                                        <i class="bi bi-flag"></i>
                                    </button>
                                </div>
                                <p>
                                    <?php echo $data['city'] . ', ' . $data['country']; ?>
                                </p>
                                <p class="ct-startend-time">
                                    <?php
                                    $date = strtotime('+' . $data['tour_long'] . ' day', $date);
                                    $dateArrE = getdate($date);
                                    echo $dateArrE["mday"] . '/' . $dateArrE["mon"] . '/' . $dateArrE["year"];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="ct-Tourcode mt-4">
                            <div class="ct-tourcode">
                                <ul class="ct-tourcode1">
                                    <li class="ct-tourcode1-1">
                                        <span>Mã tour:</span>
                                        <p class="mt-3">Tổng số ngày:</p>
                                    </li>
                                </ul>
                                <ul class="ct-tourcode1">
                                    <li class="ct-tourcode1-1">
                                        <p><?php echo $data['tour_id']; ?></p>
                                        <div class="mt-3">
                                            <?php echo $data['tour_long']; ?> ngày
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="ct-tourcode">
                                <ul class="ct-tourcode1">
                                    <li class="ct-tourcode1-1">
                                        <span>Ngày khởi hành:</span>
                                        <p class="mt-3">Ngày kết thúc:</p>
                                    </li>
                                </ul>
                                <ul class="ct-tourcode1">
                                    <li class="ct-tourcode1-1">
                                        <div class="ct-changedate">
                                            <p><?php echo $dateArrS["mday"] . '/' . $dateArrS["mon"] . '/' . $dateArrS["year"]; ?></p>
                                            <button class="ct-changedate-btn">Thay đổi ngày</button>
                                        </div>
                                        <p class="mt-3"><?php echo $dateArrE["mday"] . '/' . $dateArrE["mon"] . '/' . $dateArrE["year"]; ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="mt-2 mb-5">
                        <hr class="mt-3">

                        <div class="ct-muitab">
                            <button class="ct-muitab-btn" id="btnCT">
                                Chi tiết
                            </button>
                            <button class="ct-muitab-btn" id="btnQD">
                                Quy định riêng
                            </button>
                            <button class="ct-muitab-btn" id="btnKM">
                                Khuyến mãi
                            </button>
                            <button class="ct-muitab-btn" id="btnCS">
                                Chính sách riêng tư
                            </button>
                            <button class="ct-muitab-btn" id="btnLH">
                                Liên hệ
                            </button>
                        </div>
                        <hr>
                        <div>
                            <div id="tour-detail">
                                
                            </div>
                            <hr class="mt-5">
                            <div class="mt-3">
                                <h5>
                                    Chọn tháng khởi hành
                                </h5>
                            </div>
                            <button class="ct-departuremonth mt-3">
                                12/2021
                            </button>
                            <div class="mt-4">
                                <h5>
                                    Lịch khởi hành sắp tới
                                </h5>
                            </div>

                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>
                            <div class="ct-departureschedule mt-3">
                                <div class="ct-time-start mt-2">
                                    <p>
                                        Khởi hành
                                    </p>
                                    <h6>
                                        Thứ 3, 21/12/2021
                                    </h6>
                                </div>
                                <div class="ct-departureschedule-icon mt-4">
                                    <i class="bi bi-caret-right-fill"></i>
                                </div>
                                <div class="ct-time-end mt-2">
                                    <p>
                                        Kết thúc
                                    </p>
                                    <h6>
                                        Thứ 6, 24/12/2021
                                    </h6>
                                </div>
                                <h6 class="ct-price mt-2">
                                    1.760.000 ₫
                                </h6>
                                <div class="ct-Booknow mt-2">
                                    <button class="ct-booknow">
                                        Đặt ngay
                                    </button>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <button class="ct-btn-changesearch mx-5">Thay đổi tìm kiếm</button>
                    <div class="card mx-5 mt-3" style="width: 296px; height: 52px; border-radius: 10px 10px 0 0 ;">
                        <div class="card-body">
                            <div>
                                <b>
                                    <?php echo $data['host_name'] ?>
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-5" style="width: 296px; height: 88px; border-radius: 0px 0px 10px 10px ;">
                        <div class="card-body">
                            <div class="ct-interactive mt-3">
                                <i class="bi bi-emoji-heart-eyes"></i>
                                <span>
                                    <b>
                                        0
                                    </b>
                                    người Haha trang này
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-5 mt-3" style="width: 296px; height: 52px; border-radius: 10px 10px 0 0;">
                        <div class="card-body">
                            <div class="ct-introduce">
                                <div>
                                    <b>
                                        Giới thiệu
                                    </b>
                                </div>
                                <div class="ct-introduce1">
                                    <span>
                                        Chi tiết trang
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-5" style="width: 296px; height: 92px; border-radius: 0px 0px 10px 10px;">
                        <div class="card-body">
                            <div class="ct-radiosgrid mt-3">
                                <i class="bi bi-ui-radios-grid"></i>
                                <span>
                                    người Haha trang này
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <footer>
                <div class="container-fluid">
                    <div class="footer-Bottom">
                        <div class="footer-bottom1">
                            <div style="margin-left: 30vh;">
                                <p class="text-left">
                                    <b>Giá chỉ từ</b>
                                </p>
                                <div>
                                    <h6 class="price-tour-footer"><?php echo number_format($data["man_price"],0,',','.') ?> ₫</h6>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom2" style="margin-right: 38vh;">
                            <div>
                                <button class="btn-booknow ct-booknow">
                                    Đặt ngay
                                </button>
                            </div>
                            <div>
                                <button class="btn-start-day">
                                    Các ngày khởi hành khác
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <script>var id = <?php echo $_GET['id']; ?>;</script>
            <script src="../js/detail.js"></script>
<?php
    include  '../template/footer.php';
    } else require '..template/error/404.php';
} else require '..template/error/404.php';
?>