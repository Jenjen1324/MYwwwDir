<?php
$_TITLE = "Bild";

include("resources/head.php");

include("resources/navbar.php");

$pic = Picture::getPictureById($_GET['id']);

if(!$pic)
{
  header("Location: gallery.php?m=Bild existiert nicht!");
  die();
}

if($current_user)
{
  if(isset($_POST['ctext']))
  {
    if($pic->canComment($current_user))
    {
      $pic->comment($_POST['ctext']);
    }
  }

}
else
{
  header("Location: index.php?m=Sie sind nicht angemeldet!");
}

?>

<style>
img {
  margin-top: 10px;
  margin-bottom: 10px;
  width: 100%;
}
</style>


<div class="container">
  <h1><?php echo $pic->name; ?></h1>
  <img src="<?php echo PATH_PFILES . $pic->filename; ?>" alt="<?php $pic->name; ?>">
  <div class="col-md-6">
    <h2>Kommentare</h2>
    <?php
    if(sizeof($pic->comments) == 0)
      echo '<p>Keine vorhanden</p>';
    else
    {
      foreach($pic->comments as $c)
      {
        $user = User::getUserById($c->uid);
        ?>
        <div class="media comment">
          <div class="media-body">
            <h4 class="media-heading">
              <?php echo $user->username; ?>
            </h4>
            <p><?php echo $c->text; ?></p>
            <p><em class="text-muted"><?php echo $c->date; ?></em></p>
          </div>
        </div>
        <?php
      }
    }
     ?>
  </div>
  <div class="col-md-6">
  <h2>Neuer Kommentar</h2>
    <form method="post" action="image.php?id=<?php echo $pic->id; ?>">
      <div class="form-group">
        <label for="ctext">Text</label>
        <textarea id="ctext" name="ctext" class="form-control"></textarea>
      </div class="form-group">
      <div class="form-group">
        <input type="submit" value="Abschicken" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>

<div style="height:200px;"></div>

<?php

include("resources/footer.php");

?>
