$(document).ready(function(e){
  $("body").on("click",".organizationid", function(e){
  	var organizationId=$(event.target).data("organizationid");
  	var orgid=$(".orgid").val(organizationId);
  	$(".addorganizationUsers").modal("show");
  });
});

$("body").on("click",".add_field_button", function(e){
	var max_fields      = 4; 
    var wrapper         = $(".input_fields_wrap"); 

     var x = 1;
     e.preventDefault();
        if(x < max_fields){ 
            x++; 
           $(wrapper).append('<div><input type="text" name="officephonenumbers[]" class="form-control" /><a href="#" class="remove_field">Remove</a></div>'); //add input box
       }

       $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});
