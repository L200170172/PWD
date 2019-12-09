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

    <title>Guru</title>
  </head>
  <body class="color">
    <center>
      <section class="about" id="gurulogin">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col_about">
            Guru
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

      $niplama = $_POST["niplama"];
      $nip = $_POST["nip"];
      $nama_guru = $_POST["nama_guru"];
      $alamat_guru = $_POST["alamat_guru"];
      $kode_mapel = $_POST["kode_mapel"];

      // Input berupa tombol submit atau ubah

      $Submit = $_POST["Submit"];
      $Ubah = $_POST["Ubah"];

      // Ketika tombol submit di tekan

      if ($Submit) {
        if ($nip == "") {
          echo "<h3>NIP tidak boleh kosong</h3>";
        } elseif ($nama_guru == "") {
          echo "<h3>Nama tidak boleh kosong</h3>";
        } elseif ($alamat_guru == "") {
          echo "<h3>Alamat tidak boleh kosong</h3>";
        } elseif ($kode_mapel == "") {
          echo "<h3>Kode Mapel tidak boleh kosong</h3>";
        } else {
          $insert = "INSERT INTO guru (nip, nama_guru, alamat_guru, kode_mapel) 
                VALUES ('$nip','$nama_guru','$alamat_guru','$kode_mapel')
              ";
          mysqli_query($conn, $insert); // Melakukan insert ke database
          echo "<h3>Data Berhasil Dimasukkan</h3>";
        }
      
      // Ketika tombol ubah di tekan
      } elseif ($Ubah) {
        if ($nip == "") {
          echo "<h3>NIP tidak boleh kosong</h3>";
        } elseif ($nama_guru == "") {
          echo "<h3>Nama tidak boleh kosong</h3>";
        } elseif ($alamat_guru == "") {
          echo "<h3>Alamat tidak boleh kosong</h3>";
        } elseif ($kode_mapel == "") {
          echo "<h3>Kode Mapel tidak boleh kosong</h3>";
        } else {
          $update = " UPDATE guru
                SET nip='$nip', nama_guru='$nama_guru', alamat_guru='$alamat_guru', kode_mapel='$kode_mapel'
                WHERE nip = '$niplama'
              ";
          mysqli_query($conn, $update); // Melakukan insert ke database
          echo "<h3>Data Berhasil Diubah</h3>";
        }
      }
      // Ketika tombol hapus(di kolom aksi) di tekan

      if ($_GET["hps"]) {
        $nip = $_GET["hps"]; //NIP di dapat dari $_GET atau Link URL
        $hapus = "DELETE FROM guru WHERE nip = '$nip'";
        mysqli_query($conn, $hapus);
        echo "<h3>Data berhasil di hapus</h3>";
      
      // Ketika tombol ubah(di kolom aksi) di tekan

      } elseif ($_GET["ubh"]) {
        $nip = $_GET["ubh"]; //NIP di dapat dari $_GET atau Link URL
        $cari = "SELECT * FROM guru WHERE nip='$nip'";
        $hasil = mysqli_query($conn, $cari);
        $dataguru = mysqli_fetch_row($hasil); // Data guru yang akan diubah
      }
    ?>

  
    <form method="post" action="gurulogin.php">
      <table>
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td> 
            <input type="text" name="nip" value="<?php echo $dataguru[0] ?>">
            <!-- Membuat input baru dengan type hidden untuk mengirimkan NIP lama atau NIP yang belum di ubah sebagai acuan untuk men-select data -->
            <input type="hidden" name="niplama" value="<?php echo $dataguru[0] ?>">
          </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>
            <input type="text" name="nama_guru" value="<?php echo $dataguru[1] ?>">
          </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>
            <input type="text" name="alamat_guru" value="<?php echo $dataguru[2] ?>">
          </td>
        </tr>
        <tr>
          <td>Kode Mata Pelajaran</td>
          <td>:</td>
          <td>
            <input type="text" name="kode_mapel" value="<?php echo $dataguru[3] ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <?php
              // Cek apakah dataguru ada atau tidak
              if ($dataguru) {
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
        <td>NIP</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Kode Mata Pelajaran</td>
        <td>Aksi</td>
      </tr>
      <center>
      <?php
        $cari = "SELECT * FROM guru";
        $hasil = mysqli_query($conn, $cari);
        while ($data = mysqli_fetch_row($hasil)){
          // Tambahkan tombol ubah dan hapus dengan link menuju file ini dan dengan mengirim data $_GET dengan value NIP
          echo "
            <tr>
              <td>$data[0]</td>
              <td>$data[1]</td>
              <td>$data[2]</td>
              <td>$data[3]</td>
              <td>
                <a href='gurulogin.php?ubh=$data[0]'>Ubah</a>
                <a href='gurulogin.php?hps=$data[0]'>Hapus</a>
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