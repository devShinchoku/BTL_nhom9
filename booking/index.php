<?php
if(isset($_GET['id'])){{
    $conn = mysqli_connect('localhost','root','','tour');
    if(!$conn){
        die("Ket noi that bai");
    }
    $sql="SELECT * FROM db_tour where tour_id = '{$_GET['id']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);
    }
    else
        echo 'Lỗi truy cập';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="css/intlTelInput.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="js/booking.js"></script>
</head>

<body>
    <header class="container-fluid fixed-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="/" class="h-logo navbar-brand"><svg viewBox="0 0 24 24" class="MuiSvgIcon-root jss7"
                        focusable="false" aria-hidden="true">
                        <path
                            d="M22 11.5c0-1-.2-1.9-.6-2.8-1.4-4.2-5.6-7-10-6.8h-.1c-1.7.2-3.4.7-4.9 1.8-4.6 3-5.8 9.2-2.8 13.9v.1c.2.2.3.6.6.8l.1.1c1.9 2.2 4.7 3.6 7.7 3.6h8.7c.8 0 1.3-.6 1.3-1.3v-9.4z">
                        </path>
                        <path fill="#FFF"
                            d="M16.9 16.8c-.7.9-1.7 1.4-2.8 1.5-.5 0-1-.1-1.4-.5-.3-.3-.5-.8-.4-1.2 0-.2 0-.4.1-.6 0-.2.1-.5.2-.8l1-3.8c-.2.3-.4.5-.6.8-.9 1.8-1.7 3.7-2.4 5.6 0 .1-.1.3-.2.4h-.1c-.1.1-.3.2-.5.2s-.4-.1-.5-.2c-.3-.2-.4-.4-.5-.6-.1-.3-.2-.5-.2-.8s0-.5.1-.8l2.5-9.9c0-.1.1-.2.2-.2l1.7-.5h.1c.1 0 .1.1.1.2l-3.1 12v.2c0-.1.1-.2.2-.5l.3-.9c.2-.7.5-1.4.7-2s.5-1.3.8-1.9c.3-.6.6-1.1 1.1-1.6.1-.1.2-.2.3-.2v-.1s0-.1.1-.1v-.1h.2c.3 0 .5.1.7.3.2.3.2.6.2.9 0 .4-.1.8-.2 1.2l-.3 3.2c-.1.4-.1.8-.1 1.2.1.2.3.3.8.2.7-.2 1.3-.5 1.8-.9.1 0 .2.2.1.3z">
                        </path>
                    </svg>
                </a>
                <!-- <div class="text-search">
                    <div class="text-search-in">
                        <input class="text-search-inn" placeholder="Tìm kiếm" type="text">
                        <i class="bi bi-search"></i>
                        </div>
                    </div>
                </div> -->
                <ul class="h-menu navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-newspaper"></i>
                            </div>
                            Bảng tin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-binoculars"></i>
                            </div>
                            Trải nghiệm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            Tour
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-building"></i>
                            </div>
                            Khách sạn
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-ticket"></i>
                            </div>
                            Vé máy bay
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-bicycle"></i>
                            </div>
                            Thuê xe
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-bag"></i>
                            </div>
                            Mua sắm
                        </a>
                    </li>
                </ul>
                <ul class="h-user navbar-nav justify-content-end">
                    <li class="nav-item"><span class="h-user-iteam">
                            <i class="bi bi-cart3"></i>
                        </span></li>
                    <li class="nav-item"><span class="h-user-iteam">
                            <i class="bi bi-wallet2"></i>
                        </span></li>
                    <li class="nav-item"><span class="h-user-iteam">
                            <i class="bi bi-arrow-down-circle"></i>
                        </span></li>
                    <li class="nav-item"><img id="img" class="style-scope yt-img-shadow" alt="Hình ảnh đại diện"
                            height="32" width="32"
                            src="https://yt3.ggpht.com/yti/APfAmoFV39QFrpgQ605BDJUj7quJ-JIHmqaWYE59wro_EQ=s88-c-k-c0x00ffffff-no-rj-mo">
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <main class="container">
        <form>
            <div class="row">
                <div class="top-info-tour" style="padding: 8px;">
                    <div class="back-up">
                        <button class="btn-back-up">
                            <i class="bi bi-chevron-double-left" style="color: #24a8d8;font-size: 14px;"></i>
                            Quay lại
                        </button>
                    </div>
                    <div class="info-tour">
                        <h5 class="info-tour-h" style="padding: 0px 16px;">
                            <b>Thông tin đặt Tour</b>
                        </h5>
                    </div>
                </div>
                <div class="col-md-8" style="padding: 0 24px;background-color: #FAFAFB;">
                
                    <div class="info-lh1 card col-md-6">
                        <div class="info-lh2">
                            <div class="circle-bl">
                                <div class="circle-bl-1">
                                    <h6 style="width:500px;">Thông tin liên hệ</h6>
                                </div>
                            </div>
                            <div class="info-lh3">
                                <div class="inputdecor-book btn-login-book">
                                    <input type="text" name="name1" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Họ*
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor-book btn-login-book">
                                    <input type="text" name="name2" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Tên đệm và tên*
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="info-lh4">
                                <div class="gender">
                                    <p>Giới tính</p>
                                </div>
                                <div class="male-female">
                                    <div class="gender-lh4">
                                        <input class="fe-male" type="radio" name="chooseone" value="Nam"
                                            style="height:20px; width:20px; vertical-align: middle;" checked>
                                        <label for="Nam">Nam</label>
                                    </div>
                                    <div class="gender-lh4">
                                        <input class="fe-male" type="radio" name="chooseone" value="Nu"
                                            style="height:20px; width:20px; vertical-align: middle;">
                                        <label for="Nu">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="info-lh5">
                                <div style="display: flex;">
                                    <div class="inputdecor-book btn-login-book">
                                        <input class="full-w" type="text" name="name3" autocomplete="off" required
                                            style="margin-left: -33px;border-radius: 0px; width: 100%;" />
                                        <label for="name" class="lable-name-book">
                                            <span class="content-name2-book">
                                                Email*
                                            </span>
                                        </label>
                                    </div>
                                    <div class="lh-5-phone-number-cont">
                                        <div class="ma-quoc-gia">
                                            <meta name="viewport" content="width=device-width, initial-scale=1" />
                                            <div class="container-phone-number">
                                                <form id="login-phone-number">
                                                    <input id="phone" type="number" name="phone" step="number" />
                                                </form>
                                            </div>
                                        </div>
                                        <!-- <div class="lh5-phone-number">
            
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="info-abate-4">
                                <div class="inputdecor-book-location btn-login-book" style="width: 100%;">
                                    <input type="text" name="name5" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px; width: 100%;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Địa chỉ*
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="sl-customer card" style="padding: 8px; margin-bottom: 16px;">
                        <div class="customer">
                            <div class="circle-bl">
                                <div class="circle-bl-1">
                                    <h6 style="width:500px;">Số lượng khách hàng</h6>
                                </div>
                            </div>
                        </div>
                        <div class="person-sl">
                            <div class="person-sl=0">
                                <div class="person-sl-1" style="padding: 16px 16px 0px 16px; display: flex;">
                                    <div class="adult-sl">
                                        <div class="adult-d">
                                            <h6 class="adult-text">
                                                <b>Người lớn</b>
                                            </h6>
                                        </div>
                                        <div class="adult-p">
                                            <p>(Trên 11 tuổi)</p>
                                        </div>
                                        <div class="input-group plus-minus-input dash-tab-1" style="display: flex;">
                                          <div class="input-group-button dash-tab" style="padding: 4px;">
                                            <button type="button" class="button hollow circle dash-sl remove" data-quantity="minus" data-field="quantity">
                                              <i class="bi bi-dash-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                          <input class="input-group-field text-sl-person" type="number" name="quantity" style="border:none" value="1" readonly>
                                          <div class="input-group-button dash-tab" style="padding: 4px;">
                                            <button id="newsectionbtn" type="button" class="button hollow circle plus-sl" data-quantity="plus" data-field="quantity">
                                              <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="adult-sl">
                                        <div class="adult-d">
                                            <h6 class="adult-text">
                                                <b>Trẻ em</b>
                                            </h6>
                                        </div>
                                        <div class="adult-p">
                                            <p>(6 - 11 tuổi)</p>
                                        </div>
                                        <div class="input-group plus-minus-input dash-tab-1" style="display: flex;">
                                          <div class="input-group-button dash-tab" style="padding: 4px;">
                                            <button type="button" class="button hollow circle dash-sl remove2" data-quantity="minus1" data-field="quantity1">
                                              <i class="bi bi-dash-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                          <input class="input-group-field text-sl-person" type="number" name="quantity1" style="border:none" value="0" readonly>
                                          <div class="input-group-button dash-tab" style="padding: 4px;">
                                            <button id="newsectionbtn999" type="button" class="button hollow circle plus-sl" data-quantity="plus1" data-field="quantity1">
                                              <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                        </div>
                                        <!-- <div class="tab-sl">
                                            <div class="dash-tab-1" style="display: flex;">
                                                <div class="dash-tab" style="padding: 4px;">
                                                    <input class="dash-sl" style="padding: 1px;" type=button value='-' onclick='javascript:process(-1)'>
                                                </div>
                                                    <input class="text-sl-person"  type=number id='v'style="border: none;" name='v' max="10" min="1" value='0' readonly>
                                                <div class="dash-tab" style="padding: 4px;">
                                                    <input id="newsectionbtn" class="plus-sl"  type=button value='+' onclick='javascript:process(1)'>   
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div class="choose-enter" style="padding:0px 16px 16px 16px;">
                                    <div class="choose-enter-1" style="margin-left: 20px;">
                                        <div class="choose-enter-lb" style="padding: 0px;">
                                            <input id="id_delivery_2" class="choose-enter-ip" type="radio" name="chooseone-enter" value="ntt-2" style="vertical-align: middle;">
                                            <label for="ntt-2" style="font-size: 17px;">Yêu cầu được hỗ trợ nhập thông tin hành khách sau</label>
                                        </div>
                                    </div>
                                    <div class="choose-enter-1" style="margin-left: 20px;">
                                        <div class="choose-enter-lb">
                                            <input id="id_delivery_0" class="choose-enter-ip" type="radio" name="chooseone-enter" value="ntt-1" style="vertical-align: middle;" checked>
                                            <label for="ntt-1" style="font-size: 17px;">Nhập thông tin hành khách</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="container-99" class="formInput adult-info card" style="padding: 8px; margin-bottom: 16px;">
                        <section id="mainsection">
                            <div style="padding: 16px;">
                                <p class="adult-info-1">
                                    <b>Thông tin người lớn</b>
                                    <span>
                                        (Trên 10 tuổi)
                                    </span>
                                </p>
                            </div>
                            <div class="adult-info-2" style="display: flex; padding: 8px;">
                                <div class="inputdecor-book btn-login-book">
                                    <input class="full-w" type="text" name="name" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Họ và tên*
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor-book btn-login-book">
                                    <input class="full-w" type="date" name="name" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="birth-day-adult">
                                            Ngày sinh
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="info-lh4">
                                <div class="gender">
                                    <p>Giới tính</p>
                                </div>
                                <div class="male-female">
                                    <div class="gender-lh4">
                                        <input class="fe-male" type="radio" name="chooseone" value="Nam"
                                            style="height:20px; width:20px; vertical-align: middle;">
                                        <label for="Nam">Nam</label>
                                    </div>
                                    <div class="gender-lh4">
                                        <input class="fe-male" type="radio" name="chooseone" value="Nu"
                                            style="height:20px; width:20px; vertical-align: middle;">
                                        <label for="Nu">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="container-999" class="formInput adult-info card" style="padding: 8px; margin-bottom: 16px; display:none">
                        <section id="mainsection999">
                            <div style="padding: 16px;">
                                <p class="adult-info-1">
                                    <b>Thông tin trẻ em</b>
                                    <span>
                                        (Dưới 4 tuổi)
                                    </span>
                                </p>
                            </div>
                            <div class="adult-info-2" style="display: flex; padding: 8px;">
                                <div class="inputdecor-book btn-login-book">
                                    <input class="full-w" type="text" name="name" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Họ và tên*
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor-book btn-login-book">
                                    <input class="full-w" type="date" name="name" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="birth-day-adult">
                                            Ngày sinh
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="info-lh4">
                                <div class="gender">
                                    <p>Giới tính</p>
                                </div>
                                <div class="male-female">
                                    <div class="gender-lh4">
                                        <input class="fe-male1" type="radio" name="chooseone1" value="Nam1"
                                            style="height:20px; width:20px; vertical-align: middle;">
                                        <label for="Nam1">Nam</label>
                                    </div>
                                    <div class="gender-lh4">
                                        <input class="fe-male1" type="radio" name="chooseone1" value="Nu1"
                                            style="height:20px; width:20px; vertical-align: middle;">
                                        <label for="Nu1">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="bonus-dv card" style="padding: 8px; margin-bottom: 16px;">
                        <div class="bonus-dv-0">
                            <div class="bonus-dv-1" style="margin-bottom: 16px;">
                                <h6 class="dv-1-h6" style="font-size: 21px; padding: 16px;">
                                    Dịch vụ đi kèm
                                </h6>
                            </div>
                            <div class="bonus-dv-2" style="padding-left: 8px;">
                                <div class="bonus-dv-3">
                                    <p class="text-bonus-dv" style="padding: 0px 16px; margin: 0px; font-size: 16px;">Vui lòng
                                                chọn dịch vụ đi kèm và số lượng tương ứng</p>
                                </div>
                            </div>
                            <div class="bonus-dv-4">
                                <div id="showhideForm" style=" display:none;">
                                    <div class="bonus-dv-6 " style="padding: 12px 12px 0px; display:flex; align-items: center;">
                                        <div class="bonus-dv-7">
                                            <div class="bonus-dv-number" style="padding: 12px;">
                                                <h6 class="numer-p">
                                                    <b>1.</b>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="bonus-dv-8" style="padding: 12px; width: 50%;">
                                            <form action="booking.php" method="POST">
                                                <div class="inputdecor-book btn-login-book full-w" style="margin-bottom:33px ">
                                                        <input list="lists-dv" is="list-dv" class="full-w" type="text" name="list-dv" autocomplete="off" required
                                                            style="margin-left: -33px;border-radius: 0px;" />
                                                        <label for="name" class="lable-name-book">
                                                            <span class="content-name2-book">
                                                                Dịch vụ đi kèm
                                                            </span>
                                                        </label>
                                                        <datalist id="lists-dv">
                                                            <option value="Spa"></option>>  
                                                            <option value="Cắm trại"></option>
                                                        </datalist>
                                                </div>
                                            </form>
                                            <!-- <div class="dv-icon">
                                            <i class="bi bi-caret-down-fill"></i>
                                            </div> -->
                                        </div>
                                        <div class="bonus-dv-8" style="padding: 12px; width: 40%;">
                                            <div class="inputdecor-book btn-login-book full-w" style="margin-bottom:33px ">
                                                <input class="full-w" type="text" name="name" autocomplete="off" required
                                                    style="margin-left: -33px;border-radius: 0px;" />
                                                <label for="name" class="lable-name-book">
                                                    <span class="content-name2-book">
                                                        Số hành khách
                                                    </span>
                                                </label>
                                            </div>
                                            <!-- <div class="dv-icon">
                                            <i class="bi bi-caret-down-fill"></i>
                                            </div> -->
                                        </div>
                                        <div class="close-dv">
                                            <button class="btn-close-dv hidebtn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="dv-plus" style="padding: 0px 12px 12px 12px;">
                                    <button class="showbtn">
                                        <i class="bi bi-plus-lg"></i>
                                        <h6 class="dv-plus-p" style=" margin-bottom: 8px;">Thêm dịch vụ</h6>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-abate card" style="margin-bottom: 16px;">
                        <div class="info-abate-1" style="padding: 16px;">
                            <div class="bonus-dv-1" style="margin-bottom: 16px;">
                                <div class="circle-bl">
                                    <div class="circle-bl-1">
                                        <h6 style="width:500px; font-size: 21px;">Thông tin thanh toán</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="bonus-dv-2" style="padding-left: 8px;">
                                <div class="bonus-dv-3" style="display: flex; padding: 8px;">
                                    <input  name="billingtoo"  type="checkbox" style="height: 22px; width: 40px;" onclick="FillBilling(this.form)">
                                    <p class="text-bonus-dv" style="margin-bottom: 16px; font-size: 16px;">Sử dụng
                                                thông tin người liên hệ</p>
                                </div>
                            </div>
                            <div class="info-abate-2" style="display: flex;">
                                <div class="inputdecor-abate btn-login-abate">
                                    <input type="text" name="name11" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px; width: 100%;" />
                                    <label for="name" class="lable-name-abate">
                                        <span class="content-name2-abate">
                                            Họ*
                                        </span>
                                    </label>
                                        <h6
                                            style="font-size: 10px; color: rgba(0, 0, 0, 0.54);text-align: left;margin-top: 2px;">
                                                Họ và tên như trong CMND/CCCD/Hộ chiếu
                                        </h6>
                                </div>
                                <div class="inputdecor-abate btn-login-abate">
                                    <input type="text" name="name22" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px; width: 110%;" />
                                    <label for="name" class="lable-name-abate">
                                        <span class="content-name2-abate">
                                            Tên đệm & tên*
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="info-lh5" style="display: flex;">
                                <div class="inputdecor-book btn-login-book">
                                    <input type="text" name="name33" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Email*
                                        </span>
                                    </label>
                                </div>
                                <div class="lh-5-phone-number-cont">
                                        <div class="ma-quoc-gia">
                                            <meta name="viewport" content="width=device-width, initial-scale=1" />
                                            <div class="container-phone-number">
                                                <form id="login-phone-number">
                                                    <input id="phone1" type="number" name="phone1" step="number" />
                                                </form>
                                            </div>
                                        </div>
                                        <!-- <div class="lh5-phone-number">
            
                                        </div> -->
                                    </div>
                            </div>
                            <div class="info-abate-4">
                                <div class="inputdecor-book-location btn-login-book" style="width: 100%;">
                                    <input type="text" name="name55" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px; width: 100%;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Địa chỉ*
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="info-able-5" style="display: flex; padding: 12px 0px;">
                                <div class="bonus-dv-8" style="padding: 20px 12px 12px 12px; width: 50%;">
                                    <div class="inputdecor-dv btn-login-dv" style="display: flex; width: 100%;">
                                        <input type="text" name="name" autocomplete="off" required
                                            style="margin-left: -36px;border-radius: 0px; width: 90%;" />
                                        <label for="name" class="lable-name-dv">
                                            <span class="content-name2-dv">
                                                Quốc gia 
                                            </span>
                                            <i class="bi bi-caret-down-fill"
                                                    style="padding: 4px 8px 8px 8px; font-size: 15px;"></i>
                                        </label>
                                    </div>
                                            <!-- <div class="dv-icon">
                                        <i class="bi bi-caret-down-fill"></i>
                                    </div> -->
                                </div>
                                <div class="bonus-dv-8" style="padding: 20px 12px 12px 12px; width: 50%;">
                                    <div class="inputdecor-dv btn-login-dv" style="display: flex; width: 100%;">
                                        <input type="text" name="name" autocomplete="off" required
                                            style="margin-left: -36px;border-radius: 0px; width: 100%;" />
                                        <label for="name" class="lable-name-dv">
                                            <span class="content-name2-dv">
                                                Tỉnh/Thành phố 
                                            </span>
                                        </label>
                                    </div>
                                            <!-- <div class="dv-icon">
                                        <i class="bi bi-caret-down-fill"></i>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-abate card" style="display: flex; padding: 16px;">
                        <div class="form-abate-1">
                            <div class="bonus-dv-1" style="margin-bottom: 16px;">
                                <div class="circle-bl">
                                    <div class="circle-bl-1">
                                        <h6 style="width:500px; font-size: 21px;">Hình thức thanh toán</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="bonus-dv-2" style="padding-left: 8px;">
                                <div class="bonus-dv-3">
                                    <p class="text-bonus-dv" style="margin-bottom: 16px; font-size: 16px;">(Ghi chú:
                                        Phí thanh toán 0 ₫)</p>
                                </div>
                                <div class="note-abate" style="padding: 8px">
                                    <div class="note-abate-1">
                                        <div class="note-abate-2" style="padding: 16px; border: ridge;">
                                            <div class="note-abate-2" style="display: flex;">
                                                <i class="bi bi-caret-down-fill"
                                                    style="padding: 4px 8px 8px 8px; font-size: 20px;"></i>
                                                <h6 style="padding: 8px;">Thẻ ATM hoặc thẻ iBanking của các ngân
                                                    hàng</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-abate" style="padding: 8px">
                                    <div class="note-abate-1">
                                        <div class="note-abate-2" style="padding: 16px; border: ridge;">
                                            <div class="note-abate-2" style="display: flex;">
                                                <i class="bi bi-caret-down-fill"
                                                    style="padding: 4px 8px 8px 8px; font-size: 20px;"></i>
                                                <h6 style="padding: 8px;">Thẻ thanh toán quốc tế (Visa/Master)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rule-abate" style="padding: 8px;margin-top: 24px;">
                                <div class="rule-abate-1" style="display: flex;">
                                    <i class="bi bi-megaphone"
                                        style="padding: 4px; font-size: 20px; color: #24a8d8;"></i>
                                    <h6 style="padding: 4px; margin-top: 4px;">Tiếp tục thực hiện bước tiếp theo, tôi xác nhận đã xem
                                                và chấp thuận các Điều khoản & Chính sách và Chính sách riêng tư của
                                                Hahalolo</h6>
                                </div>
                                <div class="rule-abate-1">
                                    <button class="btn-abate" style="height: 46px; width: 154px; border: none;">
                                        Thanh toán
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
        </form>    
            <div class="col-md-4" style="padding: 0px 8px 8px 8px;">
                <div class="bill-info card">
                    <div class="bill-info-0">
                        <div class="bill-info-top" style="padding: 16px 16px 0px 16px;">
                            <h6 style="font-size: 21px;">
                                <b>Thông tin Tour</b>   
                            </h6>
                        </div>
                        <hr style="background-color: black; margin-left: 16px; margin-right: 16px;">
                    </div>
                    <div class="bill-info-1" style="padding: 16px 16px 5px;">
                        <div class="name-info" style="margin-bottom: 0.35rem;">
                            <p style="margin-bottom: 5px;">
                               <b style="font-weight: 620;"><?php echo $data['name'] ?></b> 
                            </p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="full-info">
                            <a href="" class="full-info-1" style="font-size: 15px;">Xem chi tiết tour</a>
                            <hr style="background-color: black; margin-left: 16px; margin-right: 16px;">
                        </div>
                    </div>
                    <div class="info-time">
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Thời gian:</label>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <b><?php echo $data['tour_long'] ?> ngày</b>
                                </div>
                            </div>
                        </div>
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Điểm khởi hành:</label>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <b>Thành phố Đà Nẵng</b>
                                </div>
                            </div>
                        </div>
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Ngày khởi hành:</label>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <b><?php echo $data['starttime']?> (UTC+07:00)</b>
                                </div>
                            </div>
                        </div>
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Ngày kết thúc:</label>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <b> <?php echo $data['endtime']?> (UTC+07:00)</b>
                                </div>
                            </div>
                        </div>
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Hành khách:</label>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <b>1 người lớn</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="background-color: black; margin-left: 16px; margin-right: 16px;">
                    <div class="bottom-info-bill" style="padding: 8px;">
                        <p style="padding: 8px; margin-bottom: 8px;"> 
                            <b style="font-size: 14px;">Chi tiết giá</b> 
                        </p>
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Người lớn </label>
                                    <b>x1</b>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <div class="money-bill-bottom">
                                        <b>1.700.000 ₫</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="time-1" style="padding: 8px; display: flex; display:none">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">Trẻ em </label>
                                    <b>x1</b>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <div class="money-bill-bottom">
                                        <b>1.700.000 ₫</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="time-1" style="padding: 8px; display: flex;">
                            <div class="time-2">
                                <div class="time-3" style="padding: 8px;">
                                    <label for="">VAT</label>
                                </div>
                            </div>
                            <div class="time-4">
                                <div class="time-5" style="padding: 8px;">
                                    <div class="money-bill-bottom">
                                        <b>170.000₫</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="background-color: black; margin-left: 16px; margin-right: 16px;">
                    <div class="money-bill" style="display: flex;">
                        <div class="money-bil-1" style="padding: 8px;">
                            <p style="padding: 8px; margin-bottom: 8px;"> 
                                <b style="font-size: 20px;">Tổng tiền</b> 
                            </p>
                        </div>
                        <div class="money-all-bottom">
                            <h6 class="money-all">1.870.000₫</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="../js/booking.js"></script>
    <script src="js/intlTelInput.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        //flags phone number
        var input = document.querySelector("#phone");
        intlTelInput(input, {
            initialCountry: "vn",
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    success(countryCode);
                });
            },
            utilsScript: "js/utils.js"
        });

        var input = document.querySelector("#phone1");
        intlTelInput(input, {
            initialCountry: "vn",
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    success(countryCode);
                });
            },
            utilsScript: "js/utils.js"
        });
    </script>
    <script>jQuery(document).ready(function(){
        $('[data-quantity="plus"]').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            if (!isNaN(currentVal)) {
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                $('input[name='+fieldName+']').val(0);
            }
        });
        $('[data-quantity="minus"]').click(function(e) {
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                $('input[name='+fieldName+']').val(0);
            }
        });
    });
    </script>
    <script>jQuery(document).ready(function(){
        $('[data-quantity="plus1"]').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            if (!isNaN(currentVal)) {
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                $('input[name='+fieldName+']').val(0);
            }
        });
        $('[data-quantity="minus1"]').click(function(e) {
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                $('input[name='+fieldName+']').val(0);
            }
        });
    });
    </script>
    <!-- <script>
    document.getElementById("newsectionbtn999").onclick = function() {
    var container = document.getElementById("container-999");
    var section = document.getElementById("mainsection999");
    container.appendChild(section.cloneNode(true));
    }
    </script> -->
    <script>
    document.getElementById("newsectionbtn").onclick = function() {
    var container = document.getElementById("container-99");
    var section = document.getElementById("mainsection");
    container.appendChild(section.cloneNode(true));
  }
    </script>
</body>
</html>
<?php
    }
    echo 'Lỗi truy cập';
?>