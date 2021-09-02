<?php

session_start();
if (!isset($_SESSION["token"])) header("Location: login.php");

include("model/zerofoxdb.php");
include("model/korisnik.class.php");

if (isset($_GET["akcija"]) && $_GET["akcija"] == "pobrisi"){
    Korisnik::pobrisi($_GET["id"]);
}



$id= $_SESSION["token"];
$upit = "SELECT * FROM korisnik WHERE ID=" .$id;
$rezultat = mysqli_query($konekcija, $upit);
$prijavljenikorisnik = mysqli_fetch_assoc($rezultat);
$naslov = "Welcome to ZeroFox " . ($prijavljenikorisnik["Ime"]);


// print(mysqli_error($konekcija));
//var_dump($rezultat);

//var_dump($redak);

include("static/header.php");

?>

      <div class="container h-100">
          <div class="row shadow p-4">
              <div class="col-12 mb-5">
                  <h5 class="float-left"> Administracija sustava</h5>
                  <a title="Log out" class="btn btn-light float-end mt-1" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="col-8">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>#ID</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    <?php

                    foreach (Korisnik::dajSve() as $korisnik):

                    ?>
                        <tr>
                            <td><?= $korisnik["ID"] ?></td>
                            <td><?= $korisnik["Ime"] ?></td>
                            <td><?= $korisnik["Prezime"] ?></td>
                            <td><?= $korisnik["email"] ?></td>
                            <td><a title="Edit user" class="btn btn-info" ref="<?= $korisnik["ID"]?>" href="users/edit.php" onclick="dohvati_korisnika(event);"><i class="fas fa-user-edit"></i></a></td>
                            <td><a title="Delete user" class="btn btn-info" href="index.php?akcija=pobrisi&id=<?=$korisnik["ID"] ?>"><i class="fas fa-user-slash"></i></a></td>
                        </tr>

                    <?php

                    endforeach

                    ?>

                    </table>
                    <div class="col-4">
                    <form method="POST" action="users/add.php">

                        <div class="form-group">
                            <label>Users Role</label>
                            <select class="form-control" name="ulogak"> 
                                <option value="1">Administrator</option>
                                <option value="2">Korisnik</option>
                                <option value="3">Gost</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Users Name</label>
                            <input type="text" class="form-control" name="imeKorisnika" placeholder="First Name" />
                        </div>

                        <div class="form-group">
                            <label>Users Surname</label>
                            <input type="text" class="form-control" name="prezimeKorisnika" placeholder="Last name" />
                        </div>

                        <div class="form-group">
                            <label>Users E-mail address</label>
                            <input type="email" class="form-control" name="emailKorisnika" placeholder="Valid e-mail address" />
                        </div>

                        <div class="form-group">
                            <label>Users Password</label>
                            <input type="password" class="form-control" name="lozinkaKorisnika" placeholder="Consider a strong password using numbers and letters" />
                        </div>

                        <div class="form-group">
                            <label>Users Role</label>
                            <select class="form-control" name="ulogaKorisnika"> 
                                <option value="Administrator">Administrator</option>
                                <option value="Korisnik">Korisnik</option>
                                <option value="Gost">Gost</option>
                            </select>
                        </div>
                    </div>

                <button type="submit" class="btn btn-light"><i class="far fa-save"></i></button>
            </form>

                        	
                </div>  
            
            </div>
        </div>

<script>
    function dohvati_korisnika(e){
        e.preventDefault();
        console.log(e.target);
        var id = e.target.getAttribute("ref");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                console.log(this.responseText); 
            }
        }
        xhttp.open("GET", "users/get.php?id="+id, true);
        xhttp.send();

    }
    </script>
  
<?php
include("static/footer.php");
?>

