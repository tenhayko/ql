<?php
global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $aid;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
global $prefix, $aid;
if (!@eregi("admin.php", $PHP_SELF)) {
  die ("Access Denied");
}
checkPrivateModule("Chat", $aid);
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
function Get_list_msg()
{
  global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
  $name = get_fullname($aid);
   $result_edit = $db->sql_query("SELECT * FROM ". $prefix ."_authors where name<>'".$name."' and status_log='1'");
   
    $msg_2="<div class='table-responsive'> <div border='0' class='table table-bordered table-striped' style='font-size:13px; font-family: verdana, arial;'>";
    while($row = $db->sql_fetchrow($result_edit)){

        if($row["status_log"]==1){
            $row["status_log"]="<img src='".$portalurl."/images/green_dot.gif''/> ";
        }
        else{
         $row["status_log"]="<img src='".$portalurl."/images/red_dot.gif' style=''/> ";   
        }

           $msg_2 = $msg_2 . "<div style='cursor:pointer' data-user='".$row["name"]."' class='Choose_user'>" .
                
                "<span class='name'>" . $row["name"] . "</span><span class='count-unread'>(".get_msg_count_unread($name,$row["name"]).")</span>
                <span class='status_log'>". $row["status_log"] . "</span>
                <span class='wrap-message' id='wrap-message-".$row["aid"]."' data-id='wrap-message-".$row["aid"]."'>

                </span>
                <span class='form-post-message'>" .
                
                "<textarea id='txtmsg' onkeypress='process(event, this)' name='msg' class='txtmsg form-control'></textarea>
                <input id='Submit2' class='btn-send btn btn-primary pull-right'  type='button' value='Gửi' onclick='set_chat_msg(this)'/>  

                </span></div>";
                
    }
     $msg_2=$msg_2 . "</div></div>";
     
     echo $msg_2;

}
//===========================
function Get_message_from_to($name){
   global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
   $user_name = get_fullname($aid);
   $rec_user= $name;

   //echo $mid;

   $result_edit = $db->sql_query("SELECT * FROM ". $prefix ."_chat where (username='".$user_name."' and user_id='".$rec_user."') or (username='".$rec_user."' and user_id='".$user_name."')");
   
    $msg_2="<div class='table-responsive'> <table border='0' class='table table-bordered table-striped' style='font-size:13px; font-family: verdana, arial;'>";
    while($row = $db->sql_fetchrow($result_edit)){   
           $msg_2 = $msg_2 . "<tr style='cursor:pointer'>" .
                
                "<td>" . $row["username"] . "<span class='datetime-chat'>(". date("H:m", strtotime($row["chatdate"])).")</span></td>
                <td>" . $row["msg"] . "</td>

                </tr>";
    }
     $msg_2=$msg_2 . "</table></div>";
     
     echo $msg_2;
}

//===========================
function Send_list_msg($name,$msg,$rname)
{
  global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;

     $dt = date("Y-m-d H:i:s");
     $user_name = get_fullname($aid);
     $message = $msg;
     $r_name = $name;

     $result = $db->sql_query("insert into " . $prefix . "_chat(username,chatdate,msg,user_id,has_read) values ('$user_name','$dt','$message','$r_name','0')");
      $id =  mysql_insert_id();

}

function Get_count_msg_unread(){
    global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
    $user_name = get_fullname($aid);
    //echo "SELECT * FROM ". $prefix ."_chat where user_id='".$user_name."' and has_read='0'";
    $result_edit = $db->sql_query("SELECT count(id) FROM ". $prefix ."_chat where user_id='".$user_name."' and has_read='0'");
    list($name_loai_vb)=$db->sql_fetchrow($result_edit);
    return $name_loai_vb;
}



//===========================

switch ($op) {
  case Get_list_msg:
  Get_list_msg();
  break;
  case Send_list_msg:
  Send_list_msg($name,$msg,$rname);
  break;
  case Get_message_from_to:
  Get_message_from_to($name);
  break;
  case Get_count_msg_unread:
  Get_count_msg_unread();
  break;
  
}
?>