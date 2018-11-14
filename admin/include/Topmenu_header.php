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
                          <li><a href="#">Đổi mật khẩu</a></li>
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