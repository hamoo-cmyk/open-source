<?php
// require_once 'includes/check_auth.php';

require_once 'db/conn.php';
$id = $_GET['id'];
$res = $c->deletepro($id);
if ($res) {
    header("location: viewproduct.php");
}
