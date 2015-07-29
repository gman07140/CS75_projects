// ensure document is ready...
$(document).ready(function()
{
    // when user changes select box, do the following...
    $( 'select' ).change(function() {
    	var pasta = $( "#pasta" ).val();
    	formblock= document.getElementsByClassName('detail');
    	formblocky= document.getElementsByClassName('past');

    	if (pasta != 0)
    	{
    		for (i = 0; i < formblock.length; i++)
	        {
	            var det = formblock[i];
	            $(det).css("display","block"); 
	        }
	        for (j = 0; j < formblocky.length; j++)
	        {
	            var dets = formblocky[j];
	            $(dets).val(pasta);
	        }
	  
	        $("#item").css("display","block");
	        $("#item").text(pasta);
	    }
	    else
	    {
	    	for (j = 0; j < formblock.length; j++) 
            {
                var det = formblock[j];
                $(det).css("display","none"); 
            }
	        $("#item").css("display","none");

	    }
    });
});