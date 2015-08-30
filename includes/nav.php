<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.php">
<i class="fa fa-home"></i> Blog</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li<?php if($_SERVER['REQUEST_URI'] == "/apps/apps.php"){echo ' class="active"';}?>>
          <a href="/apps/apps.php" title="kis projektek, amiket próbálok működésre bírni">
            <i class="fa fa-code"></i> Projektek <span class="sr-only">Projektek</span></a>
        </li>
        <li <?php if($_SERVER['REQUEST_URI'] == "/about.php"){echo ' class="active"';}?>>
          <a href="/about.php">
            <i class="fa fa-user"></i> Rólam <span class="sr-only">Rólam</span>
          </a>
        </li>
      </ul>
            <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="https://github.com/nadapapa" title="Github profilom">
           <i class="fa fa-github fa-lg"></i> GitHub <span class="sr-only">Github</span>
          </a>
        </li>
        <li>
         <a href="mailto:nadapapa@gmail.com" title="Írhatsz is nekem">
        <i class="fa fa-envelope-o"></i> E-mail <span class="sr-only">E-mail</span>
         </a>
        </li>
        <li>
        <a href="http://feeds.feedburner.com/NadapapaBlogja" title="RSS feed">
        <i class="fa fa-rss"></i> RSS <span class="sr-only">RSS</span>
        </a>
        </li>
      </ul>
    </div><!-- /navbar-collapse -->
  </div><!-- /container-fluid -->
</nav>
