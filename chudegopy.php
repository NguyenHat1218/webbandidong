  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>A18059_Samuel</title>
  </head>
  <form id="form2" name="form2" method="POST" action="chudegopy_insert.php" class="form-horizontal" role="form">
  <div class="row">
      <fieldset>
          <div class="container">
              <center>
                  <h1>Ý KIẾN KHÁCH HÀNG</h1>
              </center>
              <div class="form-group">
                  <label for="gy_ma" class="col-sm-3 control-label">Mã góp ý: </label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_ma" id="gy_ma" class="form-control" placeholder="Vui lòng nhập một sô"
                          value="" />
                  </div>
              </div>
              <div class="form-group">
                  <label for="gy_hoten" class="col-sm-3 control-label">Họ tên khách hàng:</label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_hoten" id="gy_hoten" class="form-control"
                          placeholder="Vui lòng nhập họ và tên">
                  </div>
              </div>
              <div class="form-group">
                  <label for="gy_email" class="col-sm-3 control-label">Email khách hàng:</label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_email" id="gy_email" class="form-control"
                          placeholder="Vui lòng nhập email">
                  </div>
              </div>
              <div class="form-group">
                  <label for="gy_diachi" class="col-sm-3 control-label">Địa chỉ khách hàng:</label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_diachi" id="gy_diachi" class="form-control"
                          placeholder="Vui lòng nhập địa chỉ">
                  </div>
              </div>
              <div class="form-group">
                  <label for="gy_dienthoai" class="col-sm-3 control-label">Số điện thoại khách hàng:</label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_dienthoai" id="gy_dienthoai" class="form-control"
                          placeholder="Vui lòng nhập số điện thoại">
                  </div>
              </div>
              <div class="form-group">
                  <label for="gy_tieude" class="col-sm-3 control-label">Tiêu đề góp ý:</label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_tieude" id="gy_tieude" class="form-control"
                          placeholder="Vui lòng nhập tiêu đề góp ý">
                  </div>
              </div>
              <div class="form-group">
                  <label for="gy_noidung" class="col-sm-3 control-label">Nội dung:</label>
                  <div class="col-sm-9">
                      <input type="text" name="gy_noidung" id="gy_noidung" class="form-control"
                          placeholder="Nội dung khách hàng cần góp ý.">
                  </div>
              </div>
              <div class="form-group">
                  <label for="lblNgaySinh" class="col-sm-3 control-label">Ngày góp ý: </label>
                  <div class="col-sm-9">
                      <span class="input-group-btn">
                          <select name="slNgaySinh" id="slNgaySinh" class="form-control">
                              <option value="0">Chọn ngày</option>
                              <?php
                                            for($i=1;$i<=31;$i++)
                                             {
                                                 if($i==$ngaysinh){
                                                     echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                                 }
                                                 else{
                                                 echo "<option value='".$i."'>".$i."</option>";
                                                 }
                                             }
                                        ?>
                          </select>
                      </span>
                      <span class="input-group-btn">
                          <select name="slThangSinh" id="slThangSinh" class="form-control">
                              <option value="0">Chọn tháng</option>
                              <?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                              if($i==$thangsinh){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                          </select>
                      </span>
                      <span class="input-group-btn">
                          <select name="slNamSinh" id="slNamSinh" class="form-control">
                              <option value="0">Chọn năm</option>
                              <?php
                                        for($i=1970;$i<=2010;$i++)
                                         {
                                             if($i==$namsinh){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                          </select>
                      </span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="cdgy_ma" class="col-sm-3 control-label">Mã chủ đề:</label>
                  <div class="col-sm-9">
                      <input type="text" name="cdgy_ma" id="cdgy_ma" class="form-control" placeholder="Nhập mã chủ đề.">
                  </div>
              </div>
              <div class="form-group">
              </div></br>
              <input type="Submit" value="Submit" />
          </div>
          </div>
          </div>
      </fieldset>
      </div>
  </form>



  </body>

  </html>