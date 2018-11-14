<?php
/*********************************************************/
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix,$aid;
if (!@eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
checkPrivateModule("Nhansu",$aid);
global $prefix;
$multilingual=1;
$private_read=1;
$private_write=1;
$private_aproved=1;
$private_delete=1;
$private_copy=1;
$private_move=1;

//--------------------------

function Ds_canbo_search($name_canbo,$id_congty,$id_phong,$id_bophan){
	

global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;

$xtpl = new XTemplate('admin/htmls/Canbo/Ds_canbo_search.html');
$number_per_page = isset($_GET['number_per_page']) && $_GET['number_per_page']!='0'? $_GET['number_per_page']:1;
        #- Lấy số trang hiện tại ( Mặc định = 1);
        $page = isset($_GET['page'])?$_GET['page']:1;
		//echo $page;
		#- Vị trí lấy dữ liệu
        $offset = ($page - 1)*$number_per_page;
		$xtpl->assign("page",$page);
		
		echo $name_canbo;
if($name_canbo){
	$where_fullName = "and a.full_name LIKE '%".$name_canbo."%' ";
	
}

$sgl_nvCount = mysql_query("Select COUNT(*) from ".$prefix."_hoso where 1 $where_fullName");
list($get_total_rows) = mysql_fetch_array($sgl_nvCount);

$pageview = pagination_ajax($get_total_rows,$number_per_page,$page);
//echo $pageview;
//create pagination

 $xtpl->assign("pagination",$pageview);

//=======chu thich ko nhin thay admin day ca. ong tuyen gia vao thi lay doan code nay nha
 $sql_acout=mysql_query("Select email from ".$prefix."_authors where aid='admin'");
 list($email_admin)=mysql_fetch_array($sql_acout);
 if($aid=="admin"){
 $where_aid="";
 }else{
 
 $where_aid=" and a.email <> '".$email_admin."'";
 
 }
	$sql_nv=mysql_query("Select a.id,a.code_nv,a.full_name,d.name,c.name_phong from ".$prefix."_hoso a
		
		left join ".$prefix."_phong c
		on(a.id_phongban=c.id) 
		
		
		left join ".$prefix."_chucvu d
		on(a.chuc_vu=d.id) 
		where 1 $where_fullName
	 order by a.full_name asc 
	 LIMIT $offset, $number_per_page");
	$stt=$offset;
	while($row = mysql_fetch_array($sql_nv)) 
		{
			
			
		$stt++;
		
		
		
		$xtpl->assign("stt",$stt); 
		
		$xtpl->assign("row",$row); 
		$xtpl->parse("MAIN.dscanbo"); 
		}

$xtpl->parse('MAIN');
	$xtpl->out('MAIN');
}

//--------------------
function HS_Nhansu(){



global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;


include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	


	$xtpl = new XTemplate('admin/htmls/Canbo/Hoso.html');

	$xtpl->assign("portalurl",$portalurl); 


//------------------

$s_dem=mysql_query("Select max(ma) from ".$prefix."_hoso ");
	list($ma_dt)=mysql_fetch_array($s_dem);
	
	$ma_dt= $ma_dt + 1;
	
	$ma_cb="VT_000".$ma_dt;

	$xtpl->assign("ma_cb",$ma_cb); 


//------------------
if($_POST['Insert_nv']){

		
		
		
		$result = $db->sql_query("INSERT INTO ".$prefix."_hoso SET 
					code_nv                       = '".($_POST['code_nv'])."'
					,full_name                   = '".($_POST['full_name'])."'
					,ngaysinh                = '".dmy($_POST['ngaysinh'])."'
			     ,email='".$_POST['email']."'
				  ,phone='".$_POST['phone']."'
				   ,noisinh='".$_POST['noisinh']."'
				
				,sex='".$_POST['sex']."'
				
				,ma='".$ma_dt."'
								
				,diachi_hientai='".($_POST['diachi_hientai'])."'
				
				
				
				
				,id_donvi='".($_POST['id_donvi'])."'
					
				,id_phongban='".($_POST['id_phongban'])."'	
				
				,chuc_vu='".($_POST['chuvu'])."'
				
				
				
				,avata='".$NewsImageLink."'
			
					,postdate                   = '".time()."' ");
					
					//them thong tin dang nhap
					if($_POST['aid']){
					
					mysql_query("INSERT INTO ".$prefix."_authors SET 
							aid                       = '".$_POST['aid']."',
							name                       = '".$_POST['full_name']."',
							pwd                       = '".md5($_POST['pass'])."',
							email                       = '".$_POST['email']."',
							createdate                       = '".time()."'
							 
							");
							
					
					}
					
		
		 Header("Location: them-can-bo");	
}
	

	
	
	//chuc vu
		$sql_cv=mysql_query("Select * from ".$prefix."_chucvu  where id_cha='0' order by id asc ");
	while($rows = mysql_fetch_array($sql_cv)) 
		{
			
			
				$result = $db->sql_query("SELECT id,name from " . $prefix . "_chucvu where id_cha='".intval($rows['id'])."' order by sort_order asc ");
				while ($row = $db->sql_fetchrow($result)) {
				
				$xtpl->assign("row",$row); 		  
				$xtpl->parse("MAIN.chucvu.sub_chucvu");
				}
			
			
			/*
			if($_GET['Edit']){
				$sql_edit=mysql_query("Select chuc_vu from ".$prefix."_hoso where id='".intval($_GET['Edit'])."' ");
				list($chuc_vu)=mysql_fetch_array($sql_edit);
				$id=$rows['id'];
				if($id==$chuc_vu){
				 	$select="selected";
				
				}else{
					$select="";
				}
				$xtpl->assign("select",$select); 
			
			}*/
		$xtpl->assign("rows",$rows); 
		$xtpl->parse("MAIN.chucvu"); 
		}
	//------------------//
		$result_p = $db->sql_query("SELECT id,name_phong from " . $prefix . "_phong where id_phongban='0' order by stt asc ");
		while ($row = $db->sql_fetchrow($result_p)) {
			
		$xtpl->assign("row",$row); 
		$xtpl->parse("MAIN.donvi_phong"); 
		}
	//===========phong	
	
	
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');


	
	include 'bottom.php';
}
//-----------------------------
function Ds_canbo(){

	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;


	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	

	$xtpl = new XTemplate('admin/htmls/Canbo/Ds_canbo.html');

	$xtpl->assign("portalurl",$portalurl); 

//--------------------------
	if($_POST['Delete']){
	
	
	if(isset($_POST["check"]) and (int)count($_POST["check"])>0)
{
for($i=0;$i<count($_POST["check"]);$i++)
{
	$result = $db->sql_query("DELETE FROM ".$prefix."_hoso  WHERE id = ".$_POST["check"][$i]."") ;
}
}

	
	 Header("Location: danh-sach-can-bo");
	}
//---------------------------



	


	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');


		
	include 'bottom.php';
}
function Chucvu($pid){

	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;


	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	

	$xtpl = new XTemplate('admin/htmls/Canbo/Chucvu.html');

	$xtpl->assign("portalurl",$portalurl); 

//--------------------------
	if($_POST['Delete']){
	
	
	if(isset($_POST["check"]) and (int)count($_POST["check"])>0)
{
for($i=0;$i<count($_POST["check"]);$i++)
{
	$result = $db->sql_query("DELETE FROM ".$prefix."_chucvu  WHERE id = ".$_POST["check"][$i]."") ;
}
}

	
	 Header("Location: chuc-vu");
	}
//---------------------------



	if($pid){
	
		$result = $db->sql_query("SELECT id,name,code_cv from " . $prefix . "_chucvu where id='".intval($pid)."' order by sort_order asc ");
		$row = $db->sql_fetchrow($result);
		$xtpl->assign("name",$row['name']); 
		$xtpl->assign("code_cv",$row['code_cv']); 
		$xtpl->assign("id_edit",$row['id']); 
		
		
		
	}

	if($_POST['Insert_cv']){
		
		if($_POST['id_edit']){
			
			
			$result = $db->sql_query("UPDATE  ".$prefix."_chucvu SET 
	code_cv='".$_POST['code_cv']."',name='".$_POST['tieu_de']."',id_cha='".$_POST['id_cha']."',sort_order='".$_POST['sort_order']."',quyen='".$_POST['quyen']."' where id='".intval($_POST['id_edit'])."' ");
	
	
			
		}else{
			
		$result = $db->sql_query("INSERT INTO ".$prefix."_chucvu SET 
		code_cv='".$_POST['code_cv']."',name='".$_POST['tieu_de']."',id_cha='".$_POST['id_cha']."',sort_order='".$_POST['sort_order']."',quyen='".$_POST['quyen']."'");
		
		}
		
		Header("Location: chuc-vu");
		
	}
	
	//chuvu
		$result = $db->sql_query("SELECT id,name from " . $prefix . "_chucvu where id_cha='0' order by sort_order asc ");
		while ($row = $db->sql_fetchrow($result)) {
		
		$xtpl->assign("row",$row); 		  
		$xtpl->parse("MAIN.chucvu");
		}
	//--------
	
	for($i=0;$i<100;$i++)  {
		  
		 $stt_pr="<option value=".$i." ".($i==$stt?'Selected':'').">".$i."</option>";

		$xtpl->assign("stt_pr",$stt_pr); 		  
		$xtpl->parse("MAIN.stt_ht");
}	


	//hien thi 
	
		$result_cv = $db->sql_query("SELECT id,name,code_cv from " . $prefix . "_chucvu where id_cha='0' order by sort_order asc ");
		while ($row = $db->sql_fetchrow($result_cv)) {
			$xtpl->assign("rw",$row); 		  
			
			
				
		$result_sub_cv = $db->sql_query("SELECT id,name,code_cv from " . $prefix . "_chucvu where id_cha='".$row['id']."' order by sort_order asc ");
		while ($row = $db->sql_fetchrow($result_sub_cv)) {
		$xtpl->assign("rw_sub",$row); 		  
		
			
		
		$xtpl->parse("MAIN.dschucvu.sub_chucvu");
					
			}
		
		$xtpl->parse("MAIN.dschucvu");
		}
		



	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');


		
	include 'bottom.php';
}
//-----------------------------

//===========================


switch($op) {
	
	case "HS_Nhansu":
	HS_Nhansu();
	break;
	
	
	
	case "DS_Nhansu":
	DS_Nhansu();
	break;
	
	case "Ds_canbo":
	Ds_canbo();
	break;
	
	
	
	case "Chucvu":
	Chucvu($pid);
	break;
	
	
	
	
	
	
	case "Ds_canbo_search":
	Ds_canbo_search($name_hoso,$id_congty,$id_phong,$id_bophan);
	break;
}

?>