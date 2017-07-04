<?php

class DaoUser{
  /**
  * Returns the user object defined by id
  * @param string $pseudo
  */
  public static function getUser($pseudo){
    try{
      $req = Db::getConnection()->prepare("SELECT pseudo, pswd, mail FROM USER WHERE pseudo = :pseudo");
      $req->execute(
        array(
          ":pseudo"=>$pseudo
        )
      );
      return $req->fetch();
    }
    catch(PDOException $e){
      echo $e->getMessage();
    };
  }

  /**
  * Returns all the users
  */
  public static function getAllUsers(){
    $req = Db::getConnection()->prepare("SELECT pseudo, pswd, mail FROM USER");
    $req->execute();
    return $req->fetchAll();
  }

  /**
  * Adds an user
  * @param User $user
  */
  public static function addUser($user){
    try{
      $req = Db::getConnection()->prepare("INSERT INTO USER (pseudo, pswd, mail) VALUES (:pseudo,:password,:mail)");
      $req->execute(
        array(
          ":pseudo"=>$user->pseudo,
          ":password"=>$user->password,
          ":mail"=>$user->mail
        )
      );
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  /**
  * Updates an user
  * @param User $user
  */
  public static function updateUser($user){
    try{
      $req = Db::getConnection()->prepare("UPDATE  USER SET pswd = :password, mail = :mail WHERE pseudo = :pseudo");
      $req->execute(
        array(
          ":password"=>$user->password,
          ":mail"=>$user->mail,
          ":pseudo"=>$user->pseudo
        )
      );
      var_dump($req);
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }


  /**
  * Deletes an user
  * @param string $pseudo
  */
  public static function deleteUser($pseudo){
    try{
      $req = Db::getConnection()->prepare("DELETE FROM USER WHERE pseudo = :pseudo");
      $req->execute(
        array(
          ":pseudo"=>$pseudo
        )
      );
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public static function loginUser($pseudo,$password){
    $req = Db::getConnection()->prepare("SELECT pseudo, pswd, mail FROM USER WHERE pseudo = :pseudo AND pswd = :password");
    $req->execute(
      array(
        ":pseudo"=>$pseudo,
        ":password"=>$password
      )
    );
    $data = $req->fetch();
    return ($data!=null);
  }
}
