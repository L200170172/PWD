<!doctype html>
<html lang="en">
  <head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="design2.css" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Menu Utama</title>
  </head>
  <body class="color">
  <center>
  <header> 
  <div class="logo">
    <a href="hal.php"><font color='black'>Log Out</font></a>
  </div>

  <div class="navigasi">
      <ul>
        <li><a href="allabout.php"><font color='black'>About</font></a></li>
        <li><a href="gurulogin.php"><font color='black'>Guru</font></a></li>
        <li><a href="siswalogin.php"><font color='black'>Siswa</font></a></li>
        <li><a href="pembelajaranlogin.php"><font color='black'>Pembelajaran</font></a></li>
      </ul>
          
  </div>
</header>
</center>
<main>
  <center>
  <div class="konten"> 
    <div class="padding_this">
      <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="hal1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="hal2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="hal3.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="hal4.jpg" style="width:100%">
</div>
</div>

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
</div>  
    </div>
  </div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2500); // Change image every 1 seconds
}
</script>
</center>
</main>
<center>
<footer>
  <div class="footer">
    <center><p><font color="black">&copy; Copyright - @hastyana_hr</font></p></center>
    <table>
    <tr>
    <td><a href='http://gmail.com'><img src='gmail.png' width='50' height='50'></td><td><font color="black">sekolahan2019@gmail.com</font></td></a>
    </tr>
    <tr>
    <td><img src='phone.png' width='50' height='50'></td><td><p><font color="black">303058</font></p></td>
    </tr>
    </table>
  </div>
</footer>
</center>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>