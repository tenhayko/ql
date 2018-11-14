<?
$cpanel="left";

require_once("../mainfile.php");
global $admin,$prefix,$logout,$portalurl,$currentlang,$aid,$active,$sitelogo,$foot1;
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>HỆ THỐNG QUẢN TRỊ NHÂN SỰ - DEVELOPED BY VNNETSOFT CO.,LTD</title>
	<STYLE type=text/css>
	BODY {
		BORDER-RIGHT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; OVERFLOW: hidden; BORDER-LEFT: 0px; PADDING-TOP: 0px; BORDER-BOTTOM: 0px; HEIGHT: 100%
	}
	</STYLE>
	<META content="MSHTML 6.00.6000.16481" name=GENERATOR>
</HEAD>
<BODY id=docs scroll=yes>
<?
//$logout=1;
IF(!$admin || $logout==1){
	mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $random_num = mt_rand(0, $maxran);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TECAPRO COMPANY</title>
<style type="text/css">
body {
background-color:#e8e8e8;
background-image:url('images/bkg.jpg');
background-position:center top;
background-repeat:repeat-y;
font-family:Arial, Helvetica, sans-serif;
font-size:9pt;
line-height:150%;
margin:0;
padding:0;
}
.TB1 {
	border-collapse: collapse;
	border: 1px solid #FFFFFF;
}
td{
	font-size:9pt;
	line-height:150%;
	text-align:justify;
}

#foot{
	background-image:url('images/foot.jpg');
	background-position:bottom center;
	background-repeat:no-repeat;
	clear:both;
	display:block;
	width:100%;
	height:19px;
}
.top-v {
	background-color: #A5A5A5;
}
.mn-bar {
	border-collapse: collapse;
}
.col-left {
	background-color: #f3f3f3;
	width: 155px;
	text-align:right;
}
.pad{
	padding:20px 0;
	background-color: #f3f3f3;
}
#content{
	background-color: #f3f3f3;
	padding:0 32px;
}
.style4 {
	background-color: #DAE7DF;
	width: 155px;
	background-image:url('images/hd1.jpg');
	background-repeat:repeat-x;
	background-position:top left;
}
.login {
	background-color: #B31E1D;
}
.noidung {
	border: 1px solid #E4E4E4;
	background-color: #FFFFFF;
	padding:10px;
}
.footer {
	background-color: #5C5C5C;
	padding:12px;
}
.footer td{
	text-align:center;
	color:#fff;
	font-size:8pt;
	font-family:Tahoma;

}
.login {
	border-style: none;
	border-width: 0;
	font-weight:bold;
	font-size:8.5pt;
	color:#fff;
}
.login a{
	color:#fff;
	text-decoration:none;
}
.login a:hover{
	color:#C0C0C0;
}
</style>
</head>

<html xmlns="http://www.w3.org/1999/xhtml">

<body>

<table style="width: 778px" cellpadding="0" cellspacing="0" class="TB1" align="center">
	<tr>
		<td class="top-v">
		<img alt="" src="images/bt1.jpg" width="5" height="5"></td>
	</tr>
	<tr>
		<td><?

			 echo  '<img src="http://vnnetsoft.vn/demo/Quanlynhansu/'.$sitelogo.'">';
			

		?></td>
	</tr>
	<tr>
		<td><img alt="" src="images/banner.jpg" width="778" height="195"></td>
	</tr>
	<tr>
		<td><form action="../admin.php" method="post" targer="main">
		<table cellspacing="0" cellpadding="0" style="width: 100%" class="mn-bar">
			<tr>
				<td class="style4"><img src="../images/dictionary.gif" align=absmiddle> &nbsp;<a href="../nhanvien.php" style="font-weight:bold;text-decoration:none;color:#111111;" target=_blank>Danh bạ liên lạc </a></td>
				<td class="login" style="width: 24px">
				<img alt="" src="images/hd.jpg" width="24" height="27"></td>
				<td class="login">
				
				<table  cellpadding="0" cellspacing="0" class="login" width=90%>
					<tr>
						<td >Tên đăng nhập</td>
						<td><input style="width:130px; background-color:#FF0000; border:0; color:#fff" name="aid" type="text"></td>
						<td>Mật khẩu</td>
						<td>
						<input style="width:100px; background-color:#FF0000; border:0; color:#fff" name="pwd" type="password"></td>
						
						<td><input type="image" src="images/login.png" onclick="submit()"></td>
					</tr>
					<input type="hidden" NAME="random_num" value="<?echo$random_num?>">
					<input type="hidden" NAME="active" value="<?echo$active?>">
					<input type="hidden" NAME="op" value="login">
				</table>
				
				</td>
			</tr>
		</table></form>
		</td>
	</tr>
	<tr>
		<td class="pad">
		<table style="width:100%" cellspacing="0" cellpadding="0">
			<tr>
				<td class="col-left">
				<img alt="" src="images/btuong1.jpg" width="106" height="167"></td>
				<td id="content" valign="top">
				<table style="width: 100%; height: 100%" cellpadding="0" cellspacing="0" class="noidung">
					<tr>
						<td>
<?
global $prefix;
		$res = mysql_query("select content from $prefix"._modules_help." where module = 'Home' ");
		list($content)=mysql_fetch_row($res);
echo '<div style="overflow: auto;height:150px;padding-right:10px;">'.$content.'</div>';

?></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td class="footer">
		<table style="width: 100%" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 155px">
				<img alt="" src="images/lgo1.jpg" width="102" height="22"></td>
				<td><?echo $foot1?><br/>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<div id="foot"></div>
</body>

</html>

