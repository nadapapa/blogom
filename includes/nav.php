<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <a class="navbar-brand" href="../../index.php">Blog</a>
    <ul class="nav navbar-nav">
      <li<?php if($_SERVER['REQUEST_URI'] == "/apps/apps.php"){echo ' class="active"';}?>>
        <a href="/apps/apps.php" title="kis projektek, amiket próbálok működésre bírni">Projektek<span class="sr-only">Projektek</span></a>
      </li>
      <li <?php if($_SERVER['REQUEST_URI'] == "/about.php"){echo ' class="active"';}?>><a href="/about.php">Rólam</a></li>
      <li>
        <a class="fa fa-github fa-2x" href="https://github.com/nadapapa" title="Github profilom"></a>
      </li>
    </ul>
</nav>
