$(document).ready(function(){
	
	timkiem(1,50);
	
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
		var id_xa = $("#id_xa").val();
		var name = $("#name").val();
		var page = $page;
var number_per_page = $number_per_page;
		var strURL="admin.php?op=Ds_thon_Search&id_xa="+id_xa+"&name="+name+"&page="+page+"&number_per_page="+number_per_page;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					$("#danhsach").show();					
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
