// set focus on field when page loads
$(document).ready(function()
{
	$("#pass").focus();
});

$("#submit").click( function() {

 	var pass = $("#pass").val();
 	var confirm = $("#confirm").val();

 	if(pass == "")
	{
	    $("#passack").html("Please enter a password.");
	    $("#confirmack").empty();
	    $("#pass").focus();
	    return false;
	}
	else if(confirm == "")
	{
	    $("#confirmack").html("Please confirm the password!");
	    $("#passack").empty();
	    $("#confirm").focus();
	}
	else if(pass !== confirm)
	{
	    $("#confirmack").html("Passwords do not match!");
	    $("#passack").empty();
	    $("#confirm").focus();
	}

	else
	{
	  $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
			    $("#confirmack").html(info);
			    $("#success").show();
			    clear();

			 });
	}

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