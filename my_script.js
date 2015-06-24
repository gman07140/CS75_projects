$("#submit").click( function() {
 
	if( $("#username").val() == "")
	  $("#ack").html("Username is mandatory field -- Please Enter.");
	else if( $("#pass").val() == "" )
	  $("#wack").html("Password is mandatory field -- Please Enter.");
	else
	  $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
 
			   $("#ack").empty();
			   $("#ack").html(info);
			   $("#wack").empty();
			   $("#wack").html(info);
				clear();
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
