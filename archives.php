<?php require('includes/config.php');
      require('includes/head.php');
 ?>
<body>
<?php include("includes/nav.php"); ?>

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
				try {
					//collect month and year data
					$month = $_GET['month'];
					$year = $_GET['year'];

					//set from and to dates
					$from = date('Y-m-01 00:00:00', strtotime("$year-$month"));
					$to = date('Y-m-31 23:59:59', strtotime("$year-$month"));

					$stmt = $db->prepare('SELECT postID FROM blog_posts_seo WHERE postDate >= :from AND postDate <= :to');
					$stmt->execute(array(
						':from' => $from,
						':to' => $to
				 	));

					$stmt = $db->prepare('SELECT postID, postTitle, postSlug, postDesc, postDate FROM blog_posts_seo WHERE postDate >= :from AND postDate <= :to ORDER BY postID DESC ');
					$stmt->execute(array(
						':from' => $from,
						':to' => $to
				 	));
					while($row = $stmt->fetch()){

							echo '<div class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a class="link" href='.$row['postSlug'].'>'.$row['postTitle'].'</a>
                  </h2>
                </div><!--panel heading-->
                <div class="panel-body">
                  <small>
                    <p>
                      <span class="glyphicon glyphicon-calendar"></span> '.date('Y M. s - H:i', strtotime($row['postDate'])).' in ';


								$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');

								$stmt2->execute(array(':postID' => $row['postID']));

								$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

								$links = array();
								foreach ($catRow as $cat)
								{
								    $links[] = "<a href='c-".$cat['catSlug']."' class='label label-default' role='label'>".$cat['catTitle']."</a>";
								}
                echo implode(" ", $links).'
                    </p>
                  </small>';

                echo '<article class="lead">'.strip_tags($row['postDesc']).'</article>
                      <p>
                        <a class="btn btn-default" role="button" href="'.$row['postSlug'].'">Tovább</a>
                      </p>
                    </div><!--panel-body-->
                  </div><!--panel panel--->';
					}

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
			?>
    </div>
    </div>
    <div class="col-md-4 sidebar">
    <?php require('includes/sidebar.php');?>
    </div>
    </div>
    </div>
</body>
</html>
