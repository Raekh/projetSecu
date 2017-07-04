<?php
include('library.php');

if(!isset($_SESSION['user'])){
  header('Location: index.php');
  die();
}
if(!empty($_SESSION["POST"])){
  if($_SESSION['POST']['operation']=="modify"){
    $idMessage = $_SESSION['POST']['idMessage'];
    $_SESSION['POST'] = "";
    $message = DaoMessage::getMessage($idMessage);
  }
}
else{
  header('Location: messages.php');
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
  <title>Modifier</title>
  <link rel="stylesheet" type="text/css" href="styles\login.css"/>
</head>
<body>
  <div class="container">
    <div class="card card-container">
      <form class="form-signin" method="post" action="action.php">
        <input type="hidden" name="idMessage" value="<?php echo $message["idMessage"] ?>"/>
        <input type="text" name="title" id="inputPseudo" class="form-control" placeholder="Titre du message" value="<?php echo $message['messageTitle']?>" required autofocus>
        <input type="text" name="content" id="inputPassword" class="form-control" placeholder="Contenu" value="<?php echo $message['content']?>" required>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="operation" value="newChanges">Modifier le message</button>
      </form><!-- /form -->
    </div><!-- /card-container -->
  </div><!-- /container -->
</body>
</html>
