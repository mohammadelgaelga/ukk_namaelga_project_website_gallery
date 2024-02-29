<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>website Galeri Foto</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style> 
    body {
      width: 100vw;
      height: 100vh;
      background-size: cover;
      background-blend-mode: normal;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body background="computer.jpg">
<body> 
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">

        </div>
        <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
        <a href="register.php" class="btn btn-outline-success m-1">Masuk</a>
      </div>
    </div>
  </nav>

 <div class="container mt-3">
  <div class="tiledBackground"></div>
  <div class="bgSizeContain">
    <div class="bgSizeCover">
    <div class="row">
     <div class="col-md-3">
      <div class="card-body">
      <div class="thumbnail">
        <div class="card text-bg-warning">
         <div class="caption">
          <a href="white-desk.jpg">
            <img src="white-desk.jpg" alt="white desk" style="height: 13rem;" class="img-thumbnail"> 
            <div class="card-footer text-center">
            <a href=""><i class="fa fa-heart"></i> 160 Suka</a>
             <a href=""><i class="fa-regular fa-heart"></i> 3 Komentar</a>
           </div>
         </a>
       </div>
     </div>
   </div>
 </div>
</div>
</div>

<footer class="d-flex justify-content-center border-top mt-3
bg-light fixed-bottom">
<p>&copy; UKK_ELGA RPL 2024 | Nama Peserta</p>
</footer>

<script type="text/javascript" src="assets/js/bootstrap.min css"></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>