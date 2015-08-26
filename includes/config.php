<?php
  ob_start();
  session_start();

  setlocale(LC_TIME,'Hungarian');
  if(file_exists('creds.php')){
    require_once('creds.php');
  }elseif(file_exists('/creds.php')){
    require_once('/creds.php');
  }else{
    require_once('../creds.php');
  }

  $db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//set timezone
  date_default_timezone_set('Europe/Budapest');

//load classes as needed
  function __autoload($class) {
   $class = strtolower($class);
   //if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   //if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   //if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
}
$user = new User($db);

include('functions.php');
?>
