function saveData(formId,action_url,responseDiv='',changeDiv=''){
  formId = '#'+formId;
  emtyp_var = true;
  jQuery(formId).find(".input_error_msg").css("display","none");
  jQuery(formId+" .check_empty").each(function(){
    if(jQuery(this).val() == '') {
      jQuery(this).parent().find(".input_error_msg").css("display","block");
      jQuery(this).focus();
      emtyp_var = false;
      return false; 
    }
  })
  if(emtyp_var){
    var formData = new FormData(jQuery(formId)[0]);
    // $(".loader").css("transform", 'scale(1)');
    //$(".loader").css("display", 'block');
    $.ajax({
      url: action_url,
      data: formData,
	  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      type: 'POST',
      processData: false, 
      contentType: false,
      success: function (res) {
        //$(".loader").css("transform", 'scale(0)');
		var res = jQuery.parseJSON(res);
        if(res.status == 'success'){
			jQuery(formId)[0].reset();
          if(responseDiv !=''){
            $('.'+responseDiv).html('<div class="alert alert-success">'+res.msg+'</div>');
          }
          if(changeDiv != ''){
              $('.'+changeDiv).html('');
              $('.'+changeDiv).html(res.html);
           }
           if(responseDiv !=''){
            setTimeout(function(){ $('.'+responseDiv).html('');}, 4000);
            }
        } else {
        if(res.status == 'fail'){
            if(responseDiv != ''){
              $('.'+responseDiv).html('<div class="alert alert-danger">'+res.msg+'</div>');
               setTimeout(function(){$('.'+responseDiv).html('');}, 4000);
            }
          }
		if(res.status=='Session Expire'){
			window.location.href = BASEURL;
		}  
		  
        }
},
		error:function(){
		  //$(".loader").css("transform", 'scale(0)'); 
		  alert('An error has occurred');
		}
	});
  } 
}
/***************/
/***************/

