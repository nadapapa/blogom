<?php
if(file_exists('config.php')){
  require_once('config.php');
}else if(file_exists('/config.php')){
  require_once('/config.php');
}
//  }else{
//    require_once('../config.php');
//  }

  try {
    if (isset($_GET["page"]) && !empty($_GET["page"])) {
     $page = $_GET["page"];
   }else{
     $page = 0;
   }


    $stmt = $db->query('SELECT * FROM blog_posts_seo ORDER BY postID DESC LIMIT '.$page.',3');

    while($row = $stmt->fetch()){
        echo <<<_END
        <!--blogposzt-->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a class="link" href=$row[postSlug]>$row[postTitle]</a>
                </h2>
              </div><!--panel heading-->

_END;
        echo '
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
  }catch(PDOException $e) {
      echo $e->getMessage();
  }
 ?>
