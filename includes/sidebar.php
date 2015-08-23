<div class="well well-sm">
  <h3>Friss posztok</h3>
  <hr />
    <ul>
      <?php
        $stmt = $db->query(
				 'SELECT postTitle, postSlug
					FROM blog_posts_seo
					ORDER BY postID
					DESC LIMIT 5');

        while($row = $stmt->fetch()){
	        echo '<li><a class="link" href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></li>';
        }
			?>
    </ul>
</div>

<div class="well well-sm">
  <h3>Kategóriák</h3>
  <hr />
  <ul class="list-group">
    <?php
      $stmt = $db->query(
			'SELECT catTitle, catSlug
			FROM blog_cats
			ORDER BY catID
			DESC');

      $cat = $db->query(
			'SELECT catID, COUNT(*)
			FROM blog_post_cats
			GROUP BY catID
			ORDER BY catID
			DESC');

      while($row = $stmt->fetch()){
	      echo
				'<a class="btn btn-default btn-sm" href="c-'.$row['catSlug'].'">'.$row['catTitle'].'
	      <span class="badge">'.$catid = $cat->fetch()['COUNT(*)'].'</span></a>';
      }
		?>
  </ul>
</div>

<div class="well well-sm">
  <h3>Archívum</h3>
  <hr />
  <ul class="list-group">
    <?php
      $stmt = $db->query(
			'SELECT Month(postDate) as Month,
			  Year(postDate) as Year
			FROM blog_posts_seo
			GROUP BY Month(postDate),
			  Year(postDate)
			ORDER BY postDate
			DESC');

      $date = $db->query(
			'SELECT Month(postDate) as Month,
			  Year(postDate) as Year,
			COUNT(*)
			FROM blog_posts_seo
			GROUP BY Month(postDate),
			  Year(postDate)
			ORDER BY postDate
			DESC');

      while($row = $stmt->fetch()){
      	$monthName = mb_convert_case(utf8_encode(strftime('%B', mktime(0, 0, 0, $row['Month'], 10))),  MB_CASE_TITLE, "UTF-8");

	      $slug = 'a-'.$row['Month'].'-'.$row['Year'];

	      echo
				'<a class="list-group-item" role="button" href='.$slug.'>'.$row['Year'].' - '.$monthName.'<span class="badge">'.$dateid = $date->fetch()['COUNT(*)'].'</span></a>';
      }
    ?>
  </ul>
</div>
