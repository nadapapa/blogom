<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.php">Blog</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li<?php if($_SERVER['REQUEST_URI'] == "/apps/apps.php"){echo ' class="active"';}?>>
          <a href="/apps/apps.php" title="kis projektek, amiket próbálok működésre bírni">Projektek<span class="sr-only">Projektek</span></a>
        </li>
        <li <?php if($_SERVER['REQUEST_URI'] == "/about.php"){echo ' class="active"';}?>><a href="/about.php">Rólam<span class="sr-only">Rólam</span></a>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Keresés">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="https://github.com/nadapapa" title="Github profilom">
            <img id="github" class="img-responsive" alt="Github profilom" src="includes/GitHub-Mark-32px.png"/>
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
