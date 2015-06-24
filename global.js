$('input#pass-submit').on('click', function() {    		
    var pass = $('input#pass').val();		   		
    if ($.trim(pass) != '') {			   		
	$.post('name.php', {pass: pass}, function(data) {	
	    $('div#pass-data').text(data);
	});		
    }								
});

$('input#pass-submit').on('click', function() {    		
    var name = $('input#name').val();		   		
    if ($.trim(name) != '') {			   		
	$.post('name.php', {name: name}, function(data2) {	
	    $('div#name-data').text(data2);
	});		
    }								
});


//when the submit button is clicked...create new var 'name' with the value of users input into 'name' field...
//as long as the name is valid...//posting the data to the php file.  1st param is file for info to be posted
//2nd is a JSON object with the data to be sent. 1st 'name' refers to the variable declared on line 2, the second refers to value.  3rd arg is an anon function that returns the data given from the name.php file.
