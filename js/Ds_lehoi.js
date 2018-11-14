$(document).ready(function(){
	timkiem(1,10);
});

function tieptheo($page){
	var $number_per_page = $("#paginate_length").val();
     timkiem($page,$number_per_page);
}
function doiphantrang(){
	//alert('co toi');
        var $page = 1;
		var $number_per_page = $("#paginate_length").val();
        timkiem($page,$number_per_page);
}
function timkiem($page, $number_per_page){

	var ten_lenhoi = $("#ten_lenhoi").val();
	var xephang = $("#xephang").val();
	var huyen = $("#huyen").val();
	var xa = $("#xa").val();
	var thon = $("#thon").val();
	

	
	var page = $page;
var number_per_page = $number_per_page;
	var strURL="admin.php?op=Search_Ds_lehoi&ten_lenhoi="+ten_lenhoi+"&xephang="+xephang+"&huyen="+huyen+"&xa="+xa+"&thon="+thon+"&page="+page+ "&number_per_page="+number_per_page;
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
function get_xa(id){
	var xa = 0;
	 $.ajax({
			type: "POST",
			url: 'admin.php?op=Check_xa_lehoi',
			data: "id="+id+"$xa="+xa,
			success: function (ketqua2) {
				$("#statediv").html(ketqua2);
				timkiem(1,10);
			}
		 });
	}
function get_thon(id){
	var thon = 0;
	 $.ajax({
			type: "POST",
			url: 'admin.php?op=Check_thon_lehoi',
			data: "id="+id+"$thon="+thon,
			success: function (ketqua2) {
				$("#div_thon").html(ketqua2);
				timkiem(1,10);
			}
		 });
	}