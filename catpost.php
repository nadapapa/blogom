<?php require('includes/config.php');


$stmt = $db->prepare('SELECT catID,catTitle FROM blog_cats WHERE catSlug = :catSlug');
$stmt->execute(array(':catSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['catID'] == ''){
	header('Location: ./');
	exit;
}
?>

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

    <title>Blog/Kategória/<?php if (isset($row)){echo $row['catTitle'];}?></title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>    <!--------------------------- BOOTSTRAP ---------------------------------->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style/main.css">

  </head>

<body>
<?php include("includes/nav.php");?>

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

				$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
				$stmt->execute(array(':catID' => $row['catID']));

				$stmt = $db->prepare('
					SELECT
						blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc, blog_posts_seo.postDate
					FROM
						blog_posts_seo,
						blog_post_cats
					WHERE
						 blog_posts_seo.postID = blog_post_cats.postID
						 AND blog_post_cats.catID = :catID
					ORDER BY
						postID DESC
					');
				$stmt->execute(array(':catID' => $row['catID']));
				while($row = $stmt->fetch()){

						echo '
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">
			<a class="link" href="'.$row['postSlug'].'">'.$row['postTitle'].'</a>
		</h2>
	</div>
	<div class="panel-body">
		<small>
			<p><span class="glyphicon glyphicon-calendar"></span> '.date('Y M. s - H:i', strtotime($row['postDate'])).' in ';

						$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
						$stmt2->execute(array(':postID' => $row['postID']));

						$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

						$links = array();
						foreach ($catRow as $cat)
							{
							    $links[] = "<a class='label label-default' role='label' href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
							}
							echo implode(" ", $links).'
            </p>
          </small>';

      echo '<article class="lead">'.strip_tags($row['postDesc']).'</article>';
			echo '<p>
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
