$(document).ready(function(){
	//document.getElementById("dulieu_tu").value  = 0;
	$("#dulieu").show();
	$("input[type='radio']").click(function(){
		var tab = $(this).attr("data-tab");
		$(".tab-pn").hide();
		var val = $(this).val();
		$(".tab-pn").each(function(){
		
			if($(this).attr("data-tab")==tab){
				$(this).show();
			}
		});
		$("#dulieu").val(val);
		$(".frm-search").show();
	});
});
function timkiembc(){
		var huyen = $("#huyen").val();
		var xaphuong = $("#xaphuong").val();
		if(xaphuong == null)
			xaphuong = "";
		var loai_ds = $("#loai_ds").val();
		var niendai = $("#niendai").val();
		var hientrang = $("#tinhtrang").val();
		var tomtat = $("#tomtat").val();
		var thoigian = $("#thoigian").val();
		var dientich_dat = $("#dientich_dat").val();
		var dientich_xd = $("#dientich_xd").val();
		var dulieu_tu = $("#dulieu").val();
		var tenditich = $("#tenditich").val();
		if(dulieu_tu == 1){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			tomtat="";
			thoigian="";
			dientich_dat="";
			dientich_xd="";
			tenditich="";
		}
		if(dulieu_tu == 2){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			thoigian="";
			dientich_dat="";
			dientich_xd="";
			tenditich="";
		}
		if(dulieu_tu == 3){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			tenditich="";
		}
		if(dulieu_tu == 4){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			tomtat="";
			thoigian="";
			tenditich="";
		}
		if(dulieu_tu == 5){
			loai_ds = "";
			hientrang = "";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			tenditich="";
		}
		if(dulieu_tu==6){
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			tenditich="";

		}
		if(dulieu_tu==7){
			huyen="";
			xaphuong="";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			loai_ds = "";
			tenditich="";
		}
		if(dulieu_tu==8){
			huyen="";
			xaphuong="";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			loai_ds = "";
			hientrang = "";
		}
		var strURL="admin.php?op=Search_BCvatthe&huyen="+huyen+"&xaphuong="+xaphuong+"&loai_ds="+loai_ds+"&niendai="+niendai+"&tomtat="+tomtat+"&thoigian="+thoigian+"&dientich_dat="+dientich_dat+"&dientich_xd="+dientich_xd+"&hientrang="+hientrang+"&tenditich="+tenditich;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					$("#danhsach_vatthe").show();					
						document.getElementById('danhsach_vatthe').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
}
function Export_Xls2(){
		var huyen = $("#huyen").val();
		var xaphuong = $("#xaphuong").val();
		if(xaphuong == null)
			xaphuong = "";
		var loai_ds = $("#loai_ds").val();
		var niendai = $("#niendai").val();
		var hientrang = $("#tinhtrang").val();
		var tomtat = $("#tomtat").val();
		var thoigian = $("#thoigian").val();
		var dientich_dat = $("#dientich_dat").val();
		var dientich_xd = $("#dientich_xd").val();
		var dulieu_tu = $("#dulieu").val();
		var tenditich = $("#tenditich").val();
		if(dulieu_tu == 1){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			tomtat="";
			thoigian="";
			dientich_dat="";
			dientich_xd="";
			tenditich="";
		}
		if(dulieu_tu == 2){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			thoigian="";
			dientich_dat="";
			dientich_xd="";
			tenditich="";
		}
		if(dulieu_tu == 3){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			tenditich="";
		}
		if(dulieu_tu == 4){
			loai_ds = "";
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			tomtat="";
			thoigian="";
			tenditich="";
		}
		if(dulieu_tu == 5){
			loai_ds = "";
			hientrang = "";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			tenditich="";
		}
		if(dulieu_tu==6){
			huyen="";
			xaphuong="";
			hientrang = "";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			tenditich="";

		}
		if(dulieu_tu==7){
			huyen="";
			xaphuong="";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			loai_ds = "";
			tenditich="";
		}
		if(dulieu_tu==8){
			huyen="";
			xaphuong="";
			niendai="";
			tomtat="";
			dientich_dat="";
			dientich_xd="";
			thoigian="";
			loai_ds = "";
			hientrang = "";
		}
		
			window.location="admin.php?op=Export_Baocao_vt&huyen="+huyen+"&xaphuong="+xaphuong+"&loai_ds="+loai_ds+"&niendai="+niendai+"&tomtat="+tomtat+"&thoigian="+thoigian+"&dientich_dat="+dientich_dat+"&dientich_xd="+dientich_xd+"&hientrang="+hientrang+"&tenditich="+tenditich;
		}
