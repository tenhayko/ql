<?php
/*********************************************************/
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix,$aid;
if (!@eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
checkPrivateModule("Hungha",$aid);
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
function Baocao_vatthe_hungha()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/Baocao_vatthe_hungha.html');
	
    $xtpl->assign("portalurl", $portalurl);
	$huyen=select_huyen("");
	$xtpl->assign("huyen", $huyen);
	$chuyende=select_chuyende("");
	$xtpl->assign("chuyende", $chuyende);
	$loai_ds=select_loaids("");
   $xtpl->assign("loai_ds", $loai_ds);
   $hientrang=select_hientrang("",_hientrang_vatthe);
   $xtpl->assign("hientrang", $hientrang);
    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}
//==============================
function Search_BCvatthe($huyen, $xaphuong, $loai_ds,$niendai,$tomtat,$thoigian,$dientich_dat,$dientich_xd, $hientrang,$tenditich){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Baocao/Baocao_vatthe_aj.html');
$xtpl->assign("portalurl", $portalurl);

		if($tenditich && $tenditich!=""){
			$where_tenditich = "and tenditich LIKE '%".$tenditich."%' ";
			
		}

		if($niendai && $niendai!=""){
			$where_niendai = "and niendai LIKE '%".$niendai."%' ";
			
		}

		if($tomtat && $tomtat!=""){
			$where_tomtat = "and tomtat LIKE '%".$tomtat."%' ";
			
		}

		if($thoigian && $thoigian!=""){
			$where_thoigian = "and thoigianlehoi LIKE '%".$thoigian."%' ";
			
		}

		if($dientich_dat && $dientich_dat!=""){
			$where_dientich_dat = "and dientichdat LIKE '%".$dientich_dat."%' ";
			
		}

		if($dientich_xd && $dientich_xd!=""){
			$where_dientich_xd = "and dientichxaydung LIKE '%".$dientich_xd."%' ";
			
		}

		if($loai_ds){
			$where_loaids = "and loai_ds = '".intval($loai_ds)."' ";
		}
		if($huyen){
			$where_huyen = "and huyen = '".intval($huyen)."' ";
		}
		if($xaphuong){
			$where_xa = "and xa = '".intval($xaphuong)."' ";
		}

		
		if($hientrang){
			$where_hientrang = "and hientrang = '".intval($hientrang)."' ";
		}
		$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_vatthe 
				where 1 $where_niendai $where_tomtat $where_thoigian $where_dientich_dat $where_dientich_xd $where_loaids $where_huyen $where_xa $where_hientrang $where_tenditich");
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
		$sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_vatthe
  where 1 $where_niendai $where_tomtat $where_thoigian $where_dientich_dat $where_dientich_xd $where_loaids $where_huyen $where_xa $where_hientrang $where_tenditich
  order by id asc");
	 $stt=$offset;
	while($row_vatthe = $db->sql_fetchrow($sgl_Vatthe)) 
		{
			$stt++;
			$xtpl->assign("stt",$stt); 
			
			$loai_ds = Get_name_table($row_vatthe['loai_ds'],_name_disan);
			$xtpl->assign("loai_ds", $loai_ds);
			
			$xephang = Get_name_table($row_vatthe['xephang'],_xephang);
			$xtpl->assign("xephang", $xephang);
			
			
		
			$huyen = Get_name_table($row_vatthe['huyen'],_xahuyen);
			$xtpl->assign("huyen", $huyen);
			
			$xa = Get_name_table($row_vatthe['xa'],_xahuyen);
			$xtpl->assign("xa", $xa);
			$huyen_xa = $huyen." - ".$xa;
			$huyen_xa = rtrim($huyen_xa,' - ');
			$xtpl->assign("huyen_xa", $huyen_xa);
			
			$hientrang = Get_name_vt_pvt($row_vatthe['hientrang'],_hientrang_vatthe);
			$xtpl->assign("hientrang", $hientrang);
			
		$xtpl->assign("row_vatthe",$row_vatthe); 
		$xtpl->parse("MAIN.vatthe"); 
		}
		$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}

// Báo cáo phi vật thể
function Baocao_phivatthe()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/Baocao_phivatthe.html');
    $xtpl->assign("portalurl", $portalurl);
	$huyen=select_huyen("");
	$xtpl->assign("huyen", $huyen);
	$dantoc=select_dantoc("");
	$xtpl->assign("dantoc", $dantoc);
	//$hientrang=select_hientrang("");
	 $hientrang=select_hientrang("",_hientrang_vatthe);
   $xtpl->assign("hientrang", $hientrang);
	$loai_ds=select_loaids("");
   $xtpl->assign("loai_ds", $loai_ds);
       $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}

