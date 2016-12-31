$(document).ready(function(){
	$(".loader").modal("show");
	$.ajax({
    url:'loaddashboard',
    type:'GET',
    cache:false,
    success:function(data){
      	$(".contents").html(data);
    }
  });

	$("#newusers").on("click", function(e){
		e.preventDefault();
		$(".loader").modal("show");
		$.ajax({
	    url:'loadteacherspage',
	    type:'GET',
	    cache:false,
	    success:function(data){
	      $(".contents").html(data);
	    }
	  });
	});

	$("body").on("submit","#newUserSchool",function(e){
	  e.preventDefault();
	    $.ajax({
        url:'CreateSchoolUser',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){  
         console.log(data);
        }
      });
	});
});