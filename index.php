<?php require('includes/config.php');
$row = array(
  'postTitle' => 'Blog főoldal',
  'postDesc' => 'Az én egyszerű blogom.',
  'type' => '"website"'
);
      require('includes/head.php');
?>
<body>
  <?php
  $pagetype = 'index';
  $catid = '';
  $from = '';
  $to = '';

  echo
  "<script>
    var from = '';
    var to = '';
    var pagetype = 'index';
    var catid =  '';
  </script>";?>
  <script src="/includes/infinite.js"></script>

  <?php include('includes/nav.php'); ?>
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
            <?php
            //
            // $dbstring = 'SELECT *
            //   FROM blog_posts_seo
            //   ORDER BY postID
            //   DESC';

            require('includes/ajax.php');?>
          </div>
          <button class="btn btn-default loadAjax">Még!</button>
        </div>
        <div class="col-md-4 sidebar">
          <?php require('includes/sidebar.php');?>
        </div>
      </div>
    </div>
</body></html>
