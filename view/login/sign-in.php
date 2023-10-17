<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Electronic Shop</title>
  <link rel="stylesheet" href="../asset/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />
</head>

<body>

  <?php 

    include '../../model/pdo.php';
    include '../../model/client.php';

    if (isset($_SESSION['account']) && ($_SESSION['account'])) {
      $client = loadall_client('', $_SESSION['account']);
      if ($client[0]['client_role'] == 0) {
        header('location: ../../index.php');
      }else {
        header('location: ../../admin/index.php');
      }
      exit;
    }

    $messageLogin ='';
    if (isset($_POST['submit']) && ($_POST['submit'])) {
      $client_email = $_POST['email'];
      $client_password = $_POST['password'];
      $messageLogin = signin($client_email , $client_password);

      if (isset($_SESSION['account']) && ($_SESSION['account'])) {
        $client = loadall_client('', $_SESSION['account']);
        if ($client[0]['client_role'] == 0) {
          header('location: ../../index.php');
        }else {
          header('location: ../../admin/index.php');
        }
        exit;
      }

    }

  
  ?>

  <div id="wrapper-form">
    <form action="./sign-in.php" method="post" class="form_container" id="sign-in">
      <!-- <div class="logo_container"></div> -->
      <div class="title_container">
        <p class="title">Login to your Account</p>
        <span class="subtitle">Get started with our app, just create an account and enjoy the
          experience.</span>
      </div>
      <br />
      <div class="input_container form-group">
        <label class="form-label mb-0" for="email_field">Email</label>
        <ion-icon class="icon" name="mail-outline"></ion-icon>
        <input rules="required|email" placeholder="name@mail.com" title="Inpit title" name="email" type="text"
          class="input_field" id="email_field" />
        <span class="form-message"></span>
      </div>
      <div class="input_container form-group">
        <label class="form-label mb-0" for="password_field">Password</label>
        <ion-icon class="icon" name="lock-closed-outline"></ion-icon>
        <input rules="required|password" placeholder="Password" title="Inpit title" name="password" type="password"
          class="input_field" id="password_field" />
        <span class="form-message"></span>
      </div>

      <div class="flex-row">
        <div>
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Remember me </label>
        </div>
        <a href="./forgot.php">
          <span class="span">Forgot password?</span>
        </a>
      </div>

      <div class="w-100 form-group">
        <input type="submit" name="submit" class="sign-in_btn" value="Sign In">
        <span class="form-message text-danger"><?=$messageLogin;?></span>
      </div>

      <p class="signin mb-0">Not a member yet ? <a href="./register.php">Register</a></p>

      <div class="separator">
        <hr class="line" />
        <span>Or</span>
        <hr class="line" />
      </div>
      <div title="Sign In" class="sign-in_ggl">
        <img src="../asset/image/google-18px.svg" alt="Google" />
        <span>Sign In with Google</span>
      </div>
      <div title="Sign In" class="sign-in_apl">
        <ion-icon name="logo-apple"></ion-icon>
        <span>Sign In with Apple</span>
      </div>
      <p class="note">Terms of use &amp; Conditions</p>
    </form>
  </div>

  <script src="../asset/js/main.js"></script>
  <script src="../asset/js/validator2_0.js"></script>
  <script>
    new Validator("#sign-in");
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>