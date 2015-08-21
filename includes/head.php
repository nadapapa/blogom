<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content=<?php if (isset($row)){echo '"'.strip_tags($row['postDesc']).'"';}?>/>
  <meta name="author" content="Náday Ádám">
  <link rel="icon" href="includes/favicon.ico">
  <title>Blog<?php if (isset($row)){echo ' - '.$row['postTitle'];}?></title>

  <meta property="og:url" content=<?php echo '"'."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'"'?> />
  <meta property="og:site_name" content="Blog" />
  <meta property="og:type" content="article" />
  <meta property="og:locale" content="hu_HU" />
  <meta property="og:title" content=<?php if (isset($row)){echo '"Blog - '.$row['postTitle'].'"';}?> />
  <meta property="og:description" content=<?php if (isset($row)){echo '"'.strip_tags($row['postDesc']).'"';}?> />


  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!--------------------------- BOOTSTRAP ---------------------------------->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!-- <link rel="stylesheet" href="style/normalize.css"> -->
   <link rel="stylesheet" href="/style/main.css">
</head>
