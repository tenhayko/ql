<?php
global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db,$l_id_donvi,$nam_thang;

//===========================


//===========================
 IF($aid=="admin"){
 $ten="Quản trị tối cao";
 }ELSE{
	 $result_name = $db->sql_query("SELECT name from " . $prefix . "_authors a  where aid ='".$aid."'");
	 list($name_au) = mysql_fetch_row($result_name);
	 $ten=$name_au;
 }
//----------------hien thi thong tin 

$result = $db->sql_query("SELECT b.name from " . $prefix . "_hoso a

						left join " . $prefix . "_authors b
						on(a.email=b.email)

						left join " . $prefix . "_thongtincanhan d
						on(a.id_cb=d.id)

						left join " . $prefix . "_chucvu c
						on(d.chucdanh=c.name)





where b.aid='" . $aid . "' ");
($cv = $db->sql_fetchrow($result));

//============================================--	

	echo '
<div class="site_main">
        <div class="container">

        <div id="wrapper" class="active">
        <div class="left_2 " id="sidebar-wrapper">


            <div class="">
                <div class="admin_box">
                    <div class="admin_avatar">
                        <div style="padding: 10px">
                            <img src="'.$portalurl.'/admin/img/avatar.png" alt=""/>
                        </div>
                    </div>
                    <div class="admin_info">
                        <div style="padding: 10px">
                           
						   
						   <div class="click-nav">
							<ul class="no-js">
							<li>
							<a class="clicker"><strong>'.$cv['full_name'].''.$ten.'  <img src="'.$portalurl.'/images/arrow-down.gif" border="0" ></strong></a>
							<ul>';
							
							IF($aid=="admin" || $superadmin_module==1){
							
							echo '<li style=" line-height:24px"> <a href="'.$portalurl.'/quan-tri-he-thong" ><img src="'.$portalurl.'/images/arrow-r.gif" > <strong>Quản trị hệ thống</strong></a></li>
							
							
							<li style=" line-height:24px"> <a href="'.$portalurl.'/tu-dien-he-thong" ><img src="'.$portalurl.'/images/arrow-r.gif" > <strong>Từ điển hệ thống</strong></a></li>
							
							<li style=" line-height:24px"> <a href="'.$portalurl.'/phan-quyen-quan-tri" ><img src="'.$portalurl.'/images/arrow-r.gif" > <strong>Phân quyền quản trị</strong></a></li>
							
							';
							
							
							}
							echo '
							<li style=" line-height:24px"> <a href="'.$portalurl.'/doi-mat-khau" ><img src="'.$portalurl.'/images/arrow-r.gif" > <strong>Đổi mật khẩu</strong></a></li>
							</ul>
							</li>
							</ul>
							</div>
							
							
						   
						   
                            '.$cv['name'].'<br>
                            
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
				
				
				
                <div class=" ">
                    <div class="heading_item heading_item2 ">
                        <i class="fa fa-th-list" style="font-size: 15px;color: #44d0fb"></i>&nbsp;&nbsp;&nbsp; DANH MỤC
                    </div>
                    <div class=" menu_left menu_left2">
                        <ul>
                            
                           			
							';
							$i=1;
			$res = mysql_query("Select mid ,custom_title_".$currentlang.",sortorder,title   from $prefix"._modules." where inmenu  = '1' order by sortorder");
			$max = mysql_num_rows($res);
			while(list($mid ,$adminmenu,$sortorder,$modul)=mysql_fetch_row($res)){
				$res_author = mysql_query("Select view   from $prefix"._modules_authors." where aid= '$aid' and module = '$modul' ");
				$view_module = mysql_num_rows($res_author);

				$admin_author = mysql_query("Select superadmin    from $prefix"._modules_authors." where aid= '$aid' and module = 'Admin' ");
				list($superadmin_module) = mysql_fetch_row($admin_author);
				
							IF($aid=="admin" || $superadmin_module==1){
							echo


                                '<li style="background:#c6f5ff"><a style="text-transform:uppercase;">
                                &nbsp;&nbsp;<i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;'.$adminmenu.'</a>
								
								<ul>
								
								';
								//echo check_role($aid);
								//exit;
								if(check_role($aid)==1){
									echo '<li style="border-top:1px solid #ccc; border-bottom:1px solid #ccc;"><i class="fa fa-caret-right"></i><a href="'.$portalurl.'/admin.php?op=Add_vatthe_hungha" title="Thêm thông tin di sản"> Cập nhật thông tin di sản</a></li>';
								}
								$res_submenu = mysql_query("Select fid ,title_".$currentlang.",url  from $prefix"._modules_functions." where mid  = '$mid' order by sort_order ");
					while(list($fid ,$subadminmenu,$url)=mysql_fetch_row($res_submenu)){
						
									echo '<li><i class="fa fa-caret-right"></i><a  href="'.$portalurl.'/'.$url.'" title="'.$subadminmenu.'"> '.$subadminmenu.' </a></li>';
									}
								echo '</ul
                            </li>';
							
							}ELSEIF($view_module){
							
							
							echo '<li style="background:#c6f5ff"><a style="text-transform:uppercase;">
                                &nbsp;&nbsp;<i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;'.$adminmenu.'</a>
								
								<ul>
								';
								//echo "1";
								//exit;
								$res_submenu = mysql_query("Select a.fid ,a.title_".$currentlang.",a.url  
												from $prefix"._modules_functions." a 
												left join $prefix"._modules_authors." b
												on(a.fid=b.funcs)
												where a.mid  = '$mid' and b.aid='$aid'
												order by a.sort_order ");
					while(list($fid ,$subadminmenu,$url)=mysql_fetch_row($res_submenu)){						
									echo '<li><i class="fa fa-caret-right"></i><a href="'.$portalurl.'/'.$url.'" title="'.$subadminmenu.'"> '.$subadminmenu.' </a></li>';
									}
								echo '</ul>
                            </li>';
							
							
							}
							echo '<ul>';
							if(check_role($aid)==1){
								echo '<li style="border-top:1px solid #ccc; border-bottom:1px solid #ccc;"><i class="fa fa-caret-right"></i><a href="'.$portalurl.'/admin.php?op=Add_xahuyen" title="Thêm xã phường"> Thêm xã phường</a></li>
								<li style="border-top:1px solid #ccc; border-bottom:1px solid #ccc;"><i class="fa fa-caret-right"></i><a href="'.$portalurl.'/admin.php?op=Ds_thon" title="Danh sách thôn"> Danh sách thôn</a></li>
								</ul>';
							}
			}
			
			
			
			echo '


			</ul>';
			if(check_role($aid)==1){
			echo 	'<ul class="dropdown">
						<li style="background:#c6f5ff">
							<a class="" href="#">&nbsp;&nbsp;<i class="fa fa-keyboard-o"></i>&nbsp;&nbsp;&nbsp; QUẢN LÝ SLIDER
							</a>
	                    </li>
					<ul>
					<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i> <a href="'.$portalurl.'/admin.php?op=Ds_slider" title="Thêm xã phường">Danh sách ảnh slider</a>
					</li>
			</ul>
			<ul>';
			?>
			<ul class="dropdown">
				<li style="background:#c6f5ff">
					<a class="" href="#">&nbsp;&nbsp;<i class="fa fa-keyboard-o"></i>&nbsp;&nbsp;&nbsp; QUẢN LÝ NGƯỜI DÙNG
					</a>
                </li>
                <ul>
					<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i> <a href="<?=$portalurl?>/admin.php?op=mod_authors" title="Thêm xã phường">Danh sách người dùng</a>
					</li>
				</ul>
			</ul>
			<?php
		}
                        echo '<ul class="dropdown">

							<li style="background:#c6f5ff"><a class="" href="#">
                                &nbsp;&nbsp;<i class="fa fa-keyboard-o"></i>&nbsp;&nbsp;&nbsp; THỐNG KÊ BÁO CÁO</a>
                                  </li>

								<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
  
    
      <colgroup>
        <col class="col-xs-8">
        <col class="col-xs-4">
      </colgroup>
      <thead>
        <tr>
          <th>Tên di tích</th>
          <th class="text-center">';
          $result_edit_c = $db->sql_query("SELECT count(id) from " . $prefix . "_vatthe");
		  list($count_ditich) = $db->sql_fetchrow($result_edit_c);

          echo 'Tổng số <br/>('.$count_ditich.')</th>
        </tr>
      </thead>
      <tbody>';
      $ds_loai = $db->sql_query("SELECT *  from " . $prefix . "_name_disan
     order by id asc");
while ($row = $db->sql_fetchrow($ds_loai)) {
  echo "<tr class='row-loai'>
          <th scope='row' class='name'>
            ".$row['name']."
          </th>
           <th scope='row' class='text-center value'>".count_ditich_by_loai($row['id'])."</th>
        </tr>";
}
       
      echo '</tbody>
  </table>
</div>
                          
							
                        </ul>
                    </div>
                </div>

            </div>
        </div>';
?>
<!-- <script src="<?=$portalurl?>/js/jquery-1.9.1.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->


<script>
		$(function() {
			// Clickable Dropdown
			$(".refresh-list-online").click(function(){
				get_chat_msg();
			});
			
			$(".wrap-toggle-chat i.fa").click(function(){
				if($(this).hasClass("fa-sign-in")){
					$(this).removeClass("fa-sign-in").addClass("fa-sign-out");
					$(this).closest("#wrapper-chat").find(".wrap-form-chat").addClass("togglelog");
					get_chat_msg();
					
				}
				else{
					$(this).removeClass("fa-sign-out").addClass("fa-sign-in");
					$(this).closest("#wrapper-chat").find(".wrap-form-chat").removeClass("togglelog");
				}
			});
			//$(".wrap-message").niceScroll({cursorcolor:"#000"});
			// Clickable Dropdown
			$('[data-toggle="tooltip"]').tooltip();
			$('.click-nav > ul').toggleClass('no-js js');
			$('.click-nav .js ul').hide();
			$('.click-nav .js').click(function(e) {
				$('.click-nav .js ul').slideToggle(200);
				$('.clicker').toggleClass('active');
				e.stopPropagation();
			});
			$(document).click(function() {
				if ($('.click-nav .js ul').is(':visible')) {
					$('.click-nav .js ul', this).slideUp();
					$('.clicker').removeClass('active');
				}
			});
		});
</script>
<!--_______________________________________-->




<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
<script src="<?=$portalurl?>/js/tendina.min.js"></script>
<script>
    $('.dropdown_2').tendina({
        // This is a setup made only
        // to show which options you can use,
        // it doesn't actually make sense!
        animate: true,
        speed: 500,
        onHover: false,
        hoverDelay: 300
    })
</script>

		
		