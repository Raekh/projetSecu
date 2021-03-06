<?php
include('library.php');

if(isset($_SESSION['user'])){
  header('Location: index.php');
  die();
}
?>
<!--
you can substitue the span of reauth email for a input with the email and
include the remember me checkbox
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="styles\login.css"/>
</head>
<body>
  <div class="container">
    <div class="card card-container">
      <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
      <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
      <p id="profile-name" class="profile-name-card"></p>
      <form class="form-signin" method="post" action="action.php">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" name="pseudo" id="inputPseudo" class="form-control" placeholder="Pseudonyme" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="operation" value="login">Se connecter</button>
      </form><!-- /form -->
    </div><!-- /card-container -->
  </div><!-- /container -->
</body>
</html>
