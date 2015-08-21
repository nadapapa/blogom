<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../index.php">Blog</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
       <li<?php if($_SERVER['REQUEST_URI'] == "/apps/apps.php"){echo ' class="active"';}?>><a href="/apps/apps.php">Appok<span class="sr-only"></span></a></li>
       <li <?php if($_SERVER['REQUEST_URI'] == "/about.php"){echo ' class="active"';}?>><a href="/about.php">About</a></li>
     </ul>
</nav>
