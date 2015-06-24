<html>
<head>
</head>
<body>
<script type-"text/javascript">
function validate(form_id, email)
{
	var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
	var address = document.forms[form_id].elements[email].value;

	//if (address == '' || !reg.test(address()))
	if (reg.test(address) == false)
	{
		alert('Invalid email address')
		document.forms[form_id].elements[email].focus();
		return false
	}
}
</script>

<form id="email_form" method="get" action="submit_successful.html" onsubmit="javascript:return validate('email_form','email');">
<p>Enter email:</p>
<input id="email" placeholder="email" type="text" name="email" />
<input type="submit" value="submit" />
</form>
</body>
</html>