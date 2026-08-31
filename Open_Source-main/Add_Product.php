<?php
$title = "Add_Product";
require_once 'includes/header.php';
require_once 'includes/check_auth.php';

require_once 'db/conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $monthInput = $_POST['date'];
    $formattedDate = $monthInput . "-01";
    $c->insertproduct($_POST['productname'], $formattedDate, $_POST['amount']);
}
?>
<link rel="stylesheet" href="css/Editpro.css">
<br>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="productname">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Date Of Expire</label>
        <input type="month" class="form-control" id="exampleFormControlInput1" name="date" >
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount" min="1">
    </div>
    <button onclick="return confirm('You will add this product.!');" type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>