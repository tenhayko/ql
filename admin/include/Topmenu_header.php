<?php
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;
echo '

<link type="text/css" href="'.$portalurl.'/admin/css/bootstrap.min.css" rel="stylesheet"/>
    <link type="text/css" href="'.$portalurl.'/admin/css/font-awesome.css" rel="stylesheet"/>
    <link type="text/css" href="'.$portalurl.'/admin/css/style.css" rel="stylesheet"/>
    <script type="text/javascript" src="'.$portalurl.'/admin/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="'.$portalurl.'/admin/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="'.$portalurl.'/admin/css/ckeditor/ckeditor.js"></script>
	
	

   
    <link type="text/css" href="'.$portalurl.'/admin/css/fix_table.css" rel="stylesheet"/>

     <link type="text/css" href="'.$portalurl.'/admin/css/datepicker.css" rel="stylesheet"/>
<div class="wrapper">
    <header>
        <div class="row banner">
            <img src="'.$portalurl.'/admin/img/banner.png">
        </div>
        <div class="menu ">
            <div class="container">
                <ul>
                <li style="padding: 5px; "><a id="menu-toggle" href="#" > <i style="font-size: 15px"class="fa fa-align-justify"></i></a></li>
                    <li><a href="#">'.date("H:i:s").', ngày '.date("d/m/Y").'</a></li>
                    <li><a href="'.$portalurl.'/admin">Trang chủ</a></li>
					
					 
					
			
                    <li><a  target="_blank" href="http://hungha.gov.vn/">Cổng thông tin</a></li>
					
					<li><a  target="_blank" href="#">Hướng dẫn sử dụng</a></li>
					
					<li><a  target="_blank" href="http://qts.vn">Liên hệ - Hỗ trợ</a></li>
					 
                    <li>
                     <div class="dropdown user-dropdown">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#" data-toggle="modal" data-target="#myModal">Đổi mật khẩu</a></li>
                          <li><a href="'.$portalurl.'/admin.php?op=logout">Thoát</a></li>
                        </ul>
                      </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>


';
?>
<style>
    .user-dropdown button{
        background: none;
        border: none;
        padding: 3px;
        color: #fff;
    }
    .user-dropdown .dropdown-menu{
        background: #d28b22;
    }
    .user-dropdown .dropdown-menu:hover{
        background: #d28b22 !important;
    }
    .user-dropdown  .dropdown-menu>li>a:hover,.user-dropdown .dropdown-menu>li>a:focus{
        color: #000;
        text-decoration: none;
        background-color: #d28b22;
    }
</style>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đổi mật khẩu</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="old_password">Mật khẩu cũ<span style="color: red">*</span></label>
            <input type="password" class="form-control" id="old_password">
          </div>
          <div class="form-group">
            <label for="new_password">Mật khẩu mới<span style="color: red">*</span></label>
            <input type="password" class="form-control" id="new_password">
          </div>
          <div class="form-group">
            <label for="confirm_password">Xác nhận mật khẩu<span style="color: red">*</span></label>
            <input type="password" class="form-control" id="confirm_password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="changePassword()">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    function changePassword()
    {
        var old_password = $('#old_password').val();
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        if (old_password=='' || confirm_password=='' || new_password=='') {
            alert('Vui lòng điền đầy đủ thông tin');
        }else{
            if (new_password != confirm_password) {
                alert('Xác nhận mật khẩu không trùng khớp');
            }else{
                $.ajax({
                    type: "POST",
                    url: '<?= $portalurl?>/admin.php?op=Change_Password_User',
                    data: "old_password="+old_password+"&new_password="+new_password,
                    success: function (ketqua2) {
                        alert(ketqua2.replace('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />', ''));
                    }
                });
            }
        }
    }
</script>