<?php
$_TITLE = "Administration";

include("resources/head.php");

include("resources/navbar.php");


// BEGIN USERMANAGE SCRIPT
try
{
  $u = User::getCurrentUser();
  if(!$u)
    throw new Exception("Sie sind nicht eingeloggt!");
  if(!$u->admin)
    throw new Exception("Fehlende Berechtigung!");

  if(isset($_GET['uid']))
  if(isset($_GET['a']))
  {
    if($_GET['a'] == "del")
      User::deleteUser(User::getUserById($_GET['uid']));
    if($_GET['a'] == "admin")
    {
      $user = User::getUserById($_GET['uid']);
      $user->admin = !$user->admin;
      User::editUser($user);
    }

    header("Location: admin.php");
    die();
  }


}
catch(Exception $ex)
{
  header("Location: index.php?m=" . $ex->getMessage());
}


// BEGIN PICUPLOAD SCRIPT

try
{
  if(isset($_POST['pname']))
  {
    if($_POST['pname'] != "")
    {
      Picture::uploadPicture($_POST['pname'], $_FILES["pupload"], $_POST['pdesc']);
    }
  }
}
catch (Exception $ex)
{
  die($ex);
}
?>

<style>
.file {
  padding: 0;
}
</style>

<div class="container">
  <div class="col-md-6">
    <h1>Benutzer</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>UID</th>
          <th>Benutzername</th>
          <th>E-Mail</th>
          <th>Aktionen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $users = User::loadUsers();

        foreach($users as $u)
        {
         ?>
         <tr>
           <td><?php echo $u->id; ?></td>
           <td><?php if($u->admin) { echo '<span class="label label-danger">Admin</span> '; } echo $u->username; ?></td>
           <td><?php echo $u->email; ?></td>
           <td><a class="btn btn-danger btn-xs" href="?a=del&uid=<?php echo $u->id; ?>">Löschen</a> <a class="btn btn-xs btn-warning" href="?a=admin&uid=<?php echo $u->id; ?>">Admin</a></td>
         </tr>
         <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h1>Bild Hochladen</h1>
    <form method="post" action="admin.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="pname">Bildname</label>
        <input type="text" class="form-control" id="pname" name="pname" placeholder="Bitte name eingeben...">
      </div>
      <div class="form-group">
        <label for="pupload">Bild auswählen</label>
        <input type="file" class="form-control file" id="pupload" name="pupload">
      </div>
      <div class="form-group">
        <label for="pdesc">Beschreibung</label>
        <textarea class="form-control" id="pdesc" name="pdesc"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Hochladen" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>


<?php

include("resources/footer.php");

?>
