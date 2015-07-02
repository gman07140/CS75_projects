// set focus on field when page loads
$(document).ready(function()
{
	$("#email").focus();
});

$("#submit").click( function() {
 	var email = $("#email").val();
 	var pass = $("#pass").val();

	if($.trim(email) == "")
	{
	    $("#emailack").html("Please enter an email");
	    $("#passack").empty();
	    $("#email").focus();
	}
	else if($.trim(pass) == "")
	{
	    $("#passack").html("Please enter a password");
	    $("#emailack").empty();
	    $("#pass").focus();
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