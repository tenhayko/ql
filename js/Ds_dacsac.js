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
	var name_disan = $("#name_disan").val();
	var huyen = $("#huyen").val();
	var xaphuong = $("#xaphuong").val();
	if (xaphuong == null)
	xaphuong = '';
	var page = $page;
var number_per_page = $number_per_page;
	var strURL="admin.php?op=Search_dacsac&name_disan="+name_disan+"&huyen="+huyen+"&xaphuong="+xaphuong+"&page="+page+ "&number_per_page="+number_per_page;
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
