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
            if($rows['id']==$id_xa){
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

//------------------------------


//--------------------------*/
switch($op) {
	case "Add_xahuyen":
	Add_xahuyen($pid);
	break;
	
	
	
}

?>