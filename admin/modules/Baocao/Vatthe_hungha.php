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
require"admin/import_excel/excel_reader2.php";
function Get_excel(){
	 global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Hungha/Import_execel.html');
	 $xtpl->assign("portalurl", $portalurl);
	 $bien1=select_colum_excel('bien1','B'); $xtpl->assign("bien1",$bien1); 
	$bien2=select_colum_excel('bien2','C');$xtpl->assign("bien2",$bien2); 
	$bien3=select_colum_excel('bien3','D');$xtpl->assign("bien3",$bien3); 
	$bien4=select_colum_excel('bien4','E');$xtpl->assign("bien4",$bien4); 
	$bien5=select_colum_excel('bien5','F');$xtpl->assign("bien5",$bien5); 
	$bien6=select_colum_excel('bien6','G');$xtpl->assign("bien6",$bien6); 
	$bien7=select_colum_excel('bien7','H');$xtpl->assign("bien7",$bien7); 
	$bien8=select_colum_excel('bien8','I');$xtpl->assign("bien8",$bien8);
	$bien9=select_colum_excel('bien9','J');$xtpl->assign("bien9",$bien9);
	$bien10=select_colum_excel('bien10','K');$xtpl->assign("bien10",$bien10);
	$bien11=select_colum_excel('bien11','L');$xtpl->assign("bien11",$bien11);
	$bien12=select_colum_excel('bien12','M');$xtpl->assign("bien12",$bien12);
	$bien13=select_colum_excel('bien13','N');$xtpl->assign("bien13",$bien13);
	$bien14=select_colum_excel('bien14','O');$xtpl->assign("bien14",$bien14);
	$bien15=select_colum_excel('bien15','P');$xtpl->assign("bien15",$bien15);
	$bien16=select_colum_excel('bien16','Q');$xtpl->assign("bien16",$bien16);
	$bien17=select_colum_excel('bien17','R');$xtpl->assign("bien17",$bien17);
	$bien18=select_colum_excel('bien18','S');$xtpl->assign("bien18",$bien18);
	$bien19=select_colum_excel('bien19','T');$xtpl->assign("bien19",$bien19);
	$bien20=select_colum_excel('bien20','U');$xtpl->assign("bien20",$bien20);
	if($_POST['Update_finsh']){
		
        if ( $_FILES['ufile']['name']!= NULL)
        {
			 $data = new Spreadsheet_Excel_Reader();
          //  $data->setOutputEncoding('CP1251');
		 
            $data->read($_FILES['ufile']['tmp_name'],true,"UTF-8");
			// echo count($data->sheets[0]["cells"]).'dong';
		 // exit();
		 $num = $_POST['datastartfrom'];
		// $num = (int)$num;
            for ($x = (int)$num; $x <= count($data->sheets[0]["cells"])+(int)$num; $x++) {
				
				$data_array['tenditich']=$data->sheets[0]["cells"][$x][$_POST[bien1]];
				$data_array['thon']=$data->sheets[0]["cells"][$x][$_POST[bien2]];
				//$data['xa']=$data->sheets[0]["cells"][$x][$_POST[bien3]];
				
				if($data->sheets[0]["cells"][$x][$_POST[bien4]] != ''){
					$id_huyen = Get_idhuyen($data->sheets[0]["cells"][$x][$_POST[bien4]]);
					if($id_huyen == ''){
						$mang['name'] = $data->sheets[0]["cells"][$x][$_POST[bien4]];
						$mang['name2'] = $data->sheets[0]["cells"][$x][$_POST[bien4]];
						$mang['id_xa']= 0;
						updateQuery('Insert',$prefix.'_xahuyen', $mang); 
					}
					$data_array['huyen'] = Get_idhuyen($data->sheets[0]["cells"][$x][$_POST[bien4]]);
				}
				if($data->sheets[0]["cells"][$x][$_POST[bien3]] != ''){
					$id_huyen = Get_idhuyen($data->sheets[0]["cells"][$x][$_POST[bien4]]);
					$id_xa = Get_id_xahuyen($data->sheets[0]["cells"][$x][$_POST[bien3]],$id_huyen);
					if($id_xa == ''){
						$sgl_huyen = $db->sql_query("Select id from ".$prefix."_xahuyen 
				where name2 = '".$data->sheets[0]["cells"][$x][$_POST[bien4]]."' and id_xa = 0");
				     list($id) = $db->sql_fetchrow($sgl_huyen);
						$mang2['name'] = $data->sheets[0]["cells"][$x][$_POST[bien3]];
						$mang2['name2'] = $data->sheets[0]["cells"][$x][$_POST[bien3]];
						$mang2['id_xa']= $id;
						updateQuery('Insert',$prefix.'_xahuyen', $mang2); 
					}
					$data_array['xa'] = Get_id_xahuyen($data->sheets[0]["cells"][$x][$_POST[bien3]],$id_huyen);
				}
					if($data->sheets[0]["cells"][$x][$_POST[bien5]] != ''){
						$id_huyen = Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien5]],_name_disan);
					if($id_huyen == ''){
						

						$name = $data->sheets[0]["cells"][$x][$_POST[bien5]];
						$db->sql_query("Insert into ".$prefix."_name_disan (name,name2) values('$name','$name') ");
					}
					$data_array['loai_ds']=Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien5]],_name_disan);
					}
					if($data->sheets[0]["cells"][$x][$_POST[bien6]] != ''){
						$id_huyen = Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien6]],_xephang);
					if($id_huyen == ''){
						$name = $data->sheets[0]["cells"][$x][$_POST[bien6]];
						$db->sql_query("Insert into ".$prefix."_xephang (name,name2) values('$name','$name') ");
					}
					$data_array['xephang']=Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien6]],_xephang);
					}

					if($data->sheets[0]["cells"][$x][$_POST[bien17]] != ''){

						$id_huyen = Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien17]],_hientrang_vatthe);
					if($id_huyen == ''){
						$name = $data->sheets[0]["cells"][$x][$_POST[bien17]];
						
						$db->sql_query("Insert into ".$prefix."_hientrang_vatthe (name,name2) values('$name','$name') ");
					}
					$data_array['hientrang']=Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien17]],_hientrang_vatthe);
					}
					if($data->sheets[0]["cells"][$x][$_POST[bien18]] != ''){
						$id_huyen = Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien18]],_huong_xephang);
					if($id_huyen == ''){
						$name = $data->sheets[0]["cells"][$x][$_POST[bien18]];
							$db->sql_query("Insert into ".$prefix."_huong_xephang (name,name2) values('$name','$name') ");
					}
					$data_array['huong_xephang']=Get_id_loaids($data->sheets[0]["cells"][$x][$_POST[bien18]],_huong_xephang);
					}
					$data_array['loaihinh']=$data->sheets[0]["cells"][$x][$_POST[bien7]];
				$data_array['sotoa']=$data->sheets[0]["cells"][$x][$_POST[bien8]];
				$data_array['sogian']=$data->sheets[0]["cells"][$x][$_POST[bien9]];
				$data_array['niendai']=$data->sheets[0]["cells"][$x][$_POST[bien10]];
				$data_array['tomtat']=$data->sheets[0]["cells"][$x][$_POST[bien11]];
				$data_array['thoigianlehoi']=$data->sheets[0]["cells"][$x][$_POST[bien12]];
				$data_array['dientichdat']=$data->sheets[0]["cells"][$x][$_POST[bien13]];
				$data_array['dientichxaydung']=$data->sheets[0]["cells"][$x][$_POST[bien14]];
				$data_array['hienvat_tb']=$data->sheets[0]["cells"][$x][$_POST[bien15]];
				$data_array['congtac_tubo']=$data->sheets[0]["cells"][$x][$_POST[bien16]];
				$data_array['congtac_tusua']=$data->sheets[0]["cells"][$x][$_POST[bien19]];
				$data_array['ghichu']=$data->sheets[0]["cells"][$x][$_POST[bien20]];
					if($data_array['tenditich'] != ''){
						updateQuery('Insert',$prefix.'_vatthe', $data_array);	
					}
																								
			}
		}
	}
	 $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//===========================
