$( "#submit" ).click(function( event ) {
	var arry = $("form").serializeArray();
	console.log("ok");
  	$.post($("#myForm").attr("action"),
			arry,
			function(info) {
						$("#success").html(info);
					 });
});

$( "#myForm" ).submit( function()
{
	return false;
})