//==============================

function Search_BCphivatthe($huyen, $xaphuong, $loai_ds, $dantoc, $hientrang){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Baocao/Baocao_phivatthe_aj.html');
$xtpl->assign("portalurl", $portalurl);
if($dantoc){
	
			$where_Tenvatthe = "and dantoc = '".intval($dantoc)."' ";
		}
		if($loai_ds){
			$where_loaids = "and loai_ds = '".intval($loai_ds)."' ";
		}
		if($huyen){
			$where_huyen = "and huyen = '".intval($huyen)."' ";
		}
		if($xaphuong){
			$where_xa = "and xa = '".intval($xaphuong)."' ";
		}
		if($hientrang){
			$where_chuyende = "and hientrang = '".intval($hientrang)."' ";
		}
		$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_phivatthe 
				where 1 $where_Tenvatthe $where_loaids $where_huyen $where_xa $where_chuyende");
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
		$sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_phivatthe 
  where 1 $where_Tenvatthe $where_loaids $where_huyen $where_xa $where_chuyende
  order by id desc");
	 $stt=$offset;
	while($row_vatthe = $db->sql_fetchrow($sgl_Vatthe)) 
		{
			$stt++;
			$xtpl->assign("stt",$stt); 
			$loai_ds = Get_name_table($row_vatthe['loai_ds'],_loaidisan);
			$xtpl->assign("loai_ds", $loai_ds);
			
			$chuyende = Get_name_table($row_vatthe['chuyende'],_chuyende);
			$xtpl->assign("chuyende", $chuyende);
			
			
			$dantoc = Get_name_table($row_vatthe['dantoc'],_dantoc);
			$xtpl->assign("dantoc", $dantoc);
			
			$huyen = Get_name_table($row_vatthe['huyen'],_xahuyen);
			$xtpl->assign("huyen", $huyen);
			
			$xa = Get_name_table($row_vatthe['xa'],_xahuyen);
			$xtpl->assign("xa", $xa);
			$huyen_xa = $huyen." - ".$xa;
			$huyen_xa = rtrim($huyen_xa,' - ');
			$xtpl->assign("huyen_xa", $huyen_xa);
			
			$hientrang = Get_name_table($row_vatthe['hientrang'],_hientrang_pvt);
			$xtpl->assign("hientrang", $hientrang);
		$xtpl->assign("row_vatthe",$row_vatthe); 
		$xtpl->parse("MAIN.vatthe"); 
		}
		$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}

// Báo cáo đặc sắc

function Baocao_dacsac()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Baocao/Baocao_dacsac.html');
    $xtpl->assign("portalurl", $portalurl);
	$huyen=select_huyen("");
	$xtpl->assign("huyen", $huyen);
       $xtpl->parse('MAIN');
    $xtpl->out('MAIN');
    include 'bottom.php';
}

//==============================

function Search_BCdacsac($huyen, $xaphuong){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Dacsac/Search_dacsac.html');
$xtpl->assign("portalurl", $portalurl);
		if($huyen){
			$where_huyen = "and huyen = '".intval($huyen)."' ";
		}
		if($xaphuong){
			$where_xa = "and xa = '".intval($xaphuong)."' ";
		}
		$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_dacsac 
				where 1 $where_huyen $where_xa");
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
		$sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_dacsac
  where 1 $where_huyen $where_xa
  order by id asc");
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
//==============================


switch($op) {
	
	case "Baocao_vatthe_hungha":
	Baocao_vatthe_hungha();
	break;
	case "Search_BCvatthe":
	Search_BCvatthe($huyen, $xaphuong, $loai_ds,$niendai,$tomtat,$thoigian,$dientich_dat,$dientich_xd, $hientrang,$tenditich);
	
	break;
	
	case "Baocao_phivatthe":
	Baocao_phivatthe();
	break;
	case "Search_BCphivatthe":
	Search_BCphivatthe($huyen, $xaphuong, $loai_ds, $dantoc, $hientrang);
	break;
	
	case "Baocao_dacsac":
	Baocao_dacsac();
	break;
	case "Search_BCdacsac":
	Search_BCdacsac($huyen, $xaphuong);
	break;
}

?>