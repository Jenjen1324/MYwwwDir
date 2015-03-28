<?php
$_TITLE = "Gallerie";

include("resources/head.php");

include("resources/navbar.php");

$pics = Picture::loadPictures();


?>

<div class="container">

<?php
$count = 0;

foreach($pics as $p)
{
  if($count == 4)
    $count = 0;
  if($count == 0)
    echo '<div class="row">';
 ?>

  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <a href="#"><img src="img/thmb.svg" alt="Thumbnail"></a>
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p style="text-style:justify;width:100%;"><span class="glyphicon glyphicon-eye-open"></span> 12 <span class="glyphicon glyphicon-arrow-down"></span> 4 <span class="glyphicon glyphicon-comment"></span> 5</p>
        </div>
      </div>
    </div>
  </div>

<?php
  if($count == 0)
    echo '</div>';

  $count++;
}
 ?>

</div>


<?php

include("resources/footer.php");

?>
