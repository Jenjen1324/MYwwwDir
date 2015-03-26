<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once("lib/user.php");
require_once("lib/picture.php");

$current_user = User::getCurrentUser();

// - Login Script
if(isset($_POST['username']) && isset($_POST['password']))
{

  try
  {
    User::login($_POST['username'], $_POST['password']);
    header("Location: index.php");
  }
  catch(Exception $ex)
  {
    header("Location: index.php?m=" . $ex->getMessage());
    die();
  }
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_TITLE; ?></title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <meta charset="UTF-8">
    <script src="scripts/jquery-1.11.2.min.js"></script>
  </head>
  <body>

<?php if(!$current_user) { ?>
    <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="modal_loginLabel" aria-hidden="true">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="username">Benutzername</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Benutzername eingeben" />
              </div>
              <div class="form-group">
                <label for="password">Passwort</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort eingeben" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary">Einloggen</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </form>
    </div><!-- /.modal -->
<?php } ?>

<?php if(isset($_GET['m'])) { ?>
    <div class="modal fade" id="modal_message" tabindex="-1" role="dialog" aria-labelledby="modal_messageLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <?php echo $_GET['m']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
    $(document).ready(function() {
        $("#modal_message").modal();
    });
    </script>

<?php } ?>
