<?php
$row = array(
  'postTitle' => 'Projektek',
  'postDesc' => 'Kis webappok, amiket fejlesztek',
  'type' => '"website"'
);

$path = $_SERVER['DOCUMENT_ROOT'];

include("$path/includes/head.php");
include("$path/includes/nav.php");
?>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<h1 class="page-header">
				Projektek
				<small>Ide kerülnek azok a kisebb webappok, amiket fejlesztek</small>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="posts">

				<div class="panel panel-default">
	 			 <div class="panel-heading">
	 				 <h2 class="panel-title">
	 					<a class="link" href="steganometrographia-php-hu/">Steganometrographia</a>
        </h2>
	 			 </div><!--panel heading-->
				 <div class="panel-body">
					 <article class="lead"><p>Egy több mint 250 éves könyv interpretálása program formájában.</p> <p>Használt technológiák: PHP, AJAX, Bootstrap, jQuery</p></article>
					 			<p>
					 			 <a class="btn btn-default" role="button" href="steganometrographia-php-hu/">Tovább
					 				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
					 			</p>
				 </div><!--panel-body-->
				</div><!--panel panel--->

      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">
            <a class="link" href="steganometrographia-php-hu/">Álhírgenerátor</a>
          </h2>
         </div><!--panel heading-->
         <div class="panel-body">
           <article class="lead"><p>Random hírcímek generálása a magyar hírportálok RSS feedjeiből.</p> <p>Használt technológiák: PHP, AJAX, Bootstrap, jQuery, XML</p></article>
                <p>
                 <a class="btn btn-default" role="button" href="hirgenerator">Tovább
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
                </p>
         </div><!--panel-body-->
        </div><!--panel panel--->'
    </div>
   </div>
 </div>
</div>
<?php include("$path/includes/foot.php");?>

</body>
