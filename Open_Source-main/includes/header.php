<?php include_once 'includes/session.php' ?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="color:cornflowerblue; font-size:x-large;">Open_Source</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php" style="font-size:x-large;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_Product.php" style="font-size:x-large;">Add_Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_Client.php" style="font-size:x-large;">Add_Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewclient.php" style="font-size:x-large;">View_Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewproduct.php" style="font-size:x-large;">View_Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewexpiret.php" style="font-size:x-large;">View_Expired</a>
          </li>
        </ul>
        <?php if(!isset($_SESSION['id'])){ ?>
        <a class="right" href="login.php" style="font-size:x-large;">login</a>
        <?php }else{?>
          <span>Hello <?php echo $_SESSION['username']; ?></span>
        <a class="right" href="logout.php" style="font-size:x-large;">logout</a>
        <?php } ?>
      </div>
    </div>
  </nav>
  <div class="container">