<?php
require ("model/zerofoxdb.php");

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
        $SQL.= md5($_POST["lozinkaKorisnika"]) . "', 'Korisnik');";
        $rezultat = mysqli_query($konekcija, $SQL);
    }
}
$naslov = "Sign up to ZeroFox";
include("static/header.php");
?>

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
                <p>Already have an account? Log in <a href="login.php">here</a>.</p>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
              </div>
            </div>
        </div>


  
<?
include("static/footer.php");
?>