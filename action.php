<?php
include('library.php');

if(isset($_POST)){
  switch($_POST["operation"]){
    case "login":
    if(!isset($_POST['user'])){
      $pseudo = $_POST["pseudo"];
      $password = $_POST["password"];
      if(DaoUser::loginUser($pseudo,$password)){
        $_SESSION["user"] = DaoUser::getUser($pseudo);
      }
    }
    break;

    case "modify":
      $_SESSION["POST"]["idMessage"] = $_POST["idMessage"];
      $_SESSION["POST"]["operation"] = $_POST["operation"];
      header('Location: modify.php');
      die();
      break;

      case "delete":
      $_SESSION["POST"]["idMessage"] = $_POST["idMessage"];
      $_SESSION["POST"]["operation"] = $_POST["operation"];
      header('Location: delete.php');
      die();
      break;

      case "newChanges":
      DaoMessage::updateMessage($_POST["idMessage"],$_POST["title"],$_POST["content"]);
      header('Location: messages.php');
      break;

      case "deleteConfirmed":
      DaoMessage::deleteMessage($_POST["idMessage"]);
      header('Location: messages.php');
      break;

      default:
      break;
    }
    var_dump($_SESSION);
    header("Location: index.php");
    die();
  }
  ?>
