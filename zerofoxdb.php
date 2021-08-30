<?php


define("RACUNALO","localhost");
define("KORISNIK","root");
define("LOZINKA","");
define("BAZA", "zerofox");

$konekcija = mysqli_connect(RACUNALO, KORISNIK, LOZINKA, BAZA);

if (!$konekcija) {

    die("Nismo se spojili na bazu:" . mysqli_connect.error());
}
?>