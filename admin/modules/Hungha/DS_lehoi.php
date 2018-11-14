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

//=====================================

function DS_lehoi()
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';



    $xtpl = new XTemplate('admin/htmls/Hungha/DS_lehoi.html');
    $xtpl->assign("portalurl", $portalurl);
	

	$xa_editSelected=Select_xaSelected(0,0);
	//---------------------------
	$xephang=select_xephang("");
	
	$xtpl->assign("xephang", $xephang);
	
	$xtpl->assign("huyen", $xa_editSelected);

	 if($_POST['Delete_xoa']){
		
		for($i=0;$i<sizeof($_POST['check']);$i++){
			
			
			
			$db->sql_query("DELETE FROM ".$prefix."_lehoi WHERE id ='".$_POST['check'][$i]."'");
	 
	 		Header("Location: admin.php?op=DS_lehoi");	
	 	
	 
		
		}
	
		//------------------
	
	}
 	$xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}
//--------------------------------
function Search_Ds_lehoi($ten_lenhoi,$xephang,$huyen,$xa,$thon){


	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

	
	$xtpl = new XTemplate('admin/htmls/Hungha/Search_Ds_lehoi.html');

	
	$xtpl->assign("portalurl",$portalurl);  
	$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		if($xephang){
			$where_1 = "and xephang = '".$xephang."' ";
		}
		if($ten_lenhoi){
			$where_2 = "and ten_lenhoi_2 LIKE '%".mb_strtolower($ten_lenhoi,'utf-8')."%' ";
		}
		if($huyen){
			$where_3 = "and huyen = '".$huyen."' ";
		}
		if($xa){
			$where_4 = "and xa = '".$xa."' ";
		}
		if($thon){
			$where_5 = "and thon = '".$thon."' ";
		}
		
		$sgl_Count = $db->sql_query("Select COUNT(id) from portal_lehoi where 1 $where_1 $where_2 $where_3 $where_4 $where_5");
list($get_total_rows) = $db->sql_fetchrow($sgl_Count);
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
                	<td align="center" colspan="7">'.$pageview.'</td>
                </tr>';
 }else{
	 $pagination = '';
 }
				$xtpl->assign("pagination",$pagination);
		$stt = $offset;
		
		$resul_sub = $db->sql_query("SELECT * from portal_lehoi where 1 $where_1 $where_2 $where_3 $where_4 $where_5 LIMIT $offset, $number_per_page");
	
        while ($row = $db->sql_fetchrow($resul_sub)) {
			
			$stt++;
			
			$sgl_huyen = $db->sql_query("Select name from portal_xahuyen where id = '".intval($row['huyen'])."'");
			list($name_huyen) = $db->sql_fetchrow($sgl_huyen);
			$row['name_huyen'] = $name_huyen;
			$sgl_xa = $db->sql_query("Select name from portal_xahuyen where id = '".intval($row['xa'])."'");
			list($name_xa) = $db->sql_fetchrow($sgl_xa);
			$row['name_xa'] = $name_xa;
			$sgl_xephang = $db->sql_query("Select name from portal_xephang where id = '".intval($row['xephang'])."'");
			list($name_xephang) = $db->sql_fetchrow($sgl_xephang);
			$row['name_xephang'] = $name_xephang;
			
			$sgl_thon = $db->sql_query("Select name from portal_xathon where id = '".intval($row['thon'])."'");
			list($name_thon) = $db->sql_fetchrow($sgl_thon);
			$row['name_thon'] = $name_thon;
			$xtpl->assign("stt",$stt); 
			$xtpl->assign("row",$row); 
			 $xtpl->parse("MAIN.Danhsach");
		}
			 
			
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');

	}
