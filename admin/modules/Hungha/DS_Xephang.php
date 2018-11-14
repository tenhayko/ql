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

function Ds_Xephang_ditich($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $pid;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Hungha/Ds_Xephang_ditich.html');
    $xtpl->assign("portalurl", $portalurl);
	$xephang=select_xephang("");
	$huong_xephang=select_huong_xephang("");
	
	
	
		
		
	$xtpl->assign("pid", $pid);
	
	 $name_xephang=Get_name_vt_pvt($pid,"_xephang");
	
	$xtpl->assign("name_xephang", $name_xephang);
	$xtpl->assign("huong_xephang", $huong_xephang);

	$loai_ds=select_loaids("");$xtpl->assign("loai_ds", $loai_ds);
	$huyen=select_huyen("");$xtpl->assign("huyen", $huyen);
	

	$hientrang=select_hientrang("",_hientrang_vatthe);$xtpl->assign("hientrang", $hientrang);

	
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}



//---------------------------

function Search_DS_Xephang($name_disan,$tom_tat,$thoigiandienra,$hienvat_tb,$dientich_dat,$dientich_xd,$loai_ds,$huyen,$xaphuong,$hientrang,$tenditich,$xephang,$huong_xephang,$pid){

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db,$pid;



$xtpl = new XTemplate('admin/htmls/Hungha/Search_DS_Xephang.html');
$xtpl->assign("portalurl", $portalurl);
$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		if($name_disan){
			$where_Tenvatthe = "and niendai LIKE '%".$name_disan."%' ";
		}
		if($tom_tat){
			$where_tom_tat = "and tomtat LIKE '%".$tom_tat."%' ";
		}
		if($thoigiandienra){
			$where_thoigiandienra = "and thoigianlehoi LIKE '%".$thoigiandienra."%' ";
		}
		if($hienvat_tb){
			$where_hienvat_tb = "and hienvat_tb LIKE '%".$hienvat_tb."%' ";
		}
		if($dientich_dat){
			$where_dientich_dat = "and dientichdat LIKE '%".$dientich_dat."%' ";
		}
		if($dientich_xd){
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
		if($tenditich){
			$where_tenditich = "and tenditich LIKE '%".$tenditich."%' ";
		}
		if($xephang){
			$where_xephang = "and xephang = '".intval($xephang)."' ";
		}
		if($huong_xephang){
			$where_huong_xephang = "and huong_xephang = '".intval($huong_xephang)."' ";
		}
		if($hientrang){
			$where_hientrang = "and hientrang = '".intval($hientrang)."' ";
		}
$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_vatthe where xephang='".intval($pid)."'  $where_Tenvatthe $where_tom_tat $where_loaids $where_huyen $where_xa  $where_hientrang $where_thoigiandienra $where_hienvat_tb $where_dientich_dat $where_dientich_xd $where_tenditich $where_xephang $where_huong_xephang");
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
			
 $sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_vatthe
  where xephang='".intval($pid)."' $where_Tenvatthe $where_tom_tat $where_loaids $where_huyen $where_xa  $where_hientrang $where_thoigiandienra $where_hienvat_tb $where_dientich_dat $where_dientich_xd $where_tenditich $where_xephang $where_huong_xephang
  order by tenditich asc 
	 LIMIT $offset, $number_per_page");
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
			if(check_role($aid)==1){
			$hien_role='';
			}
			else{
				$hien_role='none';	
			}
		$xtpl->assign("hien_role",$hien_role); 
		$xtpl->assign("row_vatthe",$row_vatthe); 
		$xtpl->parse("MAIN.vatthe"); 
		}
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}



switch ($op) {
		
		
		
		case Ds_Xephang_ditich:
		Ds_Xephang_ditich($pid);
		break;
		
		case "Search_DS_Xephang":
	    Search_DS_Xephang($name_disan,$tom_tat,$thoigiandienra,$hienvat_tb,$dientich_dat,$dientich_xd,$loai_ds,$huyen,$xaphuong,$hientrang,$tenditich,$xephang,$huong_xephang,$pid);
	    break;
		
		
			
			
			
		
		
	
}
?>