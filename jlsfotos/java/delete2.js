$(document).ready(function() 
{
	$("#delete").click( function() 
	{
		formblock= document.getElementById('myForm');
		forminputs = formblock.getElementsByTagName('input');

		//build the array of checked users
		var arry = [];
		for (i = 0; i < forminputs.length; i++) 
		{
		    if (forminputs[i].checked)
		    {
		    	arry.push(forminputs[i].getAttribute('value'));
		    }
		}

		//check number of boxes checked, alert user if none were
		if (arry.length < 1)
		{
			sweetAlert("No client selected!");
		}

		//else post to php
		else
		{	
			$.post('delete.php',
			{arry: arry},
			function(info) {
						location.reload();
					 });
		}
		return false;
	});
});