//===========================
function Add_lehoi($pid)
{
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Hungha/Add_lehoi.html');
    $xtpl->assign("portalurl", $portalurl);
    
    $xtpl->assign("pid", $pid);
	$xa_editSelected=Select_xaSelected(0,0);
	//---------------------------
	$xephang=select_xephang("");
	
	if($pid){
	 	$result = $db->sql_query("SELECT * from " . $prefix . "_lehoi where id='" . intval($pid) . "' ");
        while($row = $db->sql_fetchrow($result_dk)){
			$xa_editSelected=Select_xaSelected2($row['huyen']);
			$xtpl->assign("row", $row);
			
			
			}
	}
	
	
	$xtpl->assign("xephang", $xephang);
	
	$xtpl->assign("huyen", $xa_editSelected);
	

	if($_POST['Update_finsh']){
		
	
	$data['ten_lenhoi'] = $_POST['ten_lenhoi'];
	$data['ten_lenhoi_2'] = mb_strtolower($_POST['ten_lenhoi'],'utf-8');
	$data['thoigian_lehoi'] = $_POST['thoigian_lehoi'];
	$data['xephang'] = $_POST['xephang'];
	$data['huyen'] = $_POST['huyen'];
	$data['xa'] = $_POST['xa'];
	$data['thon'] = $_POST['thon'];
	$data['ghi_chu'] = $_POST['ghi_chu'];
	$data['aid'] = $aid;
	
	
	
	if($_POST['pid']){ 
	updateQuery('Update',$prefix.'_lehoi', $data,"id = '".$_POST['pid']."'"); 
	Header("Location: ".$portalurl."/admin.php?op=DS_lehoi");
	
	}else{ 
	$data['ngay_tao']=date("Y-m-d");
	

	
	 updateQuery('Insert',$prefix.'_lehoi', $data); 
	
	Header("Location: ".$portalurl."/admin.php?op=DS_lehoi");
	
	
	}
	}
	
	
   
    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}
//============================
function Check_xa_lehoi(){
	global $prefix,$db;
	$id = $_POST['id'];
	$xa_edit = $_POST['xa'];
	if($id > 0){
	$xa_select = '<select name="xa" class="form-control" id="xa" onchange="get_thon(this.value)">
                                            <option value="">Lựa chọn</option> ';
											
	$result_xaEdit = $db->sql_query("SELECT * from " . $prefix . "_xahuyen where id_xa='" . intval($id) . "' order by id ");
        while($row_xaEdit = $db->sql_fetchrow($result_xaEdit)){
			if ($row_xaEdit['id'] == $xa_edit) {
							$selected = 'selected';
							} else {
							$selected = '';
							}
                                        $xa_select .='<option value="'.$row_xaEdit['id'].'"  '.$selected.' >'.$row_xaEdit['name'].'</option>';
		}
		$xa_select .='</select>';
		}else{
				$xa_select = '<select name="" class="form-control" id="xa">
                                            <option value="">Lựa chọn</option>
											</select>
											 ';
			}
		echo $xa_select;	
	}
//============================
function Check_thon_lehoi(){
	global $prefix,$db;
	$id = $_POST['id'];
	$xa_edit = $_POST['thon'];
	if($id > 0){
	$xa_select = '<select name="thon" class="form-control" id="thon">
                                            <option value="">Lựa chọn</option> ';
	$result_xaEdit = $db->sql_query("SELECT * from portal_xathon where id_xa='" . intval($id) . "' order by id ");
        while($row_xaEdit = $db->sql_fetchrow($result_xaEdit)){
			if ($row_xaEdit['id'] == $xa_edit) {
							$selected = 'selected';
							} else {
							$selected = '';
							}
                                        $xa_select .='<option value="'.$row_xaEdit['id'].'"  '.$selected.' >'.$row_xaEdit['name'].'</option>';
		}
		$xa_select .='</select>';
		}else{
				$xa_select = '<select name="thon" class="form-control" id="thon">
                                            <option value="">Lựa chọn</option>
											</select>
											 ';
			}
		echo $xa_select;	
	}
