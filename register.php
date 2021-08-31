<?php
require ("zerofoxdb.php");
if (isset($_POST["imeKorisnika"])) {
    if ($_POST["imeKorisnika"] == ""  || $_POST["prezimeKorisnika"] == "" || $_POST["emailKorisnika"] == "" ||  $_POST["lozinkaKorisnika"] == "" || $_POST["pLozinkaKorisnika"] == "")
        $greska = "Fill up all the fields.";
    else if ($_POST["lozinkaKorisnika"] != $_POST["pLozinkaKorisnika"])
        $greska = "Passwords do not match!";
    else {
        $SQL = "INSERT INTO korisnik VALUES (null, 2 , '";
        $SQL.= $_POST["imeKorisnika"] . "', '";
        $SQL.= $_POST["prezimeKorisnika"] . "', '";
        $SQL.= $_POST["emailKorisnika"] . "', '";
        $SQL.= $_POST["lozinkaKorisnika"] . "', 'Korisnik');";
        //print(mysqli_error($konekcija));
        //print($SQL);
        $rezultat = mysqli_query($konekcija, $SQL);
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Registracija na ZeroFox</title>
    <style>
        html, body {
            height:100% !important;
        }
    </style>
  </head>

  <body>
      <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col large shadow p-4">
                  <h5>Sign up</h5>
                  <?php if (isset($greska)): ?>
            <div class="alert alert-danger"><?php echo($greska) ?></div>
            <?php endif ?>
            <form method="POST" action="register.php">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="imeKorisnika" placeholder="First Name" />
                </div>

                <div class="form-group">
                    <label>Surname</label>
                    <input type="text" class="form-control" name="prezimeKorisnika" placeholder="Last name" />
                </div>

                <div class="form-group">
                    <label>E-mail address</label>
                    <input type="email" class="form-control" name="emailKorisnika" placeholder="Valid e-mail address" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="lozinkaKorisnika" placeholder="Consider a strong password using numbers and letters" />
                </div>

                <div class="form-group">
                    <label>Password again</label>
                    <input type="password" class="form-control" name="pLozinkaKorisnika" placeholder="Confirm password" />
                </div>
                
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
              </div>
            </div>
        </div>


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    
  </body>
</html>