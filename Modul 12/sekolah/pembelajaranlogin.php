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

<section class="about" id="pembelajaranlogin">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col_about">
            Pembelajaran
            <hr>
          </div>
        </div>
      </div>
      <div class="navigasi">
      <a href="hallogin.php"><font color='black'>Home</font></a>    
  </div>

    <?php
      error_reporting(E_ALL ^ E_NOTICE);

      // Data diambil dari input type hidden

      $id_mapellama = $_POST["id_mapellama"];
      $id_mapel = $_POST["id_mapel"];
      $kode_mapel = $_POST["kode_mapel"];
      $nama_mapel = $_POST["nama_mapel"];
      $nip = $_POST["nip"];
      $kriteria_pengajaran = $_POST["kriteria_pengajaran"];

      // Input berupa tombol submit atau ubah

      $Submit = $_POST["Submit"];
      $Ubah = $_POST["Ubah"];

      // Ketika tombol submit di tekan

      if ($Submit) {
        if ($id_mapel == "") {
          echo "<h3>ID tidak boleh kosong</h3>";
        } elseif ($kode_mapel == "") {
          echo "<h3>Kode tidak boleh kosong</h3>";
        } elseif ($nama_mapel == "") {
          echo "<h3>Mata Pelajaran tidak boleh kosong</h3>";
        } elseif ($nip == "") {
          echo "<h3>NIP tidak boleh kosong</h3>";
        } elseif ($kriteria_pengajaran == "") {
          echo "<h3>Kriteria tidak boleh kosong</h3>";
        } else {
          $insert = "INSERT INTO pengajaran (id_mapel, kode_mapel, nama_mapel, nip, kriteria_pengajaran) 
                VALUES ('$id_mapel','$kode_mapel', '$nama_mapel', '$nip', '$kriteria_pengajaran')
              ";
          mysqli_query($conn, $insert); // Melakukan insert ke database
          echo "<h3>Data Berhasil Dimasukkan</h3>";
        }
      
      // Ketika tombol ubah di tekan
      } elseif ($Ubah) {
        if ($id_mapel == "") {
          echo "<h3>ID tidak boleh kosong</h3>";
        } elseif ($kode_mapel == "") {
          echo "<h3>Kode tidak boleh kosong</h3>";
        } elseif ($nama_mapel == "") {
          echo "<h3>Mata Pelajaran tidak boleh kosong</h3>";
        } elseif ($nip == "") {
          echo "<h3>NIP tidak boleh kosong</h3>";
        } elseif ($kriteria_pengajaran == "") {
          echo "<h3>Kriteria tidak boleh kosong</h3>";
        } else {
          $update = " UPDATE pengajaran
                SET id_mapel='$id_mapel', kode_mapel='$kode_mapel', nama_mapel='$nama_mapel', nip='$nip', kriteria_pengajaran='$kriteria_pengajaran' 
                WHERE id_mapel = '$id_mapel'
              ";
          mysqli_query($conn, $update); // Melakukan insert ke database
          echo "<h3>Data Berhasil Diubah</h3>";
        }
      }
      // Ketika tombol hapus(di kolom aksi) di tekan

      if ($_GET["hps"]) {
        $id_mapel = $_GET["hps"]; //NIP di dapat dari $_GET atau Link URL
        $hapus = "DELETE FROM pengajaran WHERE id_mapel = '$id_mapel'";
        mysqli_query($conn, $hapus);
        echo "<h3>Data berhasil di hapus</h3>";
      
      // Ketika tombol ubah(di kolom aksi) di tekan

      } elseif ($_GET["ubh"]) {
        $id_mapel = $_GET["ubh"]; //NIP di dapat dari $_GET atau Link URL
        $cari = "SELECT * FROM pengajaran WHERE id_mapel='$id_mapel'";
        $hasil = mysqli_query($conn, $cari);
        $datapembelajaran = mysqli_fetch_row($hasil); // Data guru yang akan diubah
      }
    ?>

  
    <form method="post" action="pembelajaranlogin.php">
      <table>
        <tr>
          <td>ID</td>
          <td>:</td>
          <td> 
            <input type="text" name="id_mapel" value="<?php echo $datapembelajaran[0] ?>"></td>
        </tr>
        <tr>
          <td>Kode Mapel</td>
          <td>:</td>
          <td>
            <input type="text" name="kode_mapel" value="<?php echo $datapembelajaran[1] ?>">
          </td>
        </tr>
        <tr>
          <td>Nama Mapel</td>
          <td>:</td>
          <td>
            <input type="text" name="nama_mapel" value="<?php echo $datapembelajaran[2] ?>">
          </td>
        </tr>
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td> 
            <input type="text" name="nip" value="<?php echo $datapembelajaran[3] ?>">
            <!-- Membuat input baru dengan type hidden untuk mengirimkan NIP lama atau NIP yang belum di ubah sebagai acuan untuk men-select data -->
            <input type="hidden" name="niplama" value="<?php echo $datapembelajaran[3] ?>">
          </td>
        </tr>
        <tr>
          <td>Kriteria Pembelajaran</td>
          <td>:</td>
          <td>
            <input type="text" name="kriteria_pengajaran" value="<?php echo $datapembelajaran[4] ?>">
          </td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>
            <?php
              // Cek apakah dataguru ada atau tidak
              if ($datapembelajaran) {
                echo "<input type='submit' name='Ubah' value='Ubah'>";
              } else {
                echo "<input type='submit' name='Submit' value='Submit'>";
              }
            ?>
          </td>
        </tr>
      </table>
    </form>

    <hr>

    <table border="1" cellpadding="10">
      <tr>
        <td>ID</td>
        <td>Kode Mata Pelajaran</td>
        <td>Nama Mata Pelajaran</td>
        <td>NIP</td>
        <td>Kriteria Pembelajaran</td>
        <td>Aksi</td>
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
              <td>
                <a href='pembelajaranlogin.php?ubh=$data[0]'>Ubah</a>
                <a href='pembelajaranlogin.php?hps=$data[0]'>Hapus</a>
              </td>
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