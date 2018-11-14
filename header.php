<?php

if (stristr(htmlentities($_SERVER['PHP_SELF']), "header.php")) {
	Header("Location: index.php");
	die();
}

define('NUKE_HEADER', true);
require_once("mainfile.php");

##################################################
# Include some common header for HTML generation #
##################################################


function head() {
	global $slogan, $sitename, $name, $nukeurl, $Version_Num, $eshop, $topic, $hlpfile, $user, $hr, $theme, $cookie, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $forumpage, $adminpage, $userpage, $pagetitle,$portalurl;
	global $web_eshopname;
	$ThemeSel = get_theme();
	
 
    echo'
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">	
			';
	echo "<html>\n";
	echo "<head>\n";
	if($web_eshopname) echo "<title>$web_eshopname $pagetitle</title>\n";
	else echo "<title>$sitename $pagetitle</title>\n";
	

	if (file_exists("themes/$ThemeSel/images/favicon.ico")) {
		echo "<link REL=\"shortcut icon\" HREF=\"themes/$ThemeSel/images/favicon.ico\" TYPE=\"image/x-icon\">\n";
	}
	
	echo '<link rel="stylesheet" href="'.$portalurl.'/admin/css/admin.css" type="text/css" >';
	
	



		?>
        <script type="text/javascript" src="<?=$portalurl?>/js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});

</script> 
			<SCRIPT language=javascript > 
			messageObj = new DHTML_modalMessage();	// We only create one object of this class
			messageObj.setShadowOffset(5);	// Large shadow


			function displayMessage(url,width,height)
			{
				if(!width) width = 400;
				if(!height) height = 200;
				messageObj.setSource(url);
				messageObj.setCssClassMessageBox(false);
				messageObj.setSize(width,height);
				messageObj.setShadowDivVisible(true);	// Enable shadow for these boxes
				messageObj.display();
			}
			function closeMessage()
			{
				messageObj.close();	
			}
			//--> 
			</SCRIPT>
            <script language="javascript" type="text/javascript">

    function getXMLHTTP() { //fuction to return the xml http object
        var xmlhttp = false;
        try {
            xmlhttp = new XMLHttpRequest();
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e1) {
                    xmlhttp = false;
                }
            }
        }

        return xmlhttp;
    }

    function getState(countryId) {

        var strURL = "<?=$portalurl?>/admin.php?op=Sub_xahuyen&country=" + countryId;
        var req = getXMLHTTP();

        if (req) {

            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('statediv').innerHTML = req.responseText;
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }
    }
    function getCity(countryId, stateId) {
    }
</script>
			
		<?
	
	
}

 //-----------------------  
echo '
<title>'.$sitename.'</title>';


//echo '<LINK REL="StyleSheet" HREF="'.$portalurl.'/themes/WebBiz/style/admin.css" TYPE="text/css">';
echo '
<script type="text/javascript" src="'.$portalurl.'/js/tab/ajax.js"></script>
	<script type="text/javascript" src="'.$portalurl.'/js/tab/tab-view.js"></script>


	<script type="text/javascript" src="'.$portalurl.'/js/string.js"></script>
	<script type="text/javascript" src="'.$portalurl.'/js/modal-message.js"></script>
	<script type="text/javascript" src="'.$portalurl.'/js/ajax-dynamic-content.js"></script>
<LINK REL="StyleSheet" HREF="'.$portalurl.'/css/css/style/admin.css" TYPE="text/css">

';

	

		?>
        
        <link href="<?=$portalurl?>/css/style.css" rel="stylesheet">
        
        <link href="<?=$portalurl?>/css/default.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$portalurl?>/js/jquery.min.js"></script>
		<script type="text/javascript">
	jQuery(window).load(function() {

    $("#nav > li > a").click(function () { // binding onclick
        if ($(this).parent().hasClass('selected')) {
            $("#nav .selected div div").slideUp(100); // hiding popups
            $("#nav .selected").removeClass("selected");
        } else {
            $("#nav .selected div div").slideUp(100); // hiding popups
            $("#nav .selected").removeClass("selected");

            if ($(this).next(".subs").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next(".subs").children().slideDown(200);
            }
        }
    }); 

});

jQuery(window).load(function() {

    $("#nav2 > li > a").click(function () { // binding onclick
        if ($(this).parent().hasClass('selected')) {
            $("#nav2 .selected div div").slideUp(100); // hiding popups
            $("#nav2 .selected").removeClass("selected");
        } else {
            $("#nav2 .selected div div").slideUp(100); // hiding popups
            $("#nav2 .selected").removeClass("selected");

            if ($(this).next(".subs").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next(".subs").children().slideDown(200);
            }
        }
    }); 

});
</script>


	
    
        <?
		echo '
		




		

';
head();


?>