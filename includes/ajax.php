<?php
if(file_exists('config.php')){
  require_once('config.php');
}else if(file_exists('/config.php')){
  require_once('/config.php');
}

try {
  if (isset($_GET["page"]) &&
      !empty($_GET["page"])) {
    $page = (int)$_GET["page"];
  }else{
    $page = 0;
  }

  if (isset($_GET['pagetype'])) {
    $pagetype = $_GET['pagetype'];
  }

  if (isset($_GET['catid'])) {
    $catid = $_GET['catid'];
  }

  if (isset($_GET['from']) &&
      isset($_GET['to'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
  }

  // a megjelenítendő posztok száma:
  $limit = 3;

  switch ($pagetype) {
    case "index":
      $stmt = $db->prepare(
        "SELECT *
        FROM blog_posts_seo
        ORDER BY postID
        DESC
        LIMIT :page, :limit");
      $stmt->bindParam(":page", $page, PDO::PARAM_INT);
      $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
      break;

    case "catpost":
      $stmt = $db->prepare(
        "SELECT
        blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc, blog_posts_seo.postDate
        FROM
        blog_posts_seo,
        blog_post_cats
        WHERE
         blog_posts_seo.postID = blog_post_cats.postID
        AND blog_post_cats.catID = :catid
        ORDER By postID
        DESC
        LIMIT :page, :limit");
        $stmt->bindParam(":catid", $catid, PDO::PARAM_INT);
        $stmt->bindParam(":page", $page, PDO::PARAM_INT);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
      break;

    case "archive":
      $stmt = $db->prepare(
        "SELECT postID,
          postTitle,
          postSlug,
          postDesc,
          postDate
        FROM blog_posts_seo
        WHERE postDate >= :from
        AND postDate <= :to
        ORDER BY postID
        DESC
        LIMIT :page, :limit");
        $stmt->bindParam(":page", $page, PDO::PARAM_INT);
        $stmt->bindParam(":from", $from, PDO::PARAM_STR, 19);
        $stmt->bindParam(":to", $to, PDO::PARAM_STR, 19);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
      break;
  }

  $stmt->execute();

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
              <span class="glyphicon glyphicon-calendar"></span> '.date('Y M. s - H:i', strtotime($row['postDate'])).' in ';

              $stmt2 = $db->prepare(
              'SELECT catTitle,
                      catSlug
              FROM blog_cats,
                   blog_post_cats
              WHERE blog_cats.catID = blog_post_cats.catID
              AND blog_post_cats.postID = :postID');

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
