$('input#name-submit').on('click', function() {    		
    var adName = $('input#adName').val();		   		
    if ($.trim(name) != '') {			   		
	$.post('name.php', {adName: adName}, function(data) {	
	    alert(data);			//replace this line with 'alert(data);' to show php output as an alert
	});							
    }								
});
