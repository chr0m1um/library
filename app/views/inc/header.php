<!-- header from free bootstrap themes site -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link styles -->
    <link rel="stylesheet" href="<?php echo ROUTE_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROUTE_URL; ?>css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo ROUTE_URL; ?>css/style.css">
    <script src="<?php echo ROUTE_URL ?>js/jquery-3.6.1.js"></script>
    <title><?php echo SITE_NAME; ?></title>
<!-- header -->
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo ROUTE_URL; ?>account/">Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROUTE_URL; ?>account/genres">Жанри</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROUTE_URL; ?>account/books">Книги</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROUTE_URL; ?>account/issue">Записи</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
    