jQuery(document).ready(function(){
	var count = 0;
	var isPlayComplete = false;
	$("#progress-complete").hide();
	var myFunction = function() {
		  if(count>=100){
		  	count=100;
		  	if(!isPlayComplete){
		  		$("#progress-complete").delay(1000).fadeIn(1000);
		  		isPlayComplete = true;
		  		setTimeout(function(){document.location="../send-to/index";},2000);
		  	}
		  }
          $('#progress').attr('style',"width: "+count+"%");
          $('#progress').text(count+"%");
          count += 1;
          //console.log('ok');
    }
    setInterval(function(){myFunction()},50);
});