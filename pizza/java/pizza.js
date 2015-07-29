$(document).ready(function() 
{
	$("#submit").click( function()  
	{
		// get an array of all checked toppings.  Needs to be done by class
		checks = document.getElementsByClassName('topping');

		// get number of toppings available
		var num = $("#num").text();
		
		// build the array of checked toppings
		var arry = [];
		for (i = 0; i < checks.length; i++) 
		{
		    if (checks[i].checked)
		    {
		    	arry.push(checks[i].getAttribute('value'));
		    }
		}

		// yell at user if he/she has selected too many toppings
		if (arry.length > num)
		{
			alert("you are only allowed "+num+" toppings!");
			return false;
		}

		// validate the quantity...
		var qq = $("#quantity").val();
		
		if (qq > 10)
		{
			alert("please call store for large orders");
			return false;
		}
		else if (qq < 1)
		{
			alert("please enter a quantity greater than 0");
			return false;
		}

		console.log(qq);
	});
});