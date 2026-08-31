<?php
$title = "Add Client";
require_once 'includes/header.php';
require_once 'includes/check_auth.php';
require_once 'db/conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c->insertclient($_POST['username'], $_POST['date'], $_POST['email'], $_POST['phone']);
}
?>
<link rel="stylesheet" href="css/Editpro.css">


<br>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">User Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Date Of Birth</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name="date">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="phone">
    </div>
    <button onclick="return confirm('You Will Add New User');" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
?>