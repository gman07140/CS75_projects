$("#submit").click( function() {
 	var adName = $("#adName").val();
 	var pass = $("#adPassword").val();

	if($.trim(adName) == "")
	{
	    $("#nameack").html("Please enter a name");
	    $("#passack").empty();
	    $("#adName").focus();
	}
	else if($.trim(pass) == "")
	{
	    $("#passack").html("Please enter a password");
	    $("#nameack").empty();
	    $("#adPassword").focus();
	}

	else
	  $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
			   $("#passack").html(info);
			 });
 
	$("#myForm").submit( function() {
	   return false;
	});
});
 
function clear() {
 
	$("#myForm :input").each( function() {
	      $(this).val("");
	});
}