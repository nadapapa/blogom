<?php
  require('includes/config.php');

  $stmt = $db->prepare(
    'SELECT catID, catTitle
    FROM blog_cats
    WHERE catSlug = :catSlug'
  );

  $stmt->execute(array(':catSlug' => $_GET['id']));

  $row = $stmt->fetch();

  if($row['catID'] == ''){
	  header('Location: ./404.php');
	  exit;
  } else {
	  $catid = $row['catID'];
  }

  require('includes/head.php');
?>

<body>
  <?php
  $pagetype = 'catpost';
  $from = '';
  $to = '';

  echo
  "<script>
		var from = '';
		var to = '';
		var pagetype = 'catpost';
		var catid =  '".$catid."';
	</script>";
	?>

	<script src="includes/infinite.js"></script>

<?php include("includes/nav.php");
  include("includes/container.php");
  include("includes/ajax.php");
?>
                  </div>
                  <?php
                    if ($remainingPosts > 0) {
                      echo
                       "<button class=\"btn btn-default loadAjax\">
                        Még $remainingPosts poszt
                       <span class=\"glyphicon glyphicon-chevron-down\" aria-hidden=\"true\"></span></a>
                        </button>";
                    } else {
                      echo "<button disabled class=\"btn btn-default loadAjax\">Nincs több poszt <i class=\"fa fa-frown-o\"></i></button>";
                                  }

                  ?>
              </div>
            <div class="col-md-4 sidebar">
          <?php require('includes/sidebar.php');?>
        </div>
      </div>
    </div>
    <?php require('includes/foot.php');?>
    <script>
    $(function(){var a=3;$(".loadAjax").on("click",function(){$.ajax({url:"includes/ajax.php",type:"get",data:{page:a,pagetype:pagetype,catid:catid,from:from,to:to},success:function(b){if(b==""){$(".loadAjax").html("Nincs több :(");$(".loadAjax").attr("disabled",true)}else{a+=3;$(".posts").append(b);$(".loadAjax").html("Még "+remaining+' poszt <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>')}if(remaining<=0){$(".loadAjax").html('Nincs több poszt <i class="fa fa-frown-o"></i>');$(".loadAjax").attr("disabled",true)}},error:function(d,c,b){console.log(d);console.log("Details: "+c+"\nError:"+b)}})})});
    </script>
  </body>
</html>