function Add_vatthe_hungha($pid)
{
   global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Hungha/Add_vatthe_hungha.html');
    $xtpl->assign("portalurl", $portalurl);
    
    $xtpl->assign("pid", $pid);
	//---------------------------
	//$loai_ds=select_loaids("");
	
	
	$xephang=select_xephang("");
	$huong_xephang=select_huong_xephang("");
	
	$huyen=select_huyen("");
	$hientrang=select_hientrang("",_hientrang_vatthe);
	$loai_ds=select_hientrang("",_name_disan);
	
	//hien thi khi sua
	if($pid){
		$hien_st = "none";
		
	}else{
		$hien_st = "";
		
	}
	 $xtpl->assign("hien_st", $hien_st);
	if($pid){
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_vatthe where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);
		$xephang=$row['xephang'];$xephang=select_xephang($xephang);
		$huong_xephang=$row['huong_xephang'];$huong_xephang=select_huong_xephang($huong_xephang);
		$huyen=$row['huyen'];$huyen=select_huyen($huyen);
		$hientrang=select_hientrang($row['hientrang'],_hientrang_vatthe);
		$loai_ds=select_hientrang($row['loai_ds'],_name_disan);
		
		// Lấy xã trong huyện khi sửa và selected xã
		$xa_editSelected=Select_xaSelected($row['huyen'],$row['xa']);
		$xtpl->assign("xa_editSelected", $xa_editSelected);
		$xtpl->assign("row", $row);
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
	$xtpl->assign("huong_xephang", $huong_xephang);
	
	
	$xtpl->assign("huyen", $huyen);
	$xtpl->assign("hientrang", $hientrang);

	if($_POST['Update_finsh']){
		
		
	//xu ly them và cap nhat
	$aconfig = array('niendai', 
	'huyen', 
	'xa', 
	'loai_ds', 
	'xephang',
	'congtac_tusua',
	'congtac_tubo',
	'dinhkem',
	'noidung',
	'video',
	'hientrang',
	'tomtat',
	'thoigianlehoi',
	'dientichdat',
	'dientichxaydung',
	'hienvat_tb',
	'ghichu',
	'tenditich',
	'loaihinh',
	'sotoa',
	'sogian',
	'huong_xephang',
	'thon'
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
	Header("Location: ".$portalurl."/admin.php?op=Ds_vatthe_hungha");
	
	
	
	}else{ 
	$data['date']=date("Y-m-d");
	
	
	/*$result = $db->sql_query("insert into " . $prefix . "_vatthe(name_vt,diachi,huyen,xa,loai_ds,chuyende,xephang,year_xh,congtac_bv,congtac_tb,dantoc,ngonngu,chatlieu,mausac,kichthuoc,soluong,noidung,hientrang) values ('".$_POST['name_vt']."', '".$_POST['diachi']."', '".$_POST['huyen']."', '".$_POST['xa']."', '".$_POST['loai_ds']."','".$_POST['chuyende']."','".$_POST['xephang']."','".$_POST['year_xh']."','".$_POST['congtac_bv']."','".$_POST['congtac_tb']."','".$_POST['dantoc']."','".$_POST['ngonngu']."','".$_POST['chatlieu']."','".$_POST['mausac']."','".$_POST['kichthuoc']."','".$_POST['soluong']."','".$_POST['noidung']."','".$_POST['hientrang']."')");*/
	
	 updateQuery('Insert',$prefix.'_vatthe', $data); 
	
	$pids = mysql_insert_id();
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
		
							 $result = $db->sql_query("insert into ".$prefix."_vatthe_dinhkem(id,id_vatthe,dk_file) values(null,'$pids','$name_dk')"); 
						   echo "<script>alert('Bạn đã cập nhật file đính kèm thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		
						}
					}
	
	Header("Location: ".$portalurl."/admin.php?op=Add_vatthe_imgs_hungha&pid=".$pids."");
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

function View_vatthe_hungha($pid){
	  global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Hungha/View_vatthe_hungha.html');
    $xtpl->assign("portalurl", $portalurl);
	$xtpl->assign("pid", $pid);
	 	$result_edit = $db->sql_query("SELECT * from " . $prefix . "_vatthe where id='" . intval($pid) . "' order by id ");
        $row = $db->sql_fetchrow($result_edit);

        $xtpl->assign("niendai", $row['niendai']);
		$xtpl->assign("congtac_tubo", $row['congtac_tubo']);
		$xtpl->assign("dientich_dat", $row['dientichdat']);
		$xtpl->assign("dientich_xd", $row['dientichxaydung']);
		$xtpl->assign("hienvat_tb", $row['hienvat_tb']);
		$xtpl->assign("congtac_tusua", $row['congtac_tusua']);
		$xtpl->assign("noidung", $row['noidung']);
		 $xtpl->assign("niendai", $row['niendai']);
		$xtpl->assign("row", $row);
		if($row['video'] == ''){
			$hien_video = "none";
		}else{
			$hien_video = "";
		}
		$xtpl->assign("hien_video", $hien_video);
		$xtpl->assign("dinhkem", $row['dinhkem']);
		
		$loai_ds = Get_name_table($row['loai_ds'],_name_disan);
		$xtpl->assign("loai_ds", $loai_ds);
		
		$xephang = Get_name_table($row['xephang'],_xephang);
		$xtpl->assign("xephang", $xephang);

			$huong_xephang = Get_name_table($row['huong_xephang'],_huong_xephang);
		$xtpl->assign("huong_xephang", $huong_xephang);
		
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

function Ds_vatthe_hungha()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Hungha/Ds_vatthe_hungha.html');
    $xtpl->assign("portalurl", $portalurl);
	$xephang=select_xephang("");
	$huong_xephang=select_huong_xephang("");

	$xtpl->assign("xephang", $xephang);
	$xtpl->assign("huong_xephang", $huong_xephang);

	$loai_ds=select_loaids("");$xtpl->assign("loai_ds", $loai_ds);
	$huyen=select_huyen("");$xtpl->assign("huyen", $huyen);
	

	$hientrang=select_hientrang("",_hientrang_vatthe);$xtpl->assign("hientrang", $hientrang);

	if($_POST['Del_vt']){
	$db->sql_query("DELETE FROM ".$prefix."_vatthe WHERE id ='".intval($_POST['xoa_vatthe'])."'");
	echo "<script>alert('Bạn đã xóa vật thể thành công');location.href='".$portalurl."/admin.php?op=Ds_vatthe_hungha';</script>";
}
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//-------------------------

function Sub_xahuyen_hungha($country){
		

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

function Search_vatthe_hungha($name_disan,$tom_tat,$thoigiandienra,$hienvat_tb,$dientich_dat,$dientich_xd,$loai_ds,$huyen,$xaphuong,$hientrang,$tenditich,$xephang,$huong_xephang){

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

$xtpl = new XTemplate('admin/htmls/Hungha/Search_vatthe_hungha.html');
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
$sgl_VattheCount = $db->sql_query("Select COUNT(*) from ".$prefix."_vatthe where 1 $where_Tenvatthe $where_tom_tat $where_loaids $where_huyen $where_xa  $where_hientrang $where_thoigiandienra $where_hienvat_tb $where_dientich_dat $where_dientich_xd $where_tenditich $where_xephang $where_huong_xephang");
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
  where 1 $where_Tenvatthe $where_tom_tat $where_loaids $where_huyen $where_xa  $where_hientrang $where_thoigiandienra $where_hienvat_tb $where_dientich_dat $where_dientich_xd $where_tenditich $where_xephang $where_huong_xephang
  order by id asc 
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
			
		$xtpl->assign("row_vatthe",$row_vatthe); 
		$xtpl->parse("MAIN.vatthe"); 
		}
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}


//------------------------

function Add_vatthe_img_hungha($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
	include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';


	$xtpl = new XTemplate('admin/Hungha/Vatthe/Add_vatthe_img_hungha.html');
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

function Submit_vatthe_img_hungha($pid)
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

function Add_vatthe_img_popup_hungha($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	


	$xtpl = new XTemplate('admin/htmls/Hungha/Add_vatthe_img_popup_hungha.html');
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

function Submit_vatthe_img_popup_hungha($pid)
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
//--------------------------------
function Add_vatthe_imgs_hungha($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';

	$xtpl = new XTemplate('admin/htmls/Hungha/Add_vatthe_imgs_hungha.html');
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
					$now = getdate();
    				$currentTime = $now["hours"] . "_" . $now["minutes"] . "_" . $now["seconds"]; 
					$name_upload = $currentTime.'_'.$name;

                    move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name_upload) ;

					 $result = $db->sql_query("insert into ".$prefix."_vatthe_img(id,id_vatthe,img_vt) values(null,'$pid','$name_upload')"); 
					 if($_POST['ok_num']) {
						 Header("Location: ".$portalurl."/admin.php?op=Add_vatthe_imgs_hungha&pid=".$pid."");
					 }else if($_POST['buoc_tiep']){
						 Header("Location: ".$portalurl."/admin.php?op=Add_vatthe_video_hungha&pid=".$pid."");
					 }
                  

                }
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
	
		

// Xoa anh		
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
//--------------------
function Add_vatthe_video_hungha($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	
include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';

	$xtpl = new XTemplate('admin/htmls/Hungha/Add_vatthe_video_hungha.html');
    $xtpl->assign("portalurl", $portalurl);
	 $xtpl->assign("pid", $pid);
	if($_POST['ok_num']) 
{ 
if($_FILES['video']['size'] >0)
				{
					$date = time();
				$vid = Convert_vi_to_en($_FILES['video']['name']);
				copy($_FILES['video']['tmp_name'],"images/Video/" .$date."_".$vid);
				$video="images/Video/".$date."_".$vid;
				
				}
				$data['video'] = $video;
				if($video != ''){
					updateQuery('Update',$prefix.'_vatthe', $data,"id = '".$pid."'");
					 Header("Location: ".$portalurl."/admin.php?op=Ds_vatthe_hungha");
				}
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
		case Add_vatthe_hungha:
		Add_vatthe_hungha($pid);
		break;
		
		case Ds_vatthe_hungha:
		Ds_vatthe_hungha();
		break;
		
		case "Sub_xahuyen_hungha":
		Sub_xahuyen_hungha($country);
		break;
		case "Search_vatthe_hungha":
	    Search_vatthe_hungha($name_disan,$tom_tat,$thoigiandienra,$hienvat_tb,$dientich_dat,$dientich_xd,$loai_ds,$huyen,$xaphuong,$hientrang,$tenditich,$xephang,$huong_xephang);
	    break;
		
		case Add_vatthe_img_hungha:
		Add_vatthe_img_hungha($pid);
		break;
		
		case Submit_vatthe_img_hungha:
		Submit_vatthe_img_hungha($pid);
		break;
		case View_vatthe_hungha:
		View_vatthe_hungha($pid);
		break;
		case "Add_vatthe_img_popup_hungha":
		Add_vatthe_img_popup_hungha($pid);
		break;
		case Submit_vatthe_img_popup_hungha:
		Submit_vatthe_img_popup_hungha($pid);
		break;
		case "Add_vatthe_imgs_hungha":
		Add_vatthe_imgs_hungha($pid);
		break;
		case "Add_vatthe_video_hungha":
		Add_vatthe_video_hungha($pid);
		break;
		case "Import_execel_ds":
		Import_execel_ds();
		break;
		case "Get_excel":
		Get_excel();
		break;
}
?>