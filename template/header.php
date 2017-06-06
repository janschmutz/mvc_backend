<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Page Title</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link rel="stylesheet" type="text/css" href="template/css/style.css">



</head>
<body>

  <header class="header cf" role="banner">

  	<a href="index.php">Home</a>
  	<a href="?view=articles">Blog</a>
   <a href="?view=lessons">Lessons</a>

	<a href="?view=users&layout=register">Register</a>
	<a href="?view=users">Login</a>
	<a href="?task=logout">Logut</a>


	<span>
		User Id: <?php echo $_SESSION['userID']; ?>
	</span>

  </header>



  <main class="main" role="main">

     <?php if(!$_SESSION['userID']) : ?>
       <p>Bitte zuerst <a href="login.php">einloggen</a></p>
    <?php else: ?>
      
    <?php endif; ?>
