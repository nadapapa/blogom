<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delcat'])){

	$stmt = $db->prepare('DELETE FROM blog_cats WHERE catID = :catID') ;
	$stmt->execute(array(':catID' => $_GET['delcat']));

	// header('Location: categories.php?action=deleted');
	// exit;
}


$row = array(
  'postTitle' => 'Admin - categories',
  'postDesc' => '',
  'type' => '"website"'
);
include('../includes/head.php');
?>
<body>
	<script src="ajax.js"></script>

	<?php include('menu.php');
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
		echo '<h3>Category '.$_GET['action'].'.</h3>';
	}
	?>

	<table class="categories table table-condensed">
	<tr>
		<th>Title</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT catID, catTitle, catSlug FROM blog_cats ORDER BY catTitle DESC');
			while($row = $stmt->fetch()){

				echo "<tr class='$row[catID]'>";
				echo '<td>'.$row['catTitle'].'</td>';
				?>

				<td><div class='btn-group' role='group'>
					<a class='btn btn-danger' href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')">Delete</a>
       <a class='btn btn-info' id="edit<?php echo $row['catID'];?>" href="javascript:editcat('<?php echo $row['catID'];?>','<?php echo $row['catTitle'];?>')">Edit</a>
					</div></td>

				<?php
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

<input id="addcat" type='text' name='catTitle' value=''> <div class="btn btn-sm btn-info ajaxCat">Add category <i class="fa fa-plus"></i></div><br>
</div>

</body>
<?php include('../includes/foot.php');?>

</html>
