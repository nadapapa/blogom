<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content="Latin versek generálása"/>
  <meta name="author" content="Náday Ádám">
  <link rel="icon" href="includes/favicon.ico">
  <title>Blog - Steganometrographia</title>

  <meta property="og:url" content=<?php echo '"'."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'"'?> />
  <meta property="og:site_name" content="Blog" />
  <meta property="og:type" content="article" />
  <meta property="og:locale" content="hu_HU" />
  <meta property="og:title" content="Steganometrographia" />
  <meta property="og:description" content="Latin versek generálása" />


  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!--------------------------- BOOTSTRAP ---------------------------------->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="smg.js"></script>

   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!-- <link rel="stylesheet" href="style/normalize.css"> -->
   <link rel="stylesheet" href="/style/main.css">
</head>

<?php
require('../../includes/nav.php');

?>
<br><br><br>
<h2>Steganometrographia app</h2><br>
<div>
  <form action="smg-controller.php" method='POST'>
<label><input type='radio' name='valasztas' value="random" checked>
random
<select name='sor'>
  <?php
  for($i=2; $i<23; $i+=2){
    echo "<option value='$i' ";
    if($i == $_POST['sor']){
      echo "selected='selected'";
    }
    echo ">$i</option>";
  }
  ?>
</select> sor </label>
<br>
<label><input type='radio' name='valasztas' value="kodol" > kódol:
<input type='text' size='38' name='uzen' value=''></label>
<br>
<label><input type='radio' name='valasztas' value='dekodol'> dekódol </label>
<br>
<input type='submit' id="verset" value='Verset!'>
<button type="submit" class="btn btn-success">Submit</button>

<br>
<textarea name='vers' rows='24' cols='53'>
</textarea>
</form>
</div>
