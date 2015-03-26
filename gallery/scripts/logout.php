<?php

require_once("../lib/user.php");

User::logout();

header("Location: ../index.php?m=Logout erfolgreich");
die();
