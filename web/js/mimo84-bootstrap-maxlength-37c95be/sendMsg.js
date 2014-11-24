jQuery(document).ready(function(){
	var index = 2;
  jQuery('#sendmsgform-msg').maxlength({
  		threshold: 20,
  		alwaysShow: true,
  		warningClass: "label label-success"
      });
  //$('#ListMenu').append($('#ListMenu_Hidden').html());
  var update_deleteBtn = function(){
	  $('#ListMenu input[no^="a"]').click(function(e) {
	  		console.log($(this).attr('no'));
	  		no = $(this).attr('no');
	  		$('#ListMenu div[no='+no+']').remove();
	  });
	}
  $('input#addList').click(function(e) {

  		$('#ListMenu_Hidden > div, #ListMenu_Hidden > div > input[no^="a"]').attr('no','a'+index);
  		//console.log($('#ListMenu_Hidden').html());
  		$tmp = $('#ListMenu').append($('#ListMenu_Hidden').html());
  		$('#ListMenu div[no='+'a'+index+']').hide();
  		$('#ListMenu div[no='+'a'+index+']').slideDown('200');
  		index++;

  		update_deleteBtn();
  });

  console.log($('input[name^="xxx[]"]').val());
});

