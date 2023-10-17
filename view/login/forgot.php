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
    <div id="wrapper-form">

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

        $message_true = '';
        $message_false = '';
        if (isset($_POST['submit']) && ($_POST['submit'])) {
            $client_email = $_POST['email'];

            $message = sendMail($client_email);
            if ($message) {
                $message_true = "Email sent successfully!";
            }else {
                $message_false = "Email does not exist!";
            }
        }

      ?>

        <form action="./forgot.php" method="post" id="form-forgot" class="form-container">
            <div class="logo-container">
                Forgot Password
            </div>

            <div class="form-forgot">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input rules="required|email" type="text" id="email" name="email" placeholder="Enter your email">
                    <span class="form-message"></span>
                </div>

                <!-- <button class="form-submit-btn" type="submit">Send Email</button> -->

                <div class="w-100 form-group">
                    <input type="submit" class="form-submit-btn" name="submit" value="Send Email">
                    <span class="form-message <?=$message_true != '' ? 'text-success' : 'text-danger';?>"><?=$message_true;?><?=$message_false;?></span>
                </div>
            </div>

            <p class="signup-link m-0">
                Don't have an account?
                <a href="./register.php" class="signup-link link"> Sign up now!</a>
            </p>
            <p class="signup-link m-0">
                <a href="./sign-in.php" class="signup-link link"> Sign In now!</a>
            </p>
        </form>

    </div>

    <script src="../asset/js/main.js"></script>
    <script src="../asset/js/validator2_0.js"></script>
    <script>
        new Validator("#form-forgot");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>