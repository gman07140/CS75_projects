$(document).ready(function() 
{
	$("#select").click( function() 
	{
		formblock= document.getElementById('form1');
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
		
		//check if any boxes were checked, alert user if none were
		if (arry.length < 1)
		{
			sweetAlert("Please select at least one picture");
		}
	});
});