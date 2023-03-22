<?php
require('function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kevinian</title>
  <link rel="icon" href="image/Logotittle.png" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&family=Roboto:wght@300&display=swap" rel="stylesheet" />

  <!-- my css -->
  <link rel="stylesheet" href="style.css/reset.css" />
  <link rel="stylesheet" href="style.css/style.css" />

  <!-- icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
  <nav>
    <div class="container-nav">
      <div class="nav-logo">
        <img src="image/Logo.png" alt="logo" />
      </div>
      <div class="nav-menu">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#hobby">hobby</a>
        <a href="#addres">addres</a>
        <a href="#contact">contact</a>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Jumbotron -->
  <div id="home" class="jumbotron">
    <div class="container">
      <div class="box-1">
        <h2>Hii,</h2>
        <h1>PERKENALKAN AKU</h1>
        <h1 class="h1-2">KEVIN IANSYAH</h1>
        <p>
          Saya adalah seorang mahasiswa yang sedang menempuh pendidikan di
          jurusan Informatika di salah satu kampus negeri yang ada di kota
          Surabaya yaitu Universitas Pembangunan Nasional “Veteran” Jawa
          Timur.
        </p>
        <p class="sub-p">FIND ME ON</p>
        <div class="box-bs">
          <div class="box-sosmed">
            <a class="instagram1" target="_blank" href="https://instagram.com/keviniansyah?igshid=ZDdkNTZiNTM="><i class="bx bxl-instagram-alt"></i></a>
            <a class="facebook1" target="_blank" href="https://www.facebook.com/kevin.iansyah"><i class="bx bxl-facebook-square"></i></a>
            <a class="linkedin1" target="_blank" href="https://github.com/KevinIansyah"><i class="bx bxl-linkedin-square"></i></a>
            <a class="github1" target="_blank" href="https://www.linkedin.com/in/kevin-iansyah-594138267"><i class="bx bxl-github"></i></a>
          </div>
        </div>
      </div>
      <div class="box-2">
        <picture>
          <img src="image/Hero-1.png" alt="" />
        </picture>
      </div>
    </div>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Halaman 2 -->
  <section id="about" class="about-me">
    <div class="container">
      <div class="box-3">
        <picture>
          <img src="image/Hero-2.png" alt="" />
        </picture>
      </div>
      <div class="box-4">
        <h2>Discover</h2>
        <h1>About Me.</h1>
        <p>
          Hai! Nama saya Kevin, saya mahasiswa Universitas Pembangunan
          Nasional “Veteran” Jawa Timur, Fakultas Ilmu Komputer, Jurusan
          Teknik Informatika.
        </p>
        <div class="box-table">
          <table class="tabel-1">
            <tr>
              <td><b>Nama : </b><?php echo $biodata["nama"]; ?></td>
            </tr>
            <tr>
              <td><b>Ttl : </b><?php echo $biodata["ttl"]; ?></td>
            </tr>
            <tr>
              <td><b>Age : </b><?php age() ?></td>
            </tr>
            <tr>
              <td><b>Jenis kelamin : </b><?php echo $biodata["jeniskelamin"]; ?></td>
            </tr>
            <tr>
              <td><b>Agama : </b><?php echo $biodata["agama"]; ?></td>
            </tr>
          </table>
          <table class="tabel-2">
            <tr>
              <td><b>Kewarganegaraan : </b><?php echo $biodata["kewarganegaraan"]; ?></td>
            </tr>
            <tr>
              <td><b>Suku : </b><?php echo $biodata["suku"]; ?></td>
            </tr>
            <tr>
              <td><b>Tb : </b><?php echo $biodata["tb"]; ?></td>
            </tr>
            <tr>
              <td><b>Bb : </b><?php echo $biodata["bb"]; ?></td>
            </tr>
            <tr>
              <td><b>Status : </b><?php echo $biodata["status"]; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir halaman 2 -->

  <!-- Halaman 3 -->
  <section id="hobby" class="hobby">
    <div class="container">
      <h1>Hob<span>by.</span></h1>
      <div class="box-card">
        <div class="card">
          <figure>
            <img src="image/Hobi1.jpg" alt="" />
            <figcaption>Mendaki.</figcaption>
          </figure>
        </div>
        <div class="card">
          <figure>
            <img src="image/Hobi2.jpg" alt="" />
            <figcaption>Bermain gitar.</figcaption>
          </figure>
        </div>
        <div class="card">
          <figure>
            <img src="image/Hobi3.jpg" alt="" />
            <figcaption>Ngoding hehe.</figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir halaman 3 -->

  <!-- Halaman 4 -->
  <section id="addres" class="addres">
    <div class="container">
      <div class="box-5">
        <h1>Add<span>res.</span></h1>
        <p>
          Saya tinggal di Dusun jani RT.004 RW.003, Desa Segunung,
          <br />Kecamatan Dlanggu, Kabupaten Mojokerto.
        </p>
        <a href="https://goo.gl/maps/qJGj43DZc58FGGwx5" type="button" class="button" target="_blank">Visit me <i class="bx bx-right-arrow-alt"></i></a>
      </div>
      <div class="box-6">
        <div class="box-maps">
          <picture>
            <img src="image/Maps.png" alt="maps" />
          </picture>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir halaman 4 -->

  <!-- Halaman 5 -->
  <section id="contact" class="contact">
    <div class="container">
      <h1>Contact Me<span> on.</span></h1>
      <div class="box-bc">
        <div class="box-contact">
          <a href="https://instagram.com/keviniansyah?igshid=ZDdkNTZiNTM=" type="button" class="button-contact instagram" target="_blank"><i class="bx bxl-instagram-alt"></i>
            <p>Instagram</p>
          </a>
          <a href="https://www.facebook.com/kevin.iansyah" type="button" class="button-contact facebook" target="_blank"><i class="bx bxl-facebook-square"></i>
            <p>Facebook</p>
          </a>
          <a href="https://www.linkedin.com/in/kevin-iansyah-594138267" type="button" class="button-contact linkedin" target="_blank"><i class="bx bxl-linkedin-square"></i>
            <p>Linkedin</p>
          </a>
          <a href="https://github.com/KevinIansyah" type="button" class="button-contact github" target="_blank"><i class="bx bxl-github"></i>
            <p>Github</p>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Halaman 5 -->

  <!-- Halaman 6 -->
  <section class="tools">
    <div class="container">
      <h1>Too<span>ls.</span></h1>
      <div class="box-tl">
        <div class="box-tools">
          <img src="image/figma.png" alt="" />
          <img src="image/html.png" alt="" />
          <img src="image/css.png" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir halaman 6 -->

  <!-- Footer -->
  <footer>
    <p>copyright by <i class="bx bxs-copyright"></i> kevin 2023.</p>
  </footer>
  <!-- Akhir footer -->

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>