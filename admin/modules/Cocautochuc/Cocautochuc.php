<?php
/*********************************************************/
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix,$aid;
if (!@eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
checkPrivateModule("Cocautochuc",$aid);
global $prefix;
$multilingual=1;
$private_read=1;
$private_write=1;
$private_aproved=1;
$private_delete=1;
$private_copy=1;
$private_move=1;


//--------------------------------
function Add_xahuyen($pid){


	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	$xtpl = new XTemplate('admin/htmls/Cocautochuc/Add_xahuyen.html');

	$xtpl->assign("sitename",$sitename);  
	$xtpl->assign("portalurl",$portalurl);  
	//-------------------------------
	if($_POST['Update_phong']){
	
	
	if($_POST['pid']){
	
	mysql_query("UPDATE  ".$prefix."_xahuyen SET 
	name='".$_POST['name']."',phone='".$_POST['phone']."',id_xa='".$_POST['id_xa']."',stt='".$_POST['stt']."' where id='".intval($_POST['pid'])."' ");
	
	
	}else{
	
	mysql_query("INSERT INTO ".$prefix."_xahuyen SET 
	name='".$_POST['name']."',phone='".$_POST['phone']."',id_xa='".$_POST['id_xa']."',stt='".$_POST['stt']."' ");
	
	}
	
	Header("Location: admin.php?op=Add_xahuyen");	
	
	
	}
	
	//-----------------------------------
		$result = $db->sql_query("SELECT id,name from " . $prefix . "_xahuyen where id_xa='0' order by stt asc ");
		while ($row = $db->sql_fetchrow($result)) {
        if($_GET['pid']){
            $sql_edit=mysql_query("Select id_xa from ".$prefix."_xahuyen where id='".intval($pid)."' ");
            list($id_xa)=mysql_fetch_array($sql_edit);
            if($row['id']==$id_xa){
                 $select="selected";
            }else{
                $select="";
            }
            $xtpl->assign("select",$select);
        }
		$xtpl->assign("row",$row); 
		$xtpl->parse("MAIN.donvi_xa"); 
		}
		
		
		
	//stt
	
	
	//------sua thong tin---------------
	
	if($pid){
		
			$result_edit = $db->sql_query ("SELECT * from " . $prefix . "_xahuyen  where id='".intval($pid)."' order by id ");
			$row = $db->sql_fetchrow($result_edit);
			
			
			
			$xtpl->assign("pid",$pid);
			$xtpl->assign("name",$row['name']);
			
			$xtpl->assign("phone",$row['phone']);
			$xtpl->assign("email",$row['email']);
			$stt=$row['stt'];
			
	
	}
	for($i=1;$i<100;$i++)  {
		  
		 $stt_pr="<option value=".$i." ".($i==$stt?'Selected':'').">".$i."</option>";

		$xtpl->assign("stt_pr",$stt_pr); 		  
		$xtpl->parse("MAIN.stt_ht");
	}	
	
	//--------------
	
	
	
	//hien thi danh sach
	
	$resul = $db->sql_query("SELECT id,name,phone,id_xa from " . $prefix . "_xahuyen where id_xa !='0' order by stt asc ");
	$i=0;
        while ($rows = $db->sql_fetchrow($resul)) {
			 $i++;
			
			 $resul_huyen = $db->sql_query("SELECT id,name from " . $prefix . "_xahuyen where id = '".intval($rows['id_xa'])."' ");
			  list ($id,$name_huyen) = $db->sql_fetchrow($resul_huyen);
			 $xtpl->assign("id",$id); 
			 $xtpl->assign("name_huyen",$name_huyen); 
			  $xtpl->assign("stt",$i); 
			  $xtpl->assign("row",$rows); 
			 $xtpl->parse("MAIN.xahuyen");
		}
	
	
	if($_POST['Delete_xoa']){
		
		for($i=0;$i<sizeof($_POST['check']);$i++){
			
			$check= $_POST['check'][$i];
			
			 mysql_query("DELETE FROM ".$prefix."_xahuyen WHERE id ='".intval($check)."'");
	 
	 		Header("Location: admin.php?op=Add_xahuyen");	
	 	
	 
		
		}
		//------------------
		for($i=0;$i<sizeof($_POST['check_sub']);$i++){
			
			$check_sub= $_POST['check_sub'][$i];
			
			 mysql_query("DELETE FROM ".$prefix."_xahuyen WHERE id ='".intval($check_sub)."'");
	 
	 		Header("Location: admin.php?op=Add_xahuyen");	
	 	
	 
		
		}
		//------------------
	
	}
	
	
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');

	
	
	
	
	


include 'bottom.php';

}

//--------------------------------
function Add_xathon($pid){


	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	$xtpl = new XTemplate('admin/htmls/Cocautochuc/Add_xathon.html');

	$xtpl->assign("sitename",$sitename);  
	$xtpl->assign("portalurl",$portalurl);  
	//-------------------------------
	if($_POST['Update_phong']){
	$data['name'] = $_POST['name'];
	$data['name2'] = mb_strtolower($_POST['name'],'utf-8');
	$data['phone'] = $_POST['phone'];
	$data['id_xa'] = $_POST['id_xa'];
	$data['stt'] = $_POST['stt'];
	
	
	if($_POST['pid']){
		updateQuery('UPDATE',$prefix.'_xathon', $data,"id = '".$_POST['pid']."'");
	
	}else{
		updateQuery('Insert',$prefix.'_xathon', $data);
	}
		Header("Location: admin.php?op=Add_xathon");	
	}
	
	$select_xathon = select_xathon("");
	
	
	if($pid){
		
			$result_edit = $db->sql_query ("SELECT * from " . $prefix . "_xathon  where id='".intval($pid)."' order by id ");
			$row = $db->sql_fetchrow($result_edit);
			
			$select_xathon = select_xathon($row['id_xa']);
			
			$xtpl->assign("pid",$pid);
			$xtpl->assign("name",$row['name']);
			
			$xtpl->assign("phone",$row['phone']);
			$xtpl->assign("email",$row['email']);
			$stt=$row['stt'];
			
	
	}
	 $xtpl->assign("select_xathon",$select_xathon);
	for($i=1;$i<100;$i++)  {
		  
		 $stt_pr="<option value=".$i." ".($i==$stt?'Selected':'').">".$i."</option>";

		$xtpl->assign("stt_pr",$stt_pr); 		  
		$xtpl->parse("MAIN.stt_ht");
	}	
	
	//--------------
		
	
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');

include 'bottom.php';

}

//--------------------------------
function Ds_thon(){


	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	$xtpl = new XTemplate('admin/htmls/Cocautochuc/Ds_thon.html');

	
	$xtpl->assign("portalurl",$portalurl);  
	
	$select_xathon = select_xathon("");
	 $xtpl->assign("select_xathon",$select_xathon);
	 if($_POST['Delete_xoa']){
		
		for($i=0;$i<sizeof($_POST['check']);$i++){
			
			
			
			$db->sql_query("DELETE FROM ".$prefix."_xathon WHERE id ='".$_POST['check'][$i]."'");
	 
	 		Header("Location: admin.php?op=Ds_thon");	
	 	
	 
		
		}
	
		//------------------
	
	}

	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
include 'bottom.php';
	}
	//--------------------------------
function Ds_thon_Search($id_xa,$name){


	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;

	
	$xtpl = new XTemplate('admin/htmls/Cocautochuc/Ds_thon_Search.html');

	
	$xtpl->assign("portalurl",$portalurl);  
	$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		if($id_xa){
			$where_1 = "and id_xa = '".$id_xa."' ";
		}
		if($name){
			$where_2 = "and name LIKE '%".$name."%' ";
		}
		
		$sgl_Count = $db->sql_query("Select COUNT(id) from portal_xathon where 1 $where_1 $where_2");
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
                	<td align="center" colspan="5">'.$pageview.'</td>
                </tr>';
 }else{
	 $pagination = '';
 }
				$xtpl->assign("pagination",$pagination);
		$stt = $offset;
		
		$resul_sub = $db->sql_query("SELECT * from " . $prefix . "_xathon where 1 $where_1 $where_2 order by id_xa,stt asc  LIMIT $offset, $number_per_page");
	
        while ($row = $db->sql_fetchrow($resul_sub)) {
			
			$stt++;
			$sgl_xa = $db->sql_query("Select name from portal_xahuyen where id = '".intval($row['id_xa'])."'");
			list($ten_xa) = $db->sql_fetchrow($sgl_xa);
			$row['ten_xa'] = $ten_xa;
			$xtpl->assign("stt",$stt); 
			$xtpl->assign("row",$row); 
			 $xtpl->parse("MAIN.Danhsach");
		}
			 
			
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');

	}
//--------------------------*/
switch($op) {
	case "Add_xahuyen":
	Add_xahuyen($pid);
	break;
	
	case "Add_xathon":
	Add_xathon($pid);
	break;
	case "Ds_thon":
	Ds_thon();
	break;
	case "Ds_thon_Search":
	Ds_thon_Search($id_xa,$name);
	break;
	
	
	
}

?>