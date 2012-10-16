<html>
<head></head>
<body>
This form will automatically submit.
<form name="LoginForm" method="post" action="http://images.colum.edu/default.aspx" id="LoginForm">
	<input type="hidden" name="__EVENTTARGET" value="" />
	<input type="hidden" name="__EVENTARGUMENT" value="" />
	<input type="hidden" name="UsernameTextBox" id="UsernameTextBox" value="<?php echo $_GET['login'] ?>"  />
	<input type="hidden" name="PasswordTextBox" id="PasswordTextBox" value="<?php echo $_GET['password'] ?>" />
	<input type="submit" name="LoginButton" value="Login" onclick="if (typeof(Page_ClientValidate) == 'function') Page_ClientValidate(); " language="javascript" id="LoginButton" />
</form>
<script>
document.getElementById("LoginButton").click();
</script>
</body>
</html>
