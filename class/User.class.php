<?php

class User{

  public $pseudo, $password, $mail;

  public function __construct($pseudo, $password, $mail){
    $this->pseudo=$pseudo;
    $this->password=$password;
    $this->mail=$mail;
  }

  public static function fromJson($json){
    $obj = json_decode($json);
    if(!isset($obj)){
      return false;
    }
    return new User($obj->pseudo,$obj->password,$obj->mail);
  }


  public static function toJson(){
    return json_encode($this);
  }
}
