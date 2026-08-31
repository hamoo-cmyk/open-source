<?php
$title = "Home";
require_once 'includes/header.php';
require_once 'includes/check_auth.php';

require_once 'db/conn.php';
$res = $c->getProductsExpiringSoon();
?>
<table class="table table-dark">
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Expire Date</th>
        <th>Amount</th>
    </tr>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['productname'];?></td>
            <td><?php echo $row['expiredat'];?></td>
            <td><?php echo $row['amount'];?></td>
        </tr>
        <?php endforeach;?>
</table>
<a href="viewproduct.php"><button type="button" class="btn btn-primary">back</button></a>
