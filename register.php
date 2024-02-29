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
            background-image: url("tibumana-waterfall-bali-island.jpg");
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
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
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
          <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
      </div>
  </div>
</nav>

<body>
    <div class="bg-img">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                          <div class="card-body bg-light">
                            <div class="text-center">
                                <h5>Daftar Akun Baru</h5>
                            </div>
                            <table border="1" width="374px">
                            <form action="config/aksi_register.php" method="POST">
                                <td bgcolor="yellow">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control required">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control required">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control required">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="namalengkap" class="form-control required">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control required">
                                <div class="d-grid mt-2">
                                    <button class="btn btn-primary" type="submit" name="kirim">Daftar</button>
                                </div>
                            </form>
                            <hr>
                            <p>Sudah punya akun? <a href="login.php">Login disini!</a></p>
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