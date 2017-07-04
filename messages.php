<?php
include('library.php');

if(!isset($_SESSION['user'])){
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
      <div class="form-signin">
        <h3><?php echo $_SESSION['user']['pseudo'] ?></h3>
        <h4>Messages :</h4>
        <?php
        $messages = DaoMessage::getAllMessages();
        if(empty($messages)){
          echo "Aucun message à afficher.";
        }
        else{
          foreach($messages as $message){
            ?>
            <div class="card">
              <div class="card-header">
                <h3><?php echo $message['pseudoUser'] ?></h3>
                <h4><?php echo $message["messageTitle"] ?></h4>
                <?php if($message["pseudoUser"]==$_SESSION['user']['pseudo']){ ?>

                  <form method="post" action="action.php">
                    <input type="hidden" name="idMessage" value="<?php echo $message["idMessage"] ?>"/>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" name="operation" value="modify" type="submit">Modifier</button>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" name="operation" value="delete" type="submit">Supprimer</button>
                    <?php } ?>
                  </div>
                  <div class="card-content">
                    <h4><?php echo $message["content"] ?></h4>
                  </div>
                </div>';
                <?php
              }
            }
            ?>
            <a style="text-decoration:none" href='index.php'>
              <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Retour</button>
            </a>
          </form><!-- /form -->
        </div><!-- /card-container -->
      </div><!-- /container -->
    </body>
    </html>
