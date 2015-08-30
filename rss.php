<?php
require_once('includes/config.php');

$stmt = $db->prepare(
      'SELECT *
      FROM blog_posts_seo
      ORDER BY postID
      DESC');

$stmt->execute();

$rss = new SimpleXMLElement('<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom"></rss>');
$rss->addAttribute('version', '2.0');
$channel = $rss->addChild('channel'); //add channel node
 $atom = $channel->addChild('atom:atom:link'); //add atom node
 $atom->addAttribute('href', 'http://nadapapa.ml'); //add atom node attribute
 $atom->addAttribute('rel', 'self');
 $atom->addAttribute('type', 'application/rss+xml');

 $title = $channel->addChild('title','nadapapa blogja'); //title of the feed
 $description = $channel->addChild('description','új blogposztok'); //feed description
 $link = $channel->addChild('link','http://www.nadapapa.ml'); //feed site
 $language = $channel->addChild('language','hu-hu'); //language

//Create RFC822 Date format to comply with RFC822
$date_f = date("Y M d H:i", time());
$build_date = gmdate(DATE_RFC2822, strtotime($date_f));
$lastBuildDate = $channel->addChild('lastBuildDate',$date_f); //feed last build date

$generator = $channel->addChild('generator','PHP Simple XML'); //add generator node

while($row = $stmt->fetch()){
	$item = $channel->addChild('item'); //add item node
	$title = $item->addChild('title', $row['postTitle']); //add title node under item
	$link = $item->addChild('link', 'http://www.nadapapa.ml/'.$row['postSlug']); //add link node under item
	$description = $item->addChild('description', htmlentities($row['postDesc'])); //add description
	$date_rfc = gmdate(DATE_RFC2822, strtotime($row['postDate']));
	$item = $item->addChild('pubDate', $date_rfc); //add pubDate node
}

$path = $_SERVER['DOCUMENT_ROOT'];
$rss->asXML("$path/rss.xml"); //output XML
?>
