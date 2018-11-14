$(document).ready(function(){
	timkiem(1,20);
});
function baocao_canbo(){
	timkiem(1,20);
}
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
	var name_khaisinh = $("#name_khaisinh").val();
	var phongban = $("#phongban").val();
	var date_picker = $("#date_picker").val();
	var page = $page;
var number_per_page = $number_per_page;
	var strURL="admin.php?op=BC_sinhnhat_Print&name_khaisinh="+name_khaisinh+"&phongban="+phongban+"&date_picker="+date_picker+"&page="+page+ "&number_per_page="+number_per_page;
		var req = getXMLHTTP();
		
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					$("#baocao_cbvc_div").show();
						document.getElementById('baocao_cbvc_div').innerHTML=req.responseText;
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
}
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
		function getState(countryId) {		
		
		var strURL="admin.php?op=Check_phong_nv&id_congty="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	
	function getCity(countryId,stateId) {		
		var strURL="admin.php?op=Check_bophan&country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}