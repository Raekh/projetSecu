<?php

class Message{

  public $idMessage, $pseudoUser, $idTopic, $messageTitle, $content;

  public function __construct($idMessage, $pseudoUser, $idTopic, $messageTitle, $content){
    $this->idMessage=$idMessage;
    $this->pseudoUser=$pseudoUser;
    $this->idTopic=$idTopic;
    $this->messageTitle=$messageTitle;
    $this->content=$content;
  }

  public static function fromJson($json){
    $obj = json_decode($json);
    if(!isset($obj)){
      return false;
    }
    return new User(
      $obj->idMessage,
      $obj->pseudoUser,
      $obj->idTopic,
      $obj->messageTitle,
      $obj->content
    );
  }


  public static function toJson(){
    return json_encode($this);
  }
}
