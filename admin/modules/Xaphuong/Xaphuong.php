<?php
session_start(); 
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2006 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix, $db, $admin_file;
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {

/*********************************************************/
	/* Configuration Functions to Setup all the Variables    */
/*********************************************************/

// =================== XA PHUONG =======================
function Add_Xa($pid){

    global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;
    include 'admin/include/Topmenu_header.php';
    include 'header.php';
    include 'admin/modules/Content_left.php';
    $xtpl = new XTemplate('admin/htmls/Xaphuong/Add_Xa.html');
    $xtpl->assign("portalurl",$portalurl);
    //Hien thi danh sach xa
    $result_list = $db->sql_query("SELECT * FROM ".$prefix."_xa");
    $stt = 0;
    while($row = $db->sql_fetchrow($result_list)){
        $stt++;
        $xtpl->assign('stt',$stt);
        $xtpl->assign("row",$row);
        $xtpl->parse("MAIN.list");
    }

    if($pid){
        $result = $db->sql_query("SELECT * FROM ".$prefix."_xa WHERE id = $pid");
        $stt = 0;
        while($value = $db->sql_fetchrow($result)){
            $xtpl->assign("value",$value);
        }
    }

    if($_POST['them'])
    {
        $data['name'] = $_POST['name'];
        $data['stt']    = $_POST['stt'];
        $data['sdt']   = $_POST['sdt'];

        if($pid!=null){
            updateQuery('Update',$prefix.'_xa', $data,"id = '".$pid."'");
        }
        else
        {

             $result_check = $db->sql_query("SELECT COUNT(*) FROM ".$prefix."_xa WHERE name = '".$_POST['name']."'");
            list($count) = $db->sql_fetchrow($result_check);

            if($count > 0){
                 echo "<script>
                                alert('Tên xã / phường đã tồn tại');
                            </script>";
            }
            else{
                updateQuery('Insert',$prefix.'_xa ',$data);
            }
        }
        Header("Location: ".$portalurl."/admin.php?op=Add_Xa");
    }
    $xtpl->parse('MAIN');
    $xtpl->out('MAIN');


        include 'bottom.php';
    }


//==========================================
//==========================================
    function Delete_xaphuong($id,$table){
        global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;
        $str = explode(',',$id);
        foreach($str as $gt){
            $db->sql_query("DELETE FROM ".$prefix."".$table." WHERE id = ".$gt);
        }
    }
//=====================================
//======================================================

/*********************************************************/

	switch($op) {

        case "Add_Xa":
            Add_Xa($pid);
            break;
        case "Delete_xaphuong":
            Delete_xaphuong($id,$table);
            break;
	}

} else {
	echo "Access Denied";
}

?>