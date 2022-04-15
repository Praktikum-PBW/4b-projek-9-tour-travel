<?php
session_start(); 

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['no_telp'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users_reg WHERE no_telp = '$username'");

    if(mysqli_num_rows($result) === 1){

        $row = mysqli_fetch_assoc($result);

        if ( password_verify($password, $row['password']) ){
            $_SESSION['login'] = true;

            header('Location: index.php');
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Halaman Login</title>
  </head>
  <body>
  <div class="container p-5 bg-white shadow p-3" style="max-width:600px; border-radius: 2%; margin-top:6rem">
  <img src="travels.svg" class="img-back-1">
  <img src="travels2.svg" class="img-back-2">
    <h3 style="text-align:center">Log in</h3>
    <p>Belum punya akun? <a href="registrasi.php">Sign In</a></p>

    <?php if(isset($error) ) : ?>
        <p>Username atau Kata sandi salah!</p>
    <?php endif; ?>
        <div class="container">
        <form action="" method="POST">
        <div class="mb-3 row">
            <label for="no_telp" class="form-label">Username</label>
            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan username">
        </div>
        <div class="mb-3 row">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi">
        </div>
        <button type="submit" name="login" class="btn btn-primary row">Log In</button>
        </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