<?
}ELSE{
	$admin = addslashes(base64_decode($admin));
	$admin = explode(":", $admin);
	$aid = addslashes($admin[0]);
?>
<DIV id=loading-mask style="Z-INDEX: 20000; BACKGROUND: #c3daf9; LEFT: 0px; WIDTH: 100%; POSITION: absolute; TOP: 0px; HEIGHT: 100%"></DIV>
	<DIV id=loading>
		<DIV class=loading-indicator>
			<IMG style="../images/loading.gif" align=absMiddle>&nbsp;Loading...
		</DIV>
</DIV><!-- include everything after the loading indicator -->

	<link rel="stylesheet" type="text/css" href="js/ext-all.css" />
 	<script type="text/javascript" src="js/ext-base.js"></script>
    <script type="text/javascript" src="js/ext-all.js"></script>
	<SCRIPT src="js/docs.js" type=text/javascript></SCRIPT>
	<link rel="stylesheet" type="text/css" href="js/sdmenu/sdmenu.css" />
	<script type="text/javascript" src="js/sdmenu/sdmenu.js"></script>
	<script type="text/javascript">
		var myMenu;
		window.onload = function() {
			myMenu = new SDMenu("my_menu");
			myMenu.init();
		};
	</script>
<DIV id=header style="BACKGROUND-COLOR: #DFE8F6;height:89px;">
	<div style="height:89px;float:left;background:url('images/a1.jpg');">
		<img src="images/a1.jpg" align=absmiddle>
	</div>
	<div style="text-align:right;padding-right:20px;"><img src="../images/admin/cn0004-32.gif" align=absmiddle>&nbsp;<?echo '<b>'.$aid.'</b>&nbsp;'.$sesiontime?>
	</div>
<DIV style="PADDING-TOP: 3px;padding-left:3px;"></DIV></DIV>
	<DIV  id=classes >
		<div style="float: left" id="my_menu" class="sdmenu">
		<?
			$i=1;
			$res = mysql_query("Select mid ,custom_title_vietnamese,sortorder,title   from $prefix"._modules." where inmenu  = '1' order by sortorder");
			$max = mysql_num_rows($res);
			while(list($mid ,$adminmenu,$sortorder,$modul)=mysql_fetch_row($res)){
				$res_author = mysql_query("Select view   from $prefix"._modules_authors." where aid= '$aid' and module = '$modul' ");
				$view_module = mysql_num_rows($res_author);
				IF($aid=="admin"){
				echo'
				  <div style="height:36px;">
					<span style="padding-left:5px;"><img src="images/'.$sortorder.'.png" align=absmiddle >&nbsp;&nbsp;'.$adminmenu.'</span>';
					$res_submenu = mysql_query("Select fid ,title_vietnamese,url  from $prefix"._modules_functions." where mid  = '$mid' order by sort_order ");
					while(list($fid ,$subadminmenu,$url)=mysql_fetch_row($res_submenu)){
						echo'<a href="../'.$url.'">'.$subadminmenu.'</a>';
					}				
				  echo'</div>';
				}ELSEIF($view_module){
				echo'
				  <div style="height:36px;">
					<span style="padding-left:5px;"><img src="images/'.$sortorder.'.png" align=absmiddle >&nbsp;&nbsp;'.$adminmenu.'</span>';
					$res_submenu = mysql_query("Select a.fid ,a.title_vietnamese,a.url  
												from $prefix"._modules_functions." a 
												left join $prefix"._modules_authors." b
												on(a.fid=b.funcs)
												where a.mid  = '$mid' and b.aid='$aid'
												order by a.sort_order ");
					while(list($fid ,$subadminmenu,$url)=mysql_fetch_row($res_submenu)){
						echo'<a href="../'.$url.'">'.$subadminmenu.'</a>';
					}				
				  echo'</div>';
				}
			}
	
		?>	
		<?IF($aid=="admin"){?>
			<div style="height:36px;">
			<span style="padding-left:2px;"><img src="images/setting.png" align=absmiddle>&nbsp;&nbsp;Quản trị hệ thống</span>
			<a href="../admin.php?op=Configure" ><?echo _CONFIGADMIN?></a>
			<a href="../admin.php?op=mod_authors" ><?echo _PHANQUYENQUANTRI?></a>
			<a href="../admin.php?op=LogSystem" ><?echo _LOGSYSTEM?></a>
			<a href="../admin.php?op=modules" ><?echo _MODULEADMIN?></a>
			<a href="../admin.php?op=mod_constants" ><?echo _LANGUAGEADMIN?></a>
			<a href="../admin.php?op=optimize" ><?echo _TOIUUDULIEU?></a>
			<a href="modules/mysql.php" ><?echo _BACKUPRESTORE?></a>
			</div>
		<?}?>	
			<div style="height:36px;" onclick="window.open('../admin.php?op=Help','HELP','width=850,height=600')" style="cusor:hand;">
			<span style="padding-left:2px;"><img src="images/help.png" align=absmiddle>&nbsp;&nbsp;Hướng dẫn sử dụng</span>
			</div>
			<div onclick="javascript:window.location='../admin.php?op=logout'">
			<span><img src="images/logout.gif" valign=top>&nbsp;&nbsp;Thoát khỏi hệ thống</span>
			</div>
		</div>
		<div style="background:#EFEEEC">
			 <img src="images/logo.png">
			 <div style="width:210px;font-size:8pt;color:#333;padding-left:10px;">
			 Copyright &copy; 2008. VNNetsoft Co., Ltd.	<br>
			 Add: 151 Phương Mai, Đống Đa - Hà Nội.<br>
			 Tel : (84-4) 35763250 <br> Fax: (84-4) 35763073<br>
			 Mail: info@vnnetsoft.com<br>
			 </div>
		</div>
	</DIV>

</DIV>
<IFRAME id=main src="" frameBorder=no></IFRAME></BODY></HTML>
<?}?>