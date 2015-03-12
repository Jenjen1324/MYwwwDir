<?php
$_TITLE = "Registrieren";

include("resources/head.php");

include("resources/navbar.php");
?>

<div class="container">
  <div class="col-md-6">
    <h1>Registrieren</h1>
    <form action="scripts/register.php" method="post">
      <div class="form-group">
        <label for="username">Benutzername</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Benutzername eingeben" />
        <p class="help-block">Nur Buchstaben und Zahlen [Aa-Zz0-9]</p>
      </div>
      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail eingeben" />
        <p class="help-block">Z.b. max@muster.com</p>
      </div>
      <div class="form-group">
        <label for="password">Passwort</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Passwort eingeben" />
        <p class="help-block">Mindestens 6 Zeichen</p>
      </div>
      <div class="form-group">
        <label for="password_verification">Passwort Bestätigen</label>
        <input type="password" class="form-control" id="password_verification" name="password_verification" placeholder="Passwort erneut eingeben" />
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-default" value="Abschicken" />
      </div>
    </form>
  </div>
  <div class="col-md-6">
    <h1>Nutzungsbedingungen</h1>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac augue mauris. Phasellus porta rutrum purus a rhoncus. Phasellus molestie sem id ante pharetra lobortis. Donec iaculis sapien odio, fermentum condimentum leo mollis in. Maecenas porta convallis leo, luctus dapibus velit. Donec vitae viverra massa. Fusce at egestas sem. Nullam molestie lacinia posuere. Suspendisse non enim nec turpis tempus porttitor quis a ex. Sed mollis turpis ac augue ornare, id pretium nunc rhoncus. Duis nec lacus dolor.
    </p>
  </div>
</div>

<?php

include("resources/footer.php");

?>
