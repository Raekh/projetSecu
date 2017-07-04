<?php
//session
session_start();
// var_dump($_SESSION);
//class
include('class/User.class.php');

//config
include('config/Configuration.class.php');
include('config/Db.class.php');

//dao
include('dao/DaoUser.class.php');
include('dao/DaoMessage.class.php');
