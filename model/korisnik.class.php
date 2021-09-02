<?php


class Korisnik{

    public static function spasi ($korisnik){
        global $konekcija;
        $ulogak = $korisnik["ulogak"];
        $ime = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["imeKorisnika"]));
        $prezime = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["prezimeKorisnika"]));
        $email = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["emailKorisnika"]));
        $lozinka = md5($korisnik["lozinkaKorisnika"]);
        $uloga = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["ulogaKorisnika"]));

        $upit = "INSERT INTO korisnik (ID, IDUloge, Ime, Prezime, email, lozinka, Uloga) VALUES (null, '".$ulogak."', '".$ime."', '".$prezime."', '".$email."', '".$lozinka."', '".$uloga."');";
        
        return mysqli_query($konekcija, $upit);
    }

    public static function dohvatijednog( $id){
        global $konekcija;
        $upit = "SELECT * FROM korisnik WHERE ID =" .$id;
        $rezultat = mysqli_query($konekcija, $upit);
         return mysqli_fetch_assoc($rezultat);

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