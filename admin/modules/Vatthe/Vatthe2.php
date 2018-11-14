<?php
global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix, $aid;
if (!@eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}
checkPrivateModule("Vatthe", $aid);
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
function Add_vatthe($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Vatthe/Add_vatthe.html');
    $xtpl->assign("portalurl", $portalurl);
    
    $xtpl->assign("pid", $pid);
	//---------------------------
	$loai_ds=select_loaids("");
	$chuyende=select_chuyende("");
	$dantoc=select_dantoc("");
	$xephang=select_xephang("");
	$ngonngu=select_ngonngu("");
	$huyen=select_huyen("");
	$hientrang=select_hientrang("",_hientrang_vatthe);
	
	//hien thi khi sua
	
	if($pid){
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_vatthe where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
       
	    $xtpl->assign("pid", $pid);
		
        $xtpl->assign("name_vt", $row['name_vt']);
		$xtpl->assign("diachi", $row['diachi']);
		$xtpl->assign("year_xh", $row['year_xh']);
		$xtpl->assign("congtac_bv", $row['congtac_bv']);
		$xtpl->assign("congtac_tb", $row['congtac_tb']);
		$xtpl->assign("chatlieu", $row['chatlieu']);
		$xtpl->assign("mausac", $row['mausac']);
		$xtpl->assign("kichthuoc", $row['kichthuoc']);
		$xtpl->assign("soluong", $row['soluong']);
		$xtpl->assign("noidung", $row['noidung']);
		$xtpl->assign("id_vatthe", $row['id']);
		$xtpl->assign("video", $row['video']);
		
		$loai_ds=$row['loai_ds'];$loai_ds=select_loaids($loai_ds); 
		$chuyende=$row['chuyende'];$chuyende=select_chuyende($chuyende);
		$xephang=$row['xephang'];$xephang=select_xephang($xephang);
		$dantoc=$row['dantoc'];$dantoc=select_dantoc($dantoc);
		$ngonngu=$row['ngonngu'];$ngonngu=select_ngonngu($ngonngu);
		$huyen=$row['huyen'];$huyen=select_huyen($huyen);
		$hientrang=select_hientrang($row['hientrang'],_hientrang_vatthe);
		
		// Lấy xã trong huyện khi sửa và selected xã
		$xa_editSelected=Select_xaSelected($row['huyen'],$row['xa']);
		$xtpl->assign("xa_editSelected", $xa_editSelected);
		$result_filedk = $db->sql_query("SELECT dk_file from " . $prefix . "_vatthe_dinhkem
									 where id_vatthe='" . intval($row['id']) . "' order by id ");
        while($row_dk = $db->sql_fetchrow($result_filedk)){
			$xtpl->assign("row_dk", $row_dk);
			$xtpl->parse("MAIN.file_dk");
		}
		if($row['video'] == ""){
			$dispv = "none";
		}else{
			$dispv = "";
		}
		$xtpl->assign("dispv", $dispv);
	}else{
		$dispv = "none";
		$xtpl->assign("dispv", $dispv);
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
	$aconfig = array('name_vt', 
	'diachi', 
	'huyen', 
	'xa', 
	'loai_ds',
	'chuyende',
	'xephang',
	'year_xh',
	'congtac_bv',
	'congtac_tb',
	'dantoc',
	'ngonngu',
	'chatlieu',
	'mausac',
	'kichthuoc',
	'soluong',
	'noidung',
	'hientrang'
	 
	); 
	
	
	foreach($aconfig as $v) 
	{ 
	if($_POST[$v]) 
	 $data[$v]= $_POST[$v]; 
	} 
	if($pid = $_POST['pid']){ 
	
		
		// upload file dinh kem, Xóa bỏ các file cũ và thêm file đính kèm mới
			$num_dk = count($_FILES['dinhkem']['size']);
		
					$path_dk = "images/Image/"; // Upload directory
					$count_dk = 0;
		
					if($num_dk >0){
						mysql_query("DELETE FROM ".$prefix."_vatthe_dinhkem  WHERE id_vatthe='".$pid."'");
		//                print_r($_FILES);
						// Loop $_FILES to exeicute all files
						foreach ($_FILES['dinhkem']['name'] as $f_dk => $name_dk) {
							if ($_FILES['dinhkem']['error'][$f] == 4) {
								continue; // Skip file if any error found
							}
		
							move_uploaded_file($_FILES["dinhkem"]["tmp_name"][$f_dk], $path_dk.$name_dk) ;
		
							 $result = $db->sql_query("insert into ".$prefix."_vatthe_dinhkem(id,id_vatthe,dk_file) values(null,'$pid','$name_dk')"); 
						   
						}
					}
	
	updateQuery('Update',$prefix.'_vatthe', $data,"id = '".$pid."'"); 
	Header("Location: ".$portalurl."/admin.php?op=Add_vatthe_img_dk_popup&pid=".$pid."");
	}else{ 
	$data['date']=date("Y-m-d"); 
	updateQuery('Insert',$prefix.'_vatthe', $data); 
	
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
		
							 $result = $db->sql_query("insert into ".$prefix."_vatthe_dinhkem(id,id_vatthe,dk_file) values(null,'$pid','$name_dk')"); 
						   echo "<script>alert('Bạn đã cập nhật file đính kèm thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		
						}
					}
	
	Header("Location: ".$portalurl."/admin.php?op=Add_vatthe_img_dk_popup&pid=".$pid."");
	}
	}
    if($pid){
		$result_dk = $db->sql_query("SELECT count(*) from " . $prefix . "_vatthe_dinhkem where id_vatthe='" . intval($pid) . "' ");
        list($dinhkem_file) = $db->sql_fetchrow($result_dk);
		$xtpl->assign("dinhkem_file", $dinhkem_file);
		//echo $dinhkem_file;
		if($dinhkem_file > 0){
			$hien_dk = "";
		}else{
			$hien_dk = "none";
		}
		$result_anh = $db->sql_query("SELECT count(*) from " . $prefix . "_vatthe_img where id_vatthe='" . intval($pid) . "' ");
        list($anhdaidien) = $db->sql_fetchrow($result_anh);
		if($anhdaidien == 0){
			$dk = "none";
		}else{
			$dk = "";
		}
	}else{
		$dk = "none";
		$hien_dk = "none";
	}
	$xtpl->assign("hien_dk", $hien_dk);
	$xtpl->assign("dk", $dk);
    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//==============================

