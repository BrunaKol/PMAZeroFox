<?php


include("zerofoxdb.php");

$upit = "SELECT * FROM korisnik";

$rezultat = mysqli_query($konekcija, $upit);
// print(mysqli_error($konekcija));
var_dump($rezultat);

$redak = mysqli_fetch_assoc($rezultat);
var_dump($redak);


?>