<?php
/*********************************************************/
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
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

function Export_Baocao_vt($huyen, $xaphuong, $loai_ds,$niendai,$tomtat,$thoigian,$dientich_dat,$dientich_xd, $hientrang,$tenditich)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
		$name_huyen = Get_name_table_export($huyen,_xahuyen);
		$name_xa = Get_name_table_export($xaphuong,_xahuyen);
		$name_loaids = Get_name_table_export($loai_ds,_name_disan);
		
		$name_hientrang =  Get_name_table_export($hientrang,_hientrang_vatthe);
		
		$name_huyen_vn = Get_name_table_export_vn($huyen,_xahuyen);
		$name_xa_vn = Get_name_table_export_vn($xaphuong,_xahuyen);
		$name_loaids_vn = Get_name_table_export_vn($loai_ds,_name_disan);
		
		$name_hientrang_vn =  Get_name_table_export_vn($hientrang,_hientrang_vatthe);
		
		$tieu_de = 'Danh sách vật thể theo ' . $name_huyen_vn.''.$name_xa_vn.''.$tenditich.''.$niendai.''.$name_loaids_vn.''.$dientich_dat.''.$dientich_xd.''.$name_hientrang_vn;
		$tieu_de = str_replace( '  ', ' ', $tieu_de );
		$today = date('d-m-Y');
		
	$filename='Danh_sach_vat_the_'.$today.'_' . $name_huyen.''.$name_xa.''.$name_loaids.''.$dientich_dat.'_'.$dientich_xd.'_'.$name_hientrang;
	$filename = rtrim($filename,'_');
	$filename = str_replace( '__', '_', $filename );
	    header("Content-Type: application/xls; charset=UTF-8");
		header("Content-Disposition: attachment; filename=$filename.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	
	
		$xtpl = new XTemplate('admin/htmls/Baocao/Export_Baocao_vt.html');
		$xtpl->assign("portalurl", $portalurl);
		$xtpl->assign("msg", $msg);
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
		  order by id desc");
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
				$xtpl->assign("tieu_de", $tieu_de);
				$xtpl->parse('MAIN');
			$xtpl->out('MAIN');
}
//==============================

function Export_Baocao_pvt($huyen, $xaphuong, $loai_ds, $dantoc, $hientrang){
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
		$name_dantoc = Get_name_table_export($dantoc,_dantoc);
		$name_hientrang = Get_name_table_export($hientrang,_hientrang);
		$name_huyen = Get_name_table_export($huyen,_xahuyen);
		$name_xa = Get_name_table_export($xaphuong,_xahuyen);
		$name_loaids = Get_name_table_export($loai_ds,_loaidisan);
		$name_chuyende =  Get_name_table_export($chuyende,_chuyende);
		
		
		$name_huyen_vn = Get_name_table_export_vn($huyen,_xahuyen);
		$name_xa_vn = Get_name_table_export_vn($xaphuong,_xahuyen);
		$name_loaids_vn = Get_name_table_export_vn($loai_ds,_loaidisan);
		$name_hientrang_vn =  Get_name_table_export_vn($hientrang,_hientrang_vatthe);
		
		$tieu_de = 'Danh sách vật thể theo ' . $name_huyen_vn.''.$name_xa_vn.''.$name_loaids_vn.''.$name_hientrang_vn;
		$tieu_de = str_replace( '  ', ' ', $tieu_de );
		$today = date('d-m-Y');
	$filename='Danh_sach_phi_vat_the_'.$today.'_' . $name_huyen.''.$name_xa.''.$name_loaids.''.$name_dantoc.''.$name_hientrang;
	$filename = rtrim($filename,'_');
	$filename = str_replace( '__', '_', $filename );
	    header("Content-Type: application/xls; charset=UTF-8");
		header("Content-Disposition: attachment; filename=$filename.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		$xtpl = new XTemplate('admin/htmls/Baocao/Export_Baocao_pvt.html');
$xtpl->assign("portalurl", $portalurl);
$xtpl->assign("tieu_de", $tieu_de);
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
//==============================
function Export_Baocao_dacsac($huyen, $xaphuong){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;
		$name_huyen = Get_name_table_export($huyen,_xahuyen);
		$name_xa = Get_name_table_export($xaphuong,_xahuyen);
		$name_huyen_vn = Get_name_table_export_vn($huyen,_xahuyen);
		$name_xa_vn = Get_name_table_export_vn($xaphuong,_xahuyen);
		$name_loaids_vn = Get_name_table_export_vn($loai_ds,_loaidisan);
		$name_hientrang_vn =  Get_name_table_export_vn($hientrang,_hientrang_vatthe);
		
		$tieu_de = 'Danh sách vật thể theo ' . $name_huyen_vn.''.$name_xa_vn;
		$tieu_de = str_replace( '  ', ' ', $tieu_de );
	$filename='Danh_sach_dac_sac_'.$today.'_' . $name_huyen.''.$name_xa;
	$filename = rtrim($filename,'_');
	$filename = str_replace( '__', '_', $filename );
	
	    header("Content-Type: application/xls; charset=UTF-8");
		header("Content-Disposition: attachment; filename=$filename.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
$xtpl = new XTemplate('admin/htmls/Baocao/Export_Baocao_dacsac.html');
$xtpl->assign("portalurl", $portalurl);
$xtpl->assign("tieu_de", $tieu_de);
		if($huyen){
			$where_huyen = "and huyen = '".intval($huyen)."' ";
		}
		if($xaphuong){
			$where_xa = "and xa = '".intval($xaphuong)."' ";
		}
		$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_dacsac 
				where 1 $where_huyen $where_xa");
		list($get_total_rows) = $db->sql_fetchrow($sgl_VattheCount);
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
	
	case "Export_Baocao_vt":
	Export_Baocao_vt($huyen, $xaphuong, $loai_ds,$niendai,$tomtat,$thoigian,$dientich_dat,$dientich_xd, $hientrang,$tenditich);
	
	break;
	case "Export_Baocao_pvt":
	Export_Baocao_pvt($huyen, $xaphuong, $loai_ds, $dantoc, $hientrang);
	break;
	case "Export_Baocao_dacsac":
	Export_Baocao_dacsac($huyen, $xaphuong);
	break;
	
}

?>