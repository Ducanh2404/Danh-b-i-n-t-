<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
  </head>
  <body>
  <header class="p-3 bg-info text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white"><i class="bi bi-house-door-fill"></i>Trang chủ</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Giới Thiệu</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Liên Hệ</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Tin Tức</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Tìm kiếm(Tên, ...)" aria-label="Search">
        </form>
        <?php 
          echo "Admin , " ; echo "&nbsp";
          echo "<a href='logout.php'>Logout</a>";
        ?>
      </div>
    </div>
  </header>