// lấy  
$(document).ready(function() {
	Timkiem_nangcao(1,10);
});
function tieptheo($page){
	var $number_per_page = $("#paginate_length").val();
	 Timkiem_nangcao($page, $number_per_page);
}
function doiphantrang(){
	//alert('co toi');
        var $page = 1;
		var $number_per_page = $("#paginate_length").val();
		 Timkiem_nangcao($page, $number_per_page);
}
function Timkiem_nangcao($page, $number_per_page){
	var name_pvt = $("#name_pvt").val();
	var huyen = $("#huyen").val();
	var xaphuong =$("#xaphuong").val();
	if (xaphuong == null)
	xaphuong = '';
	var loai_ds = $("#loai_ds").val();
	var hientrang = $("#hientrang").val();
	var page = $page;
	var number_per_page = $number_per_page;
	var strURL="admin.php?op=Search_phivatthe&name_pvt="+name_pvt+"&loai_ds="+loai_ds+"&huyen="+huyen+"&xaphuong="+xaphuong+"&hientrang="+hientrang+"&page="+page+ "&number_per_page="+number_per_page;
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

