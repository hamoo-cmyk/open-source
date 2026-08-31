<?php
$title = "View_Client_Record";
require_once 'includes/header.php';
require_once 'includes/check_auth.php';

require_once 'db/conn.php';
$res = $c->viewrecordclient();
?>
<table class="table table-dark">
    <tr>
        <th>#</th>
        <th>UserName</th>
        <th>DateOfBirth</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>

    </tr>
    <?php while ($r = $res->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $r['id'] ?></td>
            <td><?php echo $r['username'] ?></td>
            <td><?php echo $r['dat'] ?></td>
            <td><?php echo $r['email'] ?></td>
            <td><?php echo $r['phone'] ?></td>
            <td>
                <a href="deleteuser.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                <a href="viewonereclient.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-primary">View More</button></a>
            </td>
        </tr>

    <?php } ?>
</table>