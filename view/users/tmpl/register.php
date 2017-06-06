<?php if ( !defined('CMS_EXEC') ) { exit; } ?>

<h1>Register</h1>

<form action="?task=register" method="post">
	<input type="text" name="name" placeholder="Username" />
	<input type="text" name="password" placeholder="Password" />
	<input type="text" name="password2" placeholder="Repeat password" />
	<input type="text" name="returnUrl" value="?view=users" />
	<input type="submit" value="Register" />
</form>