<?php
if(isset($_GET['id'])){
    require "../config/db.php";
    $sql="SELECT * FROM db_tour where tour_id = '{$_GET['id']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);
        require '../template/header.php';
?>
    <main class="container" style="display:flex;">
        <form action="booking.php" method="post" novalidate>
        <input type="text" id="ttID" name="txtID" hidden readonly value="<?php echo $_GET['id'];?>">
        <input type="number" id="total-money" name="total-money" hidden readonly value="">
        <input type="date" id="date-dat" name="date-dat" hidden readonly value="<?php echo isset($_POST['dateStart'])?$_POST['dateStart']:date('Y-m-d'); ?>">
        <input type="date" id="date-end" name="date-end" hidden readonly value="<?php echo date('d-m-Y',  isset($_POST['dateStart'])? strtotime('+'.$data['tour_long'] .' day',strtotime($_POST['dateStart'])): strtotime('+'.$data['tour_long'] .' day'));?>">
            <div class="row" style="width:121%">
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
                <div class="col-md-8" style="padding: 0 24px;background-color: #FAFAFB;width:85%;">
                    <div class="info-lh1 card col-md-6">
                        <div class="info-lh2">
                            <div class="circle-bl">
                                <div class="circle-bl-1">
                                    <h6 style="width:500px;">Thông tin liên hệ</h6>
                                </div>
                            </div>
                            <div class="info-lh3">
                                <div class="inputdecor-book btn-login-book">
                                    <input type="text" name="txtHo" autocomplete="off" required
                                        style="margin-left: -33px;border-radius: 0px;" />
                                    <label for="name" class="lable-name-book">
                                        <span class="content-name2-book">
                                            Họ*
                                        </span>
                                    </label>
                                </div>
                                <div class="inputdecor-book btn-login-book">
                                    <input type="text" name="txtTen" autocomplete="off" required
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
                                        <input class="full-w" type="text" name="txtEmail" autocomplete="off" required
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
                                                <div id="login-phone-number">
                                                    <input id="phone" type="number" name="phone" step="number" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="lh5-phone-number">
            
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="info-abate-4">
                                <div class="inputdecor-book-location btn-login-book" style="width: 100%;">
                                    <input type="text" name="txtDiachi" autocomplete="off" required
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
                                            <button id="minus-nl" type="button" class="button hollow circle dash-sl remove" data-quantity="minus" data-field="quantity">
                                              <i class="bi bi-dash-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                          <input id="nl" class="input-group-field text-sl-person" type="number" name="quantity" style="border:none" value="1" readonly>
                                          <div class="input-group-button dash-tab" style="padding: 4px;">
                                            <button id="plus-nl" type="button" class="button hollow circle plus-sl add-to-man" data-quantity="plus" data-field="quantity">
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
                                            <button id="minus-te" type="button" class="button hollow circle dash-sl remove2" data-quantity="minus1" data-field="quantity1">
                                              <i class="bi bi-dash-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                          <input id="te" class="input-group-field text-sl-person" type="number" name="quantity1" style="border:none" value="0" readonly>
                                          <div class="input-group-button dash-tab" style="padding: 4px;">
                                            <button id="plus-te" type="button" class="button hollow circle plus-sl add-to-kid" data-quantity="plus1" data-field="quantity1">
                                              <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                            </button>
                                          </div>
                                        </div>
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
                    <div id="id-cont-tt">
                        <div id="container-99" class="formInput adult-info card" style="padding: 8px;">
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
                                        <input class="full-w" type="text" id="tennl" name="tennl" autocomplete="off" required
                                            style="margin-left: -33px;border-radius: 0px;" />
                                        <label for="name" class="lable-name-book">
                                            <span class="content-name2-book">
                                                Họ và tên*
                                            </span>
                                        </label>
                                    </div>
                                    <div class="inputdecor-book btn-login-book">
                                        <input class="full-w" type="date" id="ngaysinhnl" name="ngaysinhnl" autocomplete="off" required
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
                                            <input class="fe-male" id="chooseone" type="radio" name="chooseone" value="Nam"
                                                style="height:20px; width:20px; vertical-align: middle;">
                                            <label for="Nam">Nam</label>
                                        </div>
                                        <div class="gender-lh4">
                                            <input class="fe-male" id="chooseone" type="radio" name="chooseone" value="Nu"
                                                style="height:20px; width:20px; vertical-align: middle;">
                                            <label for="Nu">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="container-999" class=" adult-info card" style="padding: 8px; margin-bottom: 16px; display:none">
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
                                <div>
                                    <div class="bonus-dv-6 " style="padding: 12px 12px 0px; display:flex; align-items: center;">
                                        <div class="bonus-dv-7">
                                            <div class="bonus-dv-number" style="padding: 12px;">
                                                <h6 class="numer-p">
                                                    <b>1.</b>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="bonus-dv-8" style="padding: 12px; width: 50%;">
                                            <div class="inputdecor-book btn-login-book full-w" style="margin-bottom:33px ">
                                                <input list="lists-dv" is="list-dv" class="full-w" type="text" name="list-dv" autocomplete="off" required
                                                    style="margin-left: -33px;border-radius: 0px;" />
                                                <label for="name" class="lable-name-book">
                                                    <span class="content-name2-book">
                                                        Dịch vụ đi kèm
                                                    </span>
                                                </label>
                                                <datalist id="lists-dv">
                                                    <?php $sql0 = "SELECT * FROM db_service";{
                                                            $result0 = mysqli_query($conn,$sql0);
                                                            if(mysqli_num_rows($result0)>0){
                                                                $data0 = mysqli_fetch_assoc($result0);
                                                            }else
                                                            require '../template/error/404.php';
                                                        ?>
                                                        <option value="<?php echo $data0['name'];?> (<?php echo $data0['price'];?> ₫)"></option>
                                                        <?php
                                                        }
                                                    ?>
                                                </datalist>
                                            </div>
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
                                        </div>
                                        <div class="close-dv">
                                            <button class="btn-close-dv">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="dv-plus" style="padding: 0px 12px 12px 12px;">
                                    <button>
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
                                        <div class="container-phone-number">
                                            <div id="login-phone-number">
                                                <input id="phone1" type="number" name="phone1" step="number" />
                                            </div>
                                        </div>
                                    </div>
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
                                        </label>
                                    </div>
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
                                    <button type="submit" class="btn-abate" style="height: 46px; width: 154px; border: none;">
                                        Thanh toán
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>    
        <div class="col-md-4" style="padding: 0px 8px 8px 8px;width:35%;margin-top:210px;">
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
                    </div>
                    <div class="full-info">
                        <a href="" class="full-info-1" style="font-size: 15px;">Xem chi tiết tour</a>
                        <hr style="background-color: black;">
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
                        <?php $sql1 = "SELECT * from db_tourpart";{
                            $result1 = mysqli_query($conn,$sql1);
                            if(mysqli_num_rows($result1)>0){
                                $data1 = mysqli_fetch_assoc($result1);
                            }else
                            echo 'lỗi';
                        ?>
                        <div class="time-4">
                            <div class="time-5" style="padding: 8px;">
                                <b>Thành phố <?php echo $data1['city']?></b>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
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
                                <b id="sl-nl"> <input style="width:17px; border:none;font-weight:bold" value="1" type="text" name="quantity" readonly></b>
                            </div>
                        </div>
                        <div class="time-6">
                            <div class="time-7" style="padding: 8px; margin-left:20px">
                                <b> <input style="width:17px; border:none;font-weight:bold" value="0" type="text" name="quantity1" readonly>trẻ em</b>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="background-color: black; margin-left: 16px; margin-right: 16px;">
                <div class="bottom-info-bill" style="padding: 8px;">
                    <p style="padding: 8px; margin-bottom: 8px;"> 
                        <b style="font-size: 14px;">Chi tiết giá</b> 
                    </p>
                    <?php 
                    $total = 0;
                    $sql2 = "SELECT * from db_tour";
                            $result2 = mysqli_query($conn,$sql2);
                            if(mysqli_num_rows($result2)>0){
                                $data2 = mysqli_fetch_assoc($result2);
                            }else
                            require '../template/error/404.php';
                    ?>
                    <div class="time-1" style="padding: 8px; display: flex;">
                        <div class="time-2">
                            <div class="time-3" style="padding: 8px;">
                                <label for="">Người lớn </label>
                                    x<b id="sl-nl1"><input type="text" style="border: none;width:17px;font-weight:bold"value="1" name="quantity" readonly></b>
                            </div>
                        </div>
                        <div class="time-4">
                            <div class="time-5" style="padding: 8px;">
                                <div class="money-bill-bottom">
                                    <span>
                                        <b id="chitietnl"><?php echo $data2['man_price']?> ₫</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="time-1" style="padding: 8px; display: flex;">
                        <div class="time-2">
                            <div class="time-3" style="padding: 8px;">
                                <label for="">Trẻ em </label>
                                x<b id="sl-te1"></b>
                            </div>
                        </div>
                        <div class="time-4">
                            <div class="time-5" style="padding: 8px;">
                                <div class="money-bill-bottom">
                                    <span>
                                        <b id="chitiette"> ₫</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="background-color: black; margin-left: 16px; margin-right: 16px;">
                    <div class="money-bill" style="display: flex;">
                        <div class="money-bil-1" style="padding: 8px;">
                            <p style="padding: 8px; margin-bottom: 8px;"> 
                                <b style="font-size: 18px;">Tổng tiền</b> 
                            </p>
                        </div>
                        <div class="money-all-bottom">
                            <h6 id="tongtien" class="money-all totalPrice" name="txtTotal" style="font-size: 20px;"><?php echo $total?> ₫</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 
    <script>
        var gianl = <?php echo $data2['man_price']; ?>;
        var giate = <?php echo $data2['kid_price']; ?>;
        var giatn = <?php echo $data2['child_price']; ?>;
        $(document).ready(function (){
            capnhaptien();
            $("#plus-nl").click(function () { 
                var slnl = Number($("#nl").val());
                slnl+=1;
                $('#nl').val(slnl);
                capnhaptien();
                themnl(slnl);
                console.log(slnl);
            });
            $('#minus-nl').click(function () { 
                var slnl = Number($('#nl').val());
                botnl(slnl);
                slnl-=1;
                $('#nl').val(slnl);
                capnhaptien();
                console.log(slnl);
                if(slnl<=1){
                    document.getElementById("minus-nl").disabled = true;
                }else{
                    document.getElementById("minus-nl").disabled =! false;
                }


            });
            function themnl(snl = 1){
                var output ='';
                output+='<div id="tt-sl-nl'+snl+'">';
                output+='<div style="padding: 16px;">';
                output+='<p class="adult-info-1">';
                output+='<b>Thông tin người lớn ' + snl + ' </b>';
                output+='<span>';
                output+='(Trên 11 tuổi)';
                output+='</span>';
                output+='</p>';
                output+='</div>';
                output+='<div class="adult-info-2" style="display: flex; padding: 8px;">';
                output+='<div class="inputdecor-book btn-login-book">';
                output+='<input class="full-w" type="text" id="tennl"'+ snl +' name="tennl"'+ snl +' autocomplete="off" required style="margin-left: -33px;border-radius: 0px;" />';
                output+='<label for="name" class="lable-name-book">';
                output+='<span class="content-name2-book"> Họ và tên* </span>';
                output+='</label>';
                output+='</div>';
                output+='<div class="inputdecor-book btn-login-book">';
                output+='<input class="full-w" type="date" id="ngaysinhnl" name="ngaysinhnl" autocomplete="off" required style="margin-left: -33px;border-radius: 0px;" />';
                output+='<label for="name" class="lable-name-book">';
                output+='<span class="birth-day-adult">Ngày sinh</span>';
                output+='</label>';
                output+='</div>';
                output+='</div>';
                output+='<div class="info-lh4">';
                output+='<div class="gender">';
                output+='<p>Giới tính</p>';
                output+='</div>';
                output+='<div class="male-female">';
                output+='<div class="gender-lh4">';
                output+='<input class="fe-male" id="chooseone" type="radio" name="chooseone'+snl+'" value="Nam'+snl+'" style="height:20px; width:20px; vertical-align: middle;">';
                output+='<label for="Nam'+snl+'">Nam</label>';
                output+='</div>';
                output+='<div class="gender-lh4">';
                output+='<input class="fe-male" id="chooseone" type="radio" name="chooseone'+snl+'" value="Nu'+snl+'" style="height:20px; width:20px; vertical-align: middle;">';
                output+='<label for="Nu'+snl+'">Nữ</label>';
                output+='</div>';
                output+='</div>';
                output+='</div>';
                output+='</div>';
                $('#container-99').append(output);
                
            }
            function botnl(snl = 1){
                $('#tt-sl-nl'+snl).remove();
            }

            //Trẻ em
            $("#plus-te").click(function () { 
                var slte = Number($("#te").val());
                slte+=1;
                $('#te').val(slte);
                capnhaptien();
                themte(slte);
                console.log(slte);
            });
            $('#minus-te').click(function () { 
                var slte = Number($('#te').val());
                botte(slte);
                slte-=1;
                $('#te').val(slte);
                capnhaptien();
                console.log(slte);
            });
            function themte(ste = 1){
                var output ='';
                output+='<div id="tt-sl-te'+ste+'">';
                output+='<div style="padding: 16px;">';
                output+='<p class="adult-info-1">';
                output+='<b>Thông tin trẻ em ' + ste + ' </b>';
                output+='<span>';
                output+='(6 đến 11 tuổi)';
                output+='</span>';
                output+='</p>';
                output+='</div>';
                output+='<div class="adult-info-2" style="display: flex; padding: 8px;">';
                output+='<div class="inputdecor-book btn-login-book">';
                output+='<input class="full-w" type="text" name="name" autocomplete="off" required style="margin-left: -33px;border-radius: 0px;" />';
                output+='<label for="name" class="lable-name-book">';
                output+='<span class="content-name2-book"> Họ và tên* </span>';
                output+='</label>';
                output+='</div>';
                output+='<div class="inputdecor-book btn-login-book">';
                output+='<input class="full-w" type="date" name="name" autocomplete="off" required style="margin-left: -33px;border-radius: 0px;" />';
                output+='<label for="name" class="lable-name-book">';
                output+='<span class="birth-day-adult">Ngày sinh</span>';
                output+='</label>';
                output+='</div>';
                output+='</div>';
                output+='<div class="info-lh4">';
                output+='<div class="gender">';
                output+='<p>Giới tính</p>';
                output+='</div>';
                output+='<div class="male-female">';
                output+='<div class="gender-lh4">';
                output+='<input class="fe-male" type="radio" name="chooseone1'+ste+'" value="Nam1'+ste+'" style="height:20px; width:20px; vertical-align: middle;">';
                output+='<label for="Nam1'+ste+'">Nam</label>';
                output+='</div>';
                output+='<div class="gender-lh4">';
                output+='<input class="fe-male" type="radio" name="chooseone1'+ste+'" value="Nu1'+ste+'" style="height:20px; width:20px; vertical-align: middle;">';
                output+='<label for="Nu1'+ste+'">Nữ</label>';
                output+='</div>';
                output+='</div>';
                output+='</div>';
                output+='</div>';
                $('#container-99').append(output);
            }
            function botte(ste = 1){
                $('#tt-sl-te'+ste).remove();
            }

            //Thiếu niên
            // $("#plus-tn").click(function () { 
            //     var sltn = Number($("#tn").val());
            //     sltn+=1;
            //     $('#tn').val(sltn);
            //     capnhaptien();
            //     themtn(sltn);
            //     console.log(sltn);
            // });
            // $('#minus-tn').click(function () { 
            //     var sltn = Number($('#tn').val());
            //     sltn-=1;
            //     $('#tn').val(sltn);
            //     capnhaptien();
            //     bottn(sltn);
            //     console.log(sltn);
            // });
            // function themtn(stn = 1){
            //     var output ='';
            //     output+='<div id="tt-sl-tn'+stn+'">';
            //     output+='<div style="padding: 16px;">';
            //     output+='<p class="adult-info-1">';
            //     output+='<b>Thông tin trẻ em ' + stn + ' </b>';
            //     output+='<span>';
            //     output+='(6 đến 11 tuổi)';
            //     output+='</span>';
            //     output+='</p>';
            //     output+='</div>';
            //     output+='<div class="adult-info-2" style="display: flex; padding: 8px;">';
            //     output+='<div class="inputdecor-book btn-login-book">';
            //     output+='<input class="full-w" type="text" name="name" autocomplete="off" required style="margin-left: -33px;border-radius: 0px;" />';
            //     output+='<label for="name" class="lable-name-book">';
            //     output+='<span class="content-name2-book"> Họ và tên* </span>';
            //     output+='</label>';
            //     output+='</div>';
            //     output+='<div class="inputdecor-book btn-login-book">';
            //     output+='<input class="full-w" type="date" name="name" autocomplete="off" required style="margin-left: -33px;border-radius: 0px;" />';
            //     output+='<label for="name" class="lable-name-book">';
            //     output+='<span class="birth-day-adult">Ngày sinh</span>';
            //     output+='</label>';
            //     output+='</div>';
            //     output+='</div>';
            //     output+='<div class="info-lh4">';
            //     output+='<div class="gender">';
            //     output+='<p>Giới tính</p>';
            //     output+='</div>';
            //     output+='<div class="male-female">';
            //     output+='<div class="gender-lh4">';
            //     output+='<input class="fe-male" type="radio" name="chooseone11'+stn+'" value="Nam11'+stn+'" style="height:20px; width:20px; vertical-align: middle;">';
            //     output+='<label for="Nam11'+stn+'">Nam</label>';
            //     output+='</div>';
            //     output+='<div class="gender-lh4">';
            //     output+='<input class="fe-male" type="radio" name="chooseone11'+stn+'" value="Nu11'+stn+'" style="height:20px; width:20px; vertical-align: middle;">';
            //     output+='<label for="Nu11'+stn+'">Nữ</label>';
            //     output+='</div>';
            //     output+='</div>';
            //     output+='</div>';
            //     output+='</div>';
            //     $('#container-99').append(output);
            // }
            // function bottn(stn = 1){
            //     $('#tt-sl-tn'+stn).remove();
            // }

            //Tính tiền
            function capnhaptien(){
                var slnl = $('#nl').val();
                var slte = $('#te').val();
                var sltn = $('#tn').val();
                $('#chitietnl').text(slnl*gianl + ' ₫');
                $('#chitiette').text(slte*giate + ' ₫');
                $('#chitiettn').text(sltn*giatn + ' ₫');
                var tong = slnl*gianl + slte*giate; 
                // + sltn*giatn;
                $('#tongtien').text(tong + ' ₫');
                $('#sl-nl').text(slnl+' người lớn');
                $('#sl-nl1').text(slnl);
                $('#sl-te1').text(slte);
                $('#total-money').val(tong);
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="../js/booking.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var input = document.querySelector("#phone");
        intlTelInput(input, {
            initialCountry: "vn",
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    success(countryCode);
                });
            },
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

        });
    </script>
    
    <!-- <script>jQuery(document).ready(function(){
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
        //When the user clicks add to cart this will update the total price and the quantity in the cart 
            var currentItems = 0;
            var cartPrice = ;

            $(document).ready(function(){
                $(".add-to-man").click(function(){
                    currentItems = $("input.input-group-field[name='quantity']").val();
                    var totalPrice = currentItems * cartPrice;
                    $(".cart-badge").text(currentItems);
                    $(".cartPrice").text(totalPrice + " ₫");
                    var total = totalPrice + totalPrice1;
        $(".totalPrice").text(total + " ₫"); 
                });
            });
    });
    </script> -->
    <!-- <script>jQuery(document).ready(function(){
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
            //When the user clicks add to cart this will update the total price and the quantity in the cart 
        var currentItems1 = 0;
        var cartPrice1 = ;

        $(document).ready(function(){
            $(".add-to-kid").click(function(){
                currentItems1 = $("input.input-group-field[name='quantity1']").val();
                var totalPrice1 = currentItems1 * cartPrice1;
                $(".cart-badge1").text(currentItems1);
                $(".cartPrice1").text(totalPrice1 + " ₫");
                var total = totalPrice + totalPrice1;
                $(".totalPrice").text(total + " ₫"); 
            });
        });
    });
    </script> -->
    

     <!-- <script>
//     document.getElementById("newsectionbtn999").onclick = function() {
//     var container = document.getElementById("container-999");
//     var section = document.getElementById("mainsection999");
//     container.appendChild(section.cloneNode(true));
//     }
//     </script>
//     <script>
//     document.getElementById("newsectionbtn").onclick = function() {
//     var container = document.getElementById("container-99");
//     var section = document.getElementById("mainsection");
//     container.appendChild(section.cloneNode(true));
//   }
//     </script> -->
</body>
</html>
<?php
    }else
        require '../template/error/404.php';
}
?>