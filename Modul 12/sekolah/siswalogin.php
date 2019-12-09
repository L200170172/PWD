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

    <title>Siswa</title>
  </head>
  <body class="color">
    <center>

<section class="about" id="siswalogin">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col_about">
            Siswa
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

      $nislama = $_POST["nislama"];
      $nis = $_POST["nis"];
      $nama_siswa = $_POST["nama_siswa"];
      $alamat_siswa = $_POST["alamat_siswa"];
      $keterangan = $_POST["keterangan"];
      $tahun_masuk = $_POST["tahun_masuk"];
      $tahun_keluar = $_POST["tahun_keluar"];

      // Input berupa tombol submit atau ubah

      $Submit = $_POST["Submit"];
      $Ubah = $_POST["Ubah"];

      // Ketika tombol submit di tekan

      if ($Submit) {
        if ($nis == "") {
          echo "<h3>NIS tidak boleh kosong</h3>";
        } elseif ($nama_siswa == "") {
          echo "<h3>Nama tidak boleh kosong</h3>";
        } elseif ($alamat_siswa == "") {
          echo "<h3>Alamat tidak boleh kosong</h3>";
        } elseif ($keterangan == "") {
          echo "<h3>Keterangan tidak boleh kosong</h3>";
        } elseif ($tahun_masuk == "") {
          echo "<h3>Tahun tidak boleh kosong</h3>";
        } elseif ($tahun_keluar == "") {
          echo "<h3>Tahun tidak boleh kosong</h3>";
        } else {
          $insert = "INSERT INTO siswa (nis, nama_siswa, alamat_siswa, keterangan, tahun_masuk, tahun_keluar) 
                VALUES ('$nis','$nama_siswa','$alamat_siswa','$keterangan','$tahun_masuk','$tahun_keluar')
              ";
          mysqli_query($conn, $insert); // Melakukan insert ke database
          echo "<h3>Data Berhasil Dimasukkan</h3>";
        }
      
      // Ketika tombol ubah di tekan
      } elseif ($Ubah) {
        if ($nis == "") {
          echo "<h3>NIS tidak boleh kosong</h3>";
        } elseif ($nama_siswa == "") {
          echo "<h3>Nama tidak boleh kosong</h3>";
        } elseif ($alamat_siswa == "") {
          echo "<h3>Alamat tidak boleh kosong</h3>";
        } elseif ($keterangan == "") {
          echo "<h3>Keterangan tidak boleh kosong</h3>";
        } elseif ($tahun_masuk == "") {
          echo "<h3>Tahun tidak boleh kosong</h3>";
        } elseif ($tahun_keluar == "") {
          echo "<h3>Tahun tidak boleh kosong</h3>";
        } else {
          $update = " UPDATE siswa
                SET nis='$nis', nama_siswa='$nama_siswa', alamat_siswa='$alamat_siswa', keterangan='$keterangan', tahun_masuk='$tahun_masuk', 
                tahun_keluar='$tahun_keluar' 
                WHERE nis = '$nislama'
              ";
          mysqli_query($conn, $update); // Melakukan insert ke database
          echo "<h3>Data Berhasil Diubah</h3>";
        }
      }
      // Ketika tombol hapus(di kolom aksi) di tekan

      if ($_GET["hps"]) {
        $nis = $_GET["hps"]; //NIP di dapat dari $_GET atau Link URL
        $hapus = "DELETE FROM siswa WHERE nis = '$nis'";
        mysqli_query($conn, $hapus);
        echo "<h3>Data berhasil di hapus</h3>";
      
      // Ketika tombol ubah(di kolom aksi) di tekan

      } elseif ($_GET["ubh"]) {
        $nis = $_GET["ubh"]; //NIP di dapat dari $_GET atau Link URL
        $cari = "SELECT * FROM siswa WHERE nis='$nis'";
        $hasil = mysqli_query($conn, $cari);
        $datasiswa = mysqli_fetch_row($hasil); // Data guru yang akan diubah
      }
    ?>

  
    <form method="post" action="siswalogin.php">
      <table>
        <tr>
          <td>NIS</td>
          <td>:</td>
          <td> 
            <input type="text" name="nis" value="<?php echo $datasiswa[0] ?>">
            <!-- Membuat input baru dengan type hidden untuk mengirimkan NIP lama atau NIP yang belum di ubah sebagai acuan untuk men-select data -->
            <input type="hidden" name="nislama" value="<?php echo $datasiswa[0] ?>">
          </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>
            <input type="text" name="nama_siswa" value="<?php echo $datasiswa[1] ?>">
          </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>
            <input type="text" name="alamat_siswa" value="<?php echo $datasiswa[2] ?>">
          </td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td>
            <input type="text" name="keterangan" value="<?php echo $datasiswa[3] ?>">
          </td>
        </tr>
        <tr>
          <td>Tahun Masuk</td>
          <td>:</td>
          <td>
            <input type="text" name="tahun_masuk" value="<?php echo $datasiswa[4] ?>">
          </td>
        </tr>
        <tr>
          <td>Tahun Keluar</td>
          <td>:</td>
          <td>
            <input type="text" name="tahun_keluar" value="<?php echo $datasiswa[5] ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <?php
              // Cek apakah dataguru ada atau tidak
              if ($datasiswa) {
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
        <td>NIS</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Keterangan</td>
        <td>Tahun Masuk</td>
        <td>Tahun Keluar</td>
        <td>Aksi</td>
      </tr>
      <center>
      <?php
        $cari = "SELECT * FROM siswa";
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
              <td>$data[5]</td>
              <td>
                <a href='siswalogin.php?ubh=$data[0]'>Ubah</a>
                <a href='siswalogin.php?hps=$data[0]'>Hapus</a>
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