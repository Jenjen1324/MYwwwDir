<?php
$_TITLE = "Gallerie";

include("resources/head.php");

include("resources/navbar.php");

if(!$current_user)
{
  header("Location: index.php?m=Fehlende berechtigung!");
  die();
}

$pics = Picture::loadPictures();


?>

<div class="container">

<?php
$count = 0;

foreach($pics as $p)
{
  if($count == 3)
    $count = 0;
  if($count == 0)
    echo '<div class="row">';
 ?>

    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <a href="image.php?id=<?php echo $p->id; ?>"><img src="<?php echo PATH_PFILES . $p->filename; ?>" alt="<?php echo $p->name; ?>"></a>
        <div class="caption">
          <h3><?php echo $p->name; ?></h3>
          <p><?php echo $p->desc; ?></p>
          <p><span class="glyphicon glyphicon-eye-open"></span> <?php echo $p->views; ?> <span class="glyphicon glyphicon-arrow-down"></span> <?php echo $p->downloads; ?> <span class="glyphicon glyphicon-comment"></span> <?php echo sizeof($p->comments); ?></p>
        </div>
      </div>
    </div>

<?php
  if($count == 2)
    echo '</div>';

  $count++;
}
 ?>

</div>


<?php

include("resources/footer.php");

?>
