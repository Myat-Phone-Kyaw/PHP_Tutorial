<?php include("header.php");
session_start();
if (!isset($_SESSION['email'])) {
  header("Location:forget_password.php");
}
$email = $_SESSION['email'];
$notMatchPsw = "";
$emptyPsw = "";
$emptyConfirmPsw = "";
if (isset($_POST['confirm'])) {
  if ($_POST['password'] == null || $_POST['confirm-password'] == null) {
    if ($_POST['password'] == null) {
      $emptyPsw = "Enter your Password!!!";
    }
    if ($_POST['confirm-password'] == null) {
      $emptyconfirmPsw = "Confirm your Password!!!";
    }
  } elseif (isset($_POST['password']) && isset($_POST['confirm-password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    if ($password !== $confirmPassword) {
      $notMatchPsw =  "Password And Confirm Password Do Not Match!!!";
    } else {
      $hashPassword = password_hash($password, PASSWORD_BCRYPT);
      $sql = "update users set password=? where email=?";
      $res = $conn->prepare($sql);
      $res->execute([$hashPassword, $email]);
      header("Location:login.php");
    }
  }
}
?>
<section class="row mt-4">
  <div class="col-6 offset-3">
    <div class="card">
      <div class="card-header">
        <h2>Reset Password</h2>
      </div>

      <form action="reset_password.php" method="POST">
        <div class="card-body">
          <div class="form-group mb-3">
            <label>Email</label><br>
            <input type="text" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $email; ?>" disabled />
          </div>
          <div class="form-group mb-3">
            <label>Password</label><br>
            <input type="password" name="password" class="form-control" placeholder="*********" />
            <small class="text-danger"><?php echo $emptyPsw; ?></small>
          </div>
          <div class="form-group mb-3">
            <label>Confirm Password</label><br>
            <input type="password" name="confirm-password" class="form-control" placeholder="*********" />
            <small class="text-danger"><?php echo $notMatchPsw; ?></small>
            <small class="text-danger"><?php echo $emptyConfirmPsw; ?></small>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <button type="submit" name="confirm" class="btn btn-primary">Confirm</button>
        </div>
      </form>
      
    </div>
  </div>
</section>
</body>

</html>
