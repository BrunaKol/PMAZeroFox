<?php


class Korisnik{

    public static function spasi($korisnik){

        global $konekcija;

        $ime = $korisnik["imeKorisnika"];
        $uloga = $korisnik["ulogaKorisnika"];
        $prezime = $korisnik["prezimeKorisnika"];
        $email = $korisnik["emailKorisnika"];
        $lozinka = $korisnik["lozinkaKorisnika"];
        $uloga = $korisnik["uloga"];

        $upit = "INSERT INTO korisnik VALUES (null, 2, '".$ime."', '".$prezime."', '".$email."', '".$lozinka."', '".$uloga."')";
        return mysqli_query($konekcija, $upit);
        


    }

    public static function pobrisi($id){
        global $konekcija;
        $id = intval($id);
        $upit = "DELETE FROM korisnik WHERE ID=" . $id;
        return mysqli_query($konekcija, $upit);
    }

    public static function dajSve(){
        global $konekcija;
        $upit = "SELECT * FROM korisnik";
        $rezultat = mysqli_query($konekcija, $upit);
        $lista = array();
         while ($redak = mysqli_fetch_assoc($rezultat))
             array_push($lista, $redak);
         return $lista;

    }
}


?>