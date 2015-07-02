function validate(form_id, email)
{
	var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
	var address = document.forms[form_id].elements[email].value;

	//if (address == '' || !reg.test(address()))
	if (reg.test(address) == false)
	{
		document.forms[form_id].elements[email].focus();
		return false;
	}
}

// set focus on field when page loads
$(document).ready(function()
{
	$("#username").focus();
});

$("#submit").click( function() {
 	var user = $("#username").val();
 	var pass = $("#pass").val();
 	var confirm = $("#confirm").val();
	if($.trim(user) == "")
	{
	    $("#ack").html("Please enter a username.");
	    $("#wack").empty();
	    $("#cwack").empty();
	    $("#wwack").empty();
	    $("#username").focus();
	}
	else if($.trim(pass) == "")
	{
	    $("#wack").html("Please enter a password.");
	    $("#ack").empty();
	    $("#cwack").empty();
	    $("#wwack").empty();
	    $("#pass").focus();
	}
	else if(confirm == "")
	{
	    $("#cwack").html("Please confirm the password!");
	    $("#ack").empty();
	    $("#wack").empty();
	    $("#wwack").empty();
	    $("#confirm").focus();
	}
	else if(pass !== confirm)
	{
	    $("#cwack").html("Passwords do not match!");
	    $("#ack").empty();
	    $("#awck").empty();
	    $("#wwack").empty();
	    $("#confirm").focus();
	}
	else if( validate('myForm','email') == false)
	{
		$("#wwack").html("Please enter a valid email address");
		$("#ack").empty();
		$("#wack").empty();
		$("#cwack").empty();
	}
	else
	  $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
			   $("#wwack").html(info);
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

//when the submit button is clicked...create new var 'name' with the value of users input into 'name' field...
//as long as the name is valid...//posting the data to the php file.  1st param is file for info to be posted
//2nd is a JSON object with the data to be sent. 1st 'name' refers to the variable declared on line 2, the second refers to value.  3rd arg is an anon function that returns the data given from the name.php file.