//===========================
//===========================
require"admin/import_excel/excel_reader2.php";
function Impor_lehoi(){
	 global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Hungha/Impor_lehoi.html');
	 $xtpl->assign("portalurl", $portalurl);
	 $bien1=select_colum_excel('bien1','B'); $xtpl->assign("bien1",$bien1); 
	$bien2=select_colum_excel('bien2','C');$xtpl->assign("bien2",$bien2); 
	$bien3=select_colum_excel('bien3','D');$xtpl->assign("bien3",$bien3); 
	$bien4=select_colum_excel('bien4','E');$xtpl->assign("bien4",$bien4); 
	$bien5=select_colum_excel('bien5','F');$xtpl->assign("bien5",$bien5); 
	
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
				
				
					if($data->sheets[0]["cells"][$x][$_POST[bien1]] != ''){
						$data_array['ten_lenhoi']=$data->sheets[0]["cells"][$x][$_POST[bien1]];
				$data_array['ten_lenhoi_2']=mb_strtolower($data->sheets[0]["cells"][$x][$_POST[bien1]],'utf-8');
				
				$sql_xa = $db->sql_query("Select count(id) from portal_xahuyen where name = '".$data->sheets[0]["cells"][$x][$_POST[bien3]]."'");
			list($count_xa) = $db->sql_fetchrow($sql_xa);
			if($count_xa > 0){
				$sql_xa1 = $db->sql_query("Select id from portal_xahuyen where name = '".$data->sheets[0]["cells"][$x][$_POST[bien3]]."'");
			list($id_xa) = $db->sql_fetchrow($sql_xa1);
				$data_array['xa'] = $id_xa;
				}else{
					$data_xa['name'] = $data->sheets[0]["cells"][$x][$_POST[bien3]];
					$data_xa['id_xa'] = 7030;
					if($data->sheets[0]["cells"][$x][$_POST[bien3]] != ''){
						updateQuery('Insert',$prefix.'_xahuyen', $data_xa);
						$id_xa =  mysql_insert_id();
						$data_array['xa'] = $id_xa;
					}else{
						$data_array['xa'] = 0;
						}
				}
				
				$sql_thon = $db->sql_query("Select count(id) from portal_xathon where name = '".$data->sheets[0]["cells"][$x][$_POST[bien2]]."'");
			list($count_thon) = $db->sql_fetchrow($sql_thon);
			if($count_thon > 0){
				$sql_thon1 = $db->sql_query("Select id from portal_xathon where name = '".$data->sheets[0]["cells"][$x][$_POST[bien2]]."'");
			list($id_thon) = $db->sql_fetchrow($sql_thon1);
				$data_array['thon'] = $id_thon;
				}else{
					$data_thon['name'] = $data->sheets[0]["cells"][$x][$_POST[bien2]];
					$data_thon['id_xa'] = $id_xa;
					if( $data->sheets[0]["cells"][$x][$_POST[bien2]] != ''){
					updateQuery('Insert',$prefix.'_xathon', $data_thon);
						$id_thon =  mysql_insert_id();
						$data_array['thon'] = $id_thon;
					}else{
						$data_array['thon'] = 0;
						}
				}
				
				$sql_xephang = $db->sql_query("Select count(id) from portal_xephang where name = '".$data->sheets[0]["cells"][$x][$_POST[bien4]]."'");
			list($count_xephang) = $db->sql_fetchrow($sql_xephang);
			if($count_xephang > 0){
				$sql_xephang1 = $db->sql_query("Select id from portal_xephang where name = '".$data->sheets[0]["cells"][$x][$_POST[bien4]]."'");
			list($id_xephang) = $db->sql_fetchrow($sql_xephang1);
				$data_array['xephang'] = $id_xephang;
				}else{
					$data_xephang['name'] = $data->sheets[0]["cells"][$x][$_POST[bien4]];
					if($data->sheets[0]["cells"][$x][$_POST[bien4]] != ''){
						updateQuery('Insert',$prefix.'_xephang', $data_xephang);
						$id_xephang =  mysql_insert_id();
						$data_array['xephang'] = $id_xephang;
					}else{
						$data_array['xephang'] = 0;
						}
				}
				
				$data_array['thoigian_lehoi']=$data->sheets[0]["cells"][$x][$_POST[bien5]];
				
					$data_array['ghi_chu']='';
					$data_array['huyen']=7030;
					$data_array['aid']=$aid;
					$data_array['ngay_tao']=date("Y-m-d");
						updateQuery('Insert',$prefix.'_lehoi', $data_array);	
					}
																								
			}
		}
		Header("Location: ".$portalurl."/admin.php?op=DS_lehoi");
	}
	 $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


    include 'bottom.php';
}

//===========================

switch ($op) {
	case Impor_lehoi:
	Impor_lehoi();
	break;
	case Search_Ds_lehoi:
		Search_Ds_lehoi($ten_lenhoi,$xephang,$huyen,$xa,$thon);
		break;
		case DS_lehoi:
		DS_lehoi($pid);
		break;
		
		case Add_lehoi:
		Add_lehoi($pid);
		break;
		
		
		
		
		case "Search_Ds_lehoi":
	    Search_Ds_lehoi($tenditich);
	    break;
			
		case "Check_xa_lehoi":
		Check_xa_lehoi();
		break;
		case "Check_thon_lehoi":
		Check_thon_lehoi();
		break;	
			
		
		
	
}
?>