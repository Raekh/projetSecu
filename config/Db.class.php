<?php

class Db{

  public static function getConnection(){
    try{
      return new PDO(Configuration::BDD_TYPE
      .':host='.Configuration::BDD_IP
      .';port='.Configuration::BDD_PORT
      .';dbname='.Configuration::BDD_NAME, Configuration::BDD_USER, Configuration::BDD_PASSWORD
    );
  }
  catch(PDOException $e){
    // die($e->getMessage()."<h1>Impossible de se connecter à la base de données.</h1>");
    return false;
  }
}
}
