<?php
global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $aid;

global $prefix, $aid;
if (!@eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}
checkPrivateModule("Sanpham", $aid);
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

function Sanpham()
{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Sanpham/Sanpham.html');
	$ngaunhien = rand_string(15);
	 $xtpl->assign("ngaunhien", $ngaunhien);
    $xtpl->assign("portalurl", $portalurl);
	if($_POST['thanhtoan']){

}
	
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}



//---------------------------

function Check_sanpham($name_sp,$soluong,$ngaunhien){
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;
 $sgl_sanpham = $db->sql_query("Select dongia from ".$prefix."_products
  where ma_hang = '".$name_sp."'
  order by id desc 
	");
	list($dongia) = $db->sql_fetchrow($sgl_sanpham); 
	if($dongia != ""){
		$dongia = exp_to_dec($dongia);
	}else{
		$dongia = 0;
	}
	$thanhtien = $dongia*$soluong;
	 $sgl_Sanpham_count = $db->sql_query("Select count(id) from ".$prefix."_order_tmp where 
	 							ma_vach = '".$name_sp."' and ngaunhien = '".$ngaunhien."'" );
	list($count) = $db->sql_fetchrow($sgl_Sanpham_count); 
	if($dongia > 0){
		$data['ma_vach'] = $name_sp;
		$data['so_luong'] = $soluong;
		$data['don_gia'] = $dongia;
		$data['thanh_tien'] = $thanhtien;
		$data['ngaunhien'] = $ngaunhien;
		$data['date'] = date('Y-m-d h:i');
		$data['aid'] = $aid;
		if($count == 0){
			updateQuery('Insert',$prefix.'_order_tmp', $data); 
		}else{
			 $sgl_oder = $db->sql_query("Select id,so_luong,thanh_tien from ".$prefix."_order_tmp where 
	 							ma_vach = '".$name_sp."' and ngaunhien = '".$ngaunhien."'" );
			list($id,$so_luong,$thanh_tien) = $db->sql_fetchrow($sgl_oder); 
			$data['so_luong'] = (int)$so_luong+1;
			$data['thanh_tien'] = (int)$thanh_tien+(int)$thanhtien;
			updateQuery('Update',$prefix.'_order_tmp', $data,"id = '".$id."'"); 
		}
	}
echo $dongia;
}
function Check_soluong($id,$so_luong){
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

			 $sgl_oder = $db->sql_query("Select id,so_luong,don_gia,thanh_tien from ".$prefix."_order_tmp where 
	 							id = '".$id."'" );
			list($id,$soluong,$don_gia,$thanh_tien) = $db->sql_fetchrow($sgl_oder); 
			$data['so_luong'] = $so_luong;
			$data['thanh_tien'] = ((int)$so_luong)*(int)$don_gia;
			updateQuery('Update',$prefix.'_order_tmp', $data,"id = '".$id."'"); 
		
	
echo $dongia;
}


//===========================
function Search_Sanpham($ngaunhien){
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;

    $xtpl = new XTemplate('admin/htmls/Sanpham/Search_Sanpham.html');
    $xtpl->assign("portalurl", $portalurl);
	 $sgl_Sanpham_count = $db->sql_query("Select count(id),sum(thanh_tien) from ".$prefix."_order_tmp where ngaunhien = '".$ngaunhien."' and aid = '".$aid."'" );
	 list($count_s,$sum_thanhtien) = $db->sql_fetchrow($sgl_Sanpham_count);
	 if($count_s >0){
		 $hien = "";
	 }else{
		  $hien = "none";
	 }
	 $xtpl->assign("hien", $hien); 
	 $xtpl->assign("count_s", number_format($sum_thanhtien, 2, ',', '. ')); 
	 $sgl_Sanpham = $db->sql_query("Select * from ".$prefix."_order_tmp where ngaunhien = '".$ngaunhien."' and aid = '".$aid."'" );
	 $stt=0;
	while($row_Sanpham = $db->sql_fetchrow($sgl_Sanpham)) 
		{
			$sql_s = $db->sql_query("Select ten_hang from ".$prefix."_products where ma_hang = '".$row_Sanpham['ma_vach']."'");
			list($ten_hang) =  $db->sql_fetchrow($sql_s);
			$stt ++;
			$row_Sanpham['tensanpham'] = $ten_hang;
			$row_Sanpham['don_gia'] = number_format($row_Sanpham['don_gia'], 2, ',', '. ');
			$row_Sanpham['thanh_tien2'] =  number_format($row_Sanpham['thanh_tien'], 2, ',', '. ');
			$xtpl->assign("stt",$stt);
			$xtpl->assign("row_Sanpham",$row_Sanpham); 
		    $xtpl->parse("MAIN.Sanpham"); 
		}
	
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


   
}
//===================
function Delete_sanpham($id){
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;
	$db->sql_query("Delete from ".$prefix."_order_tmp where id = '".intval($id)."'" );
echo 1;
}
//==============

switch ($op) {
		
		case Sanpham:
		Sanpham();
		break;
		
	
		case "Check_sanpham":
		Check_sanpham($name_sp,$soluong,$ngaunhien);
		break;
		case "Thanhtoan_sanpham":
		Thanhtoan_sanpham($code_bar,$soluong,$thanhtien,$tongtien,$tong_sosp,$dongia);
		break;
		case "Search_Sanpham":
		Search_Sanpham($ngaunhien);
		break;
		
		case "Check_soluong":
		Check_soluong($id,$so_luong);
		break;
		case "Delete_sanpham":
		Delete_sanpham($id);
		break;
}
?>