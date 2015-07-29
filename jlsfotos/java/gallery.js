var p = 0;
$(document).ready(function()
{
    // get all divs with class of 'detail'
    formblock= document.getElementsByClassName('detail');
 
    // when 'edit gallery' button clicked
    $("#show").click( function() {
        // if divs are not showing, show them. Else, hide them
        if (p == 0)
        {
            $("#remove").css("display","block");
            $('#show').val('done');                     // change button text
            for (i = 0; i < formblock.length; i++)
            {
                var det = formblock[i];
                $(det).css("display","block"); 
            }
            p = 1;
        }

        else
        {
            $("#remove").css("display","none");
            $('#show').val('Edit Gallery');                 
            for (j = 0; j < formblock.length; j++) 
            {
                var det = formblock[j];
                $(det).css("display","none"); 
            }
            p = 0;
        }       
    });
});