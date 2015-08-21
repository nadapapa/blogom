<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate, postDesc FROM blog_posts_seo WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}
require('includes/head.php');
?>

<body>
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
			  <div class="panel panel-default">
			  	 <div class="panel-heading">
						 <?php echo '
				  	 <h2 class="panel-title">'.$row['postTitle'].'
						 </h2>
					 </div><!--panel heading-->
					 <div class="panel-body">
	           <small>
	             <p>
					    <span class="glyphicon glyphicon-time"></span> '.date('Y M. s - H:i', strtotime($row['postDate'])).' in ';

						$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
						$stmt2->execute(array(':postID' => $row['postID']));

						$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

						$links = array();
						foreach ($catRow as $cat)
						{
						    $links[] = "<a class='label label-default' role='label' href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
						}
						echo implode(" ", $links);
						echo '</p>
						</small>';
						echo '
						<article class="lead">'.strip_tags($row['postDesc']).'</article>
						<hr />
						<article>'.$row['postCont'].'</article>

					</div><!--panel-body-->
				</div><!--panel panel--->';
			?>
		</div>
	</div>
			<div class="col-md-4 sidebar">
				<?php require('includes/sidebar.php');?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