function View_vatthe($pid){
	  global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Vatthe/View_vatthe.html');
    $xtpl->assign("portalurl", $portalurl);
	$xtpl->assign("pid", $pid);
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_vatthe where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
        $xtpl->assign("name_vt", $row['name_vt']);
		$xtpl->assign("diachi", $row['diachi']);
		$xtpl->assign("year_xh", $row['year_xh']);
		$xtpl->assign("congtac_bv", $row['congtac_bv']);
		$xtpl->assign("congtac_tb", $row['congtac_tb']);
		$xtpl->assign("chatlieu", $row['chatlieu']);
		$xtpl->assign("mausac", $row['mausac']);
		$xtpl->assign("kichthuoc", $row['kichthuoc']);
		$xtpl->assign("soluong", $row['soluong']);
		$xtpl->assign("noidung", $row['noidung']);
		$xtpl->assign("video", $row['video']);
		if($row['video'] == ''){
			$hien_video = "none";
		}else{
			$hien_video = "";
		}
		$xtpl->assign("hien_video", $hien_video);
		$xtpl->assign("dinhkem", $row['dinhkem']);
		
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
		
		$hientrang = Get_name_vt_pvt($row['hientrang'],_hientrang_vatthe);
		$xtpl->assign("hientrang", $hientrang);
		$result_filedk = $db->sql_query("SELECT * from " . $prefix . "_vatthe_dinhkem
									 where id_vatthe='" . intval($row['id']) . "' order by id ");
        while($row_dk = $db->sql_fetchrow($result_filedk)){
			$xtpl->assign("row_dk", $row_dk);
			$xtpl->parse("MAIN.file_dk");
		}
		$result_anh_count = $db->sql_query("SELECT count(*) from " . $prefix . "_vatthe_img
									 where id_vatthe='" . intval($row['id']) . "' order by id ");
		list($count_anh) = $db->sql_fetchrow($result_anh_count);
		if($count_anh == 0){
			$hienthi_anh = "none";
		}else{
			$hienthi_anh = "";
		}
		$xtpl->assign("hienthi_anh", $hienthi_anh);
		// lay danh sach anh
		$result_anh = $db->sql_query("SELECT * from " . $prefix . "_vatthe_img
									 where id_vatthe='" . intval($row['id']) . "' order by id ");
		$stt = 0;
		while($row_anh = $db->sql_fetchrow($result_anh)){
			$stt++;
			$xtpl->assign("stt", $stt);
			$xtpl->assign("row_anh", $row_anh);
			$xtpl->parse("MAIN.file_anh");
		}
		$xtpl->assign("chuyende", $chuyende);
    $xtpl->assign("pid", $pid);
	 $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//===========================

function Ds_vatthe()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Vatthe/Ds_vatthe.html');
    $xtpl->assign("portalurl", $portalurl);
	
	$loai_ds=select_loaids("");$xtpl->assign("loai_ds", $loai_ds);
	$huyen=select_huyen("");$xtpl->assign("huyen", $huyen);
	$chuyende=select_chuyende("");$xtpl->assign("chuyende", $chuyende);
	$hientrang=select_hientrang("",_hientrang_vatthe);$xtpl->assign("hientrang", $hientrang);

	if($_POST['Del_vt']){
	$db->sql_query("DELETE FROM ".$prefix."_vatthe WHERE id ='".intval($_POST['xoa_vatthe'])."'");
	echo "<script>alert('Bạn đã xóa vật thể thành công');location.href='".$portalurl."/admin.php?op=Ds_vatthe';</script>";
}
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//-------------------------

function Sub_xahuyen($country){
		

	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

	
	echo '<select name="xa" class="form-control" id="xaphuong">
			<option value="">Lựa chọn</option>
			
			';
			$result = $db->sql_query("Select id,name from " . $prefix . "_xahuyen where id_xa='".intval($country)."'    ORDER BY stt asc");

			while ($row = $db->sql_fetchrow($result)) {
				
				echo "<option value=".$row['id']." ".($id_cha==$loai_nha?'Selected':'').">".$row['name']."</option>";
				
					
			}
			
			
		
		echo '</select>';
}

//---------------------------

function Search_vatthe($name_disan,$loai_ds,$huyen,$xaphuong,$chuyen_de,$hientrang){

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Vatthe/Search_vatthe.html');
$xtpl->assign("portalurl", $portalurl);
$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		if($name_disan){
			$where_Tenvatthe = "and name_vt LIKE '%".$name_disan."%' ";
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
		if($chuyen_de){
			$where_chuyende = "and chuyende = '".intval($chuyen_de)."' ";
		}
		if($hientrang){
			$where_hientrang = "and hientrang = '".intval($hientrang)."' ";
		}
$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_vatthe where 1 $where_Tenvatthe $where_loaids $where_huyen $where_xa $where_chuyende $where_hientrang");
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
                	<td align="center" colspan="8">'.$pageview.'</td>
                </tr>';
 }else{
	 $pagination = '';
 }
				$xtpl->assign("pagination",$pagination);
 $sgl_Vatthe = $db->sql_query("Select * from ".$prefix."_vatthe
  where 1 $where_Tenvatthe $where_loaids $where_huyen $where_xa $where_chuyende $where_hientrang
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
			
			$xephang = Get_name_table($row_vatthe['xephang'],_xephang);
			$xtpl->assign("xephang", $xephang);
			
			$dantoc = Get_name_table($row_vatthe['dantoc'],_dantoc);
			$xtpl->assign("dantoc", $dantoc);
			
			$ngonngu = Get_name_table($row_vatthe['ngonngu'],_ngonngu);
			$xtpl->assign("ngonngu", $ngonngu);
			
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


//------------------------

function Add_vatthe_img($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
	include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';


	$xtpl = new XTemplate('admin/htmls/Vatthe/Add_vatthe_img.html');
    $xtpl->assign("portalurl", $portalurl);
	
	
	
	if(isset($_POST['ok_num'])) 
{ 

$num=$_POST['txtnum']; 

$hienthi=Upload_img_vt($num,$pid);


}


$xtpl->assign("hienthi", $hienthi);


	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
	
}


//---------------------------

function Submit_vatthe_img($pid)
{
	global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	if(isset($_POST['ok_upload'])) 
{ 
 $num=$_GET['file']; 
 $catalog_products_id=$_POST['catalog_products_id'];
 
 for($i=0; $i< $num; $i++) 
 { 
 
 $mt= rand(123,456);
 
  move_uploaded_file($_FILES['img']['tmp_name'][$i],"images/Image/".$mt.$_FILES['img']['name'][$i]); 
  $url="images/Image/".$mt.$_FILES['img']['name'][$i]; 
  $name=$mt.$_FILES['img']['name'][$i]; 
  
  
   
  $result = $db->sql_query("insert into ".$prefix."_vatthe_img(id,id_vatthe,img_vt) values(null,'$pid','$name')"); 
  //mysql_query($sql); 
 
   
 } 
  echo "<script>alert('Bạn đã đăng  thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
  
}
 

}

//==============================

function Add_vatthe_img_popup($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	


	$xtpl = new XTemplate('admin/htmls/Vatthe/Add_vatthe_img_popup.html');
    $xtpl->assign("portalurl", $portalurl);
	
	
	
	if($_POST['ok_num']) 
{ 
 $num = count($_FILES['files']['size']);

            $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
            $max_file_size = 1024*100; //100 kb
            $path = "images/Image/"; // Upload directory
            $count = 0;



            if($num >0 && $num <=5){
//                print_r($_FILES);
                // Loop $_FILES to exeicute all files
                foreach ($_FILES['files']['name'] as $f => $name) {
                    if ($_FILES['files']['error'][$f] == 4) {
                        continue; // Skip file if any error found
                    }

                    move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name) ;

					 $result = $db->sql_query("insert into ".$prefix."_vatthe_img(id,id_vatthe,img_vt) values(null,'$pid','$name')"); 
                   echo "<script>alert('Bạn đã cập nhật thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";

                }
			}

}
$result_filedk = $db->sql_query("SELECT id,img_vt from " . $prefix . "_vatthe_img
									 where id_vatthe='" . intval($pid) . "' order by id ");
		$stt = 0;
        while($row_dk = $db->sql_fetchrow($result_filedk)){
			$stt++;
			$xtpl->assign("stt", $stt);
			$xtpl->assign("row_dk", $row_dk);
			$xtpl->parse("MAIN.file_dk");
		}
		if($_POST['xoa_anh']){
			for($i=0;$i<sizeof($_POST['checkbox']);$i++){
				mysql_query("DELETE FROM ".$prefix."_vatthe_img  WHERE id='".$_POST['checkbox'][$i]."'");
				
			}
			 echo "<script>alert('Bạn đã cập nhật thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}

$xtpl->assign("hienthi", $hienthi);
$xtpl->assign("pid",$pid);


	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
	
}


//---------------------------

function Submit_vatthe_img_popup($pid)
{
	global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	if(isset($_POST['ok_upload'])) 
{ 
 $num=$_GET['file']; 
 $catalog_products_id=$_POST['catalog_products_id'];
 
 for($i=0; $i< $num; $i++) 
 { 
 
 $mt= rand(123,456);
 
  move_uploaded_file($_FILES['img']['tmp_name'][$i],"images/Image/".$mt.$_FILES['img']['name'][$i]); 
  $url="images/Image/".$mt.$_FILES['img']['name'][$i]; 
  $name=$mt.$_FILES['img']['name'][$i]; 
  
  
   
  $result = $db->sql_query("insert into ".$prefix."_vatthe_img(id,id_vatthe,img_vt) values(null,'$pid','$name')"); 
  //mysql_query($sql); 
 
   
 } 
  echo "<script>alert('Bạn đã đăng  thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
  
}
 

}
function Add_vatthe_img_dk_popup($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';

	$xtpl = new XTemplate('admin/htmls/Vatthe/Add_vatthe_img_dk_popup.html');
    $xtpl->assign("portalurl", $portalurl);
	
	
	
	if($_POST['ok_num']) 
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

					 $result = $db->sql_query("insert into ".$prefix."_vatthe_img(id,id_vatthe,img_vt) values(null,'$pid','$name')"); 
                   echo "<script>alert('Bạn đã cập nhật ảnh thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";

                }
			}
	
			if($_FILES['video']['size'] >0)
				{
				$vid =$_FILES['video']['name'];
				copy($_FILES['video']['tmp_name'],"images/Video/" .$vid);
				$video="images/Video/".$vid;
				
				}
				$data['video'] = $video;
				if($video != ''){
					updateQuery('Update',$prefix.'_vatthe', $data,"id = '".$pid."'");
					echo "<script>alert('Bạn đã cập nhật video thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
				}
				

}
$result_anh_Count = $db->sql_query("SELECT count(*) from " . $prefix . "_vatthe_img
									 where id_vatthe='" . intval($pid) . "' order by id ");
list($count_anh) = $db->sql_fetchrow($result_anh_Count);
if($count_anh > 0){
	$hienthi_tableAnh = "";
}else{
	$hienthi_tableAnh = "none";
}
$xtpl->assign("hienthi_tableAnh", $hienthi_tableAnh);
$result_anh = $db->sql_query("SELECT id,img_vt from " . $prefix . "_vatthe_img
									 where id_vatthe='" . intval($pid) . "' order by id ");
		$stt = 0;
        while($row_anh = $db->sql_fetchrow($result_anh)){
			$stt++;
			$xtpl->assign("stt", $stt);
			$xtpl->assign("row_anh", $row_anh);
			$xtpl->parse("MAIN.file_anh");
		}
	
		
$result_video= $db->sql_query("SELECT video from " . $prefix . "_vatthe
									 where id='" . intval($pid) . "' ");
        list($video) = $db->sql_fetchrow($result_video);
		$xtpl->assign("video", $video);
		if($video == ''){
			$hienthi_video = "none";
		}else{
			$hienthi_video = "";
		}
		$xtpl->assign("hienthi_video", $hienthi_video);
// Xoa anh		
		if($_POST['xoa_anh']){
			for($i=0;$i<sizeof($_POST['checkbox']);$i++){
				mysql_query("DELETE FROM ".$prefix."_vatthe_img  WHERE id='".$_POST['checkbox'][$i]."'");
				
			}
			 echo "<script>alert('Bạn đã cập nhật thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}

		
				if($_POST['xoa_video']){
					$data['video'] = "";
					updateQuery('Update',$prefix.'_vatthe', $data,"id = '".$pid."'");
					echo "<script>alert('Bạn đã xóa video thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
				}
$xtpl->assign("hienthi", $hienthi);
$xtpl->assign("pid",$pid);


	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
	
}

//===========================


switch ($op) {
		case Add_vatthe:
		Add_vatthe($pid);
		break;
		
		case Ds_vatthe:
		Ds_vatthe();
		break;
		
		case "Sub_xahuyen":
		Sub_xahuyen($country);
		break;
		case "Search_vatthe":
	    Search_vatthe($name_disan,$loai_ds,$huyen,$xaphuong,$chuyen_de,$hientrang);
	    break;
		
		case Add_vatthe_img:
		Add_vatthe_img($pid);
		break;
		
		case Submit_vatthe_img:
		Submit_vatthe_img($pid);
		break;
		case View_vatthe:
		View_vatthe($pid);
		break;
		case "Add_vatthe_img_popup":
		Add_vatthe_img_popup($pid);
		break;
		case Submit_vatthe_img_popup:
		Submit_vatthe_img_popup($pid);
		break;
		case "Add_vatthe_img_dk_popup":
		Add_vatthe_img_dk_popup($pid);
		break;
}
?>