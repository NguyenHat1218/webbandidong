    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	include_once("dbconnect.php");
	function bindLSPList($conn) {
    	$sqlstring = "select lsp_ma, lsp_ten from loaisanpham";
        $result = mysqli_query($conn, $sqlstring);
        echo "<select name='slLoaiSanPham' class='form-control'>
            	<option value='0'>Chọn loại sản phẩm</option>";
            	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<option value='".$row['lsp_ma']."'>".$row['lsp_ten']."</option>";
            	}
        echo "</select>";
	}

        function bindNSXList($conn) 
		{

            $sqlstring = "select nsx_ma, nsx_ten from nhasanxuat";
            $result = mysqli_query($conn, $sqlstring);
            echo "<select name='slNhaSanXuat' class='form-control'>
            		<option value='0'>Chọn nhà sản xuất</option>";
           			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    	echo "<option value='".$row['nsx_ma']."'>".$row['nsx_ten']."</option>";
            		}
            echo "</select>";
        }

		if(isset($_POST["btnThemMoi"]))
		{
				$ten = $_POST["txtTen"];
				$motangan = $_POST['txtMoTaNgan'];
				$motachitiet = $_POST['txtMoTaChiTiet'];
				$gia = $_POST['txtGia'];
				$soluong = $_POST['txtSoLuong'];
				$loai = $_POST['slLoaiSanPham'];
				$nsx = $_POST['slNhaSanXuat'];
				if(trim($ten=="")){
					echo "Vui lòng nhập tên sản phẩm";
				}else if(!is_numeric($gia)){
					echo "Vui lòng nhập giá sản phẩm";
				}
				else if(!is_numeric($soluong)){
					echo "Vui lòng nhập số lượng sản phẩm";
				}
				else if($loai=="0"){
					echo "Vui lòng chọn loại sản phẩm";
				}
				else if($nsx=="0"){
					echo "Vui lòng chọn nhà sản xuất";
				}
				else
				{
					$sq="Select * from sanpham where sp_ten='$ten'";
					$result = mysqli_query($conn,$sq);
					if(mysqli_num_rows($result)==0)
					{
						$sqlstring = "INSERT INTO sanpham ( 
							sp_ten, sp_mota_ngan,
							sp_mota_chitiet, 
							sp_gia, 
							sp_soluong,
							lsp_ma,
							nsx_ma, sp_ngaycapnhat)
							VALUES('".$ten."','".$motangan."',
								'".$motachitiet."',".$gia.",
								".$soluong.",".$loai.",
								".$nsx.",'".date('Y-m-d H:i:s')."')";

						mysqli_query($conn, $sqlstring);
						echo '<meta http-equiv="refresh" content="0;URL=quanly_sanpham.php"/>';
					}
					else
					{
						echo "<li>Trùng tên sản phẩm";
					}
			}
		}
        ?>
<div class="container">
	<h2>Thêm sản phẩm</h2>

	 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value=''/>
							</div>
                      </div>   
                      <div class="form-group">   
                             <label for="" class="col-sm-2 control-label">Loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <?php bindLSPList($conn); ?>
							</div>
                       </div>
                        
                        <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Hãng sản xuất(*):  </label>
							<div class="col-sm-10">
							      <?php bindNSXList($conn); ?>
							</div>
                        </div>   
                          
                          <div class="form-group">  
                            <label for="lblGia" class="col-sm-2 control-label">Giá(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtGia" id="txtGia" class="form-control" placeholder="Giá" value=''/>
							</div>
                            </div>   
                            
                            <div class="form-group">   
                            <label for="lblMoTa_Ngan" class="col-sm-2 control-label">Mô tả ngắn(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTaNgan" id="txtMoTaNgan" class="form-control" placeholder="Mô tả ngắn" value=''/>
							</div>
                            </div>
                            
                             <div class="form-group">  
                            <label for="lblMoTaChiTiet" class="col-sm-2 control-label">Mô tả chi tiết(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtMoTaChiTiet" rows="4" class="ckeditor"></textarea>
              <script language="javascript">
                                        CKEDITOR.replace( 'txtMoTaChiTiet',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });
										
                                    </script> 
                                  
							</div>
                        </div>
                            
                        <div class="form-group">  
                            <label for="lblSoLuong" class="col-sm-2 control-label">Số lượng(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtSoLuong" id="txtSoLuong" maxlength="10" class="form-control" placeholder="Số lượng" value=""/>
							</div>
                        </div>
 
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='quanly_sanpham.php'" />
                              	
						</div>
					</div>
				</form>
		</div>


<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>