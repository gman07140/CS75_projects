$(document).ready(function() 
{
	$(".update").click( function()  
	{
		// validate the quantity...
		var qq = $(this).parent().find('.quantity').val();
		
		if (qq > 10)
		{
			alert("please call store for large orders");
			$(this).parent().find('.quantity').focus();
			return false;
		}
		else if (qq < 1)
		{
			alert("please enter a quantity greater than 0");
			$(this).parent().find('.quantity').focus();
			return false;
		}
		else if (isNaN(qq))
		{
			alert("please enter a valid number");
			$(this).parent().find('.quantity').val('');
			$(this).parent().find('.quantity').focus();
			return false;
		}

	});
});