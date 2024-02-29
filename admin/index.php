<?php 
session_start();
$userid = $_SESSION['userid'];

include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
  alert(Anda belum Login!');
  location.href='../index.php';
  </script>";
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="Danger">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
        body {
            height: 100%;
            font-family: Arial, sans-serif;
            margin: 0;
        }
 
        .bg-img {
            background-image: url("bali-temple.jpg");
            min-height: 100vh;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
 
        .container {
            position: relative;
            max-width: 300px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
 
        h1 {
            text-align: center;
            color: green;
            -webkit-text-stroke: 1px black;
            margin-bottom: 20px;
        }
 
        b {
            color: green;
            font-size: 18px;
            -webkit-text-stroke: 1px black;
        }
        .button {
            background-color: green;
            color: white;
            padding: 14px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
 
        .button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
  <title>website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
       <div class="p-3 text-Success-emphasis bg-Success-subtle border border-Success-subtle rounded-3">       
      <div class="collapse navbar-collapse mt-3" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">  
          <ul class="nav nav-tabs">
            <li class="nav-item">
          <a href="album.php" class="nav-link active" aria-current="page">Album</a>
        </li>
          <a href="foto.php" class="nav-link active" aria-current="page">Foto</a>
          </li>
        </ul>
        </div>

        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
      </div>
    </div>
  </nav>

<body>
<div class="bg-img">
  <div class="container">
    <div class="row">

      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
      while ($data = mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-3">
          <a type="button" data-bs-toggle="modal" data-bs-target="#Komentar<?php echo $data['fotoid']?>">



            <div class="card mb-2">
             <img style="height: 12rem;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
             <div class="card-footer text-center">              
              <?php
              $fotoid = $data['fotoid'];
              $ceksuka = mysqli_query($koneksi,"SELECT * FROM likefoto WHERE fotoid='$fotoid' AND 
                userid='$userid'");
                if (mysqli_num_rows($ceksuka) == 2) { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="
                    submit" name="batalsuka"><i class="fa fa-heart"></i></a> 
                  <?php }else{ ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="
                      submit" name="suka"><i class="fa-regular fa-heart"></i></a> 
                    <?php }

                    $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($like). ' Suka';
                    ?>

                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#Komentar<?php echo $data['fotoid']?>"><i class="fa-regular fa-comment"></i> </a> 
                    <?php
                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($jmlkomen). ' Komentar';
                    ?>
                  </div>
                </div>
              </a>

              <!-- Modal -->
              <div class="modal fade" id="Komentar<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-8">
                           <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                        </div>
                        <div class="col-md-4">
                          <div class="m-2">
                            <div class="overflow-auto">
                              <div class="sticky-top">
                                <strong><?php echo $data['judulfoto'] ?></strong>
                                <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                              </div>
                              <hr>
                              <p align="left">
                                <?php echo $data['deskripsifoto'] ?>
                              </p>
                            <hr>
                            <?php
                            $fotoid = $data['fotoid'];
                            $komentar = mysqli_query($koneksi,"SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                            while($row = mysqli_fetch_array($komentar)){
                            ?>
                          <p align="left">
                            <strong><?php echo $row['namalengkap'] ?></strong>
                            <?php echo $row['isikomentar'] ?>
                          </p>
                          <?php } ?>
                            <hr>
                            <div class="sticky-bottom">
                              <form action="../config/proses_komentar.php" method="POST">
                                <div class="input-group">
                                  <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                  <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                  <div class="input-group-prepend">
                                    <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          <?php } ?>
        </div>
      </div>
    </div>



    <footer class="d-flex justify-content-center border-top mt-3
    bg-light fixed-bottom">
    <p>&copy; UKK_ELGA RPL 2024 | Nama Peserta</p>
  </footer>

  <script type="text/javascript" src="../assets/js/bootstrap.min css"></script>   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>