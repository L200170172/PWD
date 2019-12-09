<?php
$conn = mysqli_connect("localhost", "root", "", "Sekolah");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="design.css" />

    <title>Login</title>
  </head>
  <body class='back'>

    
    <?php
        if(isset ($_POST['login'])){
          $nama = $_POST['nama'];
          $password = $_POST['password'];

          $hasil=mysqli_query($conn, "SELECT * FROM login where nama='$nama'");
          if(mysqli_num_rows($hasil)===1){
            $row = mysqli_fetch_assoc($hasil);
            if($password == $row['password']){
              header("location:hallogin.php");
              exit;
            }
          }
        }
    ?> 


    <center>
    <div class="form" > 
    <div class="padding_this"> 
    <center>
      <table border='0' width='40%'>
      <h3 class="masuk">Login<h3>
      <form method='POST' action='login.php'>

      <tr><td width='20%'><b> Nama </b></td>
      <td width='50%'><input type='text' name='nama' size='20' class='radius' id="nama"></td></tr>
  
      <tr><td width='20%'><b> Password </b></td>
      <td width='50%'><input type='password' name='password' size='20' class='radius' id="password"></td></tr>

      <tr>
        <td colspan='2' align='center'><input type='submit' value='Masuk' name='login'></td></tr>
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></table></div></div>
  </body>
</html>