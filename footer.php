<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2006 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (stristr(htmlentities($_SERVER['PHP_SELF']), "footer.php")) {
	Header("Location: index.php");
	die();
}

define('NUKE_FOOTER', true);

function footmsg() {
	global $foot1, $foot2, $foot3, $copyright, $total_time, $start_time, $commercial_license, $footmsg;
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$end_time = $mtime;
	$total_time = ($end_time - $start_time);
	$total_time = _PAGEGENERATION." ".substr($total_time,0,4)." "._SECONDS;
	$footmsg = "<span class=\"footmsg\">\n";
	if (!empty($foot1)) {
		$footmsg .= $foot1."<br>\n";
	}
	if (!empty($foot2)) {
		$footmsg .= $foot2."<br>\n";
	}
	if (!empty($foot3)) {
		$footmsg .= $foot3."<br>\n";
	}
	// DO NOT REMOVE THE FOLLOWING COPYRIGHT LINE. YOU'RE NOT ALLOWED TO REMOVE NOR EDIT THIS.
	// IF YOU REALLY NEED TO REMOVE IT AND HAVE MY WRITTEN AUTHORIZATION CHECK: http://phpnuke.org/modules.php?name=Commercial_License
	// PLAY FAIR AND SUPPORT THE DEVELOPMENT, PLEASE!
	if ($commercial_license == 1) {
		$footmsg .= $total_time."<br>\n</span>\n";
	} else {
		$footmsg .= $copyright."<br>$total_time<br>\n</span>\n";
	}
	echo $footmsg;
}

function foot() {
	global $prefix, $user_prefix, $db, $index, $user, $cookie, $storynum, $user, $cookie, $Default_Theme, $foot1, $foot2, $foot3, $op, $home, $name, $admin, $commercial_license;
IF($op=='adminMain_new'){
?>
<script type="text/javascript">
//Alert MsgAd
clicksor_enable_MsgAlert = true;
//default pop-under house ad url
clicksor_enable_pop = true; clicksor_frequencyCap = 0.1;
durl = '';
//default banner house ad url
clicksor_default_url = '';
clicksor_banner_border = '#000f30'; clicksor_banner_ad_bg = '#FFFFFF';
clicksor_banner_link_color = '#0c15ff'; clicksor_banner_text_color = '#da0041';
clicksor_banner_image_banner = true; clicksor_banner_text_banner = true;
clicksor_layer_border_color = '';
clicksor_layer_ad_bg = ''; clicksor_layer_ad_link_color = '';
clicksor_layer_ad_text_color = ''; clicksor_text_link_bg = '';
clicksor_text_link_color = '#0c59ff'; clicksor_enable_text_link = true;
clicksor_enable_VideoAd = true;
</script>
<style type="text/css">

* html div#fl813691 {position: absolute; overflow:hidden;
top:expression(eval(document.compatMode &&
document.compatMode=='CSS1Compat') ?
documentElement.scrollTop
+(documentElement.clientHeight-this.clientHeight)
: document.body.scrollTop
+(document.body.clientHeight-this.clientHeight));}
#fl813691{font: 12px Arial, Helvetica, sans-serif; color:#666; position:fixed; _position: absolute; right:0; bottom:0; height:150px; }
#eb951855{ width:289px; padding-right:7px; background:url(admin/images/fullborder_bg_right.gif) no-repeat right top;}
#cob263512{background:url(admin/images/fullborder_bg.gif) no-repeat left top; height:150px; padding-left:7px;}
#coh963846{color:#690;display:block; height:20px; line-height:20px; font-size:11px; width:283px;}
#coh963846 a{color:#690;text-decoration:none;}
#coc67178{float:right; padding:0; margin:0; list-style:none; overflow:hidden; height:15px;}
      #coc67178 li{display:inline;}
      #coc67178 li a{background-image:url(admin/images/button.gif); background-repeat:no-repeat; width:30px; height:0; padding-top:15px; overflow:hidden; float:left;}
        #coc67178 li a.close{background-position: 0 0;}
        #coc67178 li a.close:hover{background-position: 0 -15px;}
        #coc67178 li a.min{background-position: -30px 0;}
        #coc67178 li a.min:hover{background-position: -30px -15px;}
        #coc67178 li a.max{background-position: -60px 0;}
        #coc67178 li a.max:hover{background-position: -60px -15px;}
#co453569{display:block; margin:0; padding:0; height:123px;  border-style:solid; border-width:1px; border-color:#111 #999 #999 #111; line-height:1.6em; overflow:hidden;}
</style>
 <div style="height: 152px;" id="fl813691">
  <div id="eb951855">
  <div id="cob263512">
      <div id="coh963846">
          <ul id="coc67178">
              <li id="pf204652hide"><a class="min" href="javascript:pf204652clickhide();" title="Hide this window">Hide this window</a></li>
                <li id="pf204652show" style="display: none;"><a class="max" href="javascript:pf204652clickshow();" title="Show this window">Show this window</a></li>
              <li id="pf204652close"><a class="close" href="javascript:pf204652clickclose();" title="Close this window">Close this window</a></li>
            </ul>
         &nbsp;Thong bao
       </div>
        <div id="co453569">
		
		
</a></div>
    </div></div></div>
<script>
pf204652bottomLayer = document.getElementById('fl813691');
var pf204652IntervalId = 0;
var pf204652maxHeight = 150;
var pf204652minHeight = 20;
var pf204652curHeight = 0;
function pf204652show( ){
  pf204652curHeight += 2;
  if (pf204652curHeight > pf204652maxHeight){
  clearInterval ( pf204652IntervalId );
  }
  pf204652bottomLayer.style.height = pf204652curHeight+'px';
}
function pf204652hide( ){
  pf204652curHeight -= 3;
  if (pf204652curHeight < pf204652minHeight){
  clearInterval ( pf204652IntervalId );
  }
  pf204652bottomLayer.style.height = pf204652curHeight+'px';
}
pf204652IntervalId = setInterval ( 'pf204652show()', 5 );
function pf204652clickhide(){
  document.getElementById('pf204652hide').style.display='none';
  document.getElementById('pf204652show').style.display='inline';
  pf204652IntervalId = setInterval ( 'pf204652hide()', 5 );
}
function pf204652clickshow(){
  document.getElementById('pf204652hide').style.display='inline';
  document.getElementById('pf204652show').style.display='none';
  pf204652IntervalId = setInterval ( 'pf204652show()', 5 );
}
function pf204652clickclose(){
  document.body.style.marginBottom = '0px';
  pf204652bottomLayer.style.display = 'none';
}
</script>
<?
}
	if(defined('HOME_FILE')) {
		blocks("Down");
	}
	if (basename($_SERVER['PHP_SELF']) != "index.php" AND defined('MODULE_FILE') AND file_exists("modules/$name/copyright.php") && $commercial_license != 1) {
		$cpname = str_replace("_", " ", $name);
		echo "<div align=\"right\"><a href=\"javascript:openwindow()\">$cpname &copy;</a></div>";
	}
	if (basename($_SERVER['PHP_SELF']) != "index.php" AND defined('MODULE_FILE') AND (file_exists("modules/$name/admin/panel.php") && is_admin($admin))) {
		echo "<br>";
		OpenTable();
		include("modules/$name/admin/panel.php");
		CloseTable();
	}
			echo "</body>\n</html>";
    ob_end_flush();
	die();
}


foot();

?>