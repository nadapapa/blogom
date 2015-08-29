<?php
function slug($text){

  	$search = explode(",",
  "á,í,ű,ő,ü,ö,ú,ó,é");
  	$replace = explode(",",
  "a,i,u,o,u,o,u,o,e");
  	$text = str_replace($search, $replace, $text);
  
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);


  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}
?>
