<?php
include('library.php');
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
      <div class="form-signin">
        <?php if(!isset($_SESSION['user'])){ ?>
          <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" onclick="location.href='login.php'">Connexion</button>
          <?php } else { ?>
            <h3>Hello, <?php echo $_SESSION['user']['pseudo'] ?>.</h3>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" onclick="location.href='messages.php'">Messages</button>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" onclick="location.href='logout.php'">Déconnection</button>
            <?php } ?>
          </form><!-- /form -->
        </div><!-- /card-container -->
      </div><!-- /container -->
    </body>
    </html>
