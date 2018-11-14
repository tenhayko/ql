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
					 
					 
                    <li><a href="'.$portalurl.'/admin.php?op=logout">Thoát</a></li>
                </ul>
            </div>
        </div>
    </header>


';
?>