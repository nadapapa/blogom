<?php require('includes/config.php');

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
	</script>";?>
	<script src="/includes/infinite.js"></script>

<?php include("includes/nav.php");
 include("/includes/container.php");
	      include("/includes/ajax.php");
			?>
					</div>
					<button class="btn btn-default loadAjax">Még!</button>

				</div>
				<div class="col-md-4 sidebar">
		<?php require('includes/sidebar.php');
		$dbstring = "";
		?>
		</div>
	</div>
</div>


</body>
</html>
