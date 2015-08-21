<?php require('includes/config.php'); ?>

  <!DOCTYPE html>
  <html lang="hu">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description" content="Egy blog">
    <meta name="author" content="Náday Ádám">
    <link rel="icon" href="includes/favicon.ico">
    <title>Blog</title>

    <meta property="og:url" content=<?php echo '"'. "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]". '"'?> />
    <meta property="og:site_name" content="Blog" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="hu_HU" />
    <meta property="og:title" content="Blog" />
    <meta property="og:description" content="Egy blog" />

    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!--------------------------- BOOTSTRAP ---------------------------------->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style/main.css">

  </head>

  <body>
    <?php
include('includes/nav.php')
?>

      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <h1 class="page-header">
              Blog
              <small>Secondary Text</small>
            </h1>
          </div>
        </div>


        <div class="row">
          <div class="col-md-8">
            <div class="posts">
              <!-- ide jönnek a posztok infinte scrollal -->
              <?php require('includes/posts.php');?>
            </div>
            <button class="btn btn-default loadAjax">load more</button>
          </div>
          <div class="col-md-4 sidebar">
            <?php require('includes/sidebar.php');?>
          </div>
        </div>
      </div>

    <script src="/includes/infinite.js"></script>
</body></html>
