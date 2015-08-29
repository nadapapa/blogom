<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}

//show message from add / edit page
if(isset($_GET['delpost'])){

	$stmt = $db->prepare('DELETE FROM blog_posts_seo WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	//delete post categories.
	$stmt = $db->prepare('DELETE FROM blog_post_cats WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
}

$row = array(
  'postTitle' => 'Admin - index',
  'postDesc' => '',
  'type' => '"website"'
);
include('../includes/head.php');
?>
<body>
  <script language="JavaScript" type="text/javascript">
   function delpost(id, title)
   {
 	  if (confirm("Are you sure you want to delete '" + title + "'"))
 	  {
 	  	window.location.href = 'index.php?delpost=' + id;
 	  }
   }
   </script>

	<?php
  include('menu.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
      <h1 class="page-header">
        Blog
        <small>Secondary Text</small>
      </h1>

				<?php
	        //show message from add / edit page
	        if(isset($_GET['action'])){
		        echo '<h3>Post '.$_GET['action'].'.</h3>';
	          }
	      ?>
      </div>
	  </div><br>
	  <div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<table>
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts_seo ORDER BY postID DESC');
			while($row = $stmt->fetch()){

				echo '<tr>';
				echo '<td>'.$row['postTitle'].'</td>';
				echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
				?>

				<td>
					<a href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> |
					<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
				</td>

				<?php
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>
</div>
</div>
	<p><a class="btn btn-success" href='add-post.php'>Add Post</a></p>

</div>

</body>
</html>
