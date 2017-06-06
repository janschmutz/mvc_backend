<?php if ( !defined('CMS_EXEC') ) { exit; } ?>

<h1>Login</h1>

<form action="?task=login" method="post">
	<input type="text" name="name" placeholder="Username" />
	<input type="text" name="password" placeholder="Password" />
	<input type="text" name="returnUrl" value="?view=articles" />
	<input type="submit" value="Login" />
</form>