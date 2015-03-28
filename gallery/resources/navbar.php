<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">SuperGallerie</a>
        <?php if($current_user) { ?><p class="navbar-text">Eingeloggt als <b><?php echo $current_user->username; ?></b></p><?php } ?>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <?php if(!$current_user) { ?><li><a href="register.php">Registrieren</a></li>
          <li><a data-toggle="modal" href="#modal_login">Anmelden</a></li> <?php }  else {?>
          <?php if($current_user->admin) { ?><li><a href="admin.php">Administration</a></li><?php } ?>
          <li><a href="scripts/logout.php">Abmelden</a></li>
          <li><a href="gallery.php">Gallerie</a></li>

          <?php } ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </div>
</nav>
