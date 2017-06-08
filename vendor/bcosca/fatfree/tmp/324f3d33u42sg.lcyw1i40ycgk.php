<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

</head>

<body class="buffer-pinterest">

<div class="container">

    <form class="form-signin" method="POST" action="/registeraccount">
        <h2 class="form-signin-heading">Register</h2>

        <div class="form-group">
             <label for="useremail" class="sr-only">Username</label>
             <input type="text" id="useremail" name="useremail" class="form-control" placeholder="Email adres" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Wachtwoord" required="">
        </div>

        <div class="form-group">
            <label for="username" class="sr-only">userName</label>
            <input type="text" id="userName" name="userName" class="form-control" placeholder="Voornaam" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="userLastname" class="sr-only">userLastname</label>
            <input type="text" id="userLastname" name="userLastname" class="form-control" placeholder="Achternaam" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="userUsername" class="sr-only">userUsername</label>
            <input type="text" id="userUsername" name="userUsername" class="form-control" placeholder="gebruikers naam" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="userStreet" class="sr-only">userStreet</label>
            <input type="text" id="userStreet" name="userStreet" class="form-control" placeholder="Straat naam" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="usercity" class="sr-only">usercity</label>
            <input type="text" id="usercity" name="usercity" class="form-control" placeholder="Stad" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="userZipcode" class="sr-only">userZipcode</label>
            <input type="text" id="userZipcode" name="userZipcode" class="form-control" placeholder="1234AA" pattern ="{6}" required="" autofocus="">
        </div>

        <div class="form-group">
            <label for="userHomenumber" class="sr-only">userHomenumber</label>
            <input type="number" id="userHomenumber" name="userHomenumber" class="form-control" placeholder="Huisnummer" required="" autofocus="">
        </div>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

</div> <!-- /container -->

</body>
</html>