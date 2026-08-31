<?php
$title = "Home";
require_once 'includes/header.php';
require_once 'includes/check_auth.php';

require_once 'db/conn.php';

$searchTerm = $_POST['search']; // or $_POST['search'] depending on your form method
$results = $c->search($searchTerm);

if (!empty($results)) { ?>
    <table class="table table-dark">
        <tr>
            <th>source</th>
            <th>id</th>
            <th>name</th>
            <th>details</th>
        </tr>
        <tr>
            <?php foreach ($results as $row) { ?>
                <td><?php echo $row['source']; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <?php if ($row['source'] == 'medicine') { ?>
                    <td><?php echo $row['detail']; ?></td>
                <?php } else { ?>
                    <td><?php echo $row['detail']; ?></td>
                <?php } ?>
        </tr>
    <?php } ?>
    </table>
<?php } ?>
<a href="index.php"><button type="button" class="btn btn-primary">back</button></a>
