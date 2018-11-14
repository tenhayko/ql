$(document).ready(function(){
	//$("#lan2").hide();
});
function thu(e,name_sp){
	//alert(e);
	 if(name_sp!='')
{
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Check_sanpham',
							data: "name_sp="+name_sp,
							success: function (ketqua) {
							
								$(".giasanpham_"+e).html(ketqua);
								
								//$("#lan2").show();
								if(ketqua != 0){
									var lansau = parseInt(e) +1;
									var id = "name_sp_"+lansau;
									var class_lansau = "giasanpham_"+lansau;
							//	alert(class_lansau);
								$(".col-md-12").append('<div class="form-group form-group-sm" ><label class="col-sm-2 control-label" for="textinput">Ma san pham '+lansau+'</label> <div class="col-sm-4"><input type="text" placeholder="Ma san pham '+lansau+'" class="form-control" size="50" onkeypress="thu('+lansau+',this.value)" id='+id+' ></div> <div class="col-sm-4"><span class='+class_lansau+'></span></div></div>');
									
								}
								//document.getElementById("nhapnoidung").value = '';
							}
						 })
}

}

/*$(function(){
	$("#name_sp").keyup(function() 
{ 
var name_sp = $(this).val();
id = 1;
 if(name_sp!='')
{
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Check_sanpham',
							data: "name_sp="+name_sp,
							success: function (ketqua) {
							
								$(".giasanpham").html(ketqua);
								
								//$("#lan2").show();
								if(ketqua != 0){
								$(".col-md-12").append('<div class="form-group form-group-sm" >');
								$(".col-md-12").append('<label class="col-sm-2 control-label" for="textinput">Ma san pham 2</label>');
								$(".col-md-12").append(' <div class="col-sm-4">');
								$(".col-md-12").append('<input type="text" placeholder="Ma san pham 2" class="form-control" id="name_sp_2" size="100">');
								$(".col-md-12").append(' </div>');
								$(".col-md-12").append(' <div class="col-sm-4">');
								$(".col-md-12").append(' <span class="giasanpham_2"></span>');
								$(".col-md-12").append('</div>');
								$(".col-md-12").append('</div>');
									
								}
								//document.getElementById("nhapnoidung").value = '';
							}
						 })
}
});
})
$(function(){
	$("#name_sp_2").keyup(function() 
{ 
var name_sp_2 = $(this).val();
 if(name_sp_2!='')
{
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Check_sanpham',
							data: "name_sp_2="+name_sp_2,
							success: function (ketqua2) {
							
								$(".giasanpham_2").html(ketqua2);
								
								//$("#lan2").show();
								if(ketqua2 != 0){
								$(".col-md-12").append('<div class="form-group form-group-sm" >');
								$(".col-md-12").append('<label class="col-sm-2 control-label" for="textinput">Ma san pham 3</label>');
								$(".col-md-12").append(' <div class="col-sm-4">');
								$(".col-md-12").append('<input type="text" placeholder="Ma san pham 3" class="form-control" id="name_sp_3" size="100">');
								$(".col-md-12").append(' </div>');
								$(".col-md-12").append(' <div class="col-sm-4">');
								$(".col-md-12").append(' <span class="giasanpham_3"></span>');
								$(".col-md-12").append('</div>');
								$(".col-md-12").append('</div>');
								}
								//document.getElementById("nhapnoidung").value = '';
							}
						 })
}
});
})*/