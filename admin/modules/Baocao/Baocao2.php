<?php
/*********************************************************/
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix,$aid;
if (!@eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
checkPrivateModule("Baocao",$aid);
global $prefix;
$multilingual=1;
$private_read=1;
$private_write=1;
$private_aproved=1;
$private_delete=1;
$private_copy=1;
$private_move=1;
//---------------------



//==============================
function BC_theophongban()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_theophongban.html');
    $xtpl->assign("portalurl", $portalurl);


 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
			
			
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
    //---------------

   

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================
//==============================
function BC_theophongban_Print($name_khaisinh, $phongban)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_theophongban_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);




    if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocaophongban");
		//die( $row['name_khaisinh']);
    }


    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================


//==============================
function BC_sinhnhat()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_sinhnhat.html');
    $xtpl->assign("portalurl", $portalurl);

//............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................
   

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================
//==============================
function BC_sinhnhat_Print($name_khaisinh, $phongban, $date_picker)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_sinhnhat_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================

//VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV

//==============================
function BC_thamniencongtac()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_thamniencongtac.html');
    $xtpl->assign("portalurl", $portalurl);

   //............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................
   
   

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================



//==============================
function BC_thamniencongtac_Print($name_khaisinh, $phongban, $sonamct)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_thamniencongtac_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================



//==============================
function BC_hethan_hopdong()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_hethan_hopdong.html');
    $xtpl->assign("portalurl", $portalurl);

//............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................
   

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================

//==============================
function BC_hethan_hopdong_Print($name_khaisinh, $phongban, $hanhopdong)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_hethan_hopdong_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================





//==============================
function BC_dangvien()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_dangvien.html');
    $xtpl->assign("portalurl", $portalurl);

   
//............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================

//==============================
function BC_dangvien_Print($name_khaisinh, $phongban, $date_picker)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_dangvien_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================



//==============================
function BC_congdoan()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_congdoan.html');
    $xtpl->assign("portalurl", $portalurl);
  
//............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................
   

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================

//==============================
function BC_congdoan_Print($name_khaisinh, $phongban, $date_picker)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_congdoan_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================




//==============================
function BC_theotuoi()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_theotuoi.html');
    $xtpl->assign("portalurl", $portalurl);

   
   //............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................
   

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================

//==============================
function BC_theotuoi_Print($name_khaisinh, $phongban, $dotuoi)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_theotuoi_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================





//==============================
function BC_di_nuocngoai()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/BC_di_nuocngoai.html');
    $xtpl->assign("portalurl", $portalurl);

   
   //............isset Print...............
 if ($_POST['Print_BC']) {
echo "truyen den file in cac id: ";
        if (isset($_POST["check"]) and (int)count($_POST["check"]) > 0) {
            for ($i = 0; $i < count($_POST["check"]); $i++) {
				$values_BC = $_POST["check"][$i];
				echo $values_BC." - ";
            }
        }
		echo  "chua lam";
        Header("Location: ");//bao-cao-cvc-theo-phong-ban
    }
//.......................................

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================


//==============================
function BC_di_nuocngoai_Print($name_khaisinh, $date_picker, $quocgia)
{
     global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename;

    $xtpl = new XTemplate('admin/htmls/Baocao/BC_di_nuocngoai_Print.html');
    $number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page'] != '0' ? $_GET['number_per_page'] : 1;

    $xtpl->assign("portalurl", $portalurl);


    #- Lấy số trang hiện tại ( Mặc định = 1);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //echo $page;
    #- Vị trí lấy dữ liệu
    $offset = ($page - 1) * $number_per_page;
    $xtpl->assign("page", $page);


 if ($name_khaisinh) {
        $where_Name = "and name_khaisinh LIKE '%" . $name_khaisinh . "%' ";
        //die($where_Name);
    }else{
        $where_Name = "";
    }
	
	if ($phongban) {
        $where_PB = "and name_khaisinh LIKE '%" . $phongban . "%' ";
        //die($where_Name);
    }else{
        $phongban = "";
    }

   //die ($where_Name);

    $sgl_nvCount = mysql_query("Select COUNT(*) from " . $prefix . "_thongtincanhan where 1 $where_Name $where_PB");

    list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

    $pageview = pagination_ajax($get_total_rows, $number_per_page, $page);
//echo $pageview;
//create pagination

    $xtpl->assign("pagination", $pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
    $sql_acout = mysql_query("Select email from " . $prefix . "_authors where aid='admin'");
    list($email_admin) = mysql_fetch_array($sql_acout);
    if ($aid == "admin") {
        $where_aid = "";
    } else {

        $where_aid = " and a.email <> '" . $email_admin . "'";

    }

    $sql_nv = mysql_query("Select * from " . $prefix . "_thongtincanhan
		where 1 $where_Name $where_PB
	 order by id asc
	 LIMIT $offset, $number_per_page");

    $stt = $offset;
    while ($row = mysql_fetch_array($sql_nv)) {
        $stt++;
        $xtpl->assign("stt", $stt);
        $xtpl->assign("row", $row);
        $xtpl->parse("MAIN.baocao_cbvc");
		//die( $row['name_khaisinh']);
    }

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');

}
//==============================



//--------------------------
switch($op) {
	
	case "BC_theophongban":
	BC_theophongban();
	break;
	
	case "BC_theophongban_Print":
	BC_theophongban_Print($name_khaisinh, $phongban);
	break;
	
	
	
	case "BC_sinhnhat":
	BC_sinhnhat();
	break;
	
	case "BC_sinhnhat_Print":
	BC_sinhnhat_Print($name_khaisinh, $phongban, $ngaysinh);
	break;
	
	
	
	case "BC_thamniencongtac":
	BC_thamniencongtac();
	break;
	
	case "BC_thamniencongtac_Print":
	BC_thamniencongtac_Print($name_khaisinh, $phongban, $sonamct);
	break;
	
	
	case "BC_hethan_hopdong":
	BC_hethan_hopdong();
	break;
	
	
	case "BC_hethan_hopdong_Print";
	BC_hethan_hopdong_Print($name_khaisinh, $phongban, $hanhopdong);
	break;
	
	case "BC_dangvien":
	BC_dangvien();
	break;
	
	case "BC_dangvien_Print";
	BC_dangvien_Print($name_khaisinh, $phongban, $date_picker);
	break;
	
	
	
	
	
	case "BC_congdoan":
	BC_congdoan();
	break;
	case "BC_congdoan_Print";
	BC_congdoan_Print($name_khaisinh, $phongban, $date_picker);
	break;
	
	
	case "BC_theotuoi":
	BC_theotuoi();
	break;
	case "BC_theotuoi_Print";
	BC_theotuoi_Print($name_khaisinh, $phongban, $dotuoi);
	break;
	
	case "BC_di_nuocngoai":
	BC_di_nuocngoai();
	break;
	case "BC_di_nuocngoai_Print";
	BC_di_nuocngoai_Print($name_khaisinh, $date_picker, $quocgia);
	break;
}

?>