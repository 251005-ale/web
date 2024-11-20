<?php
$conex = mysqli_connect("localhost", "root", "", "Biblioteca");

if (!$conex) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
