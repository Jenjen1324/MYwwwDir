<?php

session_start();
$_SESSION['id'] = null; // To make sure
session_destroy();

header("Location: index.php?m=Logout%20Success");
