<?php
  require_once('config/Config.php');

  //AutoLoad
  spl_autoload_register(function($className){
    require_once('libraries/' .$className. '.php');
  });
  
  // require_once('libraries/Core.php');
  // require_once('libraries/Controller.php');
  // require_once('libraries/Database.php');