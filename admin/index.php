<?php
$past = time() -30;
foreach ( $_COOKIE as $key => $value )
{
    setcookie( $key, $value, $past, '/' );
}
$cpanel="left";
require_once("../mainfile.php");
global $admin,$prefix,$logout,$portalurl,$currentlang,$aid,$error,$sitelogo,$foot1,$foot3,$form,$remain;
IF($error==1) $alert = '<img src="../images/admin/error.png" align=absmiddle> Bạn đã khai báo tên truy cập và mật khẩu không đúng ! <br>
						Nếu sau 5 lần vẫn không thể xác nhận được đúng thông tin chúng tôi sẽ ngưng hoạt động sự truy cập của bạn trong 30 phút .
						';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>HƯNG HÀ - THÁI BÌNH</title>
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<link href="../css/style.css" rel="stylesheet">
 
        <link href="../css/default.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript">
	jQuery(window).load(function() {

    $("#nav > li > a").click(function () { // binding onclick
        if ($(this).parent().hasClass('selected')) {
            $("#nav .selected div div").slideUp(100); // hiding popups
            $("#nav .selected").removeClass("selected");
        } else {
            $("#nav .selected div div").slideUp(100); // hiding popups
            $("#nav .selected").removeClass("selected");

            if ($(this).next(".subs").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next(".subs").children().slideDown(200);
            }
        }
    }); 

});

<!----------------------->
jQuery(window).load(function() {

    $("#nav2 > li > a").click(function () { // binding onclick
        if ($(this).parent().hasClass('selected')) {
            $("#nav2 .selected div div").slideUp(100); // hiding popups
            $("#nav2 .selected").removeClass("selected");
        } else {
            $("#nav2 .selected div div").slideUp(100); // hiding popups
            $("#nav2 .selected").removeClass("selected");

            if ($(this).next(".subs").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next(".subs").children().slideDown(200);
            }
        }
    }); 

});
</script>


<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet"/>
    <link type="text/css" href="css/font-awesome.css" rel="stylesheet"/>
    <link type="text/css" href="css/style_login.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    
    
</head>
<?
IF(!$admin || $logout==1){
	mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $random_num = mt_rand(0, $maxran);
?>
<body>

<div class="wrapper">

    <div class="site_main">

        <div class="container wrapper1 ">
            <header>
                <div class="row banner">
                    <img src="images/img/login_banner.png">
                </div>
                <div class="line"></div>
                <div class="menu ">
                    <div class="container">
                        <ul>
                            
                            
                            <li><a href="#">HƯỚNG DẪN SỬ DỤNG</a></li>
                           
                            
                             <li><a href="#">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div style="padding: 5px">
                <div class="login_main">
                    <div class="col-xs-12">
                        <div class="row" style="padding: 5px 0px 5px 10px;">
                            <img src="images/img/quochuy.png">&nbsp;&nbsp;&nbsp;
                            <img src="images/img/text.png">
                        </div>
                    </div>
                    <div class="col-xs-8 slide">


                        <div class="row">

                            <script>
                                jQuery(document).ready(function ($) {
                                    var _CaptionTransitions = [];
                                    //Left to Right
                                    _CaptionTransitions["L"] = { $Duration: 800, $FlyDirection: 1 };
                                    //Right to Left
                                    _CaptionTransitions["R"] = { $Duration: 800, $FlyDirection: 2 };
                                    //Top to Bottom
                                    _CaptionTransitions["T"] = { $Duration: 800, $FlyDirection: 4 };
                                    //Bottom to Top
                                    _CaptionTransitions["B"] = { $Duration: 800, $FlyDirection: 8 };
                                    //Reference http://www.jssor.com/development/caption-transition-viewer.html

                                    var options = {
                                        $AutoPlay: true,
                                        $PlayOrientation: 1,
                                        $DragOrientation: 3,

                                        $CaptionSliderOptions: {
                                            $Class: $JssorCaptionSlider$,
                                            $CaptionTransitions: _CaptionTransitions,
                                            $PlayInMode: 1,
                                            $PlayOutMode: 3
                                        }
                                    };

                                    var jssor_slider1 = new $JssorSlider$("slider1_container", options);
                                });
                            </script>
                            <div id="slider1_container" style="position: relative; width: 660px; height: 305px;">

                                <!-- Loading Screen -->
                                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                                    </div>
                                    <div style="position: absolute; display: block; background: url(images/img/loading.gif) no-repeat center center;
                                        top: 0px; left: 0px;width: 100%;height:100%;">
                                    </div>
                                </div>
                                <!-- Slides Container -->
                                <div u="slides"
                                     style="cursor: move; position: absolute; left: 0px; top: 0px; width:660px; height:305px; overflow: hidden;">
                                     <?php
                                        global $db, $prefix,$portalurl;
                                        $result_edit = $db->sql_query("SELECT * from " . $prefix . "_slider");
                                        while($row_vatthe = $db->sql_fetchrow($result_edit)) 
                                            {
                                                echo '<div><img u="image" src="'.$portalurl."/".$row_vatthe['url'].'"/></div>';
                                            }
                                         ?>
                                    
                                </div>
                            </div>
                            <!-- Jssor Slider End -->
                        </div>

                    </div>
                   <div class="col-xs-4 ">
                        <div style="padding-left: 10px" class="row">
                            <div class="login_frm">
                                <div class="title_frm">
                                    <b>THÔNG TIN ĐĂNG NHẬP</b>
                                </div>
                                <form action="../admin.php" method="post" targer="main" id="frm" name="frm" onsubmit="return(validate());">
                                    <div class="form-group form-group">
                                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                                        
                                        <input class="form-control input-sm" id="exampleInputEmail1" style=" color:#ccc; "  name="aid" type="text" value="Tên sử dụng" onfocus="if (this.value=='Tên sử dụng') this.value=''" onblur="if (this.value=='') this.value='Tên sử dụng';" />
                                        
                                      
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mật khẩu</label>
                                        
                                        <input class="form-control input-sm" id="exampleInputPassword1"  name="pwd" type="password" value="Mật khẩu"  onfocus="if (this.value=='Mật khẩu') this.value=''" onblur="if (this.value=='') this.value='Mật khẩu';" />
                                        
                                        
                                       
                                    </div>
                                    
                                    <div class="col-xs-6 text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-default btn-sm btn-primary" style="padding: 5px 25px">Đăng nhập</button>
                                    </div>
                                    </div>
                                    <input type="hidden" NAME="op" value="login">
                                </form>

                                <div class="clear"></div>
                                <div style="padding-top: 15px">
                                    <b>Hỗ trợ kỹ thuật</b><br>
                                    Điện thoại: 04 3785 8656 - 0975 195 112<br>
                                    Email: info@qts.com.vn
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="clear"></div>
                    <div class="hr"></div>

                </div>
            </div>
            <footer>
                <b>CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ THƯƠNG MẠI QUỐC TẾ</b><BR>
                Số 52, đường Lê Quang Đạo, Quận Nam Từ Liêm, Hà Nội | Điện thoại: 04 3785 6973 | Email: info@qts.com.vn
            </footer>
            <!--<div class="row" style="border-top: ">

            </div>-->
        </div>
    </div>
</div>




</body>


<?
}ELSE{
	$admin = addslashes(base64_decode($admin));
	$admin = explode(":", $admin);
	$aid = addslashes($admin[0]);
?>
<BODY   style=" background:#E3E3E3;float:center;">

<?
include '../admin/include/Topmenu_header.php';
include '../admin/modules/Content_left.php';
require_once("../admin/modules/Content_right.php");
include '../bottom.php';

?>


</BODY></HTML>
<? } ?>




