<div class="well well-sm">
<h3>Recent Posts</h3>
<hr />

<ul>
<?php
$stmt = $db->query('SELECT postTitle, postSlug FROM blog_posts_seo ORDER BY postID DESC LIMIT 5');
while($row = $stmt->fetch()){
	echo '<li><a class="link" href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></li>';
}
?>
</ul>
</div>

<div class="well well-sm">
<h3>Categories</h3>

<ul class="list-group">
<?php
$stmt = $db->query('SELECT catTitle, catSlug FROM blog_cats ORDER BY catID DESC');
$cat = $db->query('SELECT catID, COUNT(*) FROM blog_post_cats GROUP BY catID ORDER BY catID DESC');
while($row = $stmt->fetch()){
	echo '
		<a href="c-'.$row['catSlug'].'" class="list-group-item" role="button">'.$row['catTitle'].'
		<span class="badge">'.$catid = $cat->fetch()['COUNT(*)'].'</span></a>
';} ?>
</ul>
</div>

<div class="well well-sm">
<h3>Archives</h3>
<hr />

<ul>
<?php
$stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM blog_posts_seo GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
while($row = $stmt->fetch()){
	$monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
	$slug = 'a-'.$row['Month'].'-'.$row['Year'];
	echo "<li><a class='link' href='$slug'>$monthName</a></li>";
} ?>
</ul>
</div>
