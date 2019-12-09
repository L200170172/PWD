<?php
$conn = mysqli_connect("localhost", "root", "", "Sekolah");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="design.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Pembelajaran</title>
  </head>
  <body class="color">
    <center>

      <section class="about" id="pembelajaran">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col_about">
            Pembelajaran
            <hr>
          </div>
        </div>
      </div>
      <div class="navigasi">
      <a href="hal.php"><font color='black'>Home</font></a>        
  </div>

    <table border="1" cellpadding="10">
      <tr>
        <td>ID</td>
        <td>Kode Mata Pelajaran</td>
        <td>Nama Mata Pelajaran</td>
        <td>NIP</td>
        <td>Kriteria Pembelajaran</td>
      </tr>
      <center>
      <?php
        $cari = "SELECT * FROM pengajaran";
        $hasil = mysqli_query($conn, $cari);
        while ($data = mysqli_fetch_row($hasil)){
          // Tambahkan tombol ubah dan hapus dengan link menuju file ini dan dengan mengirim data $_GET dengan value NIP
          echo "
            <tr>
              <td>$data[0]</td>
              <td>$data[1]</td>
              <td>$data[2]</td>
              <td>$data[3]</td>
              <td>$data[4]</td>
              
            </tr>
          ";
        }
      ?>
    </center>
    </table>

  </center>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>