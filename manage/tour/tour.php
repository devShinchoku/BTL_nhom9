<?php
    require '../../config/db.php';
    if(!isset($_SESSION['user_id'])){
        header('location:../../accounts/');
      }
      else{
        if($_SESSION['permission'] > 1){
          header('location:../../');
        }
        else{
    if(isset($_POST['id']) && isset($_POST['tab'])){
        $id = $_POST['id'];
        $tab = $_POST['tab'];
        $output='';
        if($tab == 0){
            $sql = "SELECT * FROM db_tour WHERE tour_id = $id";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $sql = "SELECT category_id,db_tourcategory.name FROM db_tourcategory
                INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
                WHERE db_tourhost.host_id = {$_SESSION['user_id']}";
                $result = mysqli_query($conn,$sql);
                $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output.='
                    <div class="row">
                        <b style="font-size: 18px;color: royalblue;">Thông tin tour</b>
                        <form class="col-md-9" method="post" action="process.php">
                            <input type ="text" hidden readonly name="txtTourID" id="txtTourID" value="'.$data['tour_id'].'">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="txtTourName" class="form-lable">Tên Tour</label>
                                    <input value="'.$data['name'].'" type="text" id="txtTourName" name="txtTourName" placeholder="Nhập tên tour" require>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="txtTourLong" class="form-lable">Số ngày đi Tour</label>
                                    <input value="'.$data['tour_long'].'" id="txtTourLong" name="txtTourLong" placeholder="Nhập tổng số ngày tour kéo dài" type="number" require>
                                </div>
                                <div class="form-group mt-3">
                                <label for="txtTourCate" class="form-lable">Chủ đề Tour</label>
                                    <select id="txtTourCate" name="txtTourCate" placeholder="Chủ đề tour" require>
                                    <option value="'.$data['category_id'].'" selected>'.$datas[0]['name'].'</option>';
                                    foreach($datas as $i){
                                        $output.='<option value="'.$i['category_id'].'">'.$i['name'].'</option>';
                                    }
                                    $output.='</select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                <label for="txtStartDate" class="form-lable">Ngày bắt đầu</label>
                                <input value="'.$data['starttime'].'" id="txtStartDate" name="txtStartDate" type="date" require>
                                </div>
                                <div class="form-group mt-3">
                                <label for="txtEndDate" class="form-lable">Ngày kết thúc</label>
                                <input value="'.$data['endtime'].'" id="txtEndDate" name="txtEndDate" type="date" require>
                                </div>
                                <div class="inputdecor1 mt-3">
                                <input ';$output.=$data['is_installment']==1?'checked':'';$output.=' type="checkbox" name="txtIsIsta" id="txtIsIsta>
                                <label for="txtIsIsta" class="lable-name">
                                    Trả góp
                                </label>
                                </div>
                            </div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div div class="form-group mt-3">
                                    <label for="txtManPrice" class="form-lable">Giá người lớn</label>
                                    <input value="'.$data['man_price'].'" id="txtManPrice" name="txtManPrice" placeholder="đ" type="number" require>
                                    </div>
                                    <div class="form-group mt-3">
                                    <label for="txtKidPrice" class="form-lable">Giá trẻ em</label>
                                    <input value="'.$data['kid_price'].'" id="txtKidPrice" name="txtKidPrice" placeholder="đ" type="number" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div div class="form-group mt-3">
                                    <label for="txtChildPrice" class="form-lable">Giá tẻ nhỏ</label>
                                    <input value="'.$data['child_price'].'" id="txtChildPrice" name="txtChildPrice" placeholder="đ" type="number" require>
                                    </div>
                                    <div class="form-group mt-3">
                                    <label for="txtPromotion" class="form-lable">Khuyến mãi</label>
                                    <input value="'.$data['promotion'].'" id="txtPromotion" name="txtPromotion" placeholder="%" type="number" require>
                                    </div>
                                </div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                    <label for="txtAddress" class="form-lable">Địa chỉ</label>
                                    <input value="'.$data['address'].'" id="txtAddress" name="txtAddress" placeholder="Nhập địa chỉ" type="text" require>
                                    </div>
                                    <div class="form-group mt-3 mb-3">
                                    <label for="txtDistrict" class="form-lable">Thành phố</label>
                                    <input value="'.$data['district'].'" id="txtDistrict" name="txtDistrict" placeholder="Nhập thành phố" type="text" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2 mb-3">
                                    <label for="txtCity" class="form-lable">Quận/Huyện</label>
                                    <input value="'.$data['city'].'" id="txtCity" name="txtCity" placeholder="Nhập quận/Huyện" type="text" require>
                                    </div>
                                    <div class="form-group mt-2 mb-3">
                                    <label for="txtCountry" class="form-lable">Quốc gia</label>
                                    <input value="'.$data['country'].'" id="txtCountry" name="txtCountry" placeholder="Nhập Quốc gia" type="text" require>
                                    </div>
                                </div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="mt-2">
                            <label for="txtDescription" class="form-lable">Mô tả ngắn</label>
                            <textarea class="tour-descript" name="txtDescription" id="txtDescription" require>'.$data['description'].'</textarea>
                            </div>
                            <hr style="width: 100%;">
                            <div class="mt-2">
                            <label for="txtRules" class="form-lable">Quy định riêng</label>
                            <textarea class="tour-descript" name="txtRules" id="txtRules">'.$data['rules'].'</textarea>
                            </div>
                            <hr style="width: 100%;">
                            <div class="mt-2">
                            <label for="txtPolicy" class="form-lable">Chính sách</label>
                            <textarea class="tour-descript" name="txtPolicy" id="txtPolicy">'.$data['policy'].'</textarea>
                            </div>
                            <input type="submit" id="btnInfo" name="btnInfo" class="btn btn-success" value="Lưu">
                        </form>

                        <div class="col-md-3">
                            <form class="card tourpage-img" action="upload.php" method="post" enctype="multipart/form-data">
                                <label class="tourpage-img-title mt-2" for="ipAvatar">Logo</label>
                                <input class="tourpage-btn" name="ipAvatar" id="ipAvatar" type="file" accept="image/png, image/jpeg">
                                <input type="submit" name="btnUpload" class="btn btn-success" value="Lưu">
                            </form>
                            <form class="card tourpage-img mt-3" action="upload.php" method="post" enctype="multipart/form-data">
                                <label class="tourpage-img-title mt-2" for="ipAlbum">Ảnh thư viện</label>
                                <div style="text-align: center;">
                                    <input type="file" name="ipAlbum" id="ipAlbum" accept="image/png, image/jpeg" class="tourpage-btn">
                                </div>
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </form>
                        </div>
                    </div>';
            }
        }
        if($tab == 1){
                $output.='<form class="row" method="post" action="process.php">
                    <input type ="text" hidden readonly name="txtTourID" id="txtTourID" value="'.$id.'">

                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="txtPartName" class="form-lable">Tên chặng</label>
                                <input id="txtPartName" name="txtPartName" placeholder="Nhập tên chặng" type="text">
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="txtPartAddr" class="form-lable">Địa chỉ</label>
                                <input id="txtPartAddr" name="txtPartAddr" placeholder="Nhập Địa chỉ" type="text">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="txtPartDis" class="form-lable">Quận/Huyện</label>
                                <input id="txtPartDis" name="txtPartDis" placeholder="Quận/Huyện" type="text">

                            </div>
                            <div class="form-group mt-3 mb-3">
                            <label for="txtCity" class="form-lable">Thành phố</label>
                            <input id="txtCity" name="txtCity" placeholder="Nhập thành phố" type="text">
                            </div>
                        </div>     
                        <div class="mt-2">
                        <label for="txtPartDes" class="form-lable">Mô tả</label>
                            <textarea class="tour-descript" placeholder="Nhập thông tin ở đây..." name="txtPartDes" id="txtPartDes"></textarea>
                        </div>
                        <input value="Thêm" type="submit" name="btnPart" id="btnPart" class="btn btn-success mt-3 col-md-2">  
                    </form>
                  ';
                $sql = "SELECT * FROM db_tourpart WHERE tour_id = $id";
                $result = mysqli_query($conn,$sql);
                $output.='
                <div class="card mt-3">
                <b class="tourpage-title m-3">
                Thông tin Tour
                </b>
                <div class="container mt-2 mb-2">
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                </tr>
                </thead>
                <tbody>';
                if(mysqli_num_rows($result)>0){
                    $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $i=0;
                    foreach($datas as $data){
                        $i++;
                        $output.='
                        <tr>
                            <td scope="row">'.$i.'</td>
                            <td>'.$data['name'].'</td>
                            <td>
                            <a href="delete.php?id='.$data['part_id'].'&tour_id='.$id.'" class="btn btn-danger">Xoá</a>
                            </td>
                         </tr>';
                    }
                $output.=' </tbody>
                    </table>
                    </div>
                </div>';
                }
        }
        if($tab == 2){
            $sql = "SELECT * FROM db_service WHERE tour_id=$id";
            $result = mysqli_query($conn,$sql);
            $output.='
            <b class="mt-4 card" style="font-size: 18px;color: rgb(19, 20, 20);width: 73%;height: 42px ;background-color: rgb(233, 236, 239); ">
            <div class="mt-1">
              Dịch vụ Tour cung cấp
            </div>
            </b>';
            if(mysqli_num_rows($result)>0){
                $output.='
                <div class="container mt-2 mb-2">
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                </tr>
                </thead>
                <tbody>';
                $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=0;
                foreach($datas as $data){
                    $i++;
                        $output.='
                        <tr>
                            <td scope="row">'.$i.'</td>
                            <td>'.$data['name'].'</td>
                            <td>'.$data['price'].'</td>
                            <td>
                            <a href="delete.php?id='.$data['service_id '].'&tour_id='.$id.'" class="btn btn-danger">Xoá</a>
                            </td>
                         </tr>';
                }
                $output.=' </tbody>
                    </table>
                    </div>
                </div>';
            }
            $output.='
                <form class="col-sm-5" method="post" action="process.php">
                    <input type ="text" hidden readonly name="txtTourID" id="txtTourID" value="'.$id.'">

                        <div class="form-group mt-3">
                            <label for="txtSVname" class="form-lable">Tên dịch vụ</label>
                            <input id="txtSVname" name="txtSVname" placeholder="Nhập dịch vụ" type="text">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="txtSVprice" class="form-lable">Giá</label>
                            <input id="txtSVprice" name="txtSVprice" placeholder="Giá" type="number">
                            <span class="form-message"></span>
                        </div>
                        <input type="submit" id="btnSV" name="btnSV" class="btn btn-success mt-3" value="Thêm">
                </form>';
        }
        if($tab ==3 ){
            $output.='<div class="col-md-7" > 
                <div style="font-size: 22px; color: royalblue;">
                Thiết lập lịch trình
                </div>
                <div style="display: flex;">
                <form class="form-check" method="post" action="process.php">
                    <input type ="text" hidden readonly name="txtTourID" id="txtTourID" value="'.$id.'">
                    <input ';
            $sql = "SELECT * FROM db_tour WHERE tour_id = $id";
            $result = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($result);
                $output.=$data['status']==1?'checked':'';
                $output.=' class="form-check-input" type="checkbox" name="cbxPublic" id="cbxPublic">
                    <label class="form-check-label" for="cbxPublic">
                        <div>
                            Công khai tour
                        </div>
                        <div>
                            Điều kiện công khai Tour: Trang phải được công khai và đầy đủ tất cả thông tin của Tour(Chặng/ Lịch trình/ Giá và Thư viện ảnh)
                        </div>
                    </label>
                    <div class="mt-3">
                    <input type="submit" name="btnPublic" class="btn btn-success" value="Lưu">
                </div>
                    </form>
            </div>';

        }
        mysqli_close($conn);
        echo json_encode($output);
    }
}
      }
?> 