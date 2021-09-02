<?php

session_start();

require("model/zerofoxdb.php");


if (isset($_POST["emailKorisnika"])){
    if ($_POST["emailKorisnika"] == "" || $_POST["lozinkaKorisnika"] == ""){
        $greska = "Please enter your e-mail and password.";
    } else {
        $SQL = "SELECT ID FROM korisnik WHERE";
        $SQL .= " email='" . $_POST["emailKorisnika"] . "' AND ";
        $SQL .= " lozinka='". md5($_POST["lozinkaKorisnika"]) . "'";
        $rezultat = mysqli_query($konekcija, $SQL);
        
        if (mysqli_num_rows($rezultat) == 0) {
            $greska = "This account doesn't exits. Enter a different one or get a new one.";
        } else {
            $korisnik = mysqli_fetch_assoc($rezultat);
            $_SESSION["token"] = $korisnik["ID"];
            header("Location: index.php");
        }
    }
}

$naslov = "Login to ZeroFox";

include("static/header.php");
?>

      <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col large shadow p-4">
                  <h5>Login</h5>
                  <?php if (isset($greska)): ?>
            <div class="alert alert-danger"><?php echo($greska) ?></div>
            <?php endif ?>
            <form method="POST" action="login.php">

                <div class="form-group">
                    <label>E-mail address</label>
                    <input type="email" class="form-control" name="emailKorisnika" placeholder="Enter your e-mail address" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="lozinkaKorisnika" placeholder="Password you use" />
                </div>
                <p>Don't have an account already? Sign up <a href="register.php">here</a>.</p>
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
              </div>
            </div>
        </div>
<?php
include("static/footer.php");
?>