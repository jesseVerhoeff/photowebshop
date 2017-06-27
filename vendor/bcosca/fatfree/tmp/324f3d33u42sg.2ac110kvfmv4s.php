<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>F3 Sample Project Login Page</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/signin.css" rel="stylesheet">

</head>

<body class="buffer-pinterest">

<div class="container">

    <form class="form-signin" method="POST" action="/admin/authenticate/<?php echo $item; ?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="adminEmail" class="sr-only">Adminemail</label>
        <input type="text" id="adminEmail" name="adminEmail" class="form-control" placeholder="Admin Email" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        <input type="hidden" id="link" value="<?php echo $item; ?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->

</body>
</html>