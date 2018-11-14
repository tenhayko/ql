  $(document).ready(function(){
	  var funcst = $("#funcst").val();
	  var fid = $("#fid").val();
	  if(fid == '' && funcst == 1){
		  $(".timkiemdanhsach2").hide();
	  }else if(fid != '' && funcst == 1){
		   $(".timkiemdanhsach2").show();
	  }
	timkiem(1,10);
});
function timkiemnhansu(){
	timkiem(1,10);
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
	var name_thuoc = $("#name_thuoc").val();
	var dang_baoche = $("#dang_baoche").val();
	var funcst = $("#funcst").val();
	var page = $page;
var number_per_page = $number_per_page;
	var strURL="admin.php?op=Danhsach_function&dang_baoche="+dang_baoche+"&name_thuoc="+name_thuoc+"&funcst="+funcst+"&page="+page+ "&number_per_page="+number_per_page;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					$("#danhsachnhansu").show();					
						document.getElementById('danhsachnhansu').innerHTML=req.responseText;						
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


function validate(){
}