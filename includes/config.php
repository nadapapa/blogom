<?php
  ob_start();
  session_start();

  setlocale(LC_TIME,'hu_HU');
  setlocale(LC_ALL, "HU_hu.utf8");

  $path = $_SERVER['DOCUMENT_ROOT'];


  require_once('creds.php');

  $db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//set timezone
  date_default_timezone_set('Europe/Budapest');

//load classes as needed
  function __autoload($class) {
   $class = strtolower($class);
   $path = $_SERVER['DOCUMENT_ROOT'];

   //if call from within assets adjust the path
   $classpath = $path.'/classes/class.'.$class . '.php';

  require_once($classpath);
}
$user = new User($db);

include('functions.php');
?>
