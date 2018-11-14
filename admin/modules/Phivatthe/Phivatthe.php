<?php
global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix, $aid;
if (!@eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}
checkPrivateModule("Phivatthe", $aid);
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
function Add_phivatthe($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Phivatthe/Add_phivatthe.html');
    $xtpl->assign("portalurl", $portalurl);
    
    $xtpl->assign("pid", $pid);
	//---------------------------
	$loai_ds=select_loaids("");
	$chuyende=select_chuyende("");
	$dantoc=select_dantoc("");
	$xephang=select_xephang("");
	$ngonngu=select_ngonngu("");
	$huyen=select_huyen("");
	$hientrang=select_hientrang("",_hientrang_pvt);
	//$hientrang=select_hientrang("");
	if($pid){
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_phivatthe where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
       
	    $xtpl->assign("pid", $pid);
		
        $xtpl->assign("name_pvt", $row['name_pvt']);
		$xtpl->assign("diachi", $row['diachi']);
		$xtpl->assign("year_xh", $row['year_xh']);
		$xtpl->assign("sl_nn", $row['sl_nn']);
		$xtpl->assign("sl_th", $row['sl_th']);
		$xtpl->assign("sl_bb", $row['sl_bb']);
		$xtpl->assign("sn_bd", $row['sn_bd']);
		$xtpl->assign("sl_hv", $row['sl_hv']);
		$xtpl->assign("hinhthuc_td", $row['hinhthuc_td']);
		$xtpl->assign("tailieu", $row['tailieu']);
		$xtpl->assign("kynang", $row['kynang']);
		$xtpl->assign("nguonluc", $row['nguonluc']);
		$xtpl->assign("noidung", $row['noidung']);
		
		$loai_ds=$row['loai_ds'];$loai_ds=select_loaids($loai_ds); 
		$chuyende=$row['chuyende'];$chuyende=select_chuyende($chuyende);
		$xephang=$row['xephang'];$xephang=select_xephang($xephang);
		$dantoc=$row['dantoc'];$dantoc=select_dantoc($dantoc);
		$ngonngu=$row['ngonngu'];$ngonngu=select_ngonngu($ngonngu);
		$huyen=$row['huyen'];$huyen=select_huyen($huyen);
		$hientrang=$row['hientrang'];$hientrang=select_hientrang($hientrang,_hientrang_pvt);
		
		// Lấy xã trong huyện khi sửa và selected xã
		$xa_editSelected=Select_xaSelected($row['huyen'],$row['xa']);
		$xtpl->assign("xa_editSelected", $xa_editSelected);
		// Lấy file đính kèm
		$result_filedk = $db->sql_query("SELECT dk_file from " . $prefix . "_phivatthe_dinhkem
									 where id_phivatthe='" . intval($row['id']) . "' order by id ");
        while($row_dk = $db->sql_fetchrow($result_filedk)){
			$xtpl->assign("row_dk", $row_dk);
			$xtpl->parse("MAIN.file_dk");
		}
		
	}
	$xtpl->assign("loai_ds", $loai_ds);
	$xtpl->assign("xephang", $xephang);
	$xtpl->assign("chuyende", $chuyende);
	$xtpl->assign("ngonngu", $ngonngu);
	$xtpl->assign("dantoc", $dantoc);
	$xtpl->assign("huyen", $huyen);
	$xtpl->assign("hientrang", $hientrang);
	if($_POST['Update_finsh']){
		
		
	//xu ly them và cap nhat
	$aconfig = array('name_pvt', 
	'diachi', 
	'huyen', 
	'xa', 
	'loai_ds',
	'hientrang',
	'dantoc',
	'sl_nn',
	'sl_th',
	'sl_bb',
	'sn_bd',
	'sl_hv',
	'hinhthuc_td',
	'kynang',
	'nguonluc',
	'tailieu',
	'noidung'
	
	 
	); 
	foreach($aconfig as $v) 
	{ 
	if($_POST[$v]) 
	 $data[$v]= $_POST[$v]; 
	 
	} 
	if($pid = $_POST['pid']) {
		// upload file dinh kem, Xóa bỏ các file cũ và thêm file đính kèm mới
			$num_dk = count($_FILES['dinhkem']['size']);
		
					$path_dk = "images/Image/"; // Upload directory
					$count_dk = 0;
		
					if($num_dk >0){
						mysql_query("DELETE FROM ".$prefix."_phivatthe_dinhkem  WHERE id_phivatthe='".$pid."'");
		//                print_r($_FILES);
						// Loop $_FILES to exeicute all files
						foreach ($_FILES['dinhkem']['name'] as $f_dk => $name_dk) {
							if ($_FILES['dinhkem']['error'][$f] == 4) {
								continue; // Skip file if any error found
							}
		
							move_uploaded_file($_FILES["dinhkem"]["tmp_name"][$f_dk], $path_dk.$name_dk) ;
		
							 $result = $db->sql_query("insert into ".$prefix."_phivatthe_dinhkem(id,id_phivatthe,dk_file) values(null,'$pid','$name_dk')"); 
						   
						}
					}
	updateQuery('Update',$prefix.'_phivatthe', $data,"id = '".$pid."'");
	Header("Location: ".$portalurl."/admin.php?op=Ds_phivatthe");
	}else {
	updateQuery('Insert',$prefix.'_phivatthe', $data); 
	
	$pid = mysql_insert_id();
	// upload file dinh kem
			$num_dk = count($_FILES['dinhkem']['size']);
		
					$path_dk = "images/Image/"; // Upload directory
					$count_dk = 0;
		
		
		
					if($num_dk >0){
		//                print_r($_FILES);
						// Loop $_FILES to exeicute all files
						foreach ($_FILES['dinhkem']['name'] as $f_dk => $name_dk) {
							if ($_FILES['dinhkem']['error'][$f] == 4) {
								continue; // Skip file if any error found
							}
		
							move_uploaded_file($_FILES["dinhkem"]["tmp_name"][$f_dk], $path_dk.$name_dk) ;
		
							 $result = $db->sql_query("insert into ".$prefix."_phivatthe_dinhkem(id,id_phivatthe,dk_file) values(null,'$pid','$name_dk')"); 
						  
		
						}
					}
	 Header("Location: ".$portalurl."/admin.php?op=Add_phivatthe_imgs&pid=".$pid."");
	}
	}
    

    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//==============================

function View_phivatthe($pid){
	 global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Phivatthe/View_phivatthe.html');
    $xtpl->assign("portalurl", $portalurl);
	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_phivatthe where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
       
	    $xtpl->assign("pid", $pid);
		
        $xtpl->assign("name_pvt", $row['name_pvt']);
		$xtpl->assign("diachi", $row['diachi']);
		$xtpl->assign("year_xh", $row['year_xh']);
		$xtpl->assign("sl_nn", $row['sl_nn']);
		$xtpl->assign("sl_th", $row['sl_th']);
		$xtpl->assign("sl_bb", $row['sl_bb']);
		$xtpl->assign("sn_bd", $row['sn_bd']);
		$xtpl->assign("sl_hv", $row['sl_hv']);
		$xtpl->assign("hinhthuc_td", $row['hinhthuc_td']);
		$xtpl->assign("tailieu", $row['tailieu']);
		$xtpl->assign("kynang", $row['kynang']);
		$xtpl->assign("nguonluc", $row['nguonluc']);
		$xtpl->assign("noidung", $row['noidung']);
		$xtpl->assign("video", $row['video']);
		if($row['video'] == ''){
			$hien_video = "none";
		}else{
			$hien_video = "";
		}
		$xtpl->assign("hien_video", $hien_video);
			$loai_ds = Get_name_table($row['loai_ds'],_loaidisan);
			$xtpl->assign("loai_ds", $loai_ds);
			
			$chuyende = Get_name_table($row['chuyende'],_chuyende);
			$xtpl->assign("chuyende", $chuyende);
			
			$xephang = Get_name_table($row['xephang'],_xephang);
			$xtpl->assign("xephang", $xephang);
			
			$dantoc = Get_name_table($row['dantoc'],_dantoc);
			$xtpl->assign("dantoc", $dantoc);
			
			$ngonngu = Get_name_table($row['ngonngu'],_ngonngu);
			$xtpl->assign("ngonngu", $ngonngu);
			
			$huyen = Get_name_table($row['huyen'],_xahuyen);
			$xtpl->assign("huyen", $huyen);
			
			$xa = Get_name_table($row['xa'],_xahuyen);
			$xtpl->assign("xa", $xa);
			$huyen_xa = $huyen." - ".$xa;
			$huyen_xa = rtrim($huyen_xa,' - ');
			$xtpl->assign("huyen_xa", $huyen_xa);
			
			$hientrang = Get_name_vt_pvt($row_vatthe['hientrang'],_hientrang_pvt);
			$xtpl->assign("hientrang", $hientrang);
		$xtpl->assign("xa", $xa);
		$result_filedk = $db->sql_query("SELECT * from " . $prefix . "_phivatthe_dinhkem
									 where id_phivatthe='" . intval($row['id']) . "' order by id ");
        while($row_dk = $db->sql_fetchrow($result_filedk)){
			$xtpl->assign("row_dk", $row_dk);
			$xtpl->parse("MAIN.file_dk");
		}
		$result_anh_count = $db->sql_query("SELECT count(*) from " . $prefix . "_phivatthe_img
									 where id_phivatthe='" . intval($row['id']) . "' order by id ");
		list($count_anh) = $db->sql_fetchrow($result_anh_count);
		if($count_anh == 0){
			$hienthi_anh = "none";
		}else{
			$hienthi_anh = "";
		}
		$xtpl->assign("hienthi_anh", $hienthi_anh);
		// lay danh sach anh
		$result_anh = $db->sql_query("SELECT * from " . $prefix . "_phivatthe_img
									 where id_phivatthe='" . intval($row['id']) . "' order by id ");
		$stt = 0;
		while($row_anh = $db->sql_fetchrow($result_anh)){
			$stt++;
			$xtpl->assign("stt", $stt);
			$xtpl->assign("row_anh", $row_anh);
			$xtpl->parse("MAIN.file_anh");
		}
	 $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
} 

//===========================

function Ds_phivatthe()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Phivatthe/Ds_phivatthe.html');
    $xtpl->assign("portalurl", $portalurl);

	$loai_ds=select_loaids("");$xtpl->assign("loai_ds", $loai_ds);
	$huyen=select_huyen("");$xtpl->assign("huyen", $huyen);
	$hientrang=select_hientrang("",_hientrang_pvt);$xtpl->assign("hientrang", $hientrang);



 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//==============================

function Search_phivatthe($name_pvt,$loai_ds,$huyen,$xaphuong,$hientrang){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Phivatthe/Search_phivatthe.html');
$xtpl->assign("portalurl", $portalurl);
$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		if($name_pvt){
			$where_Tenvatthe = "and name_pvt LIKE '%".$name_pvt."%' ";
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
		
$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_phivatthe where 1 $where_Tenvatthe $where_loaids $where_huyen $where_xa $where_hientrang");

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
//echo $pageview;
//create pagination

 if((int)$get_total_rows > (int)$number_per_page){
 $pagination = '<tr>
                	<td align="center" colspan="8">'.$pageview.'</td>
                </tr>';
 }else{
	 $pagination = '';
 }
				$xtpl->assign("pagination",$pagination);
 $sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_phivatthe
  where 1 $where_Tenvatthe $where_loaids $where_huyen $where_xa $where_hientrang
  order by id desc 
	 LIMIT $offset, $number_per_page");
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
//--------------------------------
function Add_phivatthe_imgs($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';

	$xtpl = new XTemplate('admin/htmls/Phivatthe/Add_phivatthe_imgs.html');
    $xtpl->assign("portalurl", $portalurl);
	 $xtpl->assign("pid", $pid);
	if($_POST['ok_num'] || $_POST['buoc_tiep']) 
{ 
// upload anh
 $num = count($_FILES['files']['size']);

            $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
            $max_file_size = 1024*100; //100 kb
            $path = "images/Image/"; // Upload directory
            $count = 0;

            if($num >0){
//                print_r($_FILES);
                // Loop $_FILES to exeicute all files
                foreach ($_FILES['files']['name'] as $f => $name) {
                    if ($_FILES['files']['error'][$f] == 4) {
                        continue; // Skip file if any error found
                    }

                    move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name) ;

					 $result = $db->sql_query("insert into ".$prefix."_phivatthe_img(id,id_phivatthe,img_pvt) values(null,'$pid','$name')"); 
					 if($_POST['ok_num']) {
						 Header("Location: ".$portalurl."/admin.php?op=Add_phivatthe_imgs&pid=".$pid."");
					 }else if($_POST['buoc_tiep']){
						 Header("Location: ".$portalurl."/admin.php?op=Add_phivatthe_video&pid=".$pid."");
					 }
                  // Header("Location: ".$portalurl."/admin.php?op=Add_phivatthe_video&pid=".$pid."");

                }
			}

}
$result_anh_Count = $db->sql_query("SELECT count(*) from " . $prefix . "_phivatthe_img
									 where id_phivatthe='" . intval($pid) . "' order by id ");
list($count_anh) = $db->sql_fetchrow($result_anh_Count);
if($count_anh > 0){
	$hienthi_tableAnh = "";
}else{
	$hienthi_tableAnh = "none";
}
$xtpl->assign("hienthi_tableAnh", $hienthi_tableAnh);
$result_anh = $db->sql_query("SELECT id,img_pvt from " . $prefix . "_phivatthe_img
									 where id_phivatthe='" . intval($pid) . "' order by id ");
		$stt = 0;
        while($row_anh = $db->sql_fetchrow($result_anh)){
			$stt++;
			$xtpl->assign("stt", $stt);
			$xtpl->assign("row_anh", $row_anh);
			$xtpl->parse("MAIN.file_anh");
		}
	
		

// Xoa anh		
		if($_POST['xoa_anh']){
			for($i=0;$i<sizeof($_POST['checkbox']);$i++){
				mysql_query("DELETE FROM ".$prefix."_phivatthe_img  WHERE id='".$_POST['checkbox'][$i]."'");
				
			}
			 echo "<script>alert('Bạn đã cập nhật thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}

		
				
$xtpl->assign("hienthi", $hienthi);
$xtpl->assign("pid",$pid);


	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
	
}
//--------------------
function Add_phivatthe_video($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';

	$xtpl = new XTemplate('admin/htmls/Phivatthe/Add_phivatthe_video.html');
    $xtpl->assign("portalurl", $portalurl);
	 $xtpl->assign("pid", $pid);
	if($_POST['ok_num']) 
{ 
if($_FILES['video']['size'] >0)
				{
				$vid =$_FILES['video']['name'];
				copy($_FILES['video']['tmp_name'],"images/Video/" .$vid);
				$video="images/Video/".$vid;
				
				}
				$data['video'] = $video;
				if($video != ''){
					updateQuery('Update',$prefix.'_phivatthe', $data,"id = '".$pid."'");
					Header("Location: ".$portalurl."/admin.php?op=Ds_phivatthe");
				}
}
$result_video= $db->sql_query("SELECT video from " . $prefix . "_phivatthe
									 where id='" . intval($pid) . "' ");
        list($video) = $db->sql_fetchrow($result_video);
		$xtpl->assign("video", $video);
		if($video == ''){
			$hienthi_video = "none";
		}else{
			$hienthi_video = "";
		}
		$xtpl->assign("hienthi_video", $hienthi_video);
		if($_POST['xoa_video']){
					$data['video'] = "";
					updateQuery('Update',$prefix.'_phivatthe', $data,"id = '".$pid."'");
					
					echo "<script>alert('Bạn đã xóa video thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
				}
		
				
$xtpl->assign("hienthi", $hienthi);
$xtpl->assign("pid",$pid);


	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
	
}
//===========================


switch ($op) {
   	 	case Add_phivatthe:
        Add_phivatthe($pid);
        break;
		
		 case Ds_phivatthe:
        Ds_phivatthe();
        break;
		case "Search_phivatthe":
	    Search_phivatthe($name_pvt,$loai_ds,$huyen,$xaphuong,$hientrang);
	    break;
		case "View_phivatthe":
		View_phivatthe($pid);
		break;
    
		case "Add_phivatthe_imgs":
		Add_phivatthe_imgs($pid);
		break;
		case "Add_phivatthe_video":
		Add_phivatthe_video($pid);
		break;

}
?>