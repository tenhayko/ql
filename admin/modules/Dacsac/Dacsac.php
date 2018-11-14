<?php
global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix, $aid;
if (!@eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}
checkPrivateModule("Dacsac", $aid);
global $prefix;
$multilingual = 1;
$private_read = 1;
$private_write = 1;
$private_aproved = 1;
$private_delete = 1;
$private_copy = 1;
$private_move = 1;



//===========================
function Add_dacsac($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Dacsac/Add_dacsac.html');
    $xtpl->assign("portalurl", $portalurl);
    
    $xtpl->assign("pid", $pid);
	//---------------------------
	

	if($_POST['Update_finsh']){
	//xu ly them và cap nhat
	$aconfig = array('name_vt', 
	'diachi', 
	'huyen', 
	'xa',
	'file_dk', 
	'noidung'
	); 
	foreach($aconfig as $v) 
	{ 
	if($_POST[$v]) 
	 $data[$v]= $_POST[$v]; 
	} 
	if($pid == $_POST['pid']) {
	updateQuery('Update',$prefix.'_dacsac', $data,"id = '".$pid."'"); 
	}
	else {
	$data['date']=date("Y-m-d"); 
	updateQuery('Insert',$prefix.'_dacsac', $data); 
	$pid = mysql_insert_id();
	 echo "<script>alert('Bạn đã cập nhật thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	}
	
	}
    //hien thi khi sua
	
	if($pid){
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_dacsac where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
       
	    $xtpl->assign("pid", $pid);
		
        $xtpl->assign("name_vt", $row['name_vt']);
		$xtpl->assign("diachi", $row['diachi']);
		$xtpl->assign("noidung", $row['noidung']);
		
		$huyen=$row['huyen'];$huyen=select_huyen($huyen);
		
		// Lấy xã trong huyện khi sửa và selected xã
		$xa_editSelected=Select_xaSelected($row['huyen'],$row['xa']);
		$xtpl->assign("xa_editSelected", $xa_editSelected);
		
	}else{
	  $huyen=select_huyen("");
	}
	$xtpl->assign("huyen", $huyen);
    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//==============================

function View_dacsac($pid){
	  global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Dacsac/View_dacsac.html');
    $xtpl->assign("portalurl", $portalurl);
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_dacsac where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
        $xtpl->assign("name_vt", $row['name_vt']);
		$xtpl->assign("diachi", $row['diachi']);
		$xtpl->assign("noidung", $row['noidung']);
		
		$huyen = Get_name_table($row['huyen'],_xahuyen);
			$xtpl->assign("huyen", $huyen);
			
			$xa = Get_name_table($row['xa'],_xahuyen);
			$xtpl->assign("xa", $xa);
		$xtpl->assign("xa", $xa);
    $xtpl->assign("pid", $pid);
	 $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}
//========================
function Ds_dacsac()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Dacsac/Ds_dacsac.html');
    $xtpl->assign("portalurl", $portalurl);
	$huyen=select_huyen("");$xtpl->assign("huyen", $huyen);
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//==============================

function Search_dacsac($name_vt,$huyen,$xaphuong){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Dacsac/Search_dacsac.html');
$xtpl->assign("portalurl", $portalurl);
$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		if($name_vt){
			$where_Tenvatthe = "and name_vt LIKE '%".$name_vt."%' ";
		}
		if($huyen){
			$where_huyen = "and huyen = '".intval($huyen)."' ";
		}
		if($xaphuong){
			$where_xa = "and xa = '".intval($xaphuong)."' ";
		}
$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_dacsac where 1 $where_Tenvatthe $where_huyen $where_xa");
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
                	<td align="center" colspan="5">'.$pageview.'</td>
                </tr>';
 }else{
	 $pagination = '';
 }
				$xtpl->assign("pagination",$pagination);
 $sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_dacsac
  where 1 $where_Tenvatthe $where_huyen $where_xa
  order by id desc 
	 LIMIT $offset, $number_per_page");
	 $stt=$offset;
	while($row_vatthe = $db->sql_fetchrow($sgl_Vatthe)) 
		{
			$stt++;
			$xtpl->assign("stt",$stt); 
		$huyen = Get_name_table($row_vatthe['huyen'],_xahuyen);
			$xtpl->assign("huyen", $huyen);
			
			$xa = Get_name_table($row_vatthe['xa'],_xahuyen);
			$xtpl->assign("xa", $xa);
			$huyen_xa = $huyen." - ".$xa;
			$huyen_xa = rtrim($huyen_xa,' - ');
			$xtpl->assign("huyen_xa", $huyen_xa);
		$xtpl->assign("row_vatthe",$row_vatthe); 
		$xtpl->parse("MAIN.vatthe"); 
		}
$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}
//======================

switch ($op) {
		case Add_dacsac:
		Add_dacsac($pid);
		break;
		
		case Ds_dacsac:
		Ds_dacsac();
		break;
		case "Search_dacsac":
	    Search_dacsac($name_vt,$huyen,$xaphuong);
	    break;	
		case "View_dacsac":
		View_dacsac($pid);
		break;

}
?>