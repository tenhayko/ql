<?php
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$nam_thang;


//======================================	
echo '



<div class="right_2" style="padding-right: 0px !important; padding-left: 5px !important;" id="page-content-wrapper">
                <div class=" col_right">
                    <div class="url_top">
                        <a href="'.$portalurl.'/admin"><strong> Báo cáo thống kê</strong></a> 
                   
                   
                    </div>
                    <div class=" col-xs-12  ">


				<table width="100%" border="0">
  <tr>
    <td>&nbsp;';
	include 'map.php';
	//echo '<img  width="900px" src="'.$portalurl.'/images/log.png">' ;
	echo '</td>';
	
	//include 'map2.php';
	
	echo '
  </tr>
  <tr><td>&nbsp;';
include 'map2.php';
  echo '</td></tr>
</table>


                   </div>
                   <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

';

?>
