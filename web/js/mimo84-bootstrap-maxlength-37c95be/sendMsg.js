jQuery(document).ready(function(){
	var index = 2;
  jQuery('#sendmsgform-msg').maxlength({
  		threshold: 20,
  		alwaysShow: true,
  		warningClass: "label label-success"
      });
  function getMajorYear(id){
  	var tmp = id.split(',');
  	major = tmp[0];
  	year = tmp[1];
  	return $('#x-'+major+'-'+year).text();
  }
	/* toggle all checkboxes in group */
	$('.all').click(function(e){
		e.stopPropagation();
		var $this = $(this);
	    if($this.is(":checked")) {
	    	$this.parents('.list-group').find("[type=checkbox]").prop("checked",true);
	    }
	    else {
	    	$this.parents('.list-group').find("[type=checkbox]").prop("checked",false);
	        $this.prop("checked",false);
	    }
	    update_checkBox();
	});

	$('[type=checkbox]').click(function(e){
	  e.stopPropagation();
		update_checkBox();	
	});

	var update_checkBox = function(){
		var $ans = "";
		var $text_ans = "";
		$temp = $("[name=CheckYear]");
		console.log($temp);
		$temp.each(function(index){
			if($($temp[index]).is(":checked")){
				$ans = $ans+" "+$($temp[index]).attr('value');
				$text_ans = $text_ans+" <span class='label label-default'>"+getMajorYear($($temp[index]).attr('value'))+"</span>";
			}
				//console.log($($temp[index]).attr('value'));
		});
		if($ans.length>0){
			$ans = $ans.substring(1);
			$text_ans = $text_ans.substring(1);
		}
		$('#sendmsgform-lstmy').attr('value',$ans);
		$('#confirm-to').html("<strong>To:</strong> "+$text_ans);
		console.log($text_ans);
		//console.log($lstYear);
	}
	/* toggle checkbox when list group item is clicked */
	$('.list-group a').click(function(e){
	  
	    e.stopPropagation();
	  
	  	var $this = $(this).find("[type=checkbox]");
	    if($this.is(":checked")) {
	    	$this.prop("checked",false);
	    }
	    else {
	    	$this.prop("checked",true);
	    }
	  
	    if ($this.hasClass("all")) {
	    	$this.trigger('click');
	    }
	    update_checkBox();
	    //console.log($this.attr('value'));
	});

	$('.btn').click(function(e){
		$('#confirm-msg').text($('#sendmsgform-msg').val());
	});
});