<?php

session_start();
if (!isset($_SESSION["token"])) header("Location: login.php");

include("../model/zerofoxdb.php");
include("../model/korisnik.class.php");

$id= $_SESSION["token"];
$upit = "SELECT * FROM korisnik WHERE ID=" .$id;
$rezultat = mysqli_query($konekcija, $upit);
$prijavljenikorisnik = mysqli_fetch_assoc($rezultat);

if (!$prijavljenikorisnik) header("Location: login.php");

if ($prijavljenikorisnik["IDUloge"] == 1)
    Korisnik::spasi($_POST);

header("Location: ../index.php");
?>