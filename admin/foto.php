<?php 
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
  alert(Anda belum Login!');
  location.href='../index.php';
  </script>";
}

?>


<!DOCTYPE html>
<html lang="en">
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
            background-image: url("mountainous.jpg");
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
          <a href="home.php" class="nav-link active" aria-current="page">Home</a>
        </li>
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
      <div class="col-md-4">
        <div class="card mt-2">
          <div class="card-header">Tambah Foto</div>
          <div class="card-body">
            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
              <label class="form-label">Judul Foto</label>
              <input type="text" name="judulfoto" class="form-control" required>
              <label class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsifoto" required></textarea>
              <label class="form-label">Album</label>
              <select class="form-control" name="albumid" required>
               <?php
               $userid = $_SESSION['userid'];
               $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
               while($data_album = mysqli_fetch_array($sql_album)){ ?>
                <option value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
              <?php } ?>
            </select>
            <label class="form-label">File</label>
            <input type="file" class="form-control" name="lokasifile" required>
            <button type="submit" class="btn btn-primary mt-2" name="tambah">
            Tambah Data</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card mt-2">
        <div class="card-header">Data Album</div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Judul Foto</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbbody>
              <?php 
              $no = 1;
              $userid =  $_SESSION['userid'];
              $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
              while($data = mysqli_fetch_array($sql)){
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>
                  "width="100"></td>
                  <td><?php echo $data['judulfoto'] ?></td>
                  <td><?php echo $data['deskripsifoto'] ?></td>
                  <td><?php echo $data['tanggalunggah'] ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                      Edit
                    </button>

                    <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                             <label class="form-label">Judul Foto</label>
                             <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" 
                             class="form-control"required>
                             <label class="form-label">Deskripsi</label>
                             <textarea class="form-control" name="deskripsifoto" required>
                              <?php echo $data['deskripsifoto']; ?>
                            </textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid">
                             <?php
                             $userid = $_SESSION['userid'];
                             $sql_album = mysqli_query($koneksi, "SELECT * FROM album  WHERE userid='$userid'");
                             while($data_album = mysqli_fetch_array($sql_album)){ ?>
                               <option <?php if($data_album['albumid'] == $data['albumid']){ ?> selected="selected" <?php  } ?> value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                             <?php } ?>
                           </select>
                           <label class="form-label">Foto</label>
                           <div class="row">
                            <div class="col-md-4">
                              <img src="../assets/img/<?php echo $data['lokasifile'] ?>
                              "width="100">
                            </div>
                            <div class="col-md-8">
                              <label class="form-label">Ganti File</label>
                              <input type="file" class="form-control" name="lokasifile">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                  Hapus
                </button>
                
                <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="../config/aksi_foto.php" method="POST">
                          <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                          Apakah anda yakin akan menghapus data <strong> <?php 
                          echo $data['judulfoto'] ?> </strong> ?

                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
            </tr>
          <?php } ?>
        </tbbody>
      </table>
    </div>
  </div>
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