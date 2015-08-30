<?php
setlocale(LC_TIME,'hu_HU');
$path = $_SERVER['DOCUMENT_ROOT'];


//       title
if(isset($row['postTitle'])){
  switch ($row['postTitle']) {
    case 'Blog főoldal':
    case '404':
    case 'Projektek':
    case 'Rólam':
      $title = $row['postTitle'];
      break;
    default:
      $title = 'Blog/Posztok/'.$row['postTitle'];
      break;
  }

} elseif (isset($row['catTitle'])) {
  $title = "Blog/Kategória/".$row['catTitle'];

} elseif(isset($_GET['year']) && isset($_GET['month'])){
  $title = "Blog/Archívum/".$_GET['year']."/".mb_convert_case(utf8_encode(strftime('%B', mktime(0, 0, 0, $_GET['month'], 10))),  MB_CASE_TITLE, "UTF-8");
  }


//      description
if(isset($row['postDesc'])){
  $desc = '"'.strip_tags($row['postDesc']).'"';
} elseif(isset($row['catTitle'])) {
  $desc = 'Kategória:'.$row['catTitle'];
} elseif(isset($_GET['year']) &&
 isset($_GET['month'])){
    $desc = '"Posztarchívum: '.$_GET['year'].' '.mb_convert_case(utf8_encode(strftime('%B', mktime(0, 0, 0, $_GET['month'], 10))),  MB_CASE_TITLE, "UTF-8").'"';

  }
?>

<!DOCTYPE html>
<html lang="hu">
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content=<?php echo $desc; ?>/>
  <meta name="author" content="Náday Ádám">

  <link rel="icon" href="/includes/favicon.ico">

  <title><?php echo $title; ?></title>

  <meta property="og:url" content=
    <?php echo '"'."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'"'?> />
  <meta property="og:site_name" content="Blog" />
  <meta property="og:type" content=
  <?php
    if(isset($row['type'])){echo $row['type'];}else{echo '"article"';}
  ?>/>
  <meta property="og:locale" content="hu_HU" />
  <meta property="og:title" content=<?php echo '"'.$title.'"'; ?>/>
  <meta property="og:description" content=<?php echo $desc;?>/>

  <!-- Font awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/style/main.css">

 <link rel="alternate" href="feed.php" title="RSS" type="application/rss+xml" />
</head>
