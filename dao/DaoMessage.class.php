<?php

class DaoMessage{
  /**
  * Returns the user object defined by id
  * @param string $pseudo
  */
  public static function getMessage($idMessage){
    try{
      $req = Db::getConnection()->prepare("SELECT idMessage, pseudoUser, idTopic, messageTitle, content FROM MESSAGE WHERE idMessage = :idMessage");
      $req->execute(
        array(
          ":idMessage"=>$idMessage
        )
      );
      return $req->fetch();
    }
    catch(PDOException $e){
      echo $e->getMessage();
    };
  }

  /**
  * Returns all the messages
  */
  public static function getAllMessages(){
    $req = Db::getConnection()->prepare("SELECT idMessage, pseudoUser, idTopic, messageTitle, content FROM MESSAGE");
    $req->execute();
    return $req->fetchAll();
  }

/**
* Returns all the messages posted by one user
* @param String $pseudo
*/
  public static function getAllMessagesForUser($pseudo){
    $req = Db::getConnection()->prepare("SELECT idMessage, pseudoUser, idTopic, messageTitle, content FROM MESSAGE WHERE pseudoUser = :pseudo");
    $req->execute(
      array(
        ":pseudo"=>$pseudo)
    );
    return $req->fetchAll();
  }


  /**
  * Adds a message
  * @param String $pseudoUser
  * @param String $idTopic
  * @param String $messageTitle
  * @param String $content
  */
  public static function addMessage($pseudoUser,$idTopic,$messageTitle,$content){
    try{
      $req = Db::getConnection()->prepare("INSERT INTO MESSAGE (pseudoUser, idTopic, messageTitle, content) VALUES (:pseudoUser,:idTopic,:messageTitle,:content)");
      $req->execute(
        array(
          ":pseudoUser"=>$pseudoUser,
          ":idTopic"=>$idTopic,
          ":messageTitle"=>$messageTitle,
          ":content"=>$content)
        );
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    /**
    * Updates an user
    * @param Integer $idMessage
    * @param String $messageTitle
    * @param String $content
    */
    public static function updateMessage($idMessage, $messageTitle, $content){
      try{
        $req = Db::getConnection()->prepare("UPDATE MESSAGE SET content = :content, messageTitle = :messageTitle WHERE idMessage = :idMessage");
        $req->execute(
          array(
            ":content"=>$content,
            ":messageTitle"=>$messageTitle,
            ":idMessage"=>$idMessage
          )
        );
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    /**
    * Deletes a message
    * @param Integer $idMessage
    */
    public static function deleteMessage($idMessage){
      try{
        $req = Db::getConnection()->prepare("DELETE FROM MESSAGE WHERE idMessage = :idMessage");
        $req->execute(
          array(
            ":idMessage"=>$idMessage
          )
        );
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }


  }
