$(document).ready(function() 
{
	$("#send").click( function() 
	{
		$.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
			 	$("#passack").html(info);
			 });
		return false;
	});
});