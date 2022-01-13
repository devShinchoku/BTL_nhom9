<?php
include("template/header.php");
?>
<main class="container mt-3">
    <div class="row">
        <div class="sidebar col-md-3">
            <div id="weather">
            </div>
        </div>
        <div class="m-tour col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="m-search">
                        <div class="search-item">
                            <div class = "col-md-6">
                                <div class="inputdecor">
                                    <input type="text" name="search1" id="search1" class = "effect-17">
                                    <label for="search1" class="lable-name">
                                        <span class="content-name2 focus-border">
                                            Bạn muốn đi đâu
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="inputdecor inputdecor-them">
                                    <label class="m-search-label">Ngày khởi hành</label>
                                    <input type="date" class="m-search-input" id="search2">
                                </div>
                            </div>
                        </div>
                        <div class="extend-item">
                            <div class="search-item">
                                <div class="inputdecor col-md-6">
                                    <input type="text" name="search3" id="search3">
                                    <label for="search3" class="lable-name">
                                        <span class="content-name2">
                                            Điểm khởi hành
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor col-md-6">
                                    <input type="text" name="search4" id="search4">
                                    <label for="search4" class="lable-name">
                                        <span class="content-name2">
                                            Điểm đến
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="search-item">
                                <div class="inputdecor col-md-6">
                                    <input type="text" name="search5" id="search5">
                                    <label for="search5" class="lable-name">
                                        <span class="content-name2">
                                            Chủ để tour
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor col-md-6">
                                    <select name="search6" id="search6" class = "search-location">
                                        <option value="2">Tất cả</option>
                                        <option value="1">Nước ngoài</option>
                                        <option value="0">Trong nước</option>
                                    </select>
                                    <label for="search6" class="lable-name">
                                        <span class="content-name2 tourtype">
                                            Loại tour
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="search-item">
                                <div class="inputdecor col-md-6">
                                    <input type="number" name="search5" id="search5" min="0">
                                    <label for="search5" class="lable-name">
                                        <span class="content-name2">
                                            Số ngày đi tour
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor col-md-6">
                                    <input type="text" name="search6" id="search6">
                                    <label for="search6" class="lable-name">
                                        <span class="content-name2">
                                            khoảng giá
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="search-item1" style = "display: flex;font-size: 18px;">
                                <div class="inputdecor1 col-md-6">
                                    <input type="checkbox" name="search7" id="search7">
                                    <label for="search7" class="lable-name">
                                        <span class="content-name3">
                                            Có áp dụng khuyến mãi
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor1 col-md-6">
                                    <input type="checkbox" name="search8" id="search8">
                                    <label for="search8" class="lable-name">
                                        <span class="content-name3">
                                            Tour trả góp
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div> 
                    </form>
                    <div class="btn">
                        <button class="btn1" id="btnExtendSearch" data-btn_addon="">Tìm kiếm nâng cao</button>
                        <button type="submit" id="btnSearch" class="btn-m-search">Tìm kiếm</button>
                    </div>
                    <button class="btn-m-search-code">
                        Tra cứu mã đặt Tour
                    </button>
                </div>
            </div>
            <div class="m-content">
                <div id="clearfix_id" data-last_id="0"></div>
            </div>
        </div>
        <div class="sidebar col-md-3">
            <div class="card">
                <img src="https://www.hahalolo.com/507f4286f025cc6eda4e27bd01644cb9.jpg" alt="" class="h_ads">
            </div>
            <div class="card mt-3">
                <div class="card-body experience">
                    <div>
                        <h5 class="card-title exp">Trải nghiệm nổi bật</h5>
                    </div>
                    <div class="">
                        <a href="" class="card-title exp exp1">Xem tất cả</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <img class="jss294" alt="Note ngay 4 Resort siêu ưu đãi cho kỳ du lịch cuối năm" loading="lazy" width="264" height="149" src="https://media.hahalolo.com/2021/12/10/03/56/1b9b7e4793c0f7edda5025c1a7ecf5bf-1639108563_320xauto_high.jpg.webp">
                    <div class="h_voucher">
                        <img src="https://media.hahalolo.com/2021/12/08/08/57/288b87c58a6d7e023e5afc7a6d0e21ad-1638953844_40x40_high.jpg.webp" alt="" class="logo-mini">
                        <div class="h_voucher_titletime">
                            <a href="" class="h_voucher-title">SĂN VOUCHER CÙNG HAHALOLO</a>
                            <h5 class="h_voucher-time">5 ngày trước</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body h_papers">
                    <img src="data:image/png;base64,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" alt="">
                    <img src="https://www.hahalolo.com/29ee0ff68f50d4c56881ceefd9c09b4c.png" alt="">
                    <img src="data:image/png;base64,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" alt="">
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body copyright">
                    <ul class="copyright_list">
                        <li class="copyright_list-item">
                            <a href="#">Giới thiệu</a>
                        </li>
                        <li class="copyright_list-item">
                            <a href="#">Quyền riêng tư</a>
                        </li>
                    </ul>
                    <ul class="copyright_list">
                        <li class="copyright_list-item">
                            <a href="#">Điều khoản</a>
                        </li>
                        <li class="copyright_list-item">
                            <a href="#">Cookie</a>
                        </li>
                        <li class="copyright_list-item">
                            <a href="#">Tuyển dụng</a>
                        </li>
                    </ul>
                    <ul class="copyright_list">
                        <li class="copyright_list-item">
                            <a href="#">Hỗ trợ</a>
                        </li>
                        <li class="copyright_list-item">
                            <a href="#">Tiếp thị liên kết</a>
                        </li>
                    </ul>
                    <span class="copyright-text">
                        © Hahalolo 2017. Đã đăng ký bản quyền
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/extend-search.js"></script>
<script src="js/fetch.js"></script>
<script src="js/weather.js"></script>
<script src="js/js.js"></script>
<?php
include("template/footer.php");
?>