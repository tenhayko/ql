<?php
global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix, $aid;
if (!@eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}
checkPrivateModule("Hungha", $aid);
global $prefix;
$multilingual = 1;
$private_read = 1;
$private_write = 1;
$private_aproved = 1;
$private_delete = 1;
$private_copy = 1;
$private_move = 1;
//===========================


//===========================
function Add_slider($pid)
{

   	global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Quanlyslider/Add_slider.html');
    $xtpl->assign("portalurl", $portalurl);
    $xtpl->assign("pid", $pid);
      if ($pid) {
        $result_edit = $db->sql_query("SELECT * from " . $prefix . "_slider  where id='" . intval($pid) . "' ");
        while($row = $db->sql_fetchrow($result_edit)) {
             if(file_exists($row['url'])){
            $img = $row['url'];
          
        }else{
            $img = "images/noimg.png";
        }
        }
    }
        else{

        $img = "images/noimg.png";
      
        //die($dis_link);
    }
    $xtpl->assign("img",$img);
    if ($_POST['Update_finsh']) {
        if ($pid) {
            //die($_POST['chucdanh']);
                        //___________________________________upload

            $target_dir = "images/slider/";
            if(basename($_FILES["image"]["name"]))
            {
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
            }
            else{
                $target_file = "";
            }
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
                || $imageFileType == "gif" ) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            }
            //___________________________________upload


        $result = $db->sql_query("UPDATE " . $prefix . "_slider SET url = '" . $target_file . "' where id='".intval($pid)."'");
            if ($result) {
            	echo "<script>alert('Cập nhật thành công');</script>";
                Header("Location: ".$portalurl."/admin.php?op=Ds_slider");

            }

		//them thong tin
        } else {
            //die('ffdfdfsfd');
            $dir_image = "";
            $target_dir = "images/slider/";
           //$target_file = $target_dir . basename($_FILES["image"]["name"]);

            if(basename($_FILES["image"]["name"]))
            {
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
            }
            else{
                $target_file = "";
            }


           // $uploadOk = 1;
		  // $a = pathinfo(
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
                || $imageFileType == "gif" ) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            }

            $result = $db->sql_query("INSERT INTO " . $prefix . "_slider SET
             url = '" .$target_file . "'");

			$pid = mysql_insert_id();

			echo "<script>alert('Cập nhật thành công');</script>";
		    Header("Location: ".$portalurl."/admin.php?op=Ds_slider");
        }
    }
    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}
//==============================



//===========================

function Ds_slider()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Quanlyslider/Ds_slider.html');
    $xtpl->assign("portalurl", $portalurl);

	if($_POST['Del_vt']){
        foreach ($_POST['xoa_vatthe'] as $key => $value) {
            $db->sql_query("DELETE FROM ".$prefix."_slider WHERE id ='".intval($value)."'");
        }
    	echo "<script>alert('Bạn đã xóa vật thể thành công');location.href='".$portalurl."/admin.php?op=Ds_slider';</script>";
    }
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//-------------------------



//---------------------------

function Search_slider(){

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Quanlyslider/Search_slider.html');
$xtpl->assign("portalurl", $portalurl);
$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		
$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_slider where 1 $where_Tenvatthe $where_tom_tat $where_loaids $where_huyen $where_xa  $where_hientrang $where_thoigiandienra $where_hienvat_tb $where_dientich_dat $where_dientich_xd $where_tenditich $where_xephang $where_huong_xephang");
list($get_total_rows) = $db->sql_fetchrow($sgl_VattheCount);
if($get_total_rows == 0){
	$msg = 'Không có bản ghi nào theo tiêu chí tìm kiếm.';
	$hien_ketqua = 'none';
}else{
	$msg = 'Có '.$get_total_rows.' bản ghi theo tiêu chí tìm kiếm.';
	$hien_ketqua = '';
}
$xtpl->assign("msg",$msg);
$xtpl->assign("hien_ketqua",$hien_ketqua);
$pageview = pagination_ajax($get_total_rows,$number_per_page,$page);

 if((int)$get_total_rows > (int)$number_per_page){
 $pagination = '<tr>
                	<td align="center" colspan="10">'.$pageview.'</td>
                </tr>';
 }else{
	 $pagination = '';
 }
				$xtpl->assign("pagination",$pagination);
			
 $sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_slider
  order by id desc 
	 LIMIT $offset, $number_per_page");
	 $stt=$offset;
	while($row_vatthe = $db->sql_fetchrow($sgl_Vatthe)) 
		{
			
			$stt++;
			$xtpl->assign("stt",$stt); 
		$xtpl->assign("row_vatthe",$row_vatthe); 
		$xtpl->parse("MAIN.vatthe"); 
		}
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}




//===========================


switch ($op) {

		case "Add_slider":
		Add_slider($pid);
		break;
		
		case "Ds_slider":
		Ds_slider();
		break;
		
		
		case "Search_slider":
	    Search_slider();
	    break;
}
?>