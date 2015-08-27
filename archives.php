<?php require('includes/config.php');
      require('includes/head.php');

// év és hónap meghatározása
  $month = $_GET['month'];
  $year = $_GET['year'];

// beállítani a -tól és -ig értékeket
  ?>
<body>
  <?php
  // az ajax.php-ben az adatbázis-lekéréshez szükséges adatok
    $from = date("Y-m-01 00:00:00", strtotime("$year-$month"));
    $to = date("Y-m-31 23:59:59", strtotime("$year-$month"));
    $pagetype = 'archive';
    $catid = '';
  // ajax-hoz szükséges adatok
    echo
      "<script>
        var from = '".$from."';
        var to = '".$to."';
        var pagetype = 'archive';
        var catid = '';
      </script>";
  ?>

  <script src="/includes/infinite.js"></script>

  <?php include("includes/nav.php");
        include("/includes/container.php");
        include("/includes/ajax.php");
	?>
            </div>
            <?php
              if ($remainingPosts > 0) {
                echo "<button class=\"btn btn-default loadAjax\">Még $remainingPosts poszt</button>";
              } else {
                echo "<button disabled class=\"btn btn-default loadAjax\">Nincs több :(</button>";
              }
            ?>
          </div>
          <div class="col-md-4 sidebar">
          <?php require('includes/sidebar.php');?>
        </div>
      </div>
    </div>
  </body>
</html>
