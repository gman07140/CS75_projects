$(document).ready(function()
{
	//https://www.youtube.com/watch?v=GrycH6F-ksY (jQuery Tutorials: Submitting a Form with AJAX, phpacademy)
	$('form.ajax').on('submit', function() 
	{
		var email = $("#email").val();

		if($.trim(email) == "")
		{
		    $("#emailack").html("Please enter your email");
		    $("#email").focus();
		    $("#progress").empty();
		    return false;
		}

		$("#emailack").empty();
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};

		that.find('[name]').each(function(index,value) {
			var that = $(this),
				name = that.attr('name'),
				value = that.val();

			data[name] = value;
		});

		$.ajax({
			url: url,
			type: type,
			data: data,
			//http://stackoverflow.com/questions/4448955/loading-gif-image-while-jquery-ajax-is-running (1st response)
			beforeSend: function() {
			    $('#progress').html("<img src='css/images/ajax-loader.gif' />");
			  },
			success: function(html) {
			    $('#progress').html(html);
			  }
		})
		return false;
	});
});