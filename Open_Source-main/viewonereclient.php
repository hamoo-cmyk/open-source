<?php
$title = "View_Record";
require_once 'includes/header.php';
// require_once 'includes/check_auth.php';

require_once 'db/conn.php';
$id = $_GET['id'];
$res = $c->viewonerecordclient($id);
?>
<table class="table table-dark">
    <tr>
        <th>#</th>
        <th>UserName</th>
        <th>DateOfBirth</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <tr>
        <td><?php echo $res['id'] ?></td>
        <td><?php echo $res['username'] ?></td>
        <td><?php echo $res['dat'] ?></td>
        <td><?php echo $res['email'] ?></td>
        <td><?php echo $res['phone'] ?></td>
    </tr>
</table>
<a href="viewclient.php"><button type="button" class="btn btn-primary">back</button></a>
