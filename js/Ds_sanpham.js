$(document).ready(function(){
	$("#name_sp_1").focus();
});
function timkiem(){
	var ngaunhien = $("#ngaunhien").val();
	var strURL="admin.php?op=Search_Sanpham&ngaunhien="+ngaunhien;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
							
						document.getElementById('danhsach').innerHTML=req.responseText;		
										
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
}

function change_sluong(id,so_luong){
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Check_soluong',
							data: "id="+id+"&so_luong="+so_luong,
							success: function (ketqua) {
									timkiem();
									$("#name_sp_1").focus();
									document.getElementById("name_sp_1").value = "";
							}
	})
}
function laysoluong(e,soluong){
	var name_sp = $("#name_sp_"+e).val();
	if(soluong!=''){
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Check_sanpham',
							data: "name_sp="+name_sp+"&soluong="+soluong,
							success: function (ketqua) {
								
									
							}
	})
	 }
}
function laygiatri(e,name_sp){
	var ngaunhien = $("#ngaunhien").val();
	var soluong = $("#soluong_"+e).val();
						$.ajax({
													type: "GET",
													url: 'admin.php?op=Check_sanpham',
													data: "name_sp="+name_sp+"&soluong="+soluong+"&ngaunhien="+ngaunhien,
													success: function (ketqua) {
														
														timkiem();
														
														$("#name_sp_1").focus();
														document.getElementById("name_sp_1").value = "";
													}
							})
		
		
}
function xoa_sanpham(id){
	var ngaunhien = $("#ngaunhien").val();
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Delete_sanpham',
							data: "id="+id,
							success: function (ketqua) {
									timkiem();
									$("#name_sp_1").focus();
									document.getElementById("name_sp_1").value = "";
							}
	})
}


