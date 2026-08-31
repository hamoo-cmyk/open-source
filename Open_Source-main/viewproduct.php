<?php
$title = "View_Product_Record";
require_once 'includes/header.php';
require_once 'includes/check_auth.php';
require_once 'db/conn.php';
$res = $c->viewrecordproduct();
?>
<table class="table table-dark">
    <tr>
        <th>#</th>
        <th>ProductName</th>
        <th>ExpireDate</th>
        <th>Amount</th>
        <th>Actions</th>
    </tr>
    <?php while($r = $res->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $r['id']; ?></td>
            <td><?php echo $r['productname']; ?></td>
            <td><?php echo $r['expiredat']; ?></td>
            <td><?php echo $r['amount']; ?></td>
            <td>
            <a href="insertexpire.php?id=<?php echo $r['id']; ?>"><button type="button"  class="btn btn-primary">move to Expiretable</button></a>
            <a href="deletepro.php?id=<?php echo $r['id']; ?>"><button type="button"  class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
   <?php } ?>
</table>
