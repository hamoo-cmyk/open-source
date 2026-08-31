<?php
$title = "Home";
require_once 'includes/header.php';
#ghghg
require_once 'db/conn.php';
?>
<link rel="stylesheet" href="css/design.css">
<br>
<form class="d-flex" role="search" method="post" action="searchproductname.php">
    <input class="form-control me-2 mt-4" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success " type="submit">Search</button>
</form>

<a href="expiresoon.php"> <button class="btn btn-inline-success " type="submit">Search</button></a>