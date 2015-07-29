// http://stackoverflow.com/questions/12897367/jquery-show-hide-divs-with-a-href-tag

$(document).ready(function()
{
	$("#Pizza").show();
	$('a.categories').click(function() {

	  var id = $(this).attr('name');
	  var divy = $("#"+id);
	  if ( divy.css('display') == 'none' )
	  {
	  	$('.every').hide();
	  	divy.show();
	  }
	  
	  return false;
	});

	$("#pastasubmit").click( function()  
	{
		var pasta = $("#pastas").val();
		if(pasta == 0)
		{
			$("#Pasta").show();
			alert("make a selection!");
			return false;
		} 
	});

});