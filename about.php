<?php
require('includes/config.php');

$row = array(
  'postTitle' => 'Rólam',
  'postDesc' => 'Röviden, hogy ki vagyok.',
  'type' => '"website"'
);

include("includes/head.php");
include("includes/nav.php");
?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<h1 class="page-header">
					Rólam
					<small>röviden</small>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="posts">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">
							 Salve hospes!
					 </h2>
						</div><!--panel heading-->
						<div class="panel-body">
							<article class="lead">

              Az SZTE-n végeztem történelem-latin szakos tanárként. Az egyetemi tanulmányaim vége felé kezdtem programozást tanulni. Pythonnal kezdtem, majd egy kis Javascript után jött a PHP (+HTML+CSS) tanulása. Ez utóbbi eredményét láthatod egy egyszerű blog formájában manifesztálódni. A blog még fog változni, mert ha találok valami érdekeset, megpróbálom implementálni. A posztok tematikája főleg a programozás és a bölcsészettudományok, azokon belül is elsősorban a klasszika-filológia, meg a kettő kombinálása körül fog csoportosulni. Ja meg olvasni is szeretek: antik szerzőket és sci-fit. <br> A blog és a projektjeim forráskódja nyílt, amit elérsz a <a class="link" href="https://github.com/nadapapa">Github profilomon.</a> Kedvenc szövegszerkesztőm: Atom
          <br><br>
          <i>Hosszú és eredményes böngészést!</i>

         </article>
						</div><!--panel-body-->
					 </div><!--panel panel--->
				</div>
    </div>
    <div class="col-md-4 sidebar">
	   	<?php require('includes/sidebar.php');?>
	  	</div>
	</div>
</div>
</body>
</html>
